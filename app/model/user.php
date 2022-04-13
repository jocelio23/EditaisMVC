<?php

    use bd\Connetion;

    class User{

        private $id;
        private $usuario;
        private $senha;

        public function validaLogin(){

            $conn = Connetion::getConn();
            //var_dump($conn);
            //selecionar o usuario que tenha o mesmo usuario do informado
            $sql = 'SELECT * FROM usuario WHERE login = :usuario';

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':usuario', $this->usuario);
            $stmt->execute();

            //se achou usuario procure a senha e confira se bate
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
        