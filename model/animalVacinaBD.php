<?php
include 'conexao.php';

// pega todos os animais disponíveis
function listarAnimais() {
    $query = "SELECT idAnimal, nomeAnimal, especieAnimal FROM animal WHERE situacao='Vivendo na ONG'";
    $result = mysqli_query($GLOBALS['conexao'], $query);
    return $result;
}

// pega todas as vacinas
function listarVacinas() {
    $query = "SELECT idVacina, nomeVacina, especieVacinada FROM vacina";
    $result = mysqli_query($GLOBALS['conexao'], $query);
    return $result;
}

// registrar vacinação
function vacinarAnimal($idAnimal, $idVacina, $dataAplicacao) {
    $sql = "INSERT INTO animal_vacina (idAnimal, idVacina, dataAplicacao) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($GLOBALS['conexao'], $sql);
    if (!$stmt) return false;
    mysqli_stmt_bind_param($stmt, "iis", $idAnimal, $idVacina, $dataAplicacao);
    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $result;
}

//função buscar animal vacinado
// function buscaAnimalVacina($idAnimal) {
//     global $conexao;
//     $sql = "SELECT 
//                 av.idAnimal,
//                 av.idVacina,
//                 v.nomeVacina,
//                 av.dataAplicacao
//             FROM animal_vacina av
//             INNER JOIN vacina v ON av.idVacina = v.idVacina -- buscar nome da vacina por id
//             WHERE av.idAnimal = $idAnimal
//             ORDER BY av.dataAplicacao DESC";
//     return mysqli_query($conexao, $sql);
// }


?>
