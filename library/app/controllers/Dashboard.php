<?php 

class Dashboard extends Controller{

    public function __construct()
    {
        // $this->dashModel = $this->model("dashbord");
    }

    public function index(){


        $this->view("dashboard/index");
    }
}