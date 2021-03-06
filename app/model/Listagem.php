<?php
use bd\Connection;
class Listagem{
    //função para listar todos os posts no banco
    public static function selectAll(){
        $con =  Connection::getConn();

        $sql = "SELECT * FROM postagem ORDER BY id DESC";
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
        $sql = "SELECT * FROM postagem WHERE id = $idPost";
		$sql = $con->prepare($sql);
		$sql->bindValue(':id', $idPost, PDO::PARAM_INT);
		$sql->execute();

		$resultado = $sql->fetchObject('Postagem');

		if (!$resultado) {
			throw new Exception("Não foi encontrado nenhum registro no banco");	
		} else {
			$resultado->anexos = Postagem::selecionarPostagem($resultado->id);
		}
		return $resultado;
	}
    public static function selecionaAnexos($idPost){
		$con = Connection::getConn();
        $sql = "SELECT DISTINCT anexos.id, anexos.link, anexos.texto FROM anexos INNER JOIN postagem ON anexos.id_postagem = $idPost";
		$sql = $con->prepare($sql);
		$sql->bindValue(':id', $idPost, PDO::PARAM_INT);
		$sql->execute();

        $resultado = array();

        while ($row = $sql->fetchObject('Postagem')) {
            $resultado[] = $row;
        }
		return $resultado;
	}

    public static function AnexosPorId($idPost){
		$con = Connection::getConn();
        $sql = "SELECT * FROM anexos WHERE id = $idPost";
		$sql = $con->prepare($sql);
		$sql->bindValue(':id', $idPost, PDO::PARAM_INT);
		$sql->execute();

        $resultado = $sql->fetchObject('Postagem');

		if (!$resultado) {
			throw new Exception("Não foi encontrado nenhum registro no banco");	
		} else {
			$resultado->anexos = Postagem::selecionarAnexo($resultado->id);
		}
		return $resultado;
	}


    public static function buscar($nome){
        $con = Connection::getConn();

        if(!isset($_GET['busca'])){
            header("Location:index.php");
        }

        $nome = "%".trim($_GET['busca']."%");

        $sql = "SELECT * FROM postagem WHERE nome LIKE : $nome";
    }
}