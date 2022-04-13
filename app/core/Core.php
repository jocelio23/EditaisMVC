<?php

class Core{
    private $url; 
    
    private $controller;
    private $method = 'index';
    private $params = array();

    private $user;

    public function __construct(){
        //verifica se tem alguem logado
        $this->user= $_SESSION['usr']  ?? null;
    }

    public function start($request){
    if(isset($request['url'])){
        $this->url = explode('/', $request['url']);

        $this->controller = ucfirst($this->url[0]).'Controller';
        array_shift($this->url); 
        
        //controlando inserção na url se não existir
        if(isset($this->url[0]) && $this->url != ''){
            $this->method = $this->url[0];
             array_shift($this->url);

             if(isset($this->url[0]) && $this->url != ''){
                $this->params = $this->url;
             }
        }
    }

    //se logou acessa dash
    if($this->user){
        $permissao = [ 'DashboardController'];
        //se não é url permitida foça para dash
        if(!isset($this->controller) || !in_array($this->controller, $permissao)){
            $this->controller = 'DashboardController';
            $this->method = 'index';
        }
    }else{
        //se não volte para a index
        $permissao = [ 'LoginController'];

        if(!isset($this->controller) || !in_array($this->controller, $permissao)){
            $this->controller = 'LoginController';
            $this->method = 'index';
        }
    }
    return call_user_func(array(new $this->controller, $this->method), $this->params);
    }
}