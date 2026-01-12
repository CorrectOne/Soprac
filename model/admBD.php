<?php
include "conexao.php";

function login($usuario, $senha) {
    global $conexao;

    $usuario = mysqli_real_escape_string($conexao, $usuario);
    $senha_hash = hash('sha256', $senha);

    $sql = "SELECT * FROM administrador WHERE userNome='$usuario' AND senha='$senha_hash' LIMIT 1";

    $result = mysqli_query($conexao, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result); // retorna a linha inteira do usuário
    } else {
        return false;
    }
}
?>
