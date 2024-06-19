<?php
    include '../dao/ConnectionFactory.php';
    include '../dao/PublicacaoDao.php';
    include '../model/Publicacao.php';
    include '../dao/ArtistaDao.php';
    include_once '../model/Artista.php';
    include '../dao/MusicaDao.php'; 
    include_once '../model/Musica.php';    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Login</title>
</head>
<body class="bg-danger-subtle">
    <div class="container-fluid">
    <?php
    include 'listamenu.php';
    ?>
            <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <form action="../controller/PublicacaoController.php" method="post">
                    <div class="mb-3">
                        <label for="artista" class="form-label">ID ARTISTA</label>
                        <input type="number" name="artista" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="musica" class="form-label">ID MUSICA</label>
                        <input type="number" name="musica" class="form-control">
                    </div>
                    <input type="submit" name="cadastrar" value="Salvar" class="btn btn-dark">
                </form>
            </div>
            <div class="col-2"></div>
        </div>
        <div class="row">
        <div class="col-12">
        <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Genero</th>
                        <th scope="col">Letra</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php  
                        $musicaDao = new MusicaDao();                
                       foreach($musicaDao->read() as $musica) :
                    ?>
                    <tr>
                        <td><?= $musica->getId()?></td>
                        <td><?= $musica->getNome()?></td>
                        <td><?= $musica->getGenero()?></td>
                        <td><?= $musica->getLetra()?></td>
                        <td>
                            <a href="../controller/MusicaController.php?del=<?= $musica->getId() ?>"></a>
                              
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Artista NOME</th>
                        <th scope="col">Musica NOME</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $publicacaoDao = new PublicacaoDao();
                        foreach($publicacaoDao->read() as $pub) : 
                    ?>
                    <tr>
                        <td><?= $pub->getId()?></td>
                        <td><?= $pub->getNomeartista()?></td>
                        <td><?= $pub->getNomeamusica()?></td>
                        <td>
                            <a href="../controller/PublicacaoController.php?del=<?= $pub->getId() ?>"></a>
                              
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <div class="col-12">
        <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Nome Artístico</th>
                        <th scope="col">Data de Nascimento</th>
                        <th scope="col">Biografia</th>
                        <th scope="col">Origem</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $artistaDao = new ArtistaDao();
                        foreach($artistaDao->read() as $art) : 
                    ?>
                    <tr>
                        <td><?= $art->getId()?></td>
                        <td><?= $art->getNome()?></td>
                        <td><?= $art->getNomeartistico()?></td>
                        <td><?= $art->getDatanascimento()?></td>
                        <td><?= $art->getBio()?></td>
                        <td><?= $art->getOrigem()?></td>
                        <td>
                            <a href="../controller/ArtistaController.php?del=<?= $art->getId() ?>"></a>
                              
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        </div>
</body>
</html>