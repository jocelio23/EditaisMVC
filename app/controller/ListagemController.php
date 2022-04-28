<?php

class ListagemController{
    public function index(){
       
       $loader = new \Twig\Loader\FilesystemLoader('app/view/');
       $twig = new \Twig\Environment($loader, [
           'cache' => '/path/to/compilation_cache',
           //renderiza sempre que houver mudanças
           'auto_reload' => true,
       ]);
       $template = $twig->load('listagem.html');
       //pega valor e verifica se existe
       $parameters['nome_usuario'] = $_SESSION['usr']['usuario'];

      // postagem::selecionarTodos();
       
       return $template->render($parameters);
    }
    public function listaNova(){
        header('Location: http://localhost/EditaisMVC/listagem');  
    }


    public function update()
		{
			try {
				Listagem::update($_POST);

				echo '<script>alert("Publicação alterada com sucesso!");</script>';
				echo '<script>location.href="http://localhost/EditaisMVC"</script>';
			} catch (Exception $e) {
				echo '<script>alert("'.$e->getMessage().'");</script>';
				echo '<script>location.href="http://localhost/EditaisMVC'.$_POST['id'].'"</script>';
			}
		}
}
