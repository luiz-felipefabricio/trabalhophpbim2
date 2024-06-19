<?php
    class LoginDao{
        public function inserir(Login $log){
            try{
                $sql = "INSERT INTO login(nome, senha) VALUES (:nome, :senha)";
                $con_sql = ConnectionFactory::getConnection()->prepare($sql);
                $con_sql->bindValue(":nome", $log->getNome());
                $con_sql->bindValue(":senha", $log->getSenha());
                return $con_sql->execute();
            }catch(PDOException $e){
                echo "<p>Erro ao Criar Conta</p> $e";
            }
        }

        public function read(){
            try{
                $sql = "SELECT * FROM login";
                $result = ConnectionFactory::getConnection()->query($sql);
                $lista = $result->fetchAll(PDO::FETCH_ASSOC);
                $loginLista = array();
                foreach($lista as $l){
                    $loginLista[] = $this->listarLogins($l);
                }
                return $loginLista;
            }catch(PDOException $e){
                echo "Ocorreu um erro ao listar logins: $e";
            }
        }

        public function listarLogins($row){
            $login = new Login();
            $login->setId($row['id']);
            $login->setNome($row['nome']);
            $login->setSenha($row['senha']);
            return $login;
        }

        public function delete(Login $log) {
            try{
                $sql = "DELETE FROM login WHERE id = :id";
                $con_sql = ConnectionFactory::getConnection()->prepare($sql);
                $con_sql->bindValue(":id", $log->getId());
                return $con_sql->execute();
            }catch(PDOException $e){
                echo "erro ao excluir Login: $e";
            }
        }

        public function validar(Login $log){
            try{
                $sql = "SELECT * FROM login WHERE nome = :nome AND senha = :senha;";
                $valid = ConnectionFactory::getConnection()->prepare($sql);
                $valid->bindValue(":nome", $log->getNome());
                $valid->bindValue(":senha", $log->getSenha());
                $valid->execute();

                if($valid->rowCount() > 0){
                    $dado = $valid->fetch();

                    $_SESSION['login'] = $dado['id'];
                    return true;
                }else{
                    return false;
                }

            }catch(PDOException $e){
                echo "Ocorreu um erro ao Logar: $e";
            }
        }

    }
?>