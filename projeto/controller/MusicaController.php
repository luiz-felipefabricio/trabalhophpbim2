<?php
    include '../dao/connectionFactory.php'; 
    include '../dao/MusicaDao.php'; 
    include '../model/Musica.php'; 

    $musica = new Musica();
    $musicaDao = new MusicaDao();

    //Pegar os dados enviados
    $dadosRequest = filter_input_array(INPUT_POST);

    //se a operacao for salvar
    if(isset($_POST['cadastrarMusica'])){
        $musica->setNome($_POST['nome']);
        $musica->setGenero($_POST['genero']);
        $musica->setLetra($_POST['letra']);
        $musicaDao->inserir($musica);
        header("location: ../view/musica.php");
    }elseif(isset($_GET['del'])){
        $musica->setId($_GET['del']);
        $musicaDao->delete($musica);
        header("location: ../view/musica.php");
    }


?>