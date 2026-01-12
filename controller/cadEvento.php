<?php
session_start();
include "../model/eventosBD.php";


// verifica se o usuario está logado
if (!isset($_SESSION['idUser'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idUser = $_SESSION['idUser'];

    $titulo = $_POST['titulo_evento'];
    $descricao = $_POST['descricao_evento'];
    $dataIn = $_POST['data_evento'];
    $dataExp = $_POST['data_expiracao'];

    if(cadastrarEvento($titulo, $descricao, $dataIn, $dataExp, $idUser)){
        echo "<script>
                alert('Evento cadastrado com sucesso!');
                window.location='../view/verEventos.php';
              </script>";
    } else {
        echo "<script>
                alert('Erro ao cadastrar evento!');
                window.location='../view/PublicarEventos.php';
              </script>";
    }
}


if (isset($_GET['idEvento'])) {
    $id = intval($_GET['idEvento']);

    if(deletarEvento($id)) {
        echo "<script>
                alert('Evento deletado com sucesso!');
                window.location='../view/verEventos.php';
              </script>";
    } else {
        echo "<script>
                alert('Erro ao deletar Evento!');
                window.location='../view/verEventos.php';
              </script>";
    }
}




?>
