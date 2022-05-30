<?php

class ListagemController{
    public function index($paramId){
        try{
            $colecao =  Listagem::selectAll();
            $loader = new \Twig\Loader\FilesystemLoader('app/view/');
            $twig = new \Twig\Environment($loader, [
                'cache' => '/path/to/compilation_cache',
                //renderiza sempre que houver mudanças
                'auto_reload' => true,
            ]);

            $template = $twig->load('listagem.html');
        

            $anexo = Listagem::selectTodosAnexos($paramId);
            $paramId = 2;
            //var_dump($anexo); die();
            //array de anexos 
            $parametros = array();
            $parametros['anexos'] = $anexo;

             //array de postagens
            $parametros = array();
            $parametros['postagens'] = $colecao;
            $parametros['anexos'] = $anexo;
           
            return $template->render($parametros);

        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    
    public function listaNova(){
        header('Location: http://localhost/EditaisMVC/listagem');  
    }
    
}
