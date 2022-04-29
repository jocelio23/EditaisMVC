<?php

class ListagemController{
    public function index(){

        try{

        }catch(Exception $e){
            echo $e->getMessage();
        }
        
       $colection =  Listagem::selectAll();

       $loader = new \Twig\Loader\FilesystemLoader('app/view/');
       $twig = new \Twig\Environment($loader, [
           'cache' => '/path/to/compilation_cache',
           //renderiza sempre que houver mudanças
           'auto_reload' => true,
       ]);
       $template = $twig->load('listagem.html');
       //pega valor e verifica se existe
       $parameters['nome_usuario'] = $_SESSION['usr']['usuario'];
       $values = array();
     
       $values['nome'] = 'Jocélio Novisk de Braganza';

       return $template->render($parameters);
    }

    
    public function listaNova(){
        header('Location: http://localhost/EditaisMVC/listagem');  
    }
    
}
