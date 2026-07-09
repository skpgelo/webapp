<?php namespace App\Controllers;
use App\Models\{UtamaModel, MultiImagesModel, GenderModel, NikahModel, KategoriModel};
use CodeIgniter\API\ResponseTrait;

class UtamaController extends BaseController {
    use ResponseTrait;
    protected $utama, $multi;

    public function __construct(){
        $this->utama = new UtamaModel();
        $this->multi = new MultiImagesModel();
    }

public function list(){
    if(!$this->request->isAJAX()) return $this->failForbidden();

    $draw   = $this->request->getPost('draw');
    $start  = $this->request->getPost('start'); // = offset
    $length = $this->request->getPost('length'); // = limit. INI YANG DICARI DATATABLES
    $search = $this->request->getPost('search')['value'] ?? '';

    $builder = $this->utama->builder();

    if($search){
        $builder->groupStart()
                ->like('nama', $search)
                ->orLike('nip', $search)
                ->groupEnd();
    }

    $totalRecords = $this->utama->countAll(); // 1. Total semua data
    $filteredRecords = $builder->countAllResults(false); // 2. Total data setelah filter. `false` = jangan reset query

    $data = $builder->limit($length, $start)->get()->getResult(); // 3. Ambil data sesuai page

    $rows = [];
    $no = $start;
    foreach($data as $d){ $no++;
        $img = $d->image_thumb ? '<img src="'.base_url('uploads/'.$d->image_thumb).'" width="40" class="rounded">' : '-';
        $pdfBtn = $d->lokasi_pdf? '<a href="'.site_url('utama/download/pdf/'.$d->id).'" class="btn btn-sm btn-danger"><i class="fas fa-file-pdf"></i></a>' : '';
        $imgBtn = $d->image? '<a href="'.site_url('utama/download/image/'.$d->id).'" class="btn btn-sm btn-success"><i class="fas fa-image"></i></a>' : '';

        $rows[] = [
            $no,
            $d->nama.'<br><small>NIP: '.$d->nip.'</small>',
            $d->jabatan.'<br><small>'.$d->gender.' | '.$d->nikah.'</small>',
            $d->alamat.'<br><small>'.$d->desa.', '.$d->kecamatan.'</small>',
            $img,
            $pdfBtn.' '.$imgBtn.' 
             <button class="btn btn-sm btn-info btn-detail" data-id="'.$d->id.'"><i class="fas fa-eye"></i></button>
             <button class="btn btn-sm btn-warning btn-edit" data-id="'.$d->id.'"><i class="fas fa-edit"></i></button>
             <button class="btn btn-sm btn-danger btn-delete" data-id="'.$d->id.'"><i class="fas fa-trash"></i></button>'
        ];
    }

    // 4. INI FORMAT WAJIB DATATABLES SERVERSIDE
    return $this->response->setJSON([
        "draw"            => intval($draw),
        "recordsTotal"    => $totalRecords,
        "recordsFiltered" => $filteredRecords,
        "data"            => $rows
    ]);
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

// public function save(){
//         $db = \Config\Database::connect();
//         $db->transStart();
//         $nip = $this->request->getPost('nip');
//         $time = time();

//         // 1. Data untuk tabel_utama
//         $dataUtama = $this->request->getPost([
//             'nama','jabatan','nip','latitude','longitude','alamat','desa','kecamatan','kabupaten','provinsi',
//             'foreigngender_id','foreignnikah_id','foreignkategori_id'
//         ]);

//         $filesMulti = $this->request->getFiles('multi_images');
//         $judulArr = $this->request->getPost('judul_images');
//         $tglArr = $this->request->getPost('tgl_images');

//         // 2. Upload PDF -> pdf + lokasi_pdf
//         $filePdf = $this->request->getFile('pdf');
//         if($filePdf && $filePdf->isValid()){
//             $pdfName = $nip.'_pdf_'.$time.'.pdf';
//             $filePdf->move(WRITEPATH.'../public/uploads', $pdfName);
//             $dataUtama['pdf'] = $nip.'_pdf_'.$time;
//             $dataUtama['lokasi_pdf'] = $pdfName;
//         }

//         // 3. Upload Image Utama -> image
//         $fileImage = $this->request->getFile('image');
//         if($fileImage && $fileImage->isValid()){
//             $imgName = $nip.'_img_'.$time.'.'.$fileImage->getExtension();
//             $fileImage->move(WRITEPATH.'../public/uploads', $imgName);
//             $dataUtama['image'] = $imgName;
//         }

//         // 4. Ambil Image ke-1 untuk disimpan di tabel_utama juga
//         if(isset($filesMulti[0]) && $filesMulti[0]->isValid()){
//             $img1Name = $nip.'_multi_'.$time.'_0.'.$filesMulti[0]->getExtension();
//             $filesMulti[0]->move(WRITEPATH.'../public/uploads', $img1Name);
//             $dataUtama['judul_images'] = $judulArr[0]?? '';
//             $dataUtama['tgl_images'] = $tglArr[0]?? date('Y-m-d');
//             $dataUtama['lokasi_images'] = $img1Name; // <-- ini field baru di tabel_utama
//         }

//         // 5. Insert tabel_utama -> dapat ID
//         $idUtama = $this->utama->insert($dataUtama);

//         // 6. LOOP SEMUA MULTI_IMAGE -> INSERT KE tabel_multiimages [INI YANG KAMU MINTA]
//         if(isset($filesMulti)){
//             $kategoriArr = $this->request->getPost('multi_kategori_id');
//             foreach($filesMulti as $key => $file){
//                 if($file->isValid()){
//                     $multiName = $nip.'_multi_'.$idUtama.'_'.$key.'_'.$time.'.'.$file->getExtension();
//                     $file->move(WRITEPATH.'../public/uploads', $multiName);

//                     $this->multi->insert([
//                         'foreigutama_id' => $idUtama,
//                         'foreignkategori_id'=> $kategoriArr[$key],
//                         'judul_images' => $judulArr[$key], // <-- save judul per image
//                         'tgl_images' => $tglArr[$key], // <-- save tgl per image
//                         'lokasi_images' => $multiName, // <-- save nama file per image
//                         'multi_images' => $multiName // <-- save nama file per image
//                     ]);
//                 }
//             }
//         }

//         $db->transComplete();
//         if ($db->transStatus() === false) return $this->fail('Gagal Transaksi');
//         return $this->respond(['status'=>'success','id'=>$idUtama]);
//     }

    public function save()
{
    if(!auth()->user()->can('data.delete')) return $this->failForbidden('No Access'); // Lock

    $id = $this->request->getPost('id');
    
    $rules = [
        'nip'    => 'required|is_unique[utama.nip,id,'.$id.']',
        'nama'   => 'required',
        'image'  => 'permit_empty|max_size[image,2048]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
        'pdf'    => 'permit_empty|max_size[pdf,5120]|mime_in[pdf,application/pdf]',
    ];
    if(!$this->validate($rules)) return $this->failValidationErrors($this->validator->getErrors());

    $data = $this->request->getPost(['nip','nama','jabatan','gender','nikah','alamat','desa','kecamatan']);
    
    // === MULAI BAGIAN UPLOAD, TARUH DI SINI ===
    $image = $this->request->getFile('image');
    $pdf   = $this->request->getFile('pdf');

    // 1. UPLOAD PDF + SCAN CLAMAV
    if($pdf && $pdf->isValid() && !$pdf->hasMoved()){
        $pdfName = $data['nip'].'_'.time().'.pdf';
        $pdf->move($this->uploadPath, $pdfName);
        
        if(!$this->scanFile($this->uploadPath.$pdfName)){ // Panggil fungsi scan
            unlink($this->uploadPath.$pdfName); // Hapus kalau virus
            return $this->fail('File PDF terdeteksi virus', 400);
        }
        
        // Hapus PDF lama kalau update
        if($id){
            $old = $this->utama->find($id);
            if($old->lokasi_pdf && is_file($this->uploadPath.$old->lokasi_pdf)) unlink($this->uploadPath.$old->lokasi_pdf);
        }
        $data['lokasi_pdf'] = $pdfName;
    }

    // 2. UPLOAD IMAGE + SCAN + RESIZE THUMB
    if($image && $image->isValid() && !$image->hasMoved()){
        $imgName = $data['nip'].'_'.time().'.'.$image->getExtension();
        $image->move($this->uploadPath, $imgName);
        
        if(!$this->scanFile($this->uploadPath.$imgName)){
            unlink($this->uploadPath.$imgName);
            return $this->fail('File Image terdeteksi virus', 400);
        }

        // Bikin thumbnail 200x200
        $thumbName = 'thumb_'.$imgName;
        \Config\Services::image()
            ->withFile($this->uploadPath.$imgName)
            ->fit(200, 200, 'center')
            ->save($this->uploadPath.$thumbName);

        // Hapus image lama kalau update
        if($id){
            $old = $this->utama->find($id);
            if($old->image && is_file($this->uploadPath.$old->image)) unlink($this->uploadPath.$old->image);
            if($old->image_thumb && is_file($this->uploadPath.$old->image_thumb)) unlink($this->uploadPath.$old->image_thumb);
        }
        $data['image'] = $imgName;
        $data['image_thumb'] = $thumbName;
    }
    // === SELESAI BAGIAN UPLOAD ===

    if($id){
        $this->utama->update($id, $data);
    }else{
        $this->utama->insert($data);
    }

    return $this->respondCreated(['status' => 'ok']);
}

// 3. TARUH FUNGSI SCAN INI DI BAWAH, MASIH DALAM CLASS UTAMA
private function scanFile(string $filePath): bool
{
    $cmd = 'clamscan --no-summary --infected '.escapeshellarg($filePath).' 2>/dev/null';
    exec($cmd, $output, $returnCode);
    return $returnCode === 0; // 0 = bersih, 1 = virus
}

}