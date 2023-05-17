<?php
class Controller
{
    public function model($model)
    {
        require_once './app/mvc/models/'.$model.'.php';
        return new $model;
    }

    public function view($view,$show=[])
    {  
        extract($show);
        require_once './app/mvc/views/'.$view.'.php';
    }
    public function linkcontroller($controller)
    {
        require_once './app/mvc/Controllers/'.$controller.'.php';
    }
}
?>