<?php
namespace Libs\DB;

class Result
{
    protected $result = null;

    public function __construct($res)
    {
        $this->result = $res;
    }

    public function all()
    {
        if ($this->result instanceof \mysqli_result) {
            return $this->result->fetch_all(MYSQLI_ASSOC);
        }

        return $this->result;
    }

    public function row()
    {
        if ($this->result instanceof \mysqli_result) {
            return $this->result->fetch_assoc();
        }

        return $this->result;
    }
}