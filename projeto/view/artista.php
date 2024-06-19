
<?php
    include '../dao/ConnectionFactory.php';
    include '../dao/ArtistaDao.php';
    include '../model/Artista.php';   
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
        <div class="row"></div>
            <?php
                include 'listamenu.php';
            ?>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
            
                <form action="../controller/ArtistaController.php" method="post">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" name="nome" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="nomeartistico" class="form-label">Nome Artístico</label>
                        <input type="text" name="nomeartistico" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="datanascimento" class="form-label">Data de Nascimento</label>
                        <input type="date" name="datanascimento" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="origem" class="form-label">Origem</label>
                        <input type="text" name="origem" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for=" biografia">Sobre Você</label>
                        <textarea name="biografia" id="biografia" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <input type="submit" name="cadastrar" value="Salvar" class="btn btn-dark">
                </form>
            </div>
            <div class="col-2"></div>
        </div>
        <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
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
                            <a href="../controller/ArtistaController.php?del=<?= $art->getId() ?>"><button class="btn btn-dark btn-sm" name="del" type="button">Excluir</button></a>
                              
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <div class="col-2"></div>
        </div>
    </div>
</body>
</html>