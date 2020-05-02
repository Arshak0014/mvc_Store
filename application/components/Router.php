<?php

namespace application\components;

use application\components\View;

class Router
{
    protected $routes = [];
    protected $params = [];

    public function __construct(){
        $arr = require_once 'application/config/routes.php';

        foreach ($arr as $key => $val){
            $this->add($key,$val);
        }
    }

    public function add($route, $params) {
        $route = '#^'.$route.'$#';
        $this->routes[$route] = $params;
    }

    public function match(){

        $url = trim($_SERVER['REQUEST_URI'],'/');
        foreach ($this->routes as $route => $params){
            if (preg_match($route, $url, $matches)){
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    public static function getPage(){
        $url=(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']==='on'?"https":"http")."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $parts=explode("/",$url);
        $paging=end($parts);

        if (!isset($paging)) {
            $page = 1;
        } else {
            $page = $paging;
        }
        return $page;
    }


    public function getParams(){
        $url = trim($_SERVER['REQUEST_URI'],'/');
        if (!empty($url)){
            $arrUrl = explode('/', $url);
            $param = array_pop($arrUrl);
            return $param;
        }
        return false;
    }

    public function run(){


        if ($this->match()){
            $path = 'application\controllers\\'.ucfirst($this->params['controller']).'Controller';
            if (class_exists($path)){
                $action = $this->params['action'].'Action';
                if (method_exists($path, $action)){
                    $controller = new $path($this->params);
                    $controller->$action($this->getParams());
                }else{
                    View::errorCode(404);
                }
            }else{
                View::errorCode(404);
            }
        }else{
            View::errorCode(404);
        }
    }
}