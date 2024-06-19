
<?php
class Musica{
    private $id;
    private $nome;
    private $genero;
    private $letra;

    public function __construct($nome = null) {
        $this->nome = $nome;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getGenero(){
        return $this->genero;
    }

    public function setGenero($genero){
        $this->genero = $genero;
    }

    public function getLetra(){
        return $this->letra;
    }

    public function setLetra($letra){
        $this->letra = $letra;
    }

    public function __toString(){
        return "Música: Nome: {$this->nome} - Gênero Musical: {$this->genero} - Letra: {$this->letra}";
    }
}
?>
