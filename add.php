<?php
// Inicia a sessão
session_start();

// Inclui o arquivo de conexão com o banco de dados
include_once 'conectar.php';

// Verifica se o id_usuario está na sessão
if (isset($_SESSION['id_usuario'])) {
    // Captura o id_usuario da sessão
    $id_usuario = $_SESSION['id_usuario'];

    // Verifica se o nome do jogo foi enviado via POST
    if (isset($_POST['nome'])) {
        $nome = $_POST['nome'];

        // Consulta SQL para buscar o id_jogo correspondente ao nome do jogo
        $sql_jogo = "SELECT id_jogo FROM jogos WHERE titulo = '" . mysqli_real_escape_string($conn, $nome) . "'";
        $result_jogo = $conn->query($sql_jogo);

        if ($result_jogo->num_rows > 0) {
            // Captura o id_jogo encontrado
            $row_jogo = $result_jogo->fetch_assoc();
            $id_jogo = $row_jogo['id_jogo'];

            // Consulta SQL para verificar se o jogo já está no carrinho
            $sql_checada = "SELECT * FROM cart WHERE id_usuario = '$id_usuario' AND id_jogo = '$id_jogo'";
            $result_checada = $conn->query($sql_checada);

            if ($result_checada->num_rows > 0) {
                // Jogo já está no carrinho
                header("Location: carrinho.php?erro=1");
                exit();
            } else {
                // Prepara a query para inserir na tabela cart
                $sql_insert = "INSERT INTO cart (id_usuario, id_jogo) VALUES ('$id_usuario', '$id_jogo')";
            
                // Executa a query de inserção
                if ($conn->query($sql_insert) === TRUE) {
                    // Redirecionar de volta para a página inicial
                    header('Location: biblioteca.html');
                    exit();
                } else {
                    echo "Erro ao inserir compra: " . $conn->error;
                }
            }
        } else {
            header("Location: carrinho.php?erro=2");
                exit();
        }
    } else {
        echo "Nome do jogo não enviado.";
    }
} else {
    // Caso o id_usuario não esteja na sessão, redireciona para o login
    header('Location: index.html');
    exit();
}

$conn->close();
?>
