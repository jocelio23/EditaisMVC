<?php

class EditaisController{
    public function index(){
        try{
            $colecao =  Listagem::selectAll();
            $loader = new \Twig\Loader\FilesystemLoader('app/view/');
            $twig = new \Twig\Environment($loader, [
                'cache' => '/path/to/compilation_cache',
                //renderiza sempre que houver mudanças
                'auto_reload' => true,
            ]);

            $template = $twig->load('editais.html');
            //pega valor e verifica se existe
            //$parameters['nome_usuario'] = $_SESSION['usr']['usuario'];

            $parametros = array();
            $parametros['postagens'] = $colecao;

            return $template->render($parametros);

        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    
    public function pagina(){
        header('Location: http://localhost/EditaisMVC/editais');  
    }
    
}
