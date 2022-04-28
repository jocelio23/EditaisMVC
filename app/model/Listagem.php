<?php

use bd\Connection;


class Listagem{


    public static function update($params)
    {
        $con = Connection::getConn();

        $sql = "UPDATE postagem SET titsulo = :tit, conteudo = :cont WHERE id = :id";
        $sql = $con->prepare($sql);
        $sql->bindValue(':tit', $params['titulo']);
        $sql->bindValue(':cont', $params['conteudo']);
        $sql->bindValue(':id', $params['id']);
        $resultado = $sql->execute();

        if ($resultado == 0) {
            throw new Exception("Falha ao alterar publicação");

            return false;
        }

        return true;
    }


}