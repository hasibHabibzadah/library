<?php

class Controller
{

    public function model($models)
    {

        require_once "../app/models/" . $models . '.php';

        return new $models();
    }


    public function view($view, $data = [])
    {

        if (file_exists("../app/view/" . $view . ".php")) {
            require_once "../app/view/" . $view . ".php";
        } else {
            die("Page does not exist");
        }
    }

    
}
