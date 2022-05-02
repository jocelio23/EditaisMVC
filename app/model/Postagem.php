<?php

    use bd\Connection;

    class postagem{

       /*  private $nome;
        private $etapas;
        private $valor;
        private $contatos;
        private $categoria;
        private $flag; */

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

        public static function insertNovo($dadosPost)
		{
			$con = Connection::getConn();
            
			if(file_exists("img/imagemEditais/".$_FILES['arquivo']['name']))
            {
                $store = $_FILES['arquivo']['name'];
               $_SESSION['status'] = "A imagem já existe. '.$store.'";
                header("Location: http://localhost/EditaisFinal/EditaisMVC/");
            }
            else
            {
                $sql = $con->prepare('INSERT INTO aux (nome, etapas, valor, contatos, categoria, flag, arquivo) VALUES (:n, :e, :v, :co, :ca, :f, :ar)');
            
			$sql->bindValue(':n', $dadosPost['nome']); 
            $sql->bindValue(':e', $dadosPost['etapas']);
            $sql->bindValue(':v', $dadosPost['valor']);
            $sql->bindValue(':co', $dadosPost['contatos']);
            $sql->bindValue(':ca', $dadosPost['categorias']);            
			$sql->bindValue(':f', $dadosPost['flags']);
            $sql->bindValue(':ar', $dadosPost['arquivo']);
            
            $res = $sql->execute();
                if ($res == 0)
                {
                    //throw new Exception("Falha ao inserir publicação");
                    return false;
                }
                if($res)
                {
                    move_uploaded_file($_FILES['arquivo']['tmp_name'], "img/imagensEditais/".$_FILES['arquivo']['tmp_name']);
                    $_SESSION['success'] = "Imagem enviada com sucesso.";
                    //header('Location: http://localhost/EditaisFinal/EditaisMVC/');
                }
                else
                {
                   // $_SESSION['success'] = "Imagem não enviada, tente novamente.";
                    header('Location: http://localhost/EditaisFinal/EditaisMVC/');
                }              
			
			return true;
            }            
		}


        public static function update($params){
            $con = Connection::getConn();
    
            $sql = "UPDATE aux SET nome = :n, etapas = :e, valor = :v, contatos = :co, categoria = :ca, flag = :f WHERE id = :id";
            $sql = $con->prepare($sql);
            $sql->bindValue(':n', $params['nome']);
            $sql->bindValue(':e', $params['etapas']);
            $sql->bindValue(':v', $params['valor']);
            $sql->bindValue(':co', $params['contatos']);
            $sql->bindValue(':ca', $params['categorias']);
            $sql->bindValue(':f', $params['flags']);

        
            $resultado = $sql->execute();
    
            if ($resultado == 0) {
                throw new Exception("Falha ao alterar publicação");
                
                return false;
            }
            return true;
        }

     

   /*      //seters
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
        } */
    }