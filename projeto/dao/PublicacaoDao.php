<?php
    class PublicacaoDao{
        public function inserir(Publicacao $pub){
            try{
                $sql = "INSERT INTO publicacao(artista_id, musica_id) VALUES (:artista_id, :musica_id)";
                $con_sql = ConnectionFactory::getConnection()->prepare($sql);
                $con_sql->bindValue(":artista_id", $pub->getArtistaId());
                $con_sql->bindValue(":musica_id", $pub->getMusicaId());
                return $con_sql->execute();
            }catch(PDOException $e){
                echo "PINTO $e";
            }
        }

        public function read(){
            try{
                $sql = "SELECT
                        publicacao.id as id,
                        artista.nome AS artista,
                        musica.nome AS musica
                        FROM publicacao
                        JOIN
                        artista ON publicacao.artista_id = artista.id
                        JOIN
                        musica ON publicacao.musica_id = musica.id;";

                $result = ConnectionFactory::getConnection()->query($sql);
                $publicacao = $result->fetchAll(PDO::FETCH_ASSOC);
                $PubliLista = array();
                foreach($publicacao as $p){
                    $PubliLista[] = $this->listarPubli($p);
                }
                return $PubliLista;
            }catch(PDOException $e){
                echo "gozar: $e";
            }
        }

        public function listarPubli($row){
            $publicacao = new Publicacao();
            $publicacao->setId($row['id']);
            $publicacao->setNomeartista($row['artista']);
            $publicacao->setNomemusica($row['musica']);
            return $publicacao;
        }

        public function delete(Publicacao $pub) {
            try{
                $sql = "DELETE FROM publicacao WHERE id = :id";
                $con_sql = ConnectionFactory::getConnection()->prepare($sql);
                $con_sql->bindValue(":id", $pub->getId());
                return $con_sql->execute();
            }catch(PDOException $e){
                echo "kct: $e";
            }
        }

    }
?>