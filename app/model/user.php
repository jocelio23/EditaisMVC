<?php

    use bd\Connection;

    class User{

        private $id;
        private $usuario;
        private $senha;

        public function validaLogin(){

            $conn = Connection::getConn();
            //selecionar o usuario que tenha o mesmo login do informado
            $sql = 'SELECT * FROM usuario WHERE login = :usuario';
            
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':usuario', $this->usuario);
            //$stmt->bindValue(':senha', md5($senha));
            $stmt->execute();
        
            //se achou usuario procure a senha e confira se confere
            if ($stmt->rowCount()) {
                $result = $stmt->fetch();

                //melhorar colocando hasheamento de senha
                if ($result['senha'] === $this->senha) {
                    $_SESSION['usr'] = array(
                        'id' => $result['id'], 
                        'usuario' => $result['login']
                    );
                    return true;
                }
            }
            throw new \Exception('Login Inválido');
        }
        public function setUsuario($usuario)
        {
            $this->usuario = $usuario;
        }

        public function setSenha($senha)
        {
            $this->senha = $senha;
        }

        public function getUsuario()
        {
            return $this->usuario;
        }

        public function getSenha()
        {
            return $this->senha;
        }
    }
?>
        