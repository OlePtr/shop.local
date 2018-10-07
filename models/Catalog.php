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
        $this->checkData($arr);
        $setStr = $this->generateSetSql($arr);
        $this->db->query("INSERT INTO news SET {$setStr}");

    }

    public function update($id, $arr)
    {
        $this->checkData($arr);
        $setStr = $this->generateSetSql($arr);
        $this->db->query("UPDATE news SET {$setStr} WHERE id={$id}");
    }

    public function delete($id)
    {
        $news = $this->get($id);
        if ($news) {
            $this->db->query("DELETE FROM news WHERE id={$id}");
        } else {
            throw new \Exception("Невозможно удалить несуществующую запись!");
        }
    }

    protected function checkData($arr)
    {
        $validator = new \Sirius\Validation\Validator;
        $validator->add([
            "title" => "required | maxlength(255)",
            "content" => "required | minlength(100)",
            "author" => "required | maxlength(255)",
        ]);

        if ($validator->validate($arr)) {
            return true;
        } else {
            throw new \Exception("Заполните корректно форму!");
        }
    }

    protected function generateSetSql ($arr)
    {
        $setStr = "";

        foreach ($arr as $key => $value) {
            if ($setStr !== "") {
                $setStr .= ",";
            }
            $setStr .= " {$key} = '{$value}' ";
        }

        return $setStr;
    }
}