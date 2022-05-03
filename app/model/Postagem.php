<?php

    use bd\Connection;

    class postagem{

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
    
            $sql = "UPDATE postagem SET nome = :n, etapas = :e, valor = :v, contatos = :co, categoria = :ca, flag = :f WHERE id = :id";
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

        public static function selecionarPostagem($idPost){
		    $con = Connection::getConn();

			$sql = "SELECT * FROM postagem WHERE id = :id";
			$sql = $con->prepare($sql);
			$sql->bindValue(':id', $idPost, PDO::PARAM_INT);
			$sql->execute();

			$resultado = array();

			while ($row = $sql->fetchObject('postagem')) {
				$resultado[] = $row;
			}

			return $resultado;
		}

    }

     //essa função precisa ser completada com as imagens e anexos
       /*  public static function insertNovo($dadosPost)
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
 */