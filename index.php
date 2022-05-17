<?php

    session_start();

    require_once 'app/core/Core.php';
    require_once 'banco/bd/Connection.php';
    require_once 'vendor/autoload.php';

    require_once 'app/model/User.php';
    require_once 'app/model/Postagem.php';
    require_once 'app/model/Listagem.php';


    require_once 'app/controller/SingleController.php';
    require_once 'app/controller/LoginController.php';
    require_once 'app/controller/PostagemController.php';
    require_once 'app/controller/ListagemController.php';
    require_once 'app/controller/AtualizacaoController.php';
    require_once 'app/controller/FaqController.php';
    require_once 'app/controller/EditaisController.php';
    require_once 'app/controller/UnicoController.php';
    require_once 'app/controller/EquipamentosController.php';
    require_once 'app/controller/CeficController.php';
    require_once 'app/controller/ServicoController.php';




    $core = new Core();
    echo $core -> start($_GET);


    