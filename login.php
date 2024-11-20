<?php

    //Inicia uma sessão. Durante uma sessão os dados de um usuário são salvos para serem usados através de múltiplas páginas. Ela só acaba quando o site for fechado
    session_start();
    
    //Estabelece conexão com o banco de dados "wikitalles"
    require_once "bd/conexao.php";

    //Verifica se o formulário usou o método POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        //Checa os dados enviados (ou não) pelo usuário e os insere em novas variáveis. Para isso é usado o operador ternário, que é apenas uma abreviação da estrutura if/else
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $senha = isset($_POST['senha']) ? $_POST['senha'] : '';

        //Conecta com o banco de dados
        $conn = conectaPDO();
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        //A função password_verify compara o valor de $senha com a senha armazenada no BD e retorna true ou false
        if ($usuario && password_verify($senha, $usuario['senha'])) {

            //True: cria variáveis de sessão e redireciona pra homepage. A variável $_SESSION['usuario'] armazena o nome do usuário para exibí-lo no menu de navegação
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['email'] = $usuario['email'];
            header("location:index.php");
            exit();
        } 

        else {

            //False: exibe uma mensagem de erro para o usuário alertando que o e-mail ou a senha estão errados
            $msg = 'E-mail ou senha incorretos. Tente novamente';
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/login.css" type="text/css">
        <link rel="stylesheet" href="css/compartilhado.css" type="text/css">
        <title>Login | WikitalleS</title>
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
        <div class="login-container">
            <h2>Login</h2>
            <form action="login.php" method="POST">
                <?php 
                
                    //Exibe mensagem de erro
                    if(isset($msg)){
                        echo "<span class='errormsg' style='color:red'>" . $msg . "</span>";
                    }
                ?>
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" placeholder="Digite seu e-mail" required>
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
                <input type="submit" id="submit" name="submit" value="Entrar">
            </form>
            <a href="criar_conta.php"><button type="button" id="criar-link">Criar conta</button></a>
        </div>
    </body>
</html>