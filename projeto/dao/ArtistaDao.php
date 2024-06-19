<?php
    class ArtistaDao{
        public function inserir(Artista $art){
            try{
                $sql = "INSERT INTO artista(nome, nomeartistico, datanascimento, biografia, origem) VALUES (:nome, :nomeartistico, :datanascimento, :biografia, :origem)";
                $con_sql = ConnectionFactory::getConnection()->prepare($sql);
                $con_sql->bindValue(":nome", $art->getNome());
                $con_sql->bindValue(":nomeartistico", $art->getNomeartistico());
                $con_sql->bindValue(":datanascimento", $art->getDatanascimento());
                $con_sql->bindValue(":biografia", $art->getBio());
                $con_sql->bindValue(":origem", $art->getOrigem());
                return $con_sql->execute();
            }catch(PDOException $e){
                echo "<p>Erro ao inserir Artista</p> $e";
            }
        }

        public function read(){
            try{
                $sql = "SELECT * FROM artista";
                $result = ConnectionFactory::getConnection()->query($sql);
                $lista = $result->fetchAll(PDO::FETCH_ASSOC);
                $artistaLista = array();
                foreach($lista as $l){
                    $artistaLista[] = $this->listarArtistas($l);
                }
                return $artistaLista;
            }catch(PDOException $e){
                echo "Ocorreu um erro ao listar artista: $e";
            }
        }

        public function listarArtistas($row){
            $artista = new Artista();
            $artista->setId($row['id']);
            $artista->setNome($row['nome']);
            $artista->setNomeartistico($row['nomeartistico']);
            $artista->setDatanascimento($row['datanascimento']);
            $artista->setBio($row['biografia']);
            $artista->setOrigem($row['origem']);
            return $artista;
        }

        public function delete(Artista $art) {
            try{
                $sql = "DELETE FROM artista WHERE id = :id";
                $con_sql = ConnectionFactory::getConnection()->prepare($sql);
                $con_sql->bindValue(":id", $art->getId());
                return $con_sql->execute();
            }catch(PDOException $e){
                echo "erro ao excluir fabricante: $e";
            }
        }

    }
?>