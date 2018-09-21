<?php
namespace Controllers\Admin;

class News extends Controller
{
    protected $news;

    public function __construct()
    {
        parent::__construct();
        $this->news = new \Models\News;
    }

    public function index()
    {
        $list = $this->news->all();

        $data = [
            "news" => $list,
            "pageTitle" => "Список всех новостей"
        ];

        $this->view->display("news/list", $data);
    }

    public function add()
    {
        $data = [
            "pageTitle" => "Добавление новости"
        ];

        $this->view->display("news/form", $data);
    }

    public function edit($id)
    {

    }
}