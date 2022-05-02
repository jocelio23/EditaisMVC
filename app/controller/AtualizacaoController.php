<?php

class AtualizacaoController{
    public function index(){

        try{
            $loader = new \Twig\Loader\FilesystemLoader('app/view/');
            $twig = new \Twig\Environment($loader, [
                'cache' => '/path/to/compilation_cache',
                //renderiza sempre que houver mudanças
                'auto_reload' => true,
            ]);

            $template = $twig->load('atualizacao.html');
            //pega valor e verifica se existe
            //$parameters['nome_usuario'] = $_SESSION['usr']['usuario'];

           /*  $post = postagem:: update($post);

            $parameters = array();
            $parameters['id'] = $post->id;
            $parameters['nome'] = $post->nome;
            $parameters['etapas'] = $post->etapas;
            $parameters['valor'] = $post->valor;
            $parameters['contatos'] = $post->contatos;
            $parameters['categoria'] = $post->categoria;
            $parameters['flag'] = $post->flag; */
            $parameters['error'] = $_SESSION['msg_error']  ?? null;
            return $template->render($parameters);

        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

    public function alterar(){
        header('Location: http://localhost/EditaisMVC/atualizacao');  
    }
    

    public function update(){
			try {
				postagem::update($_POST);

				echo '<script>alert("Publicação alterada com sucesso!");</script>';
				echo '<script>location.href="http://localhost/EditaisMVC"</script>';
			} catch (Exception $e) {
				echo '<script>alert("'.$e->getMessage().'");</script>';
				echo '<script>location.href="http://localhost/EditaisMVC'.$_POST['id'].'"</script>';
			}
        }
    } 

       