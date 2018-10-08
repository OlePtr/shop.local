<?php
namespace Controllers;

class Catalog extends Controller
{
    private $catalog;

    public function __construct()
    {
        // вызов родительского конструктора
        parent::__construct();
        $this->catalog = new \Models\Catalog();
    }

    // метод для показа главной страницы новостей (списка)
    public function index()
    {
        $list = $this->catalog->all();

        $data = [
            "catalog" => $list,
            "pageTitle" => "Список всех продуктов каталога"
        ];

        $this->view->display("catalog/list", $data);
    }

    // для просмотра новости
    public function show($id)
    {
        $news = $this->catalog->get($id);

        $this->view->display("catalog/page", [
           "description" => $news["description"],
           "pageTitle" => $news["title"]
        ]);
    }
}