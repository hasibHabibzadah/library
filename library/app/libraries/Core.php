<?php

class Core{
    protected $currentPage = 'pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {   
        $url = $this->getUrl();

        if(file_exists('../app/controllers/'.ucwords($url[0]).'.php')){
            $this->currentPage = ucwords($url[0]);

            unset($url[0]);
        }

        require_once "../app/controllers/".$this->currentPage . '.php';

        $this->currentPage = new $this->currentPage;

        if(isset($url[1])){
            if(method_exists($this->currentPage, $url[1])){
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }

        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->currentPage, $this->currentMethod], $this->params);

    }



    public function getUrl(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url,FILTER_SANITIZE_URL);
            $url = explode('/',$url);
            return $url;
        }
    }

}