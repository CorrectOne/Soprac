<?php 
session_start();
include "../model/vacinaBD.php";

// verifica se o usuario está logado
if (!isset($_SESSION['idUser'])) {
    header('Location: login.php');
    exit;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idUser = $_SESSION['idUser'];

    $vacina = $_POST['nome_vacina'];
    $descricaoProtec = $_POST['descricao_protecao'];
    $frequencia = $_POST['frequencia_vacina'];
    $especie = $_POST['especie_afetada'];
    

    if(cadastrarVacina($vacina, $descricaoProtec, $frequencia, $especie, $idUser)){
        echo "<script>
                alert('Vacina cadastrada com sucesso!');
                window.location='../view/vacinasCadastradas.php';
              </script>";
    } else {
        echo "<script>
                alert('Erro ao cadastrar vacina!');
                window.location='../view/cadastrarVacina.php';
              </script>";
    }
}


if (isset($_GET['idVacina'])) {
    $id = intval($_GET['idVacina']);

    if(deletarVacina($id)) {
        echo "<script>
                alert('Vacina deletada com sucesso!');
                window.location='../view/vacinasCadastradas.php';
              </script>";
    } else {
        echo "<script>
                alert('Erro ao deletar Vacina!');
                window.location='../view/vacinasCadastradas.php';
              </script>";
    }
}





?>





