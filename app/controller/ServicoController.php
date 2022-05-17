<?php

class ServicoController{
    public function index(){
        try{
            $loader = new \Twig\Loader\FilesystemLoader('app/view/');
            $twig = new \Twig\Environment($loader, [
                'cache' => '/path/to/compilation_cache',
                //renderiza sempre que houver mudanças
                'auto_reload' => true,
            ]);

            $template = $twig->load('servico.html');
            //pega valor e verifica se existe
            //$parameters['nome_usuario'] = $_SESSION['usr']['usuario'];

            $parametros = array();
            return $template->render($parametros);

        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

    
    
    public function service(){
        header('Location: http://localhost/EditaisMVC/servico');  
    }
    
}
