<?php
namespace Libs\DB;

class Result
{
    protected $result = null;

    public function __construct(\mysqli_result $res)
    {
        $this->result = $res;
    }

    public function all()
    {
        return $this->result->fetch_all(MYSQLI_ASSOC);
    }

    public function row()
    {
        return $this->result->fetch_assoc();
    }
}