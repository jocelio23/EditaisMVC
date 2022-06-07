<?php
class DesativadosController{

    public function index(){
        try{
            $colecao =  Listagem::selectDisabled();
            $loader = new \Twig\Loader\FilesystemLoader('app/view/');
            $twig = new \Twig\Environment($loader, [
                'cache' => '/path/to/compilation_cache',
                'auto_reload' => true,
            ]);

            $template = $twig->load('desativados.html');
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

            echo '<script>alert("Edital encerrado com sucesso!");</script>';
			echo '<script>location.href="http://localhost/EditaisMVC/listagem"</script>';
		} catch(Exception $e) {
			echo '<script>alert("'.$e->getMessage().'");</script>';
			echo '<script>location.href="http://localhost/EditaisMVC"</script>';
		}
    }

    public function ativa($paramId){
        try {
            $paramId = intval($paramId['id'][0]);
            Postagem::AtivarPostagem($paramId);
            if($paramId == ''){
                echo '<script>location.href="http://localhost/EditaisMVC/editais"</script>';
            }
            echo '<script>alert("Edital foi reativado com sucesso!");</script>';
			echo '<script>location.href="http://localhost/EditaisMVC/desativados"</script>';
		} catch(Exception $e) {
			echo '<script>alert("'.$e->getMessage().'");</script>';
			echo '<script>location.href="http://localhost/EditaisMVC"</script>';
		}
    }

    public function desativados(){
        header('Location: http://localhost/EditaisMVC/desativados');
    }

}