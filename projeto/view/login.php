<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Projeto</title>
</head>
<body class="bg-danger-subtle">
    <div class="container-fluid">
        <?php
        include 'listamenu.php';
        ?>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10 mt-3 ">
                <h3 class="text-center">LOGIN</h3>
                <form action="controller/LoginController.php" method="post">
                    <div class="col-md-5 p-2 mx-auto">
                        <label class="form-label" for="login">NOME</label>
                        <input class="form-control " name="login" type="text">
                    </div>
                    <div class="col-md-5 p-2 mx-auto">
                        <label class="form-label" for="senha">Senha</label>
                        <input class="form-control " name="senha" type="text">
                    </div>
                    <input type="submit" name="cadastrar" value="Cadastrar" class="btn btn-primary">
                    <input type="submit" name="validar" value="Logar" class="btn btn-primary">
                </form>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
</body>
</html>