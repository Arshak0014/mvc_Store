<?php


namespace application\core;



use application\core\View;

abstract class Controller
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
        $this->view->setLayout('default');

    }
}