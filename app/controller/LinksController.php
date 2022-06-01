<?php

class LinksController{
    public function index(){
        try{
            $loader = new \Twig\Loader\FilesystemLoader('app/view/');
            $twig = new \Twig\Environment($loader, [
                'cache' => '/path/to/compilation_cache',
                //renderiza sempre que houver mudanças
                'auto_reload' => true,
            ]);

            $template = $twig->load('links.html');
            //pega valor e verifica se existe
            //$parameters['nome_usuario'] = $_SESSION['usr']['usuario'];

            $parametros = array();
            return $template->render($parametros);

        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

    public function listaDeLinks($paramId){
        $paramId = intval($paramId['id'][0]);
        $loader = new \Twig\Loader\FilesystemLoader('app/View');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('links.html');

        $post = Listagem::selecionaPorId($paramId);

        $colecao = Listagem::selecionaAnexos($paramId);
        $parametros = array();
        $parametros['anexos'] = $colecao;

        //var_dump($parametros); die();

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

    public function anexos(){
		try {
			Postagem::insertAnexos($_POST);

			echo '<script>alert("anexo inserido com sucesso!");</script>';
			echo '<script>location.href="http://localhost/EditaisMVC/"</script>';
		} catch(Exception $e) {
			echo '<script>alert("'.$e->getMessage().'");</script>';
			echo '<script>location.href="http://localhost/EditaisMVC"</script>';
		}	
	} 

    public function lista(){
        header('Location: http://localhost/EditaisMVC/links');   
    }

}
