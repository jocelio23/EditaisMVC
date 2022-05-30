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
    public static function selecionaAnexos($idPost){
		$con = Connection::getConn();
		//$sql = "SELECT * FROM postagem WHERE id = 4";
        $sql = "SELECT DISTINCT anexos.link, anexos.texto FROM anexos INNER JOIN postagem ON anexos.id_postagem = $idPost";
		$sql = $con->prepare($sql);
		$sql->bindValue(':id', $idPost, PDO::PARAM_INT);
		$sql->execute();

        $resultado = array();

        while ($row = $sql->fetchObject('Postagem')) {
            $resultado[] = $row;
        }

        //var_dump($resultado); die();
		return $resultado;
	}

    public static function selectTodosAnexos(){
        $con =  Connection::getConn();

        $sql = "SELECT DISTINCT anexos.link, anexos.texto FROM anexos INNER JOIN postagem ON anexos.id_postagem = 1";
        $sql = $con->prepare($sql);
        $sql->execute();

        $resultado = array();

        while ($row = $sql->fetchObject('Postagem')) {
            $resultado[] = $row;
        }
        return $resultado;
    }

/* 
    public static function selecionaAnexosLista(){
		$con = Connection::getConn();
		//$sql = "SELECT * FROM postagem WHERE id = 4";
        $sql = "SELECT DISTINCT anexos.link, anexos.texto FROM anexos INNER JOIN postagem ON anexos.id_postagem = postagem.id";
		$sql = $con->prepare($sql);
		//$sql->bindValue(':id', $idPost, PDO::PARAM_INT);
		$sql->execute();

        $resultado = array();

        while ($row = $sql->fetchObject('anexos')) {
            $resultado[] = $row;
        }

        //var_dump($resultado); die();
		return $resultado;
	} */



    public function contarLinhas() {
        $con = Connection::getConn();
        $sql = "SELECT COUNT(*) FROM teste";
        $sql = $con->prepare($sql);
        $count = $sql->fetchColumn();
        print $count;
    }
}