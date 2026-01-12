<?php
include "conexao.php";

//função para a tabela de doenças
function doencas() {
    $query = "SELECT 
                 idDoenca,
                 nomeDoenca,
                 sintomasDesc,
                 prevencao,
                 especieAfetada
              FROM doenca";

    $consulta = mysqli_query($GLOBALS['conexao'], $query);
    if (!$consulta) {
        die("Erro na query: " . mysqli_error($GLOBALS['conexao']));
    }
    return $consulta;
}

// função para cadastrar doencas 
function cadastrarDoenca($nmDoenca, $especie, $sintomaDoenca, $prev, $idUser) {
    $sql = "INSERT INTO doenca (nomeDoenca, especieAfetada , prevencao, sintomasDesc, idUser) 
            VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($GLOBALS['conexao'], $sql);
    if (!$stmt) {
        return false;
    }

    mysqli_stmt_bind_param($stmt, "ssssi", $nmDoenca, $especie, $sintomaDoenca, $prev, $idUser);
    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    return $result;
}


// função para deletar doencas 
function deletarDoenca($idDoenca) {
    $sql = "DELETE FROM doenca WHERE idDoenca = ?";
    $stmt = mysqli_prepare($GLOBALS['conexao'], $sql);
    if (!$stmt) return false;

    mysqli_stmt_bind_param($stmt, "i", $idDoenca);
    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    return $result;
}

?>
