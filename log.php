<?php
session_start();
include_once 'conectar.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $email = $_POST["email"];
    $senha = $_POST["password"];

    // Consulta SQL para verificar se o email e a senha correspondem a um usuário no banco de dados
    $sql = "SELECT id_usuario FROM usuarios WHERE email = '$email' AND senha = '$senha'";
    $resultado = $conn->query($sql);

    

    if ($resultado->num_rows > 0) {
        $row = $resultado->fetch_assoc();
        $_SESSION['id_usuario'] = $row['id_usuario']; // Armazena o id_usuario na sessão

        header("Location: paginicial.php");
        exit();
    } else {
        // Login falhou
        header("Location: index.html?erro=1");
        exit();
    }

}
?>
