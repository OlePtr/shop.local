<?php
namespace Models;

class News extends Model
{
    public function all()
    {
       $result = $this->db->query("SELECT * FROM news");
       return $result->all();
    }

    public function get($id)
    {
        $result = $this->db->query("SELECT * FROM  news WHERE id={$id}");
        return $result->row();
    }
}