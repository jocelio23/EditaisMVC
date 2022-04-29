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


        public static function insert($dadosPost){
			$con = Connection::getConn();

			$sql = $con->prepare('INSERT INTO postagem (nome, etapas, valor, contatos, categoria, flag) VALUES (:n, :e, :v, :co, :ca, :f)');
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

        public static function update($params){
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