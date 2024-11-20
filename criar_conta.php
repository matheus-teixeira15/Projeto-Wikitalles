<?php

    //Inicia uma sessão. Durante uma sessão os dados de um usuário são salvos para serem usados através de múltiplas páginas. Ela só acaba quando o site for fechado
    session_start();    

    //Estabelece conexão com o banco de dados "wikitalles"
    require "bd/conexao.php";

    //Verifica se o formulário usou o método POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        //Checa os dados inseridos (ou não) pelo usuário e os insere em novas variáveis
        $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $senha = isset($_POST['senha']) ? $_POST['senha'] : '';

        //A função password_hash criptografa senhas usando um algoritmo
        $senha_cripto = password_hash($senha, PASSWORD_DEFAULT);

        $conn = conectaPDO();
        $stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha_cripto);
        
        //Envia os valores para o banco de dados
        if ($stmt->execute()) {
            
            //Salva os dados do usuário em superglobais
            //lastInsertId pega o último ID inserido no banco de dados
            $_SESSION['id'] = $conn->lastInsertId();
            $_SESSION['nome'] = $nome;
            $_SESSION['email'] = $email;
            
            //Redireciona pra home
            header("location:index.php");
            exit();
        } 
        
        else {
            
            //Armazena uma mensagem de erro na variável $msg
            $msg = "<span style='color:red'>Ocorreu um erro. Tente novamente</span>";
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/criar_conta.css" type="text/css">
        <link rel="stylesheet" href="css/compartilhado.css" type="text/css">
        <title>Criar Conta | WikitalleS</title>
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
        <div class="criar-container">
            <h2>Criar conta</h2>
            <form action="criar_conta.php" method="POST">
                <?php

                    //Exibe mensagem de erro
                    if(isset($msg)){
                        echo "<span class='errormsg' style='color:red'>" . $msg . "</span>";
                    }
                ?>
                <label for="nome">Nome de usuário:</label>
                <input type="text" id="nome" name="nome" placeholder="Digite seu nome de usuário" required>
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" placeholder="Digite seu e-mail" required>
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
                <input type="submit" id="submit" name="submit" value="Criar conta">
            </form>
            <a href="login.php"><button type="button" id="login-link">Login</button></a>
        </div>
    </body>
</html>