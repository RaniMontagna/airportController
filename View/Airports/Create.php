<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de aeroportos</title>

    <!-- FaviIcon -->
    <link rel="icon" type="imagem/png" href="../../Public/Images/icon.png" />

    <!-- Css -->
    <link rel="stylesheet" type="text/css" href="../../Public/Css/form.css">
</head>

<body class="airport">
    <?php
    if (isset($_SESSION['usuario'])) { ?>
        <div class="box">
            <form action="../../Controller/AirportsController.php?operation=cadastrar" method="post" name="form_user">
                <h1>Cadastro | Aeroportos</h1>
                <label class="principal">Nome:</label>
                <input required class="txtArea" type="text" name="txtNome" id="txtNome" placeholder="Aeroporto Internacional de Garulhos">

                <label class="principal">Porte:</label>
                <input required class="txtArea" type="text" name="txtPorte" id="txtPorte" placeholder="Medio">

                <label class="principal">Distância(Km):</label>
                <input required class="txtArea" type="number" name="numberDistancia" id="numberDistancia" placeholder="1257">

                <label class="principal">CEP:</label>
                <input required class="txtArea" type="number" name="numberCep" id="numberCep" placeholder="07190972">

                <div class="btns">
                    <input class="btn-black" type="submit" value="Cadastrar">
                    <input class="btn-black" type="reset" value="Limpar">
                </div>
            </form>
            <button class="btn-back" onclick="window.location.href = '../app.php'">Voltar para o início</button>
        </div>
    <?php } else {
        header("Location:../app.php");
    } ?>
</body>

</html>