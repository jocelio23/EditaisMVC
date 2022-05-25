<?php

use bd\Connection;

class postagem{

    public static function insert($dadosPost){
    $con = Connection::getConn();

    if (isset($_FILES['arquivo'])) {
      $shity_file = $_FILES['arquivo']['name']; 
      $extensao = strtolower(pathinfo($shity_file, PATHINFO_EXTENSION));
      $novo_nome = md5(time()).".".$extensao; // gerando algoritmo md5.extensão capturada acima
      $diretorio = "img/imagensEditais/"; // desinstalar extensão que instalei para path, pois esse é o caminho correto e não o que é apresentado na extensão

      move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio . $novo_nome); // realizando upload, o arquivo será salvo com um nome equivalente a um algoritmo md5.png, exemplo: b92a24cb7adc1fb2b2f2da78cb11c0a0.png.

      $sql = $con->prepare('INSERT INTO postagem (nome, etapas, valor, contatos, categoria, flag, arquivo) VALUES (:n, :e, :v, :co, :ca, :f, :ar)');
      $sql->bindValue(':n', $dadosPost['nome']);
      $sql->bindValue(':e', $dadosPost['etapas']);
      $sql->bindValue(':v', $dadosPost['valor']);
      $sql->bindValue(':co', $dadosPost['contatos']);
      $sql->bindValue(':ca', $dadosPost['categorias']);
      $sql->bindValue(':f', $dadosPost['flags']);
      $sql->bindValue(':ar', $dadosPost['arquivo'] = $novo_nome);  // atribuindo o valor do banco equivalente ao nome com hash md5 de acordo com a imagem upada

      // DICA: macha, minha dica é que já que a intenção é receber apenas imagens, então criar um tipo de filtro em um if para que sejam carregadas apenas imagens, a partir do que o PATHINFO_EXTENSION capturar
      $res = $sql->execute();
      if ($res == 0) {
        throw new Exception("Falha ao inserir publicação");
        return false;
      }
    }
    return true;
  }

  
  public static function update($params){
    $con = Connection::getConn();

    $sql = "UPDATE postagem SET nome = :n, etapas = :e, valor = :v, contatos = :co, categoria = :ca, flag = :f WHERE id = :id";
    $sql = $con->prepare($sql);
    $sql->bindValue(':id', $params['id']);
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

  public static function delete($id){
		$con = Connection::getConn();

		$sql = "DELETE FROM postagem WHERE id = :id";
		$sql = $con->prepare($sql);
		$sql->bindValue(':id', $id);
		$resultado = $sql->execute();

		if ($resultado == 0) {
		  throw new Exception("Falha ao deletar publicação");
				return false;
		}

		return true;
	}


  public static function insertComLinks($dadosPost)
  {
    $con = Connection::getConn();
        
    if (isset($_FILES['arquivo'])) 
    {
      $link = $dadosPost['link'];
      $texto = $dadosPost['texto'];
      $shity_file = $_FILES['arquivo']['name']; 
      $extensao = strtolower(pathinfo($shity_file, PATHINFO_EXTENSION));
      $novo_nome = md5(time()).".".$extensao; // gerando algoritmo md5.extensão capturada acima
      $diretorio = "img/imagensEditais/"; // desinstalar extensão que instalei para path, pois esse é o caminho correto e não o que é apresentado na extensão

      move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio . $novo_nome); // realizando upload, o arquivo será salvo com um nome equivalente a um algoritmo md5.png, exemplo: b92a24cb7adc1fb2b2f2da78cb11c0a0.png.
      
      $sql = $con->prepare('INSERT INTO postagem (nome, etapas, valor, contatos, categoria, flag, arquivo) VALUES (:n, :e, :v, :co, :ca, :f, :ar)');
            
      $sql->bindValue(':n', $dadosPost['nome']);
      $sql->bindValue(':e', $dadosPost['etapas']);
      $sql->bindValue(':v', $dadosPost['valor']);
      $sql->bindValue(':co', $dadosPost['contatos']);
      $sql->bindValue(':ca', $dadosPost['categorias']);
      $sql->bindValue(':f', $dadosPost['flags']);
      $sql->bindValue(':ar', $dadosPost['arquivo'] = $novo_nome);
      $sql->execute();
     
      
      for($i=0; $i<count($link);$i++)
      {
        $con->exec($sql);
        $last_id = $con->lastInsertId();
        $sql2 = $con->prepare('INSERT INTO anexos (link, texto, id_postagem) VALUES (:li, :te, :la)');    
        $sql2->bindValue(':li', $link[$i]);
        $sql2->bindValue(':te', $texto[$i]);
        $sql2->bindValue(':la', $last_id);
        $result = $sql2->execute();
        return $result;
      }    
     
    }    
    return true;
  }

  /* public static function insertComLinks($dadosPost){
    $con = Connection::getConn();

    
    if (isset($_FILES['arquivo'])) {
      $shity_file = $_FILES['arquivo']['name']; 
      $extensao = strtolower(pathinfo($shity_file, PATHINFO_EXTENSION));
      $novo_nome = md5(time()).".".$extensao; // gerando algoritmo md5.extensão capturada acima
      $diretorio = "img/imagensEditais/"; // desinstalar extensão que instalei para path, pois esse é o caminho correto e não o que é apresentado na extensão

      move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio . $novo_nome); // realizando upload, o arquivo será salvo com um nome equivalente a um algoritmo md5.png, exemplo: b92a24cb7adc1fb2b2f2da78cb11c0a0.png.

      $sql = $con->prepare('INSERT INTO teste (nome, etapas, valor, contatos, categoria, flag, arquivo, link, texto) VALUES (:n, :e, :v, :co, :ca, :f, :ar, :li, :te)');
      $sql->bindValue(':n', $dadosPost['nome']);
      $sql->bindValue(':e', $dadosPost['etapas']);
      $sql->bindValue(':v', $dadosPost['valor']);
      $sql->bindValue(':co', $dadosPost['contatos']);
      $sql->bindValue(':ca', $dadosPost['categorias']);
      $sql->bindValue(':f', $dadosPost['flags']);
      $sql->bindValue(':ar', $dadosPost['arquivo'] = $novo_nome);  // atribuindo o valor do banco equivalente ao nome com hash md5 de acordo com a imagem upada
      $sql->bindValue(':li', $dadosPost['link']);
      $sql->bindValue(':te', $dadosPost['texto']);
      // DICA: macha, minha dica é que já que a intenção é receber apenas imagens, então criar um tipo de filtro em um if para que sejam carregadas apenas imagens, a partir do que o PATHINFO_EXTENSION capturar
      $res = $sql->execute();
      
      if ($res == 0) {
        throw new Exception("Falha ao inserir publicação");
        return false;
      }
    }
    return true;
  }
 */

  public static function updateComLinks($params){
    $con = Connection::getConn();

    $sql = "UPDATE teste SET nome = :n, etapas = :e, valor = :v, contatos = :co, categoria = :ca, flag = :f, link = :li, texto =:te  WHERE id = :id";
    $sql = $con->prepare($sql);
    $sql->bindValue(':id', $params['id']);
    $sql->bindValue(':n', $params['nome']);
    $sql->bindValue(':e', $params['etapas']);
    $sql->bindValue(':v', $params['valor']);
    $sql->bindValue(':co', $params['contatos']);
    $sql->bindValue(':ca', $params['categorias']);
    $sql->bindValue(':f', $params['flags']);
    $resultado = $sql->execute();

    $sql2 = "UPDATE anexos set link = :li, texto= :te WHERE id =:id"; 
    $sql2 = $con->prepare($sql2); 
    $sql->bindValue(':li', $params['link']);
    $sql->bindValue(':te', $params['texto']);
    $resultado2 = $sql2->execute();

    

    if ($resultado == 0 && $resultado2 == 0) {
        throw new Exception("Falha ao alterar publicação");
      return false;
    }
    return true;
  }

  public static function DesativarPostagem($num){
    $con = Connection::getConn();
      $sql = "UPDATE postagem SET  flag = 'Desativado' WHERE id = $num";
      $sql = $con->prepare($sql);   
      $resultado = $sql->execute();
      if ($resultado == 0) {
        throw new Exception("Falha ao desativar publicação");
          return false;
      }
      return true;
    }
   
    public static function AtivarPostagem($num){
      $con = Connection::getConn();
        $sql = "UPDATE postagem SET  flag = 'Ativado' WHERE id = $num";
        $sql = $con->prepare($sql);   
        $resultado = $sql->execute();
        if ($resultado == 0) {
          throw new Exception("Falha ao desativar publicação");
            return false;
        }
        return true;
      }
     

}
/*

//###########################################
   public static function insertNovo($dadosPost){
    $con = Connection::getConn();
      $sql = $con->prepare('INSERT INTO teste (nome, etapas, valor, contatos, categoria, flag) VALUES (:n, :e, :v, :co, :ca, :f)');
      $sql->bindValue(':n', $dadosPost['nome']);
      $sql->bindValue(':e', $dadosPost['etapas']);
      $sql->bindValue(':v', $dadosPost['valor']);
      $sql->bindValue(':co', $dadosPost['contatos']);
      $sql->bindValue(':ca', $dadosPost['categorias']);
      $sql->bindValue(':f', $dadosPost['flags']);
      //$sql->bindValue(':ar', $dadosPost['arquivo'] = $novo_nome);  // atribuindo o valor do banco equivalente ao nome com hash md5 de acordo com a imagem upada

      // DICA: macha, minha dica é que já que a intenção é receber apenas imagens, então criar um tipo de filtro em um if para que sejam carregadas apenas imagens, a partir do que o PATHINFO_EXTENSION capturar
      

      $res = $sql->execute();

      if ($res == 0) {
        throw new Exception("Falha ao inserir publicação");
        return false;
      }
    
    return true;
  }



  //apenas testes de inserções sem imagem
  //###########################################
  public static function insertNovo($dadosPost){
    $con = Connection::getConn();
      $sql = $con->prepare('INSERT INTO teste (nome, etapas, valor, contatos, categoria, flag) VALUES (:n, :e, :v, :co, :ca, :f)');
      $sql->bindValue(':n', $dadosPost['nome']);
      $sql->bindValue(':e', $dadosPost['etapas']);
      $sql->bindValue(':v', $dadosPost['valor']);
      $sql->bindValue(':co', $dadosPost['contatos']);
      $sql->bindValue(':ca', $dadosPost['categorias']);
      $sql->bindValue(':f', $dadosPost['flags']);
      //$sql->bindValue(':ar', $dadosPost['arquivo'] = $novo_nome);  // atribuindo o valor do banco equivalente ao nome com hash md5 de acordo com a imagem upada

      // DICA: macha, minha dica é que já que a intenção é receber apenas imagens, então criar um tipo de filtro em um if para que sejam carregadas apenas imagens, a partir do que o PATHINFO_EXTENSION capturar
      

      $res = $sql->execute();

      if ($res == 0) {
        throw new Exception("Falha ao inserir publicação");
        return false;
      }
    
    return true;
  }


  public static function teste($dadosPost){
    $con = Connection::getConn();

    if (isset($_FILES['arquivo'])) {
      $shity_file = $_FILES['arquivo']['name']; 
      $extensao = strtolower(pathinfo($shity_file, PATHINFO_EXTENSION));
      $novo_nome = md5(time()).".".$extensao; // gerando algoritmo md5.extensão capturada acima
      $diretorio = "img/imagensEditais/"; // desinstalar extensão que instalei para path, pois esse é o caminho correto e não o que é apresentado na extensão

      move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio . $novo_nome); // realizando upload, o arquivo será salvo com um nome equivalente a um algoritmo md5.png, exemplo: b92a24cb7adc1fb2b2f2da78cb11c0a0.png.
      
      $sql = $con->prepare('INSERT INTO postagem (nome, etapas, valor, contatos, categoria, flag, arquivo) VALUES (:n, :e, :v, :co, :ca, :f, :ar)');
      $sql->bindValue(':n', $dadosPost['nome']);
      $sql->bindValue(':e', $dadosPost['etapas']);
      $sql->bindValue(':v', $dadosPost['valor']);
      $sql->bindValue(':co', $dadosPost['contatos']);
      $sql->bindValue(':ca', $dadosPost['categorias']);
      $sql->bindValue(':f', $dadosPost['flags']);
      $sql->bindValue(':ar', $dadosPost['arquivo'] = $novo_nome);  // atribuindo o valor do banco equivalente ao nome com hash md5 de acordo com a imagem upada

      // DICA: macha, minha dica é que já que a intenção é receber apenas imagens, então criar um tipo de filtro em um if para que sejam carregadas apenas imagens, a partir do que o PATHINFO_EXTENSION capturar
       

      $res = $sql->execute();
      

      if ($res == 0) {
        throw new Exception("Falha ao inserir publicação");
        return false;
      }
    }
    }
    return true;
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
                    //header('Location: http://localhost/servidorLocal/EditaisFinal/EditaisMVC/');
                }
                else
                {
                   // $_SESSION['success'] = "Imagem não enviada, tente novamente.";
                    header('Location: http://localhost/servidorLocal/EditaisFinal/EditaisMVC/');
                }              
			
			return true;
            }            
		}
 */