<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mostrasenha</title>
    </head>
    
    <style>

@import url('https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap');
@import url("https://fonts.googleapis.com/css2?family=Inter:wght@400;500&display=swap");
@font-face {
    font-family: 'ND';
    src: url('fontes/NDR.ttf');
}

body {
    font-family: Inter, sans-serif;
    font-weight: 800;
    margin: 0;
    padding: 0;
    color: #545454;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-image: url(imagens/mostra.png);
    background-size: cover;
}

.page {
    width: 100%;
    max-width: 800px; /* Defina um valor máximo para o conteúdo centralizado */
}

.fraseLogin {
    font-family: Inter, sans-serif;
    display: flex;
    flex-direction: column; /* Altera a direção do flex para coluna */
    color: #ffffff;
    align-items: center;
    text-align: center; /* Centraliza o conteúdo horizontalmente */
    font-size: 32px;
    font-weight: bold;
}

.formLogin {
    background-color: rgba(0, 0, 0, 0.65);
    border-radius: 5px;
    padding: 50px;
    box-shadow: 10px 10px 40px rgba(0, 0, 0, 0.4);
    margin-top: 100px;
}

.formLogin p {
    font-size: 32px;
    color: #ffffff;
    margin-bottom: 25px;
    font-weight: bold;
}

.formLogin a {
    display: inline-block;
    font-size: 32px;
    color: #38B6FF;
    text-decoration: none;
    font-weight: bold;
    transition: all 0.3s ease;
}

.formLogin a:hover {
    color: #38B6FF;
    transform: scale(1.1);
}

#butinho{
    margin:auto;
    text-decoration: none;
    color:#38B6FF;
    font-weight: bold;
}

#butinho:hover {
    transform: scale(1.1);
    
}

    </style>


<body>
<div class="page">
    <?php
    include ('conectar.php');

    $cpf = $_POST['cpf'];

    $sql_verificar_CPF = "SELECT * FROM usuarios WHERE cpf='$cpf'";
    $result_verificar_CPF = $conn->query($sql_verificar_CPF);

    ?>
    <div class="formLogin">
        <div class="fraseLogin">
            <?php
            if ($result_verificar_CPF->num_rows < 1) {
                header("Location: rec.html?erro=1");
                exit();
            } else {
                $sql = "SELECT senha FROM usuarios WHERE cpf='$cpf'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo "<p>A sua senha é: " . $row['senha'] . "</p>";
                } else {
                    echo "Erro ao recuperar senha: " . $conn->error;
                }
            }

            $conn->close();
            ?>
            <a href="index.html" class="butinho" id="butinho">LOGAR-SE</a>
        </div>
    </div>
</div>


