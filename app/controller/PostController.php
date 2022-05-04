<?php

//essa controller será usada para criar sigles pages

class PostController{
    public function index($params){

        try{
            $postagem =  Listagem::selecionaPorId($params);
            
            $loader = new \Twig\Loader\FilesystemLoader('app/view/');
            $twig = new \Twig\Environment($loader, [
                'cache' => '/path/to/compilation_cache',
                //renderiza sempre que houver mudanças
                'auto_reload' => true,
            ]);

            $template = $twig->load('atualizacao.html');
            //pega valor e verifica se existe
            //$parameters['nome_usuario'] = $_SESSION['usr']['usuario'];

            $parametros = array();
            $parametros['nome'] = $postagem->nome;
            $parametros['etapas'] = $postagem->etapas;
            
            return $template->render($parametros);

        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

    
}
