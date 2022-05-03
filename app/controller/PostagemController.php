<?php

class PostagemController{
    public function index(){
       //echo 'Login foi realizado! <a href="http://localhost/Edital/EditaisMVC/dashboard/logout">logout</a>';
       $loader = new \Twig\Loader\FilesystemLoader('app/view/');
       $twig = new \Twig\Environment($loader, [
           'cache' => '/path/to/compilation_cache',
           //renderiza sempre que houver mudanças
           'auto_reload' => true,
       ]);
       $template = $twig->load('postagem.html');
       //pega valor e verifica se existe
       $parameters['nome_usuario'] = $_SESSION['usr']['usuario'];
       return $template->render($parameters);
    }

    public function logout(){
        session_start();
        unset($_SESSION['usr']);
        session_destroy();
        header('Location: http://localhost/EditaisMVC/');
    }
    public function insert(){
		try {
			Postagem::insert($_POST);

			echo '<script>alert("Publicação inserida com sucesso!");</script>';
			echo '<script>location.href="http://localhost/EditaisMVC/"</script>';
		} catch(Exception $e) {
			echo '<script>alert("'.$e->getMessage().'");</script>';
			echo '<script>location.href="http://localhost/EditaisMVC"</script>';
		}
			
	}  
 }

