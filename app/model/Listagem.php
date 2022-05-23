<?php

use bd\Connection;


class Listagem{

    //função para listar todos os posts no banco
    public static function selectAll(){
        $con =  Connection::getConn();

        $sql = "SELECT * FROM postagem ORDER BY id ";
        $sql = $con->prepare($sql);
        $sql->execute();

        $resultado = array();

        while ($row = $sql->fetchObject('Postagem')) {
            $resultado[] = $row;
        }

        if (!$resultado) {
           // echo '<script>location.href="http://localhost/EditaisMVC/single/single"</script>';	
           // throw new Exception("Não foi encontrado nenhum registro no banco");	
        }
        return $resultado;
    }

    public static function selectDisabled(){
        $con =  Connection::getConn();

        $sql = "SELECT * FROM postagem WHERE flag = 'Desativado' ";
        $sql = $con->prepare($sql);
        $sql->execute();

        $resultado = array();

        while ($row = $sql->fetchObject('Postagem')) {
            $resultado[] = $row;
        }

        if (!$resultado) {
           // echo '<script>location.href="http://localhost/EditaisMVC/single/single"</script>';	
           // throw new Exception("Não foi encontrado nenhum registro no banco");	
        }
        return $resultado;
    }



    public static function selecionaPorId($idPost){
		$con = Connection::getConn();
		//$sql = "SELECT * FROM postagem WHERE id = 4";
        $sql = "SELECT * FROM postagem WHERE id = $idPost";
		$sql = $con->prepare($sql);
		$sql->bindValue(':id', $idPost, PDO::PARAM_INT);
		$sql->execute();

		$resultado = $sql->fetchObject('Postagem');

		if (!$resultado) {
			throw new Exception("Não foi encontrado nenhum registro no banco");	
		} else {
			$resultado->comentarios = Postagem::selecionarPostagem($resultado->id);
		}
		return $resultado;
	}


    public function contarLinhas() {

        $con = Connection::getConn();
        $sql = "SELECT COUNT(*) FROM teste";
        $sql = $con->prepare($sql);
        $count = $sql->fetchColumn();
        print $count;
    }
}