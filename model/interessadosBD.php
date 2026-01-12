<?php
include 'conexao.php';

function interessados() {
    $query = "SELECT 
                 idDoenca,
                 nomeCandidato,
                 email,
                 celular,
                 especieAfetada
              FROM doenca";

    $consulta = mysqli_query($GLOBALS['conexao'], $query);
    if (!$consulta) {
        die("Erro na query: " . mysqli_error($GLOBALS['conexao']));
    }
    return $consulta;
}


function deletarInteressado($idCandidato) {
    $sql = "DELETE FROM candidato WHERE idCandidato = ?";
    $stmt = mysqli_prepare($GLOBALS['conexao'], $sql);
    if (!$stmt) return false;

    mysqli_stmt_bind_param($stmt, "i", $idCandidato);
    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    return $result;
}
?>