<?php
    include '../dao/connectionFactory.php'; 
    include '../dao/ArtistaDao.php'; 
    include '../model/Artista.php'; 

    $artista = new Artista();
    $artistaDao = new ArtistaDao();

    //Pegar os dados enviados
    $dadosRequest = filter_input_array(INPUT_POST);

    //se a operacao for salvar
    if(isset($_POST['cadastrar'])){
        $artista->setNome($_POST['nome']);
        $artista->setNomeartistico($_POST['nomeartistico']);
        $artista->setDatanascimento($_POST['datanascimento']);
        $artista->setBio($_POST['biografia']);
        $artista->setOrigem($_POST['origem']); 
        $artistaDao->inserir($artista);
        header("location: ../view/artista.php");
    }elseif(isset($_GET['del'])){
        $artista->setId($_GET['del']);
        $artistaDao->delete($artista);
        header("location: ../view/artista.php");
    }
    

?>