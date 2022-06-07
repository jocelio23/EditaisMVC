<?php

class ListagemController{
    public function index($paramId){
        try{
            $colecao =  Listagem::selectAll();
            
            $loader = new \Twig\Loader\FilesystemLoader('app/view/');
            $twig = new \Twig\Environment($loader, [
                'cache' => '/path/to/compilation_cache',
                'auto_reload' => true,
            ]);

            $template = $twig->load('listagem.html');
            $parametros = array();
            $parametros['postagens'] = $colecao;
            return $template->render($parametros);

        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    
    public function listaNova(){
        header('Location: http://localhost/EditaisMVC/listagem');  
    }
    
}
