<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\{UtamaModel, MultiImagesModel, GenderModel, NikahModel, KategoriModel};
use CodeIgniter\API\ResponseTrait;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;
use Dompdf\Options;

class Utama extends BaseController {
    use ResponseTrait;
    protected $utama, $gender, $nikah, $kategori, $multi, $uploadPath;

    public function __construct(){
        $this->utama = new UtamaModel();
        $this->gender = new GenderModel();
        $this->nikah = new NikahModel();
        $this->kategori = new KategoriModel();
        $this->multi = new MultiImagesModel();
        $this->uploadPath = WRITEPATH.'../public/uploads/'; // path aman
    }

    public function save(){
        $db = \Config\Database::connect();
        $db->transStart();
        $nip = preg_replace('/[^A-Za-z0-9]/','',$this->request->getPost('nip')); // bersihkan nip
        $time = time();

        // 1. VALIDASI KETAT ANTI MALWARE
        $rules = [
            'nama'=>'required|max_length[100]',
            'nip'=>'required|max_length[50]',
            'pdf' => 'permit_empty|uploaded[pdf]|max_size[pdf,5120]|ext_in[pdf,pdf]|mime_in[pdf,application/pdf]', // max 5MB PDF only
            'image' => 'permit_empty|uploaded[image]|max_size[image,2048]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]', // max 2MB
            'multi_images.*' => 'permit_empty|uploaded[multi_images.*]|max_size[multi_images.*,2048]|is_image[multi_images.*]|mime_in[multi_images.*,image/jpg,image/jpeg,image/png,image/webp]'
        ];
        if(!$this->validate($rules)){
            return $this->failValidationErrors($this->validator->getErrors());
        }

        // $dataUtama = $this->request->getPost([
        //     'nama','jabatan','nip','latitude','longitude','alamat','desa','kecamatan','kabupaten','provinsi',
        //     'foreigngender_id','foreignnikah_id','foreignkategori_id'
        // ]);

        // $filesMulti = $this->request->getFiles('multi_images');
        // $judulArr = $this->request->getPost('judul_images');
        // $tglArr = $this->request->getPost('tgl_images');
        // $kategoriArr = $this->request->getPost('multi_kategori_id');

        $img = $this->request->getFile('image');
        $namaFile = null;
        if($img && $img->isValid() && !$img->hasMoved()){
            $namaBaru = $this->request->getPost('nip').'_'.time().'.webp'; // ganti ke webp
            $path = $this->uploadPath.$namaBaru;

            // 1. Pindah dulu ke writable/uploads
            $img->move($this->uploadPath, $namaBaru, true); 

            // 2. Kompres + Resize pakai CI4 Image
            $image = \Config\Services::image()
                ->withFile($path)
                ->fit(1024, 1024, 'center') // Max 1024px, biar tidak lebar banget
                ->convert(IMAGETYPE_WEBP, 75) // 75 = kualitas 75%. 60-80 udah cukup
                ->save($path); // overwrite file yg sama

            if(!$this->scanFile($path)) return $this->fail('File mengandung virus');

            $namaFile = $namaBaru;
        }
        // 2. UPLOAD PDF - CEK MIME BENAR
        $filePdf = $this->request->getFile('pdf');
        if($filePdf && $filePdf->isValid() &&!$filePdf->hasMoved()){
            if($filePdf->getMimeType()!== 'application/pdf'){
                return $this->fail('Tipe file PDF tidak valid');
            }
            $pdfName = $nip.'_pdf_'.$time.'.pdf'; // paksa.pdf
            $filePdf->move($this->uploadPath, $pdfName, true); // true = overwrite
            $dataUtama['pdf'] = $nip.'_pdf_'.$time;
            $dataUtama['lokasi_pdf'] = $pdfName;
        }

        // 3. UPLOAD IMAGE UTAMA - CEK IS_IMAGE + GUESS EXT
        $fileImage = $this->request->getFile('image');
        if($fileImage && $fileImage->isValid() &&!$fileImage->hasMoved()){
            if(!$fileImage->isImage()){ // cek header file beneran image
                return $this->fail('File image tidak valid');
            }
            $ext = $fileImage->guessExtension(); // ambil ext dari isi file, bukan nama
            $imgName = $nip.'_img_'.$time.'.'.$ext;
            $fileImage->move($this->uploadPath, $imgName, true);
            $dataUtama['image'] = $imgName;
        }

        // 4. IMAGE KE-1 UNTUK tabel_utama
        if(isset($filesMulti[0]) && $filesMulti[0]->isValid() &&!$filesMulti[0]->hasMoved()){
            $ext1 = $filesMulti[0]->guessExtension();
            $img1Name = $nip.'_multi_'.$time.'_0.'.$ext1;
            $filesMulti[0]->move($this->uploadPath, $img1Name, true);
            $dataUtama['judul_images'] = esc($judulArr[0]?? ''); // esc = anti XSS
            $dataUtama['tgl_images'] = $tglArr[0]?? date('Y-m-d');
            $dataUtama['lokasi_images'] = $img1Name;
        }

        // 5. INSERT UTAMA
        $idUtama = $this->utama->insert($dataUtama);

        // 6. LOOP MULTI - SEMUA CEK MIME + RENAME
        if(isset($filesMulti)){
            foreach($filesMulti as $key => $file){
                if($file->isValid() &&!$file->hasMoved()){
                    if(!$file->isImage() ||!in_array($file->getMimeType(), ['image/jpeg','image/png','image/webp'])){
                        continue; // skip file mencurigakan
                    }
                    $ext = $file->guessExtension();
                    $multiName = $nip.'_multi_'.$idUtama.'_'.$key.'_'.$time.'.'.$ext;
                    $file->move($this->uploadPath, $multiName, true);

                    $this->multi->insert([
                        'foreigutama_id' => $idUtama,
                        'foreignkategori_id'=> (int)$kategoriArr[$key],
                        'judul_images' => esc($judulArr[$key]), // esc anti XSS
                        'tgl_images' => $tglArr[$key],
                        'lokasi_images' => $multiName,
                        'multi_images' => $multiName
                    ]);
                }
            }
        }

        
        $db->transComplete();
        if ($db->transStatus() === false) return $this->fail('Gagal Transaksi DB');
        return $this->respond(['status'=>'success','id'=>$idUtama]);
    }

    public function download($type, $id)
    {
        $utama = $this->utama->find($id);
        if(!$utama) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        if($type === 'pdf' && $utama->lokasi_pdf){
            $file = $this->uploadPath.$utama->lokasi_pdf;
            $name = $utama->nip.'_'.$utama->nama.'.pdf';
        }elseif($type === 'image' && $utama->image){
            $file = $this->uploadPath.$utama->image;
            $name = $utama->nip.'_'.$utama->nama.'.'.$pathinfo($file, PATHINFO_EXTENSION);
        }else{
            return $this->failNotFound('File tidak ditemukan');
        }

        if(!is_file($file)) return $this->failNotFound('File hilang di server');
        
        // Force download, bukan dibuka di browser
        return $this->response->download($file, null)->setFileName($name);
    }

    private function getFilters(){
        return [
            'kecamatan' => $this->request->getVar('kecamatan'), // getVar = GET/POST
            'kategori'  => $this->request->getVar('kategori'),
            'tgl_awal'  => $this->request->getVar('tgl_awal'),
            'tgl_akhir' => $this->request->getVar('tgl_akhir'),
        ];
    }

    // Query dasar + filter, dipake berulang
    // private function buildQuery(){
        // $kecamatan = $this->request->getGet('kecamatan');
        // $kategori = $this->request->getGet('kategori');

    //     $builder = $this->utama->select('utama.*, gender, nikah, kategori')
    //         ->join('gender','gender.id=utama.foreigngender_id','left')
    //         ->join('nikah','nikah.id=utama.foreignnikah_id','left')
    //         ->join('kategori','kategori.id=utama.foreignkategori_id','left');

    //     if($kecamatan) $builder->like('kecamatan', $kecamatan);
    //     if($kategori) $builder->where('utama.foreignkategori_id', $kategori);
        
    //     return $builder;
    // }

    private function buildQuery($f){
        $builder = $this->utama->select('utama.*, gender, nikah, kategori')
            ->join('gender','gender.id=utama.foreigngender_id','left')
            ->join('nikah','nikah.id=utama.foreignnikah_id','left')
            ->join('kategori','kategori.id=utama.foreignkategori_id','left');

        if(!empty($f['kecamatan'])) $builder->like('kecamatan', $f['kecamatan']);
        if(!empty($f['kategori']))  $builder->where('utama.foreignkategori_id', $f['kategori']);
        
        // Filter Tanggal: BETWEEN 00:00:00 s/d 23:59:59
        if(!empty($f['tgl_awal']))  $builder->where('utama.created_at >=', $f['tgl_awal'].' 00:00:00');
        if(!empty($f['tgl_akhir'])) $builder->where('utama.created_at <=', $f['tgl_akhir'].' 23:59:59');
        
        return $builder;
    }

    // public function list(){
    // $db = \Config\Database::connect();

    // $kecamatan = $this->request->getPost('kecamatan');
    // $kategori = $this->request->getPost('kategori');

    // $builder = $db->table('tabel_utama u')
    //     ->select('u.*, g.gender, n.nikah, k.kategori')
    //     ->join('tabel_gender g','g.id=u.foreigngender_id','left')
    //     ->join('tabel_nikah n','n.id=u.foreignnikah_id','left')
    //     ->join('tabel_kategori k','k.id=u.foreignkategori_id','left');

    // if(isset($_POST['search']['value']) && $_POST['search']['value']){
    //     $builder->groupStart()
    //         ->like('u.nama', $_POST['search']['value'])
    //         ->orLike('u.nip', $_POST['search']['value'])
    //         ->groupEnd();
    // }
    // $total = $builder->countAllResults(false);
    // $builder->limit($_POST['length'], $_POST['start'])->orderBy('u.id','desc');
    // $data = $builder->get()->getResult();

    // $rows = [];
    // $no = $_POST['start'];
    // foreach($data as $d){ $no++;
    //     $img = $d->image? '<img src="'.base_url('uploads/'.$d->image).'" width="40" class="rounded">' : '-';
    //     $pdfBtn = $d->lokasi_pdf? '<a href="'.site_url('utama/download/pdf/'.$d->id).'" class="btn btn-sm btn-danger" title="Download PDF"><i class="fas fa-file-pdf"></i></a>' : '';
    //     $imgBtn = $d->image? '<a href="'.site_url('utama/download/image/'.$d->id).'" class="btn btn-sm btn-success" title="Download Image"><i class="fas fa-image"></i></a>' : '';

    //     $rows[] = [
    //         $no,
    //         $d->nama.'<br><small>NIP: '.$d->nip.'</small>',
    //         $d->jabatan.'<br><small>'.$d->gender.' | '.$d->nikah.'</small>',
    //         $d->alamat.'<br><small>'.$d->desa.', '.$d->kecamatan.'</small>',
    //         $img, // kolom preview kecil
    //         $pdfBtn.' '.$imgBtn.' 
    //         <button class="btn btn-sm btn-info btn-detail" data-id="'.$d->id.'"><i class="fas fa-eye"></i></button>
    //         <button class="btn btn-sm btn-warning btn-edit" data-id="'.$d->id.'"><i class="fas fa-edit"></i></button>
    //         <button class="btn btn-sm btn-danger btn-delete" data-id="'.$d->id.'"><i class="fas fa-trash"></i></button>'
    //     ];
    // }

    // return $this->respond([
    //     "draw"=>$_POST['draw'],"recordsTotal"=>$total,"recordsFiltered"=>$total,"data"=>$rows
    // ]);
    // }

    public function list(){
        $f = $this->getFilters(); // ambil dari POST
        $builder = $this->buildQuery($f);
        // ... lanjut code datatables serverSide biasa
        // count, limit, order by dll
        if(isset($_POST['search']['value']) && $_POST['search']['value']){
            $builder->groupStart()
                ->like('u.nama', $_POST['search']['value'])
                ->orLike('u.nip', $_POST['search']['value'])
                ->groupEnd();
        }
        $total = $builder->countAllResults(false);
        $builder->limit($_POST['length'], $_POST['start'])->orderBy('u.id','desc');
        $data = $builder->get()->getResult();

        $rows = [];
        $no = $_POST['start'];
        foreach($data as $d){ $no++;
            $img = $d->image? '<img src="'.base_url('uploads/'.$d->image).'" width="40" class="rounded">' : '-';
            $pdfBtn = $d->lokasi_pdf? '<a href="'.site_url('utama/download/pdf/'.$d->id).'" class="btn btn-sm btn-danger" title="Download PDF"><i class="fas fa-file-pdf"></i></a>' : '';
            $imgBtn = $d->image? '<a href="'.site_url('utama/download/image/'.$d->id).'" class="btn btn-sm btn-success" title="Download Image"><i class="fas fa-image"></i></a>' : '';

            $rows[] = [
                $no,
                $d->nama.'<br><small>NIP: '.$d->nip.'</small>',
                $d->jabatan.'<br><small>'.$d->gender.' | '.$d->nikah.'</small>',
                $d->alamat.'<br><small>'.$d->desa.', '.$d->kecamatan.'</small>',
                $img, // kolom preview kecil
                $pdfBtn.' '.$imgBtn.' 
                <button class="btn btn-sm btn-info btn-detail" data-id="'.$d->id.'"><i class="fas fa-eye"></i></button>
                <button class="btn btn-sm btn-warning btn-edit" data-id="'.$d->id.'"><i class="fas fa-edit"></i></button>
                <button class="btn btn-sm btn-danger btn-delete" data-id="'.$d->id.'"><i class="fas fa-trash"></i></button>'
            ];
        }

        return $this->respond([
            "draw"=>$_POST['draw'],"recordsTotal"=>$total,"recordsFiltered"=>$total,"data"=>$rows
        ]);

    }

    //         public function exportExcel()
    // {

    //     $data = $this->buildQuery()->findAll(); // <- ambil semua data sesuai filter

    //     $spreadsheet = new Spreadsheet();
    //     $sheet = $spreadsheet->getActiveSheet();
    //     $kecamatan = $this->request->getGet('kecamatan') ?: 'Semua';
    //     $sheet->setTitle('Data '.$kecamatan);

        // $data = $this->utama->select('utama.*, gender, nikah, kategori')
        //     ->join('gender','gender.id=utama.foreigngender_id','left')
        //     ->join('nikah','nikah.id=utama.foreignnikah_id','left')
        //     ->join('kategori','kategori.id=utama.foreignkategori_id','left')
        //     ->findAll();

        // $spreadsheet = new Spreadsheet();
        // $sheet = $spreadsheet->getActiveSheet();
        // $sheet->setTitle('Data Utama');

        // Header
        // $headers = ['No','Nama','NIP','Jabatan','Gender','Status Nikah','Kategori','Alamat','Lat','Long'];
        // $sheet->fromArray($headers, NULL, 'A1');
        // $sheet->getStyle('A1:J1')->getFont()->setBold(true);

        // Data
    //     $row = 2;
    //     foreach($data as $i => $d){
    //         $sheet->fromArray([
    //             $i+1, $d->nama, $d->nip, $d->jabatan, $d->gender, $d->nikah, $d->kategori, 
    //             $d->alamat.', '.$d->desa, $d->latitude, $d->longitude
    //         ], NULL, 'A'.$row++);
    //     }
        
    //     foreach(range('A','J') as $col) $sheet->getColumnDimension($col)->setAutoSize(true);

    //     $filename = 'Data_Utama_'.date('Ymd_His').'.xlsx';
    //     header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    //     header('Content-Disposition: attachment;filename="'.$filename.'"');
    //     header('Cache-Control: max-age=0');
        
    //     $writer = new Xlsx($spreadsheet);
    //     $writer->save('php://output');
    //     exit;
    // }

    public function exportExcel()
    {
        $f = $this->getFilters(); // ambil dari GET
        $data = $this->buildQuery($f)->findAll();

        $spreadsheet = new Spreadsheet(); $sheet = $spreadsheet->getActiveSheet();
        $judul = 'Data_'.$f['kecamatan'] ?: 'Semua'.'_'.$f['tgl_awal'].'_s/d_'.$f['tgl_akhir'];
        $sheet->setTitle(substr($judul,0,31));

        $headers = ['No','Nama','NIP','Jabatan','Gender','Nikah','Kategori','Alamat','Tgl Upload'];
        $sheet->fromArray($headers, NULL, 'A1'); $sheet->getStyle('A1:I1')->setBold(true);

        $row = 2;
        foreach($data as $i => $d){
            $sheet->fromArray([
                $i+1, $d->nama, $d->nip, $d->jabatan, $d->gender, $d->nikah, $d->kategori, 
                $d->alamat.', '.$d->desa, date('d-m-Y H:i', strtotime($d->created_at))
            ], NULL, 'A'.$row++);
        }
        $filename = 'Data_Utama_'.date('Ymd_His').'.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        (new Xlsx($spreadsheet))->save('php://output'); exit;
    }

    // public function exportPdf()
    // {
        // $data = $this->buildQuery()->findAll(); // <- ambil semua data sesuai filter
    //     $data = $this->utama->select('utama.*, gender, nikah, kategori')
    //         ->join('gender','gender.id=utama.foreigngender_id','left')
    //         ->join('nikah','nikah.id=utama.foreignnikah_id','left')
    //         ->join('kategori','kategori.id=utama.foreignkategori_id','left')
    //         ->findAll();

    //     $html = view('utama/pdf_template', ['data'=>$data]); // bikin view khusus pdf

    //     $options = new Options();
    //     $options->set('isRemoteEnabled', true); // biar bisa load logo/css
    //     $options->set('defaultFont', 'DejaVu Sans'); // support unicode

    //     $dompdf = new Dompdf($options);
    //     $dompdf->loadHtml($html);
    //     $dompdf->setPaper('A4', 'landscape'); // landscape biar muat banyak kolom
    //     $dompdf->render();
    //     $dompdf->stream('Data_Utama_'.date('Ymd_His').'.pdf', ['Attachment'=>true]);
    //     exit;
    // }

    public function exportPdf()
    {
        $f = $this->getFilters();
        $data = $this->buildQuery($f)->findAll();
        $html = view('utama/pdf_template', ['data'=>$data, 'filter'=>$f]);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('Data_Utama_'.date('Ymd_His').'.pdf', ['Attachment'=>true]);
        exit;
    }

    public function get($id){
        $utama = $this->utama->find($id);
        $multi = $this->multi->where('foreigutama_id',$id)->findAll();
        return $this->respond(['utama'=>$utama,'multi'=>$multi]);
    }

    public function delete($id){
        $data = $this->utama->find($id);
        // hapus file
        if($data->image) @unlink(WRITEPATH.'../public/uploads/'.$data->image);
        if($data->lokasi_pdf) @unlink(WRITEPATH.'../public/uploads/'.$data->lokasi_pdf);
        if($data->lokasi_images) @unlink(WRITEPATH.'../public/uploads/'.$data->lokasi_images);
        $multi = $this->multi->where('foreigutama_id',$id)->findAll();
        foreach($multi as $m) @unlink(WRITEPATH.'../public/uploads/'.$m->multi_images);
        $this->multi->where('foreigutama_id',$id)->delete();
        $this->utama->delete($id);
        return $this->respond(['status'=>'success']);
    }

    public function deleteMulti($id){
        $data = $this->multi->find($id);
        if($data->multi_images) @unlink(WRITEPATH.'../public/uploads/'.$data->multi_images);
        $this->multi->delete($id);
        return $this->respond(['status'=>'success']);
    }
    

}
