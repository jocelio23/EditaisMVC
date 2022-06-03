<?php

use bd\Connection;

class postagem{

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
      
      $sql = $con->prepare('INSERT INTO postagem (nome, etapas, valor, contatos, telefone, categoria, flag, arquivo) VALUES (:n, :e, :v, :co, :tel, :ca, :f, :ar)');
            
      $sql->bindValue(':n', $dadosPost['nome']);
      $sql->bindValue(':e', $dadosPost['etapas']);
      $sql->bindValue(':v', $dadosPost['valor']);
      $sql->bindValue(':co', $dadosPost['contatos']);
      $sql->bindValue(':tel', $dadosPost['telefone']);
      $sql->bindValue(':ca', $dadosPost['categorias']);
      $sql->bindValue(':f', $dadosPost['flags']);
      $sql->bindValue(':ar', $dadosPost['arquivo'] = $novo_nome);
      $sql->execute();
     
      $last_id = $con->lastInsertId();

      for($i=0; $i<count($link);$i++)
      {
        //$con->exec($sql);
        $sql2 = $con->prepare('INSERT INTO anexos (link, texto, id_postagem) VALUES (:li, :te, :la)');    
        $sql2->bindValue(':li', $link[$i]);
        $sql2->bindValue(':te', $texto[$i]);
        $sql2->bindValue(':la', $last_id);
        $result = $sql2->execute();
        //return $result;
      }   
     
     
    }
    return true;
  }


   public static function update($params){
    $con = Connection::getConn();

    $sql = "UPDATE postagem SET nome = :n, etapas = :e, valor = :v, contatos = :co, telefone = :te, categoria = :ca, flag = :f WHERE id = :id";
    $sql = $con->prepare($sql);
    $sql->bindValue(':id', $params['id']);
    $sql->bindValue(':n', $params['nome']);
    $sql->bindValue(':e', $params['etapas']);
    $sql->bindValue(':v', $params['valor']);
    $sql->bindValue(':co', $params['contatos']);
    $sql->bindValue(':te', $params['telefone']);
    $sql->bindValue(':ca', $params['categorias']);
    $sql->bindValue(':f', $params['flags']);

    $resultado = $sql->execute();

    //$sql = "UPDATE anexos SET link = :li, texto = :te WHERE  anexos.id_postagem = $params";
    
    if ($resultado == 0) {
      throw new Exception("Falha ao alterar publicação");
      return false;
    }
    return true;
  }  

  public static function insertAnexos($dadosPost){
    $con = Connection::getConn();
        
    $link = $dadosPost['link'];
    $texto = $dadosPost['texto'];

    //pegando id da postagem
    $id_postagem = intval($dadosPost['id']);

    //var_dump($dadosPost); die();
      for($i=0; $i<count($link);$i++)
      {
        //$con->exec($sql);
        $sql2 = $con->prepare('INSERT INTO anexos (link, texto, id_postagem) VALUES (:li, :te, :la)');    
        $sql2->bindValue(':li', $link[$i]);
        $sql2->bindValue(':te', $texto[$i]);
        $sql2->bindValue(':la', $id_postagem);
        $result = $sql2->execute();
        
        //return $result;
      } 
    return true;
  }

  public static function novoAnexo($params){
    $con = Connection::getConn();

    //var_dump($params); die();

    $sql = "UPDATE anexos SET link = :l, texto = :te WHERE id = :id";
    $sql = $con->prepare($sql);
    $sql->bindValue(':id', $params['id']);
    $sql->bindValue(':l', $params['link']);
    $sql->bindValue(':te', $params['texto']);
   // $sql->bindValue(':e', $params['etapas']);

    $resultado = $sql->execute();



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

  //Função para testes de atualização de anexos//
  public static function selecionarAnexo($idPost){
    $con = Connection::getConn();

    $sql = "SELECT * FROM anexo WHERE id = :id";
    $sql = $con->prepare($sql);
    $sql->bindValue(':id', $idPost, PDO::PARAM_INT);
    $sql->execute();

    $resultado = array();

    while ($row = $sql->fetchObject('postagem')) {
      $resultado[] = $row;
    }
    return $resultado;
  }

  //Função para testes de atualização de anexos//

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

  