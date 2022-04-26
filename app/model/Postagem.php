<?php

    use bd\Connection;

    class postagem{

        private $nome;
        private $etapas;
        private $valor;
        private $contatos;
        private $categoria;
        private $flag = TRUE;

        //private $img;
        //private $anexos = array();


        //função para listar todos os posts no banco
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

        public function inserirEdital($nome, $etapas, $valor, $contatos, $categoria){
            $con =  Connection::getConn();

			$sql = "INSERT INTO mensagens (nome, etapas, valor, contatos, categoria), ('?','?','?','?','?')"; 
            $sql = $con->prepare($sql);
			$sql->execute();

            //verificações a serem feitas
           
        }


        public function EditarEdital($id){
            $con =  Connection::getConn();

			$sql = "UPDATE mensagens WHERE id= $id"; 
            $sql = $con->prepare($sql);
			$sql->execute();
        }

        public function desativarEdital(){
            //para desativar uma postagem o controle deve ser feito atraves da flag
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