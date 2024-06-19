<?php
class Artista{
    private $id;
    private $nome;
    private $nomeartistico;
    private $datanascimento;
    private $bio;
    private $origem;

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

    public function getNomeartistico(){
        return $this->nomeartistico;
    }

    public function setNomeartistico($nomeartistico){
        $this->nomeartistico = $nomeartistico;
    }

    public function getDatanascimento(){
        return $this->datanascimento;
    }

    public function setDatanascimento($datanascimento){
        $this->datanascimento = $datanascimento;
    }

    public function getBio(){
        return $this->bio;
    }

    public function setBio($bio){
        $this->bio = $bio;
    }

    
    public function getOrigem(){
        return $this->origem;
    }

    public function setOrigem($origem){
        $this->origem = $origem;
    }

    public function __toString(){
        return "Artista: Nome: {$this->nome} - Nome Artístico: {$this->nomeartistico} - Data de Nascimento: {$this->datanascimento} - Biografia: {$this->bio} - Origem: {$this->origem}";
    }
}
?>
