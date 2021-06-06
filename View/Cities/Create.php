<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de cidades</title>

    <!-- FaviIcon -->
    <link rel="icon" type="imagem/png" href="../../Public/Images/icon.png" />

    <!-- Css -->
    <link rel="stylesheet" type="text/css" href="../../Public/Css/form.css">
    <link rel="stylesheet" type="text/css" href="../../Public/Css/error.css">
</head>

<!-- echo "<div class='messageError'>$errors[1]</div>"; -->

<body class="cities">
    <?php
    if (isset($_SESSION['usuario'])) { ?>
        <?php
        if (isset($_SESSION['erros'])) {
            $errors = $_SESSION['erros'];
        }
        ?>
        <div class="box">
            <form action="../../Controller/CitiesController.php?operation=cadastrar" method="post" name="form_user">
                <h1>Cadastro | Cidades</h1>
                <label class="principal">CEP:</label>
                <input required class="txtArea" type="number" name="numberCEP" id="numberCEP" placeholder="95360000">

                <?php
                if (isset($errors[1])) {
                    echo "<div class='messageError'>$errors[1]</div>";
                    unset($_SESSION['erros'][1]);
                }
                if (isset($errors[2])) {
                    echo "<div class='messageError'>$errors[2]</div>";
                    unset($_SESSION['erros'][2]);
                }
                ?>

                <label class="principal">Nome:</label>
                <input required class="txtArea" type="text" name="txtNome" id="txtNome" placeholder="Paraí">

                <label class="principal">Sigla Estado:</label>
                <input required class="txtArea" type="text" name="txtEstado" id="txtEstado" placeholder="RS">

                <?php
                if (isset($errors[0])) {
                    echo "<div class='messageError'>$errors[0]</div>";
                    unset($_SESSION['erros'][0]);
                }
                ?>

                <label class="principal">País:</label>
                <input required class="txtArea" type="text" name="txtPais" id="txtPais" placeholder="Brasil">

                <div class="btns">
                    <button class="btn-submit back" onclick="window.location.href = '../app.php'">Voltar para o início</button>
                    <input class="btn-submit success" type="submit" value="Cadastrar">
                </div>
        </div>
    <?php } else {
        header("Location:../app.php");
    } ?>
</body>

</html>