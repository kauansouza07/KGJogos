<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página inicial</title>
    <link rel="stylesheet" href="style2.css">
    <script src="./script.js" defer></script>

    <?php
    // Inicia a sessão
    session_start();

    // Verifica se a variável de sessão existe e mostra o pop-up
    if (isset($_SESSION['item_adicionado']) && $_SESSION['item_adicionado']) {
        echo "<script>alert('Produto adicionado ao carrinho!');</script>";
        unset($_SESSION['item_adicionado']); // Limpa a variável de sessão após mostrar o pop-up
    }
    ?>
  
</head>
<body>
    <nav>
      <ul>
        <li class="home"><a href="#">Página Inicial</a></li>
        <li class="biblio"><a href="biblioteca.html">Biblioteca</a></li>
        <li class="carrinho"><a href="carrinho.php">Carrinho</a></li>
        <li class="sair">
            <a href="index.html">
                <img src="imagens/sair.png" alt="Botão para a página inicial">
            </a>
        </li>
    </ul>
    </nav>

    
    <div class="site-content">

      <a href="#rodape" class="destaque" id="destaque">DESTAQUES</a>

    <div class="container">
        <div class="card">
          <img class="background" src="imagens/01.webp" alt="">
  
          <div class="card-content">
            <div class="profile-image">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-gamepad-2">
                <path d="M17.32 5H6.68a4 4 0 0 0-3.978 3.59c-.006.052-.01.101-.017.152C2.604 9.416 2 14.456 2 16a3 3 0 0 0 3 3c1 0 1.5-.5 2-1l1.414-1.414A2 2 0 0 1 9.828 16h4.344a2 2 0 0 1 1.414.586L17 18c.5.5 1 1 2 1a3 3 0 0 0 3-3c0-1.545-.604-6.584-.685-7.258-.007-.05-.011-.1-.017-.151A4 4 0 0 0 17.32 5z" />
              </svg>
            </div>
  
            <h3 class="title">GTA 6</h3>
            <!-- Formulário escondido -->
        <form id="addToCartForm" action="add.php" method="POST" style="display: none;">
          <input type="hidden" name="nome" value="GTA">
        </form>

        <!-- Imagem que envia o formulário -->
        <img class="btn" src="imagens/add.png" alt="Adicionar ao Carrinho" onclick="document.getElementById('addToCartForm').submit();">
          </div>
          <div class="backdrop"></div>
        </div>
  
        <div class="card">
          <img class="background" src="imagens/02.jpg" alt="">
  
          <div class="card-content">
            <div class="profile-image">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-gamepad-2">
                <path d="M17.32 5H6.68a4 4 0 0 0-3.978 3.59c-.006.052-.01.101-.017.152C2.604 9.416 2 14.456 2 16a3 3 0 0 0 3 3c1 0 1.5-.5 2-1l1.414-1.414A2 2 0 0 1 9.828 16h4.344a2 2 0 0 1 1.414.586L17 18c.5.5 1 1 2 1a3 3 0 0 0 3-3c0-1.545-.604-6.584-.685-7.258-.007-.05-.011-.1-.017-.151A4 4 0 0 0 17.32 5z" />
              </svg>
            </div>
  
            <h3 class="title">Spider-Man PS5</h3>
            <!-- Formulário escondido -->
        <form id="addToCartForm1" action="add.php" method="POST" style="display: none;">
          <input type="hidden" name="nome" value="spider-man">
        </form>

        <!-- Imagem que envia o formulário -->
        <img class="btn" src="imagens/add.png" alt="Adicionar ao Carrinho" onclick="document.getElementById('addToCartForm1').submit();">
          </div>
          <div class="backdrop"></div>
        </div>
  
        <div class="card">
          <img class="background" src="imagens/03.jpg" alt="">
  
          <div class="card-content">
            <div class="profile-image">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-gamepad-2">
                <path d="M17.32 5H6.68a4 4 0 0 0-3.978 3.59c-.006.052-.01.101-.017.152C2.604 9.416 2 14.456 2 16a3 3 0 0 0 3 3c1 0 1.5-.5 2-1l1.414-1.414A2 2 0 0 1 9.828 16h4.344a2 2 0 0 1 1.414.586L17 18c.5.5 1 1 2 1a3 3 0 0 0 3-3c0-1.545-.604-6.584-.685-7.258-.007-.05-.011-.1-.017-.151A4 4 0 0 0 17.32 5z" />
              </svg>
            </div>
  
            <h3 class="title">God Of War</h3>
            <!-- Formulário escondido -->
        <form id="addToCartForm2" action="add.php" method="POST" style="display: none;">
          <input type="hidden" name="nome" value="god of war">
        </form>

        <!-- Imagem que envia o formulário -->
        <img class="btn" src="imagens/add.png" alt="Adicionar ao Carrinho" onclick="document.getElementById('addToCartForm2').submit();">
          </div>
          <div class="backdrop"></div>
        </div>
  
        <div class="card">
          <img class="background" src="imagens/04.jpg" alt="">
  
          <div class="card-content">
            <div class="profile-image">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-gamepad-2">
                <path d="M17.32 5H6.68a4 4 0 0 0-3.978 3.59c-.006.052-.01.101-.017.152C2.604 9.416 2 14.456 2 16a3 3 0 0 0 3 3c1 0 1.5-.5 2-1l1.414-1.414A2 2 0 0 1 9.828 16h4.344a2 2 0 0 1 1.414.586L17 18c.5.5 1 1 2 1a3 3 0 0 0 3-3c0-1.545-.604-6.584-.685-7.258-.007-.05-.011-.1-.017-.151A4 4 0 0 0 17.32 5z" />
              </svg>
            </div>
  
            <h3 class="title">The Last of Us</h3>
            <!-- Formulário escondido -->
        <form id="addToCartForm3" action="add.php" method="POST" style="display: none;">
          <input type="hidden" name="nome" value="the last of us">
        </form>

        <!-- Imagem que envia o formulário -->
        <img class="btn" src="imagens/add.png" alt="Adicionar ao Carrinho" onclick="document.getElementById('addToCartForm3').submit();">
          </div>
          <div class="backdrop"></div>
        </div>
  
        <div class="card">
          <img class="background" src="imagens/05.jpg" alt="">
  
          <div class="card-content">
            <div class="profile-image">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-gamepad-2">
                <path d="M17.32 5H6.68a4 4 0 0 0-3.978 3.59c-.006.052-.01.101-.017.152C2.604 9.416 2 14.456 2 16a3 3 0 0 0 3 3c1 0 1.5-.5 2-1l1.414-1.414A2 2 0 0 1 9.828 16h4.344a2 2 0 0 1 1.414.586L17 18c.5.5 1 1 2 1a3 3 0 0 0 3-3c0-1.545-.604-6.584-.685-7.258-.007-.05-.011-.1-.017-.151A4 4 0 0 0 17.32 5z" />
              </svg>
            </div>
  
            <h3 class="title">Elden Ring</h3>
           <!-- Formulário escondido -->
        <form id="addToCartForm4" action="add.php" method="POST" style="display: none;">
          <input type="hidden" name="nome" value="elden ring">
        </form>

        <!-- Imagem que envia o formulário -->
        <img class="btn" src="imagens/add.png" alt="Adicionar ao Carrinho" onclick="document.getElementById('addToCartForm4').submit();">
          </div>
          <div class="backdrop"></div>
        </div>
      </div>
    </div>
    <div id="rodape">
      <footer>
        <img src="imagens/desc1.png">
        <img src="imagens/desc.png">
        <img src="imagens/desc2.png">
        <img src="imagens/footer.png">
    </div>
      </footer>

</body>
</html>