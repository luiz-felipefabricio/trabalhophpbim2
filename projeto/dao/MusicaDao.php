<?php
    class MusicaDao{
        public function inserir(Musica $mus){
            try{
                $sql = "INSERT INTO musica(nome, genero, letra) VALUES (:nome, :genero, :letra)";
                $con_sql = ConnectionFactory::getConnection()->prepare($sql);
                $con_sql->bindValue(":nome", $mus->getNome());
                $con_sql->bindValue(":genero", $mus->getGenero());
                $con_sql->bindValue(":letra", $mus->getLetra());
                return $con_sql->execute();
            }catch(PDOException $e){
                echo "<p>Erro ao inserir música!</p> $e";
            }
        }

        public function read(){
            try{
                $sql = "SELECT * FROM musica";
                $result = ConnectionFactory::getConnection()->query($sql);
                $lista = $result->fetchAll(PDO::FETCH_ASSOC);
                $musicaLista = array();
                foreach($lista as $l){
                    $musicaLista[] = $this->listarMusica($l);
                }
                return $musicaLista;
            }catch(PDOException $e){
                echo "Ocorreu um erro ao listar musicas: $e";
            }
        }

        public function listarMusica($row){
            $musica = new Musica();
            $musica->setId($row['id']);
            $musica->setNome($row['nome']);
            $musica->setGenero($row['genero']);
            $musica->setLetra($row['letra']);
            return $musica;
        }

        public function delete(Musica $mus) {
            try{
                $sql = "DELETE FROM musica WHERE id = :id";
                $con_sql = ConnectionFactory::getConnection()->prepare($sql);
                $con_sql->bindValue(":id", $mus->getId());
                return $con_sql->execute();
            }catch(PDOException $e){
                echo "erro ao excluir musica: $e";
            }
        }

    }
?>