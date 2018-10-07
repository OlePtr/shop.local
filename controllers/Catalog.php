<?php
namespace Controllers;

class Catalog extends Controller
{
    private $catalog;

    public function __construct()
    {
        // вызов родительского конструктора
        parent::__construct();
        $this->catalog = new \Models\News();
    }

    // метод для показа главной страницы новостей (списка)
    public function index()
    {
        $list = $this->catalog->all();

        $data = [
            "news" => $list,
            "pageTitle" => "Список всех продуктов каталога"
        ];

        $this->view->display("catalog/list", $data);
    }

    // для просмотра новости
    public function show($id)
    {
        $news = $this->catalog->get($id);

        $this->view->display("news/page", [
           "content" => $news["content"],
           "pageTitle" => $news["title"]
        ]);
    }
}