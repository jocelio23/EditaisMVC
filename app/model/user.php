<?php

    use banco\bd\Connection;

    class User{

        private $id;
        private $usuario;
        private $senha;

        public function validateLogin(){

            $conn = Connetion::getConn();
            var_dump($conn);
            //selecionar o usuario que tenha o mesmo email do informado
            $sql = 'SELECT * FROM usuario WHERE usuario = :usuario';

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':usuario', $this->usuario);
            $stmt->execute();

            if ($stmt->rowCount()) {
                $result = $stmt->fetch();

                if ($result['senha'] === $this->senha) {
                    $_SESSION['usr'] = array(
                        'id_user' => $result['id'], 
                        'name_user' => $result['name']
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
        