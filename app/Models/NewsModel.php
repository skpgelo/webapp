<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class NewsModel extends Model
{
    protected $table = 'berita';
    protected $allowedFields = 
    [
        // 'active'
        // , 'body'
        // , 'image'
        // , 'publish_date'
        // , 'slug'
        // , 'title'
        'active'
        , 'isi_berita'
        , 'isi_gambar'
        , 'create_at'
        , 'slug'
        , 'isi_judul'
    ];
 
    public function getNews($id = '')
    {
        if ($id === '')
        {
        return $this->asObject()
                    ->orderBy('create_at', 'desc')
                    ->findAll();
        }
 
        return $this->asObject()
                    ->where(['id_berita' => $id])
                    ->first();
 
    }
 
    public function getPageSlug($slug = false)
    {
        return $this->asObject()
                    ->where(['slug' => $slug])
                    ->first();
    }
 
    function checkSlug($string){
        $str=$string;
        $query = "SELECT * from berita WHERE slug like '%".$string."%' ";
        $data = $this->db->query($query);
        $countResult = count($data->getResultArray());
        if ($countResult > 0) {
            $str=$str.'-'.$countResult;
        }
        return $str;                    
    }
 
    public function getLatestNews()
    {
        return $this->asObject()
                    ->orderBy('create_at', 'desc')
                    ->findAll(3);
    }
 
    public function make_query($create_at, $title, $body)
    {
        $query = "
        SELECT * from berita
        WHERE 1=1 
        ";
 
        if (isset($body)) {
            $body = substr($this->db->escape($body), 1, -1);
            $query .= "
                AND isi_berita like '%".$body."%'
            ";
        }
 
        if (isset($publish_date) && $publish_date !== '') {
            $query .= "
                AND create_at='".$create_at."'
            ";
        }
 
        if (isset($title)) {
            $title = substr($this->db->escape($title), 1, -1);
            $query .= "
                AND isi_judul like '%".$title."%'
            ";
        }
 
        return $query;
    }
 
    public function fetch_data($limit, $start, $create_at, $title, $body)
    {
        $query = $this->make_query($create_at, $title, $body);
        $query .= ' LIMIT '.$start.', '.$limit; 
        $data = $this->db->query($query);
        return $data->getResult();
    }
 
    public function count_all($create_at, $title, $body)
    {
        $query = $this->make_query($create_at, $title, $body);
        $data = $this->db->query($query);
 
        return count($data->getResultArray());
    }
}