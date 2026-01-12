<?php
session_start();
include "../model/animalVacinaBD.php";

if (!isset($_SESSION['idUser'])) {
    header('Location: login.php');
    exit;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idAnimal = intval($_POST['animal']);
    $idVacina = intval($_POST['vacina']);
    $dataAplicacao = $_POST['data'];

    if(vacinarAnimal($idAnimal, $idVacina, $dataAplicacao)) {
        echo "<script>
                alert('Vacinação registrada com sucesso!');
                window.location='../view/vacinarAnimal.php';
              </script>";
    } else {
        echo "<script>
                alert('Erro ao registrar vacinação!');
                window.location='../view/vacinarAnimal.php';
              </script>";
    }
}

?>
