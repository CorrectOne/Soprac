<?php
session_start();
if (!isset($_SESSION['idUser'])) {
    header('Location: ../view/login.php');
    exit;
}

include "../model/animalBD.php"; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $idAnimal = (int) $_POST['idAnimal'];
    $nome = $_POST['nomeAnimal'];
    $especie = $_POST['especie'];
    $raca = $_POST['raca'];
    $cor = $_POST['cor'];
    $nascimento = $_POST['nascimento'];
    $sexo = $_POST['sexo'] ?? '';
    $resgate = $_POST['resgate'] ?? '';
    $situacao = $_POST['situacao'] ?? '';
    $castrado = (int) ($_POST['castrado'] ?? 0);
    
    $dataSaida = ''; 

    
    $bairro = $_POST['bairro'] ?? '';
    $resgatou = $_POST['resgatou'] ?? '';
    
    $remedios = $_POST['remedios'] ?? '';
    $adocaoDisponivel = (int) ($_POST['adocaoDisponivel'] ?? 0);
    $descricao = $_POST['descricao'] ?? '';

    $imagem = null;
    
    if (isset($_FILES['imagemAnimal']) && $_FILES['imagemAnimal']['error'] === UPLOAD_ERR_OK && !empty($_FILES['imagemAnimal']['name'])) {
        $nomeTemporario = $_FILES['imagemAnimal']['tmp_name'];
        $nomeFinal = "uploads/" . basename($_FILES['imagemAnimal']['name']);
        
        if (move_uploaded_file($nomeTemporario, "../" . $nomeFinal)) {
             $imagem = $nomeFinal;
        }
    }

    if ($imagem) {
        $sql = "UPDATE animal SET nomeAnimal=?, especieAnimal=?, racaAnimal=?, corAnimal=?, dtNasc=?, sexoAnimal=?, dtResgate=?, situacao=?, castrado=?, dataSaida=?, enderecoResgate=?, pessoalResgate=?, remedioDesc=?, animalDesc=?, disponivelAdoc=?, urlImagem=? WHERE idAnimal=?";
        
        $stmt = $conexao->prepare($sql);
        
        if ($stmt === FALSE) {
            die("ERRO FATAL NA PREPARAÇÃO (SQL com imagem): " . $conexao->error);
        }
        
        $stmt->bind_param(
            "sssssssiisssssisi", 
            $nome, $especie, $raca, $cor, $nascimento, $sexo, $resgate, $situacao, 
            $castrado, $dataSaida, $bairro, $resgatou, $remedios, $descricao, $adocaoDisponivel, $imagem, $idAnimal
        );

    } else {

        $sql = "UPDATE animal SET nomeAnimal=?, especieAnimal=?, racaAnimal=?, corAnimal=?, dtNasc=?, sexoAnimal=?, dtResgate=?, situacao=?, castrado=?, dataSaida=NULL, enderecoResgate=?, pessoalResgate=?, remedioDesc=?, animalDesc=?, disponivelAdoc=? WHERE idAnimal=?";
        
        $stmt = $conexao->prepare($sql);

        if ($stmt === FALSE) {
            die("ERRO FATAL NA PREPARAÇÃO (SQL sem imagem): " . $conexao->error);
        }

        $stmt->bind_param(
            "ssssssssissssii", 
            $nome, $especie, $raca, $cor, $nascimento, $sexo, $resgate, $situacao, 
            $castrado, $bairro, $resgatou, $remedios, $descricao, $adocaoDisponivel, $idAnimal 
        );
    }

    if ($stmt->execute()) {

        if (strcasecmp($especie, 'Felina') == 0) { 
            $redirectUrl = '../view/verGatos.php';
        } else { // Cães ou qualquer outro caso
            $redirectUrl = '../view/verCaes.php';
        }
        echo "<script type='text/javascript'>";
        echo "alert('O animal foi atualizado com sucesso!');";
        echo "window.location.href = '$redirectUrl';";
        echo "</script>";
        exit;

    } else {
        die("Erro ao atualizar animal: " . $stmt->error);
    }
} else {
    header('Location: ../view/verCaes.php'); 
    exit;
}
?>