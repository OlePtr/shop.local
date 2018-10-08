<?php
namespace Models;

class Catalog extends Model
{
    public function all()
    {
       $result = $this->db->query("SELECT * FROM catalog");
       return $result->all();
    }

    public function get($id)
    {
        $result = $this->db->query("SELECT * FROM  catalog WHERE id={$id}");
        return $result->row();
    }

    public function add($arr)
    {
        $this->checkData($arr);
        $setStr = $this->generateSetSql($arr);
        $this->db->query("INSERT INTO catalog SET {$setStr}");

    }

    public function update($id, $arr)
    {
        $this->checkData($arr);
        $setStr = $this->generateSetSql($arr);
        $this->db->query("UPDATE catalog SET {$setStr} WHERE id={$id}");
    }

    public function delete($id)
    {
        $catalog = $this->get($id);
        if ($catalog) {
            $this->db->query("DELETE FROM catalog WHERE id={$id}");
        } else {
            throw new \Exception("Невозможно удалить несуществующую запись!");
        }
    }

    protected function checkData($arr)
    {
        $validator = new \Sirius\Validation\Validator;
        $validator->add([
            "title" => "required | maxlength(255)",
            "description" => "required | minlength(100)",
            "price" => "required", 
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