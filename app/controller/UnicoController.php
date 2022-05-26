<?php

class UnicoController{
    public function index(){
        try{
            $loader = new \Twig\Loader\FilesystemLoader('app/view/');
            $twig = new \Twig\Environment($loader, [
                'cache' => '/path/to/compilation_cache',
                //renderiza sempre que houver mudanças
                'auto_reload' => true,
            ]);

            $template = $twig->load('unico.html');
            //pega valor e verifica se existe
            //$parameters['nome_usuario'] = $_SESSION['usr']['usuario'];

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
        var_dump($paramId); die();
        $loader = new \Twig\Loader\FilesystemLoader('app/View');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('unico.html');

       /*  $post = Listagem::selecionaPorId($paramId);
        $parameters = array();
        $parameters['id'] = $post->id;
        $parameters['nome'] = $post->nome;
        $parameters['etapas'] = $post->etapas;
        $parameters['valor'] = $post->valor;
        $parameters['contatos'] = $post->contatos;
        $parameters['categoria'] = $post->categoria;
        $parameters['flag'] = $post->flag;
        $parameters['arquivo'] = $post->arquivo; */

        $anexos = Listagem::selecionaAnexos($paramId);
        $novos = array();
        $novos['id'] = $anexos->id;
        $novos['link'] = $anexos->link;
        $novos['texto'] = $anexos->texto;

        return $template->render($novos);
        
    }
     public function alterar(){
        header('Location: http://localhost/EditaisMVC/atualizacao');   
    }

    
}
