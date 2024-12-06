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

        //Insere na variável $success uma mensagem confirmando a alteração dos dados
        $notif = 'success';
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/editar_conta.css" type="text/css">
        <link rel="stylesheet" href="css/notificaçao.css" type="text/css">
        <link rel="stylesheet" href="css/compartilhado.css" type="text/css">
        <title>Editar Conta | WikitalleS</title>
        <link
            href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap"
            rel="stylesheet"
        />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <!-- Link pros ícones das notificações -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
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
        <ul class="notifications"></ul>
        <div class="form-container">
            <h2>Editar Conta</h2>
            <?php

                //Essa variável serve para manipular o valor do input oculto. Por padrão ela guarda a string 'empty'
                $msg = 'empty';

                //Se a variável $notif existir, insere o valor dela em $msg
                if (isset($notif)) {
                    $msg = $notif;
                }

                //Esse campo de input não pode ser visto pelo usuário. Quando o update for concluído o valor dele muda, ativando a função de notificação
                echo "<div class='toastTrigger'>";
                    echo "<input type='hidden' class='hiddeninput' id='success' name='hiddencontainer' value='$msg'/>";
                echo "</div>";

                $nome = $_SESSION['nome'];
                $email = $_SESSION['email'];

                echo "<form action='editar_conta.php' method='POST'>";
                    echo "<label for='nome'>".'Nome de usuário:'."</label>";
                    echo "<input type='text' id='nome' name='nome' value='$nome' maxlength='25'>";
                    echo "<label for='email'>".'E-mail:'."</label>";
                    echo "<input type='email' id='email' name='email' value='$email' maxlength='50'>";
                    echo "<label for='senha'>".'Senha:'."</label>";
                    echo "<input type='password' id='senha' name='senha' placeholder='Se não quiser mudar basta repetir a senha' maxlength='100'>";
                    echo "<input type='submit' id='submit' name='submit' value='Salvar'>";
                echo "</form>";
            ?>
            <a href="index.php"><button type="button" id="criar-link">Voltar</button></a>
        </div>
        <!-- Importação do javascript -->
        <script src="./js/forms.js"></script>
    </body>
</html>