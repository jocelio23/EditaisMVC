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

  public static function updateComLinks($params)
    {
        $con = Connection::getConn();
        $get_id = $_POST['id'];
        $arquivo = $_FILES['arquivo'];
        $arqTemp = $_FILES['arquivo']['tmp_name'];
        $arquivoArray= implode(".", $arquivo);        

        if($arqTemp !="")
        {
            $buscaImagem = $con->prepare("SELECT arquivo FROM postagem WHERE id = $get_id");
            $buscaImagem->bindValue(':id', $get_id);
            $buscaImagem->execute();
            $linha = $buscaImagem->fetchAll(PDO::FETCH_ASSOC);

            $arquivo = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : "";
            $arquivo = $_FILES['arquivo'];            
            // aqui onde faz o update da imagem, dando novo nome e movendo para a pasta de upload
            if (isset($_FILES['arquivo'])) 
            {
                $extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
                $novo_nome = md5(time())."." . $extensao;
                $diretorio = "img/imagensEditais/";
               
                if (file_exists($diretorio.$linha[0]['arquivo'])) 
                {
                     //var_dump("antigo ".$diretorio.$linha[0]['arquivo']);
                     unlink($diretorio.$linha[0]['arquivo']);
                }
                if (move_uploaded_file($arqTemp, $diretorio . $novo_nome)) 
                {
                    echo "sucesso";
                }   
            }
            $sql = $con->prepare("UPDATE postagem SET arquivo = '$novo_nome' WHERE id= '$get_id' ");            
            $consulta = $sql->execute();
        }
        else
        {
            $sql2 = "UPDATE postagem SET nome = :n, etapas = :e, valor = :v, contatos = :co, telefone = :te, categoria = :ca, flag = :f WHERE id = :id";
            $sql2 = $con->prepare($sql2);
            $sql2->bindValue(':id', $params['id']);
            $sql2->bindValue(':n', $params['nome']);
            $sql2->bindValue(':e', $params['etapas']);
            $sql2->bindValue(':v', $params['valor']);
            $sql2->bindValue(':co', $params['contatos']);
            $sql2->bindValue(':te', $params['telefone']);
            $sql2->bindValue(':ca', $params['categorias']);
            $sql2->bindValue(':f', $params['flags']);

            $sql2->execute();
        }
    }
/* 
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
  } */  

  public static function insertAnexos($dadosPost){
    $con = Connection::getConn();
        
    $link = $dadosPost['link'];
    $texto = $dadosPost['texto'];

    //pegando id da postagem
    $id_postagem = intval($dadosPost['id']);
      for($i=0; $i<count($link);$i++)
      {
        //$con->exec($sql);
        $sql2 = $con->prepare('INSERT INTO anexos (link, texto, id_postagem) VALUES (:li, :te, :la)');    
        $sql2->bindValue(':li', $link[$i]);
        $sql2->bindValue(':te', $texto[$i]);
        $sql2->bindValue(':la', $id_postagem);
        $sql2->execute();
      } 
    return true;
  }

  public static function novoAnexo($params){
    $con = Connection::getConn();
    $sql = "UPDATE anexos SET link = :l, texto = :te WHERE id = :id";
    $sql = $con->prepare($sql);
    $sql->bindValue(':id', $params['id']);
    $sql->bindValue(':l', $params['link']);
    $sql->bindValue(':te', $params['texto']);

    $sql->execute();
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

  //Função usada na atualização de anexos//
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

  