<?php
namespace Controllers;

class Index extends Controller
{
    public function show()
    {
        $this->view->display("index", [
            "pageTitle" => "Главная страница"
        ]);
    }
}