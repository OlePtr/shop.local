<?php
namespace Libs;


class View
{
    protected $templatesDir = null;

    public function __construct($dir)
    {
        $this->templatesDir = $dir;
    }

    public function display($template, $dataArray)
    {
        extract($dataArray);

        include $this->templatesDir . "/common/header.php";
        include $this->templatesDir . "/".$template.".php";
        include $this->templatesDir . "/common/footer.php";
    }

    public function setNotFound()
    {
        header("HTTP/1.1 404 Not Found");
    }
}