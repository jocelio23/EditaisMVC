<?php

use bd\Connection;


class Listagem{

    //função para listar todos os posts no banco
    public static function selectAll() {
        $con =  Connection::getConn();

        $sql = "SELECT * FROM postag ORDER BY id DESC";
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


}