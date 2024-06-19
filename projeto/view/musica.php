
<?php
include '../dao/ConnectionFactory.php';
include '../dao/MusicaDao.php';
include '../model/Musica.php';
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Música Projeto</title>
</head>
<body class="bg-danger-subtle">
<div class="container-fluid">
    <?php
    include 'listamenu.php';
    ?>
    <div class="row">
    <div class="col-2"></div>
        <div class="col-8">
        <form action="../controller/MusicaController.php" method="post">
            <div class="mb-3">
                <label class="form-label" for="nome">Música</label>
                <input class="form-control" type="text" name="nome" required>
            </div>
            <div>
            <label for="genero" class="form-label">Escolha um Gênero musical:</label>
            <select id="genero" name="genero" class="form-select">
            <option value="Rock">Rock</option>
            <option value="Pop">Pop</option>
            <option value="Country">Country</option>
            <option value="Kpop">K-pop</option>
            <option value="Electroswing">Electro Swing</option>
            <option value="Gospel">Gospel</option>
            <option value="Eletrônica">Eletrônica</option>
            <option value="Funk">Funk</option>
            <option value="Samba">Samba</option>
            <option value="Jazz">Jazz</option>
            <option value="Outro">Outro</option>
        </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="letra">Letra Musical</label>
                <textarea name="letra" id="letra" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="col-md-8 mb-3 d-grid gap-2 d-md-flex justify-content-md-end ">
                <a href="view/musica.php">
                    <button class="btn btn-dark" name="cadastrarMusica" type="submit">
                         Salvar
                    </button>
                </a>
            </div>
        </form>
        </div>
        <div class="col-2"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
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
                        <td><a href="../controller/MusicaController.php?del=<?= $musica->getId() ?>"><button class="btn btn-dark btn-sm" name="del" type="button">Excluir</button></a></td>
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