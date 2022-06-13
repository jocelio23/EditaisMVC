<?php

class AtualizacaoController
{
    public function index(){
        try {
            $loader = new \Twig\Loader\FilesystemLoader('app/view/');
            $twig = new \Twig\Environment($loader, [
                'cache' => false,
                'auto_reload' => true,
            ]);

            $template = $twig->load('atualizacao.html');

            $parameters['nome_usuario'] = $_SESSION['usr']['usuario'];
            return $template->render($parameters);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function update(){
        try {
            Postagem::updateComLinks($_POST);
            echo '<script>alert("Publicação alterada com sucesso!");</script>';
			echo '<script>location.href="http://localhost/EditaisMVC/listagem"</script>';
		} catch(Exception $e) {
			echo '<script>alert("'.$e->getMessage().'");</script>';
			echo '<script>location.href="http://localhost/EditaisMVC"</script>';
		}
    }

    public function change($paramId){
        $paramId = intval($paramId['id'][0]);
        $loader = new \Twig\Loader\FilesystemLoader('app/View');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('atualizacao.html');
        $post = Listagem::selecionaPorId($paramId);

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
    
        return $template->render($parameters);
    }
     public function alterar(){
        header('Location: http://localhost/EditaisMVC/atualizacao');   
    }

    
}
