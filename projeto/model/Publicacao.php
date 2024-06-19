
<?php
    require_once 'Artista.php';
    require_once 'Musica.php';

class Publicacao{
    private $id;
    private $musicaId;
    private $artistaId;
    private $nomeartista;
    private $nomemusica;

    public function __construct() {
        $this->nomeartista = new Artista();
        $this->nomemusica = new Musica();
    }

    public function getNomeartista() {
        return $this->nomeartista->getNome();
    }

    public function setNomeartista($nome) {
        $this->nomeartista->setNome($nome);
    }

    public function getNomeamusica() {
        return $this->nomemusica->getNome();
    }

    public function setNomemusica($nome) {
        $this->nomemusica->setNome($nome);
    }


    public function getMusicaId(){
        return $this->musicaId;
    }

    public function setMusicaId($musicaId){
        $this->musicaId = $musicaId;
    }

    public function getArtistaId(){
        return $this->artistaId;
    }

    public function setArtistaId($artistaId){
        $this->artistaId = $artistaId;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }
}
?>
