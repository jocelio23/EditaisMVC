<?php

class UnicoController{
    public function index(){
        try{
            $loader = new \Twig\Loader\FilesystemLoader('app/view/');
            $twig = new \Twig\Environment($loader, [
                'cache' => '/path/to/compilation_cache',
                'auto_reload' => true,
            ]);

            $template = $twig->load('unico.html');
            $parametros = array();
            return $template->render($parametros);

        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    
    public function pagina(){
        header('Location: http://localhost/EditaisMVC/unico');  
    }

    public function listarUnico($paramId){
        $paramId = intval($paramId['id'][0]);
        $loader = new \Twig\Loader\FilesystemLoader('app/View');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('unico.html');

        $post = Listagem::selecionaPorId($paramId);


        $colecao = Listagem::selecionaAnexos($paramId);
        $parametros = array();
        $parametros['anexos'] = $colecao;
        $parameters = array();
        $parameters['id'] = $post->id;
        $parameters['nome'] = $post->nome;
        $parameters['etapas'] = $post->etapas;
        $parameters['valor'] = $post->valor;
        $parameters['contatos'] = $post->contatos;
        $parameters['telefone'] = $post->telefone;
        $parameters['categoria'] = $post->categoria;
        $parameters['flag'] = $post->flag;
        $parameters['arquivo'] = $post->arquivo;
        $parameters['anexos'] = $colecao;

        return $template->render($parameters);
        
    }
     public function alterar(){
        header('Location: http://localhost/EditaisMVC/atualizacao');   
    }

}
