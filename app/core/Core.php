<?php

class Core{
    private $url; 
    private $controller;
    private $method = 'index';
    private $params = array();

    private $user;
    private $error;

    public function __construct(){
        //verifica se tem alguem logado
        $this->user= $_SESSION['usr']  ?? null;
        $this->error = $_SESSION['msg_error'] ?? null;
        if(isset($this->error)){
            if($this->error['count'] === 0){
                $_SESSION['msg_error'] ['count'] ++;
            }else{
                unset($_SESSION['msg_error']);
            }
        }

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

        //se logou usuário realizou login
        if($this->user){
            //outras paginas podem ser adicionadas abaixo
            $permissao = ['PostagemController', 'ListagemController', 'AtualizacaoController', 'SingleController','DesativadosController'];
            //se não é url permitida foça para dash
            if(!isset($this->controller) || !in_array($this->controller, $permissao)){
                $this->controller = 'PostagemController';
                $this->method = 'index';
            }
        }else{
            //se não volte para a index
            $permissao = ['LoginController','UnicoController','EditaisController', 'EquipamentosController', 'CeficController','ServicoController'];

            if(!isset($this->controller) || !in_array($this->controller, $permissao)){
                $this->controller = 'EditaisController';
                $this->method = 'index';
            }
        }

        //pegar o id por requisição get
        
        if(isset($this->params) && $this->params !== null){
            $id = $this->params;
        }else{
            $id = null;
        }
        return call_user_func(array(new $this->controller, $this->method), array('id' => $id));
    }
}