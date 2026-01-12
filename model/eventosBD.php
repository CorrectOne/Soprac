<?php
include 'conexao.php';

// Função para listar eventos
function eventos() {
    $query = "SELECT idEvento, tituloEvento, dataIn, dataExp FROM evento";
    $consulta = mysqli_query($GLOBALS['conexao'], $query);

    if (!$consulta) {
        die("Erro na query: " . mysqli_error($GLOBALS['conexao']));
    }

    return $consulta;
}

// Função para cadastrar eventos 
function cadastrarEvento($titulo, $descricao, $dataIn, $dataExp, $idUser) {
    $sql = "INSERT INTO evento (tituloEvento, descEvento, dataIn, dataExp, idUser) 
            VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($GLOBALS['conexao'], $sql);
    if (!$stmt) {
        return false;
    }

    mysqli_stmt_bind_param($stmt, "ssssi", $titulo, $descricao, $dataIn, $dataExp, $idUser);
    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    return $result;
}


// Função para deletar Eventos 

function deletarEvento($idEvento) {
    $sql = "DELETE FROM evento WHERE idEvento = ?";
    $stmt = mysqli_prepare($GLOBALS['conexao'], $sql);
    if (!$stmt) return false;

    mysqli_stmt_bind_param($stmt, "i", $idEvento);
    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    return $result;
}


?>
