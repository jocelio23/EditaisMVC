<?php

    use bd\Connection;

    class postagem{

        //private $nome = $_POST["nome"];
        //private $etapas= $_POST["etapas"];
        //private $valor= $_POST["valor"];
        //private $contatos= $_POST["contatos"];
        //private $categoria= $_POST["categoria"];
        //private $img;
        //private $anexos = array();

        public static function selecionaTodos()
		{
			$con =  Connection::getConn();

			$sql = "SELECT * FROM mensagens ORDER BY id DESC";
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

        public function inserirEdital(){
            $con =  Connection::getConn();

			$sql = "INSERT INTO mensagens (nome, etapas, valor, contatos, categoria), ('?','?','?','?','?')"; 
            $sql = $con->prepare($sql);
			$sql->execute();

           
        }

        public function EditarEdital(){
          
        }

        public function desativarEdital(){

        }

        //seters
        public function setNome($nome){
            $this->nome = $nome;
        }
        public function setEtapas($etapas){
            $this->etapas = $etapas;
        }
        public function setValor($valor){
            $this->valor = $valor;
        }
        public function setContatos($contatos){
            $this->contatos = $contatos;
        }
        public function setCategoria($categoria){
            $this->categoria = $categoria;
        }

        //getters
        public function getNome(){
            return $this->nome;
        }
        public function getEtapas(){
            return $this->etapas;
        }
        public function getValor(){
            return $this->valor;
        }
        public function getContatos(){
            return $this->contatos;
        }
        public function getCategoria(){
            return $this->categoria;
        }
    }