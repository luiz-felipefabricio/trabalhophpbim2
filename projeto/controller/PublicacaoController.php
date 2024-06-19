<?php
    include '../dao/connectionFactory.php';
    include '../dao/PublicacaoDao.php'; 
    include '../model/Publicacao.php'; 
    require_once '../model/Artista.php';
    require_once '../model/Musica.php';
    require_once '../model/Publicacao.php';

    $publicacao = new Publicacao();
    $publicacaoDao = new PublicacaoDao();

    
    $dadosRequest = filter_input_array(INPUT_POST);

    
    if(isset($_POST['cadastrar'])){
        $publicacao->setArtistaId($_POST['artista']);
        $publicacao->setMusicaId($_POST['musica']);
        $publicacaoDao->inserir($publicacao);
        header("location: ../view/publicacao.php");
    }elseif(isset($_GET['del'])){
        $publicacao->setId($_GET['del']);
        $publicacaoDao->delete($publicacao);
        header("location: ../view/publicacao.php");
    }


?>