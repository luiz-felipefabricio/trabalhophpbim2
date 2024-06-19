<?php
    include '../dao/connectionFactory.php'; //conexao com banco
    include '../dao/LoginDao.php'; //data acces object
    include '../model/Login.php'; //Classe fabricante

    $login = new Login();
    $loginDao = new LoginDao();

    //Pegar os dados enviados
    $dadosRequest = filter_input_array(INPUT_POST);

    //se a operacao for salvar
    if(isset($_POST['cadastrar'])){
        $login->setNome($_POST['nome']);
        $login->setSenha($_POST['senha']);
        $loginDao->inserir($login);
        header("location: ../index.php");
    }elseif(isset($_GET['del'])){
        $login->setId($_GET['del']);
        $loginDao->delete($login);
        header("location: ../LoginForm.php");
    }elseif(isset($_POST['validar'])){
        $login->setNome($_POST['nome']);
        $login->setSenha($_POST['senha']);
        $valid = $loginDao->validar($login);

        if($valid){
            header("location: ../view/musica.php");
        }else{
            header("location: ../index.php");
        }
    }
    echo "NAO ENTREI NOS IFs";

?>