<?php

use bd\Connection;


class Listagem{

    //função para listar todos os posts no banco
    public static function selectAll() {
        $con =  Connection::getConn();

        $sql = "SELECT * FROM postagem ORDER BY id ";
        $sql = $con->prepare($sql);
        $sql->execute();

        $resultado = array();

        while ($row = $sql->fetchObject('Postagem')) {
            $resultado[] = $row;
        }

        if (!$resultado) {
            throw new Exception("Não foi encontrado nenhum registro no banco");		
        }
        
        return $resultado;
    }

    public function disable(){
        //para desativar uma postagem o controle deve ser feito atraves da flag
        
    }


}