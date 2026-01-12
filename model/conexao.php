<?php

$servidor = "localhost"; //endereço local
$usuario = "root"; //usuario padrão
$senha = ""; //sem senha por padrão
$db = "soprac"; //nome do banco de dados

//função responsável por estabelecer a conexão
$conexao = mysqli_connect($servidor, $usuario, $senha, $db);

?>
