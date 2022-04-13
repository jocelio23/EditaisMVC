<?php

class DashboardController{
    public function index(){
       echo 'Login foi realizado! <a href="http://localhost/EditalSecult-branch-001/dashboard/logout">logout</a>';
    }

    public function logout(){
        session_start();
        unset($_SESSION['usr']);
        session_destroy();
        header('Location: http://localhost/EditalSecult-branch-001');
    }
}