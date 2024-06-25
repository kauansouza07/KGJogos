<?php
include ('conectar.php');


$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$idade = $_POST['idade'];
$cpf = $_POST['cpf'];


    // Verificar se o email já está cadastrado
$sql_verificar_email = "SELECT * FROM usuarios WHERE email='$email'";
$result_verificar_email = $conn->query($sql_verificar_email);

if ($result_verificar_email->num_rows > 0) {
    header("Location: cadastro.html?erro=1");
        exit();
} else {
    // Query SQL para inserir os dados na tabela
    $sql = "INSERT INTO usuarios (nome, email, senha, idade, cpf) VALUES ('$nome', '$email', '$senha', $idade, '$cpf')";


    // Executa a query
    if ($conn->query($sql) === TRUE) {
        // Redireciona para a página index.html
        header('Location: sucesso.html');
        exit();
    } else {
        echo "Erro ao cadastrar o usuário: " . $conn->error;
    }
}

$conn->close();
?>

