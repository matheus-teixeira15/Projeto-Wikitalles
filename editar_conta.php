<?php

    session_start();
    require 'bd/conexao.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //Guarda os novos dados
        $new_nome = $_POST['nome'];
        $new_email = $_POST['email'];
        $new_senha = $_POST['senha'];

        //Usa criptografia na senha nova
        $senha_cripto = password_hash($new_senha, PASSWORD_DEFAULT);

        //Insire os novos dados no banco de dados
        $conn = conectaPDO();
        $stmt = $conn->prepare("UPDATE usuarios SET nome = :nome, email = :email, senha = :senha WHERE id = :id");
        $stmt->execute(['nome' => $new_nome, 'email' => $new_email, 'senha' => $senha_cripto, 'id' => $_SESSION['id']]);

        //Substitui os dados antigos pelos novos nas superglobais
        $_SESSION['nome'] = $new_nome;
        $_SESSION['email'] = $new_email;

        //Insere na variável $msg uma mensagem confirmando a alteração dos dados
        $msg = 'Seus dados foram alterados com sucesso';
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/editar_conta.css" type="text/css">
        <link rel="stylesheet" href="css/compartilhado.css" type="text/css">
        <title>Editar Conta | WikitalleS</title>
        <link
            href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap"
            rel="stylesheet"
        />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    </head>
    <body>
        <a href="index.php">
            <img
            class="header-logo"
            id="logo"
            src="./img/wikitalles.png"
            alt="Wikitalles logotipo"
            title="Wikitalles logotipo"
            />
        </a>
        <div class="editar-container">
            <h2>Editar Conta</h2>
            <?php

                //Exibe mensagem de confirmação
                if(isset($msg)){
                    echo "<span class='confmsg' style='color:green'>" . $msg . "</span>";
                }

                $nome = $_SESSION['nome'];
                $email = $_SESSION['email'];

                echo "<form action='editar_conta.php' method='POST'>";
                    echo "<label for='nome'>".'Nome de usuário:'."</label>";
                    echo "<input type='text' id='nome' name='nome' value='$nome'>";
                    echo "<label for='email'>".'E-mail:'."</label>";
                    echo "<input type='email' id='email' name='email' value='$email'>";
                    echo "<label for='senha'>".'Senha:'."</label>";
                    echo "<input type='password' id='senha' name='senha'>";
                    echo "<input type='submit' id='submit' name='submit' value='Salvar'>";
                echo "</form>";
            ?>
            <a href="index.php"><button type="button" id="criar-link">Voltar</button></a>
        </div>
    </body>
</html>