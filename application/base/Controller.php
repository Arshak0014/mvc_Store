<?php


namespace application\base;



use application\components\View;

abstract class Controller
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
        $this->view->setLayout('default');

    }
}