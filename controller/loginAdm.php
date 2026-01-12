<?php
session_start();
include "../model/admBD.php";

// $senha_hash = hash('sha256', $senha);
// echo "Usuário: $usuario<br>";
// echo "Senha: $senha<br>";
// echo "Hash: $senha_hash<br>";
// $row = login($usuario, $senha);
// var_dump($row);
// exit;


if (!isset($_POST['usuario'], $_POST['senha'])) {
    header('Location: ../view/login.php?erro=1');
    exit;
}

$usuario = trim($_POST['usuario']);
$senha   = $_POST['senha'];

$row = login($usuario, $senha); // retorna a linha do usuário ou false

if ($row) {
    // salva na sessão o nome e o id do usuário
    $_SESSION['usuario'] = $row['userNome']; 
    $_SESSION['idUser']  = $row['idUser'];

    header('Location: ../view/cadastrarAnimal.php'); 
    exit;
} else {
    header('Location: ../view/login.php?erro=1');
    exit;
}
?>
