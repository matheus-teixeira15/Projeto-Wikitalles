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

            //False: cria a variável $notif. Ela vai ser inserida na $msg pra ativar a função da notificação de erro
            $notif = 'error';
        }
    }
?>
  
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/login.css" type="text/css">
        <link rel="stylesheet" href="css/notificaçao.css" type="text/css">
        <link rel="stylesheet" href="css/compartilhado.css" type="text/css">
        <title>Login | WikitalleS</title>
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
            <h2>Login</h2>
            <form action="login.php" method="POST">
                <?php 

                    //Essa variável serve para manipular o valor do input oculto. Por padrão ela guarda a string 'empty'
                    $msg = 'empty';

                    //Se a variável $notif existir, insere o valor dela em $msg
                    if (isset($notif)) {
                        $msg = $notif;
                    }
                    
                    //Esse campo de input não pode ser visto pelo usuário. Quando dá erro no login o valor dele muda, ativando a função de notificação
                    echo "<div class='toastTrigger'>";
                        echo "<input type='hidden' class='hiddeninput' id='error' name='hiddencontainer' value='$msg'/>";
                    echo "</div>";
                ?>
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" placeholder="Digite seu e-mail" required>
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
                <input type="submit" id="submit" name="submit" value="Entrar">
            </form>
            <a href="criar_conta.php"><button type="button" id="criar-link">Criar conta</button></a>
        </div>
        <!-- Importação do javascript -->
        <script src="./js/forms.js"></script>
    </body>
</html>