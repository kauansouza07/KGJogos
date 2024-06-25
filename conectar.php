<?php

$usuario = 'root';
$senha = '';
$database = 'kgjogos';
$host = 'localhost';

$conn = new mysqli($host, $usuario, $senha, $database);

if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}
?>