<?php

class ListagemController{
    public function index(){

        try{
            $colecao =  Listagem::selectAll();
            
            $loader = new \Twig\Loader\FilesystemLoader('app/view/');
            $twig = new \Twig\Environment($loader, [
                'cache' => '/path/to/compilation_cache',
                //renderiza sempre que houver mudanças
                'auto_reload' => true,
            ]);

            $template = $twig->load('listagem.html');
            //pega valor e verifica se existe
            //$parameters['nome_usuario'] = $_SESSION['usr']['usuario'];

            $parametros = array();
            $parametros['postagens'] = $colecao;
            
            return $template->render($parametros);

        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

    public function change($paramId){
        try{
            $loader = new \Twig\Loader\FilesystemLoader('app/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('atualizacao.html');

            //pensar em uma forma de pegar o id da postagem a ser alterada
            $post = Listagem::selecionaPorId($paramId);

        // var_dump($post);
            
            $parameters = array();
            $parameters['id'] = $post->id;
            $parameters['nome'] = $post->nome;
            $parameters['etapas'] = $post->etapas;
            $parameters['valor'] = $post->valor;
            $parameters['contatos'] = $post->contatos;
            $parameters['categoria'] = $post->categoria;
            $parameters['flag'] = $post->flag;

        //$conteudo = $template->render($parameters);
        return $template->render($parameters);

        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

    public function listaNova(){
        header('Location: http://localhost/EditaisMVC/listagem');  
    }  

    public function atualiza(){
        header('Location: http://localhost/EditaisMVC/atualizacao');  
    }  
}
