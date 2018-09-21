<?php
namespace Controllers;


abstract class Controller
{
    protected $view;
    protected $config;

    public function __construct ()
    {
        $this->config = \Libs\Config\Config::getInstance();
        $this->view = new \Libs\View($this->config->get("system:templates_dir"));
    }
}