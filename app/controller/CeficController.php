<?php

class CeficController{
    public function index(){
        try{
            $loader = new \Twig\Loader\FilesystemLoader('app/view/');
            $twig = new \Twig\Environment($loader, [
                'cache' => false,
                'auto_reload' => true,
            ]);

            $template = $twig->load('cefic.html');
            $parametros = array();
            return $template->render($parametros);

        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    
    public function cefic(){
        header('Location: http://localhost/EditaisMVC/cefic');  
    }
    
}
