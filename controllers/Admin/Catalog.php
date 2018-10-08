<?php
namespace Controllers\Admin;

use Libs\Helper;

class Catalog extends Controller
{
    protected $catalog;

    public function __construct()
    {
        parent::__construct();
        $this->catalog = new \Models\Catalog;
    }

    public function index()
    {
        $list = $this->catalog->all();

        $data = [
            "catalog" => $list,
            "pageTitle" => "Список всех продуктов"
        ];

        $this->view->display("catalog/list", $data);
    }

    public function add()
    {
        $data = [
            "pageTitle" => "Добавление товара",
            "formAction" => "/admin/catalog/create"
        ];

        $this->view->display("catalog/form", $data);
    }

    public function create()
    {
        $data = $this->getPostData();

        try {
            $this->catalog->add($data);
            Helper::redirect("/admin/catalog/");
        } catch (\Exception $e) {

            $this->view->display("catalog/form", [
                "pageTitle" => "Добавление продукта",
                "error" => $e->getMessage(),
                "formData" => $data,
                "formAction" => "/admin/catalog/create"
            ]);
        }
    }

    public function edit($id)
    {
        $catalog = $this->catalog->get($id);

        if ($catalog) {
            $this->view->display("catalog/form", [
                "pageTitle" => "Редактирование продукта",
                "formData" => $catalog,
                "formAction" => "/admin/catalog/save/{$catalog["id"]}"
            ]);
        } else {
            echo "404 Not Found";
        }
    }

    public function save($id)
    {
        $data = $this->getPostData();

        try {
            $this->catalog->update($id, $data);
            Helper::redirect("/admin/catalog/edit/{$id}");
        } catch (\Exception $e) {

            $this->view->display("catalog/form", [
                "pageTitle" => "Редактирование продукта",
                "error" => $e->getMessage(),
                "formData" => $data,
                "formAction" => "/admin/catalog/save/{$id}"
            ]);
        }
    }

    public function delete($id)
    {
        try {
            $this->catalog->delete($id);
            Helper::redirect("/admin/catalog/");
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    protected function getPostData()
    {
        return [
            "title" => Helper::post("title"),
            "description" => Helper::post("description"),
            "price" => Helper::post("price"),
        ];
    }


}