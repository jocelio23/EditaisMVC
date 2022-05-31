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
        
             //array de postagens
            $parametros = array();
            $parametros['postagens'] = $colecao;
           //var_dump($parametros); die();

        
            //esse valor deve ser conforme o id da postagem para retornar os anexos
           
           
            return $template->render($parametros);

        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    
    public function listaNova(){
        header('Location: http://localhost/EditaisMVC/listagem');  
    }
    
}
