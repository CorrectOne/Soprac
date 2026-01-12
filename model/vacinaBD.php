<?php
include 'conexao.php';

//função para tabela de vacinas
function vacinas() {
    $query = "SELECT 
                idVacina,
                nomeVacina,
                prevencaoVacina,
                frequenciaMeses,
                especieVacinada
              FROM vacina";

    $consulta = mysqli_query($GLOBALS['conexao'], $query);
    if (!$consulta) {
        die("Erro na query: " . mysqli_error($GLOBALS['conexao']));
    }
    return $consulta;
}

// função para cadastrar vacinas 
function cadastrarVacina($vacina, $descricaoProtec, $frequencia, $especie, $idUser) {
    $sql = "INSERT INTO vacina (nomeVacina, prevencaoVacina, frequenciaMeses, especieVacinada, idUser) 
            VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($GLOBALS['conexao'], $sql);
    if (!$stmt) {
        return false;
    }

    mysqli_stmt_bind_param($stmt, "ssssi", $vacina, $descricaoProtec, $frequencia, $especie, $idUser);
    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    return $result;
}

// função para deletar vacinas 
function deletarVacina($idVacina) {
    $sql = "DELETE FROM vacina WHERE idVacina = ?";
    $stmt = mysqli_prepare($GLOBALS['conexao'], $sql);
    if (!$stmt) return false;

    mysqli_stmt_bind_param($stmt, "i", $idVacina);
    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    return $result;
}

?>