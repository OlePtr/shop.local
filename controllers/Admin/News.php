<?php
namespace Controllers\Admin;

use Libs\Helper;

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
            "pageTitle" => "Добавление новости",
            "formAction" => "/admin/news/create"
        ];

        $this->view->display("news/form", $data);
    }

    public function create()
    {
        $data = $this->getPostData();

        try {
            $this->news->add($data);
            Helper::redirect("/admin/news/");
        } catch (\Exception $e) {

            $this->view->display("news/form", [
                "pageTitle" => "Добавление новости",
                "error" => $e->getMessage(),
                "formData" => $data,
                "formAction" => "/admin/news/create"
            ]);
        }
    }

    public function edit($id)
    {
        $news = $this->news->get($id);

        if ($news) {
            $this->view->display("news/form", [
                "pageTitle" => "Редактирование новости",
                "formData" => $news,
                "formAction" => "/admin/news/save/{$news["id"]}"
            ]);
        } else {
            echo "404 Not Found";
        }
    }

    public function save($id)
    {
        $data = $this->getPostData();

        try {
            $this->news->update($id, $data);
            Helper::redirect("/admin/news/edit/{$id}");
        } catch (\Exception $e) {

            $this->view->display("news/form", [
                "pageTitle" => "Редактирование новости",
                "error" => $e->getMessage(),
                "formData" => $data,
                "formAction" => "/admin/news/save/{$id}"
            ]);
        }
    }

    public function delete($id)
    {
        try {
            $this->news->delete($id);
            Helper::redirect("/admin/news/");
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    protected function getPostData()
    {
        return [
            "title" => Helper::post("title"),
            "content" => Helper::post("content"),
            "author" => Helper::post("author"),
        ];
    }


}