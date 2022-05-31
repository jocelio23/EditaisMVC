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

        //pega valor e verifica se existe
        $parameters['error'] = $_SESSION['msg_error']  ?? null;
        return $template->render($parameters);
    }


    //recebe requisão do formulario POST,
    //usuario e senha
    public function check(){
        try {
            $user = new User;
            $user->setUsuario($_POST['usuario']);
            $user->setSenha($_POST['senha']);
            $user->validaLogin();

            header('Location: http://localhost/EditaisMVC/postagem.php');
        } catch (\Exception $e) {
            $_SESSION['msg_error'] = array('msg'=>$e->getMessage(), 'count'=> 0);
            header('Location: http://localhost/EditaisMVC/login');
        }
        
    }
}