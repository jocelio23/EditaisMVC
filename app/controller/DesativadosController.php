<?php
class DesativadosController{

    public function index(){
        try{
            $colecao =  Listagem::selectAll();
            $loader = new \Twig\Loader\FilesystemLoader('app/view/');
            $twig = new \Twig\Environment($loader, [
                'cache' => '/path/to/compilation_cache',
                //renderiza sempre que houver mudanças
                'auto_reload' => true,
            ]);

            $template = $twig->load('desativados.html');
            //pega valor e verifica se existe
            //$parameters['nome_usuario'] = $_SESSION['usr']['usuario'];

            $parametros = array();
            $parametros['postagens'] = $colecao;

            return $template->render($parametros);

        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

    public function desativa($paramId){
        try {
            $paramId = intval($paramId['id'][0]);
            Postagem::DesativarPostagem($paramId);
            //var_dump($paramId);die();
            
            echo '<script>alert("Publicação desativada com sucesso!");</script>';
			echo '<script>location.href="http://localhost/EditaisMVC/listagem"</script>';
		} catch(Exception $e) {
			echo '<script>alert("'.$e->getMessage().'");</script>';
			//echo '<script>location.href="http://localhost/EditaisMVC"</script>';
		}
    }

    public function ativa($paramId){
        try {
            $paramId = intval($paramId['id'][0]);
            Postagem::AtivarPostagem($paramId);

            
            //var_dump($paramId);die();
            
            if($paramId == ''){
                echo '<script>location.href="http://localhost/EditaisMVC/editais"</script>';

            }
            echo '<script>alert("Publicação reativada com sucesso!");</script>';
			echo '<script>location.href="http://localhost/EditaisMVC/desativados"</script>';
		} catch(Exception $e) {
			echo '<script>alert("'.$e->getMessage().'");</script>';
			//echo '<script>location.href="http://localhost/EditaisMVC"</script>';
		}
    }

    public function desativados(){
        header('Location: http://localhost/EditaisMVC/desativados');
    }

}