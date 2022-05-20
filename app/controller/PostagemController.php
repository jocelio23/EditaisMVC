<?php

class PostagemController{
    public function index(){

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
        header('Location: http://localhost/EditaisMVC/login');
    }

    public function insert(){
		try {
			Postagem::insertComLinks($_POST);

			echo '<script>alert("Publicação inserida com sucesso!");</script>';
			echo '<script>location.href="http://localhost/EditaisMVC/"</script>';
		} catch(Exception $e) {
			echo '<script>alert("'.$e->getMessage().'");</script>';
			echo '<script>location.href="http://localhost/EditaisMVC"</script>';
		}	
	}  

    public function del($paramId){
		try {

            $paramId = intval($paramId['id'][0]);
			Postagem::delete($paramId);
            
            echo '<script>alert("Publicação deletada com sucesso!");</script>';
			echo '<script>location.href="http://localhost/EditaisMVC/listagem"</script>';
		} catch (Exception $e) {
			echo '<script>alert("'.$e->getMessage().'");</script>';
			echo '<script>location.href="http://localhost/EditaisMVC"</script>';
		}
    }


 }

