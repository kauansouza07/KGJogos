<?php
// Inclui o arquivo de configuração do banco de dados e outras configurações gerais
include 'config.php';

// Inclui o arquivo da barra de navegação
include 'navbar.php';

// Verifica se o usuário está logado, se não estiver, redireciona para a página de login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Verifica se o método de requisição é POST e se a ação é para remover um item do carrinho
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['remove_from_cart'])) {
    // Obtém o ID do livro a ser removido
    $book_id = $_POST['book_id'];
    // Verifica se o livro está no carrinho e o remove
    if (isset($_SESSION['cart'][$book_id])) {
        unset($_SESSION['cart'][$book_id]);
    }
}

// Verifica se o método de requisição é POST e se a ação é para atualizar a quantidade de um item no carrinho
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_quantity'])) {
    // Obtém o ID do livro e a nova quantidade
    $book_id = $_POST['book_id'];
    $quantity = $_POST['quantity'];
    // Verifica se o livro está no carrinho
    if (isset($_SESSION['cart'][$book_id])) {
        // Se a nova quantidade for maior que 0, atualiza a quantidade no carrinho
        if ($quantity > 0) {
            $_SESSION['cart'][$book_id] = $quantity;
        } else {
            // Se a nova quantidade for 0 ou menor, remove o livro do carrinho
            unset($_SESSION['cart'][$book_id]);
        }
    }
}

// Inicializa um array para armazenar os livros do carrinho
$cart_books = array();

// Verifica se há itens no carrinho
if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    // Obtém os IDs dos livros no carrinho
    $cart_ids = implode(',', array_keys($_SESSION['cart']));
    // Consulta o banco de dados para obter os detalhes dos livros no carrinho
    $result = $conn->query("SELECT * FROM books WHERE id IN ($cart_ids)");
    // Armazena os detalhes dos livros em um array
    while ($row = $result->fetch_assoc()) {
        $cart_books[] = $row;
    }
}
?>


<body>
    <!-- Container principal do carrinho -->
    <div class="cart-container">
        <h2>Meu Carrinho</h2>
        
        <!-- Verifica se há livros no carrinho -->
        <?php if (count($cart_books) > 0): ?>
            <!-- Itera sobre cada livro no carrinho -->
            <?php foreach ($cart_books as $book): ?>
                <div class="cart-item">
                    <!-- Exibe a imagem do livro -->
                    <img src="<?php echo $book['image_path']; ?>" alt="<?php echo $book['title']; ?>">
                    <div class="cart-item-info">
                        <!-- Exibe o título do livro -->
                        <h3><?php echo $book['title']; ?></h3>
                        <!-- Exibe o autor do livro -->
                        <p>Autor: <?php echo $book['author']; ?></p>
                        <!-- Exibe o gênero do livro -->
                        <p>Gênero: <?php echo $book['genre']; ?></p>
                        <!-- Exibe o preço do livro -->
                        <div class="dest-price">
                            <h4>
                                <p>R$<?php echo $book['price']; ?></p>
                            </h4>
                        </div>
                        <!-- Formulário para atualizar a quantidade ou remover o livro do carrinho -->
                        <form method="post" action="cart.php">
                            <!-- Campo oculto com o ID do livro -->
                            <input type="hidden" name="book_id" value="<?php echo $book['id']; ?>">
                            <!-- Campo para atualizar a quantidade do livro -->
                            <input type="number" name="quantity" value="<?php echo $_SESSION['cart'][$book['id']]; ?>" min="1">
                            <!-- Botão para confirmar a atualização da quantidade -->
                            <button type="submit" name="update_quantity">
                                <i class="fa-solid fa-check"></i>
                            </button>
                            <!-- Botão para remover o livro do carrinho -->
                            <button type="submit" name="remove_from_cart">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
            <!-- Seção de finalização da compra e escolha de mais produtos -->
            <div class="checkout">
                <a href="produtos.php" class="btn-products">Escolher produtos</a>
                <a href="checkout.php" class="checkout-btn">Finalizar Compra</a>
            </div>
        <?php else: ?>
            <!-- Mensagem exibida quando o carrinho está vazio -->
            <div class="empty-cart">
                <i class="fa-solid fa-bag-shopping"></i>
                <p class="description">
                    <span>Ops! Sua bolsa está vazia.</span><br>
                    Para inserir produtos no seu carrinho, clique no botão "Escolher mais produtos" e navegue pelo site.
                </p>
                <!-- Botão para escolher mais produtos -->
                <a href="produtos.php" class="btn-choose-products">Escolher produtos</a>
            </div>
        <?php endif; ?>
    </div>
</body>