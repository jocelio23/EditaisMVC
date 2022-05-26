<?php

class ListagemController{
    public function index($paramId){

        //$paramId = intval($paramId['id'][0]);

        $paramId = 2;
        try{
            $colecao =  Listagem::selectAll();
            $anexo = Listagem::selecionaAnexos($paramId);

            $loader = new \Twig\Loader\FilesystemLoader('app/view/');
            $twig = new \Twig\Environment($loader, [
                'cache' => '/path/to/compilation_cache',
                //renderiza sempre que houver mudanças
                'auto_reload' => true,
            ]);

            $template = $twig->load('listagem.html');
        
            //array de anexos 
            $parametros = array();
            $parametros['anexos'] = $anexo;

             //array de postagens
            $parametros = array();
            $parametros['postagens'] = $colecao;

           // $num =  $parametros['id'] = $colecao->id;

            //$parametros['postagens']=$colecao['id'];
           // var_dump($parametros);die();

            //unificando array de anexos junto ao array de postagens para facilitar na view
            $parametros['anexos'] = $anexo;
           
            

            return $template->render($parametros);

        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    
    public function listaNova(){
        header('Location: http://localhost/EditaisMVC/listagem');  
    }
    
}
