<?php
include '../Model/Aircraft.php';
include '../Include/AircraftValidate.php';

if ((!empty($_POST['txtNome'])) &&
    (!empty($_POST['txtMarca'])) &&
    (!empty($_POST['txtClass'])) &&
    (!empty($_POST['txtTipoMotor'])) &&
    (!empty($_POST['numberQtdPassageiros']))
) {
    $erros = array();

    if (!AircraftValidate::testarPassageiros($_POST['numberQtdPassageiros'])) {
        $erros[] = 'Número de passageiros inválido';
    }
    if (!AircraftValidate::testarTipoMotor($_POST['txtTipoMotor'])) {
        $erros[] = 'Tipo de motor inválido';
    }

    if (count($erros) == 0) {
        $aircraft = new Aircraft();

        $aircraft->nome = $_POST['txtNome'];
        $aircraft->marca = $_POST['txtMarca'];
        $aircraft->classe = $_POST['txtClasse'];
        $aircraft->tipoMotor = $_POST['txtTipoMotor'];
        $aircraft->qtdPassageiros = $_POST['numberQtdPassageiros'];

        header("Location:../View/Aircraft/Detail.php?"."nome=$aircraft->nome&"."marca=$aircraft->marca");
    } else {
        $err = serialize($erros);
        header("Location:../View/Aircraft/Error.php?erros=$err");
    }
} else {
    $erros = array();
    $erros[] = 'Informe todos os campos';
    $err = serialize($erros);
    header("Location:../View/Aircraft/Error.php?erros=$err");
}
