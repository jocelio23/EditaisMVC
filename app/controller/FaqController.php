<?php

class FaqController{
    public function index(){
        try{
            $colecao =  Listagem::selectAll();
            $loader = new \Twig\Loader\FilesystemLoader('app/view/');
            $twig = new \Twig\Environment($loader, [
                'cache' => false,
                'auto_reload' => true,
            ]);

            $template = $twig->load('faq.html');
            $parametros = array();
            $parametros['postagens'] = $colecao;

            return $template->render($parametros);

        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    
    public function rota(){
        header('Location: http://localhost/EditaisMVC/faq');  
    }
    
}
