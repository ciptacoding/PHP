<?php

  class App {
    // membuat properti dengan nilai default
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
      $url = $this->parseUrl();
      // controller
      error_reporting(~E_NOTICE);
      if(file_exists('../app/controllers/'. $url[0] .'.php')){
        $this->controller = $url[0];
        unset($url[0]);
      }
      // memanggil controller
      require_once '../app/controllers/'. $this->controller .'.php';
      $this->controller = new $this->controller; // intance agar method dan parameter bisa dipakai

      // method 
      if( isset($url[1]) ){
        if(method_exists($this->controller, $url[1])){
          $this->method = $url[1];
          unset($url[1]);
        }
      }

      // parameter
      if(!empty($url)){ //jika array $url tidak kosong kemungkinan itu parameter
        $this->params = array_values($url);
      }

      // jalankan controller, method, dan parameter jika ada
      call_user_func_array([$this->controller, $this->method] , $this->params);
    }

    public function parseUrl()
    {
      if(isset($_GET['url'])){
        $url = rtrim($_GET['url'], '/'); //hilangkan / terakhir
        $url = filter_var($url, FILTER_SANITIZE_URL); //sembunyikan url yang dikirim
        $url = explode('/', $url); //pecah url menjadi array
        return $url;
      }
    }
  }