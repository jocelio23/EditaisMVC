<?php

class DashboardController{
    public function index(){
       echo 'Login foi realizado! <a href="http://localhost/EditalSecult-branch-001/dashboard/sair">sair</a>';
    }

    public function logout(){
        unset($_SESSION);
        session_destroy();
        header('Location: http://localhost/EditalSecult-branch-001');
    }
}