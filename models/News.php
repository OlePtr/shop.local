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

    public function add($arr)
    {
        $validator = new \Sirius\Validation\Validator;
        $validator->add([
           "title" => "required | maxlength(255)",
           "content" => "required | minlength(100)"
        ]);

        if ($validator->validate($arr)) {
            $setStr = "";

            foreach ($arr as $key => $value) {
                if ($setStr !== "") {
                    $setStr .= ",";
                }
                $setStr .= " {$key} = '{$value}' ";
            }

            $this->db->query("INSERT INTO news SET {$setStr}");
        } else {
            throw new \Exception("Заполните корректно форму!");
        }
    }
}