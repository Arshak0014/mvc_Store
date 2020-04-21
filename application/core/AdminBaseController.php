<?php
/**
 * Created by PhpStorm.
 * User: Артур
 * Date: 04.04.2020
 * Time: 20:22
 */

namespace application\core;

use application\core\View;

class AdminBaseController
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
        $this->view->setLayout('admin_default');

    }
}