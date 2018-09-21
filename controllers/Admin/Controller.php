<?php
namespace Controllers\Admin;

class Controller extends \Controllers\Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view = new \Libs\View($this->config->get("system:admin_templates_dir"));
    }
}