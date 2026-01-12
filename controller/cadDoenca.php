<?php
session_start();
include "../model/doencaBD.php";

// verifica se o usuario está logado
if (!isset($_SESSION['idUser'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // RECEBE OS DADOS DO FORMULÁRIO
    $nmDoenca = $_POST['nome_doenca'];
    $especie = $_POST['especieAfetada'];
    $sintomaDoenca = $_POST['sintoma_doenca'];
    $prev = $_POST['prevencao'];

    // PEGA O ID DO ADMIN LOGADO
    $idUser = $_SESSION['idUser'];

    // CHAMA A FUNÇÃO DE CADASTRO
    if(cadastrarDoenca($nmDoenca, $especie, $sintomaDoenca, $prev, $idUser)){
        echo "<script type='text/javascript'>
                alert('Registro de doença realizado com sucesso!'); 
                window.location='../view/doencasCadastradas.php';
              </script>";
    } else {
        echo "<script type='text/javascript'>
                alert('Erro ao registrar doença!'); 
                window.location='../view/cadastroDoenca.php';
              </script>";
    }
}


if (isset($_GET['idDoenca'])) {
    $id = intval($_GET['idDoenca']);

    if(deletarDoenca($id)) {
        echo "<script>
                alert('Doença deletada com sucesso!');
                window.location='../view/doencasCadastradas.php';
              </script>";
    } else {
        echo "<script>
                alert('Erro ao deletar doença!');
                window.location='../view/doencasCadastradas.php';
              </script>";
    }
}



?>
