<?php

    use bd\Connection;

    class postagem{

        private $nome;
        private $etapas;
        private $valor;
        private $contatos;
        private $categoria;
        private $flag;

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


        public function desativarEdital(){
            //para desativar uma postagem o controle deve ser feito atraves da flag
        }

        public static function insert($dadosPost)
		{
			$con = Connection::getConn();

			$sql = $con->prepare('INSERT INTO aux (nome, etapas, valor, contatos, categoria, flag) VALUES (:n, :e, :v, :co, :ca, :f)');
			$sql->bindValue(':n', $dadosPost['nome']); 
            $sql->bindValue(':e', $dadosPost['etapas']);
            $sql->bindValue(':v', $dadosPost['valor']);
            $sql->bindValue(':co', $dadosPost['contatos']);
            $sql->bindValue(':ca', $dadosPost['categorias']);            
			$sql->bindValue(':f', $dadosPost['flags']);
			$res = $sql->execute();
              
			if ($res == 0) {
				throw new Exception("Falha ao inserir publicação");
                

				return false;
			}            

			return true;
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
        public function setFlag($flag){
            $this->flag = $flag;
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
        public function getFlag(){
            return $this->flag;
        }
    }