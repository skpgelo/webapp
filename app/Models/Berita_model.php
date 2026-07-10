<?php namespace App\Models;

use CodeIgniter\Model;

class Berita_model extends Model
{
	protected $table 		= 'berita';
	protected $primaryKey 	= 'id';
	 protected $allowedFields = ['id_user',
	 							'id_kategori',
	 							'slug_berita',
	 							'judul_berita',
	 							'isi',
	 							'status_berita',
	 							'jenis_berita',
	 							'keywords',
	 							'gambar',
	 							'tanggal_post'];
	
	// Listing
	public function listing()
	{
		$this->select('berita.*, kategori.nama_kategori');
		$this->join('kategori','kategori.id_kategori = berita.id_kategori');
		// $this->where('status_berita','Publish');
		$this->orderBy('id','DESC');
		$query = $this->get();
		return $query->getResultArray();
	}

	// Listing home
	public function home()
	{
		$this->select('berita.*, kategori.nama_kategori');
		$this->join('kategori','kategori.id_kategori = berita.id_kategori');
		$this->where('status_berita','Publish');
		$this->orderBy('id','DESC');
		$query = $this->get();
		return $query->getResultArray();
	}

	// Detail
	public function detail($id)
	{
		$this->select('berita.*, kategori.nama_kategori');
		$this->join('kategori','kategori.id_kategori = berita.id_kategori');
		$this->where(array(	'status_berita'	=> 'Publish',
							'id'		=> $id));
		$query = $this->get();
		return $query->getRowArray();
	}

	// Read
	public function read($slug_berita)
	{
		$this->select('berita.*, kategori.nama_kategori');
		$this->join('kategori','kategori.id_kategori = berita.id_kategori');
		$this->where(array(	'status_berita'	=> 'Publish',
							'slug_berita'	=> $slug_berita));
		$query = $this->get();
		return $query->getRowArray();
	}

	// Insert
	public function tambah($data)
	{
		$this->save($data);
	}

	// Edit
	public function edit($data)
	{
		$this->where('id',$data['id']);
		$this->replace($data);
	}

	// Delete
	public function hapus($id)
	{
		$this->where('id',$id);
		$this->delete();
	}
}