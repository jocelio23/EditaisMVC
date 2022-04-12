<?php

class LoginController{
    public function index(){
        $loader = new \Twig\Loader\FilesystemLoader('app/view/');
        $twig = new \Twig\Environment($loader, [
            'cache' => '/path/to/compilation_cache',
            //renderiza sempre que houver mudanças
            'auto_reload' => true,
        ]);
        $template = $twig->load('login.html');
        return $template->render();
    }


    //recebe requisão do formulario POST,
    //usuario e senha
    public function check(){
        try {
            $user = new User;
            $user->setUsuario($_POST['usuario']);
            $user->setSenha($_POST['senha']);
            $user->validaLogin();

            header('Location: http://localhost/EditalSecult-branch-001/postagem');
        } catch (\Exception $e) {
            $_SESSION['msg_error'] = array('msg' => $e->getMessage(), 'count' => 0);

            header('Location: http://localhost/EditalSecult-branch-001/');
        }
        
    }
}