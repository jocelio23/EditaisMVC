<?php

    session_start();
    require_once 'app/core/Core.php';
    require_once 'banco/bd/Connection.php';
    require_once 'vendor/autoload.php';

    require_once 'app/model/user.php';
    require_once 'app/model/postagem.php';

    require_once 'app/controller/LoginController.php';
    require_once 'app/controller/PostagemController.php';
    require_once 'app/controller/ListagemController.php';


    $core = new Core();
    echo $core -> start($_GET);
