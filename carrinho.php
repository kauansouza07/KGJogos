<?php
// Inicia a sessão
session_start();

// Inclui o arquivo de conexão com o banco de dados
include_once 'conectar.php';

// Verifica se o id_usuario está na sessão
if (isset($_SESSION['id_usuario'])) {
    // Captura o id_usuario da sessão
    $id_usuario = $_SESSION['id_usuario'];
} else {
    // Caso o id_usuario não esteja na sessão, redireciona para o login
    header('Location: index.html');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <link rel="stylesheet" href="style5.css">

    <script>
        window.onload = function() {
            // Verifica se há um erro na URL
            var urlParams = new URLSearchParams(window.location.search);
            var erro = urlParams.get('erro');

            // Se houver erro, exibe a mensagem de erro
            if (erro == 1) {
                // Seleciona o elemento de mensagem de erro
                var erroMsg = document.getElementById("erroMsg");
                // Exibe a mensagem de erro
                erroMsg.style.display = "block";
            }

            if (erro == 2) {
                // Seleciona o elemento de mensagem de erro
                var erroMsg = document.getElementById("erroMsg2");
                // Exibe a mensagem de erro
                erroMsg.style.display = "block";
            }
            
        };
    </script>

</head>

<body>
    <div class="header"></div>
    <header>
        <nav>
            <ul>
                <li class="home"><a href="paginicial.php">Página Inicial</a></li>
                <li class="biblio"><a href="biblioteca.html">Biblioteca</a></li>
                <li class="carrinho"><a href="carrinho.php">Carrinho</a></li>
                <li class="sair">
                    <a href="index.html">
                        <img src="imagens/sair.png" alt="Botão para a página inicial">
                    </a>
                </li>
            </ul>
        </nav>
    </header>

    <div class="page">
        <div class="container-wrapper">
            <main class="container">

                <div class="header2">
                    <h1>Carrinho de Compras</h1>
                </div>

                <div class="content">
                    <div class="products">
                        <h2>Produtos</h2>
                        <table>
                            <thead>
                                <tr>
                                    <th>Produto</th>
                                    <th>Preço</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                // Consulta SQL para obter os jogos no carrinho do usuário
                                $sql = "SELECT id_jogo FROM cart WHERE id_usuario = '$id_usuario'";
                                $resultado = mysqli_query($conn, $sql);
                                
                                // Verifica se a consulta foi bem-sucedida
                                if ($resultado) {
                                    // Verifica se há resultados retornados
                                    if (mysqli_num_rows($resultado) > 0) {
                                        while ($row = mysqli_fetch_assoc($resultado)) {
                                            $id_jogo = $row['id_jogo'];
                                            
                                            // Consulta para obter os detalhes do jogo
                                            $sql_jogo = "SELECT titulo, valor FROM jogos WHERE id_jogo = $id_jogo";
                                            $resultado_jogo = mysqli_query($conn, $sql_jogo);
                                            
                                            if ($resultado_jogo && mysqli_num_rows($resultado_jogo) > 0) {
                                                $row_jogo = mysqli_fetch_assoc($resultado_jogo);
                                                echo "<tr>";
                                                echo "<td>" . $row_jogo['titulo'] . "</td>";
                                                echo "<td>R$" . number_format($row_jogo['valor'], 2, ',', '.') . "</td>";
                                                echo "</tr>";
                                            } else {
                                                echo "<tr>";
                                                echo "<td>Produto não encontrado</td>";
                                                echo "<td>-</td>";
                                                echo "</tr>";
                                            }
                                        }
                                    } else {
                                        echo "<tr>";
                                        echo "<td colspan='2'>Nenhum jogo encontrado no carrinho.</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    // Se houver erro na consulta
                                    echo "<tr>";
                                    echo "<td colspan='2'>Erro na consulta: " . mysqli_error($conn) . "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                            <p id="erroMsg" style="color: red; display: none;">O Jogo já está no seu carrinho! Veja mais jogos na BIBLIOTECA.</p>
                            <p id="erroMsg2" style="color: red; display: none;">O Jogo não está no estoque. Estamos trabalhando nisso!</p>
                        </table>
                    </div>

                    <div class="total">
                        <h2>Total</h2>
                        <table>
                            <tbody>
                                <tr class="total">
                                    <td colspan="3">Total</td>
                                    <td>
                                        <?php
                                        // Consulta SQL para calcular o total da compra
                                        $sql_total = "SELECT SUM(j.valor) AS total FROM cart c
                                                      INNER JOIN jogos j ON c.id_jogo = j.id_jogo
                                                      WHERE c.id_usuario = '$id_usuario'";
                                        $resultado_total = mysqli_query($conn, $sql_total);
                                        
                                        if ($resultado_total && mysqli_num_rows($resultado_total) > 0) {
                                            $row_total = mysqli_fetch_assoc($resultado_total);
                                            echo "R$" . number_format($row_total['total'], 2, ',', '.');
                                        } else {
                                            echo "R$ 0,00";
                                        }
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                            
                        </table>
                        <a href="compra.html" class="btn">Finalizar Compra</a>
                    </div>
                </div>

            </main>
        </div>
    </div>

    <footer>
        <!-- Rodapé -->
    </footer>

</body>
</html>

