<?php

include 'conexao.php';

function cadastrarAnimal($nmAnimal, $animalEspecie, $animalRaca, $animalCor, $nascAnimal, $animalSexo, $dtAnimalResgate, $situacaoAnimal, 
    $animalCastrado, $endResgate, $resgatePessoas, $descRemedio, $animalDesc, $dispAdocao, $idUser, $imagemNome = null, $dataSaida = null) {

    $sql = "INSERT INTO animal 
    (nomeAnimal, especieAnimal, racaAnimal, corAnimal, dtNasc, sexoAnimal, dtResgate, situacao, castrado,
     enderecoResgate, pessoalResgate, remedioDesc, animalDesc, disponivelAdoc, idUser, urlImagem, dataSaida) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($GLOBALS['conexao'], $sql);
    if (!$stmt) return false;

    // sequência de tipos corrigida:
    // s - string | i - inteiro
    mysqli_stmt_bind_param(
        $stmt,
        "ssssssssissssisss",
        $nmAnimal,          // s
        $animalEspecie,     // s
        $animalRaca,        // s
        $animalCor,         // s
        $nascAnimal,        // s
        $animalSexo,        // s
        $dtAnimalResgate,   // s
        $situacaoAnimal,    // s
        $animalCastrado,    // i (boolean tratado como inteiro)
        $endResgate,        // s
        $resgatePessoas,    // s
        $descRemedio,       // s
        $animalDesc,        // s
        $dispAdocao,        // i (boolean tratado como inteiro)
        $idUser,            // i
        $imagemNome,        // s
        $dataSaida          // s (pode ser null)
    );

    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    return $result;
}

// function cadastrarAnimal($nmAnimal, $animalEspecie, $animalRaca, $animalCor, $nascAnimal, $animalSexo, $dtAnimalResgate, $situacaoAnimal, 
//     $animalCastrado, $endResgate, $resgatePessoas, $descRemedio, $animalDesc, $dispAdocao, $idUser, $imagemNome = null, $dataSaida = null) {

//     $sql = "INSERT INTO animal 
//     (nomeAnimal, especieAnimal, racaAnimal, corAnimal, dtNasc, sexoAnimal, dtResgate, situacao, castrado,
//      enderecoResgate, pessoalResgate, remedioDesc, animalDesc, disponivelAdoc, idUser, urlImagem, dataSaida) 
//     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

//     $stmt = mysqli_prepare($GLOBALS['conexao'], $sql);
//     if (!$stmt) {
//         return false;
//     }

//     mysqli_stmt_bind_param($stmt, "ssssssssiissssiss",  
//         $nmAnimal, $animalEspecie, $animalRaca, $animalCor, $nascAnimal, $animalSexo,
//         $dtAnimalResgate, $situacaoAnimal, $animalCastrado, $endResgate, 
//         $resgatePessoas, $descRemedio, $animalDesc, $dispAdocao, $idUser, $imagemNome, $dataSaida
//     );

//     $result = mysqli_stmt_execute($stmt);
//     mysqli_stmt_close($stmt);

//     return $result;
// }




function animalDoenca($idAnimal, $idDoenca) {
    $sql = "INSERT INTO animal_vacina (idAnimal, idVacina) VALUES (?, ?)";
    $stmt = mysqli_prepare($GLOBALS['conexao'], $sql);
    if (!$stmt) return false;
    mysqli_stmt_bind_param($stmt, "ii", $idAnimal, $idDoenca);
    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $result;
}




//função para as espécies
function todasEspecies(){
    $query = "SELECT especieAnimal FROM animal";
    $consulta = mysqli_query($GLOBALS['conexao'], $query); 
    if (mysqli_num_rows($consulta) > 0) {
        return $consulta;
} else {
    return false;
}
}
//função para o nome do animal no select do formulário de adoção
function consultaAnimal(){
    $query = "SELECT nomeAnimal FROM animal";
    $consulta = mysqli_query($GLOBALS['conexao'], $query); 
    if (mysqli_num_rows($consulta) > 0) {
        return $consulta;
} else {
    return false;
}
}

// listar doenca
function listarDoenca() {
    $query = "SELECT idDoenca, nomeDoenca FROM doenca";
    $result = mysqli_query($GLOBALS['conexao'], $query);
    return $result;
}

//função de gatos para a tabela
function gatos() {
    $query = "SELECT 
                 idAnimal,
                 nomeAnimal,
                 sexoAnimal,
                 racaAnimal,
                 corAnimal,
                 situacao,
                 TIMESTAMPDIFF(YEAR, dtNasc, CURDATE()) AS idade,
                 CASE 
                     WHEN TIMESTAMPDIFF(YEAR, dtNasc, CURDATE()) < 1 THEN 'Filhote'
                     WHEN TIMESTAMPDIFF(YEAR, dtNasc, CURDATE()) BETWEEN 1 AND 7 THEN 'Adulto'
                     ELSE 'Idoso'
                 END AS fase
              FROM animal
              WHERE especieAnimal='felina'";

    $consulta = mysqli_query($GLOBALS['conexao'], $query);
    if (!$consulta) {
        die("Erro na query: " . mysqli_error($GLOBALS['conexao']));
    }
    return $consulta;
}
//função de cães para a tabela
function caes() {
    $query = "SELECT 
                 idAnimal,
                 nomeAnimal,
                 sexoAnimal,
                 racaAnimal,
                 corAnimal,
                 situacao,
                 TIMESTAMPDIFF(YEAR, dtNasc, CURDATE()) AS idade,
                 CASE 
                     WHEN TIMESTAMPDIFF(YEAR, dtNasc, CURDATE()) < 1 THEN 'Filhote'
                     WHEN TIMESTAMPDIFF(YEAR, dtNasc, CURDATE()) BETWEEN 1 AND 7 THEN 'Adulto'
                     ELSE 'Idoso'
                 END AS fase
              FROM animal
              WHERE especieAnimal='canina'";

    $consulta = mysqli_query($GLOBALS['conexao'], $query);
    if (!$consulta) {
        die("Erro na query: " . mysqli_error($GLOBALS['conexao']));
    }
    return $consulta;
}

//função buscar animal por ID para a ficha
function buscaAnimalPorId($id) {
    global $conexao;
    $sql = "SELECT 
                idAnimal,
                nomeAnimal,
                especieAnimal,
                racaAnimal,
                corAnimal,
                dtNasc,
                sexoAnimal,
                dtResgate,
                situacao,
                castrado,
                dataSaida,
                enderecoResgate,
                pessoalResgate,
                remedioDesc,
                urlImagem,
                animalDesc,
                disponivelAdoc,
                idUser,
                TIMESTAMPDIFF(YEAR, dtNasc, CURDATE()) AS idade,
                CASE 
                    WHEN TIMESTAMPDIFF(YEAR, dtNasc, CURDATE()) < 1 THEN 'Filhote'
                    WHEN TIMESTAMPDIFF(YEAR, dtNasc, CURDATE()) BETWEEN 1 AND 7 THEN 'Adulto'
                    ELSE 'Idoso'
                END AS fase
            FROM animal
            WHERE idAnimal = $id";
    return mysqli_query($conexao, $sql);
}


//função para excluir cão
function deletarCao($idAnimal) {
    $sql = "DELETE FROM animal WHERE idAnimal = ?";
    $stmt = mysqli_prepare($GLOBALS['conexao'], $sql);
    if (!$stmt) return false;

    mysqli_stmt_bind_param($stmt, "i", $idAnimal);
    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    return $result;
}

//função para excluir gato
function deletarGato($idAnimal) {
    $sql = "DELETE FROM animal WHERE idAnimal = ?";
    $stmt = mysqli_prepare($GLOBALS['conexao'], $sql);
    if (!$stmt) return false;

    mysqli_stmt_bind_param($stmt, "i", $idAnimal);
    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    return $result;
}

// função para atualizar
function buscarAnimalEdt($id) {
  include "../model/conexao.php"; // aqui já define $conexao
  global $conexao; // torna a variável acessível dentro da função

  $sql = "SELECT * FROM animal WHERE idAnimal = ?";
  $stmt = $conexao->prepare($sql);
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $resultado = $stmt->get_result();
  return $resultado->fetch_assoc();
}



?>



