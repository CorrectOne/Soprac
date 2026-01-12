<?php
session_start();
session_destroy(); // destroi a sessão
header("Location:../view/login.php"); // redireciona para a página de login
exit;
?>