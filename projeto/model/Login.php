
<?php
class Login{
    private $id;
    private $nome;
    private $senha;

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

    public function getSenha(){
        return $this->senha;
    }

    public function setSenha($senha){
        $this->senha = $senha;
    }

    public function __toString(){
        return "Login: Nome: {$this->nome} - Senha: {$this->senha}";
    }
}
?>
