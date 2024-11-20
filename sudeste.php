<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sudeste | WikitalleS</title>
    <link href="./css/lendas.css" rel="stylesheet" type="text/css" />
    <link href="./css/reset.css" rel="stylesheet" type="text/css" />
    <link href="./css/compartilhado.css" rel="stylesheet" type="text/css" />
    <link 
      rel="stylesheet" 
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=account_circle" 
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
  </head>
  <header class="header container">
        <div class="mobile-menu">
            <!-- O que é esse onClick? Quando clicar nesse elemento HTML ele vai executar essa função javascript -->
            <div onclick="menuMobile()" class="menu-btn">
              <div class="btn-line"></div>
              <div class="btn-line"></div>
              <div class="btn-line"></div>
            </div>
            <h1 class="mobile-logo">
              <a href="index.php">
                <img
                  class="header-logo"
                  src="./img/wikitalles.png"
                  alt="Wikitalles logotipo"
                  title="Wikitalles logotipo"
                />
              </a>
            </h1>
            <span id="mobile-account">
              <?php
                if (isset($_SESSION['nome'])){
                  echo "<div class='dropdown'>";
                    echo "<span onclick='functionDropdownMobile()' class='material-symbols-outlined dropbtn'>".'account_circle'."</span>";
                    echo "<div id='menu_dropdownMobile' class='dropdown-conteudo'>";
                      echo "<p>".$_SESSION['email']."</p>";
                      echo "<a href='editar_conta.php'>"."Editar conta"."</a>";
                      echo "<a href='logout.php'>"."Sair"."</a>";
                    echo "</div>";
                  echo "</div>";
                }
                else {
                  echo "<a href='login.php'>";
                    echo "<span class='material-symbols-outlined dropbtn'>".'account_circle'."</span>";
                  echo "</a>";
                }                  
              ?>
            </span> 
        </div>
        <nav class="header-navegacao">
            <h1>
              <a href="index.php">
                <img
                  class="logo-item"
                  src="./img/wikitalles.png"
                  alt="Wikitalles logotipo"
                  title="Wikitalles logotipo"
                />
              </a>
            </h1>
            <ul class="header-lista-links">
              <li onclick="menuMobile()">
                  <!-- A é para criar um link -->
                  <a class="header-link" href="index.php#mapa">Mapa</a>
              </li>
              <li onclick="menuMobile()">
                  <!-- Efeito CSS feito pelo chat gpt: Pedi para ele fazer um efeito ao passar o mouse em cima -->
                  <a class="header-link" href="index.php#importancia">Importância</a>
              </li>
              
              <li onclick="menuMobile()">
                  <a class="header-link" href="index.php#indicar">Indicar</a>
              </li>
              <li onclick="menuMobile()">
                  <a class="header-link" href="index.php#time">Time</a>
              </li>
            </ul>
            <span class='header-link' id="account">
              <?php
                  if (isset($_SESSION['nome'])){
                    echo "<div class='dropdown'>";
                      echo "<p onclick='functionDropdown()' class='dropbtn' id='account-text'>".$_SESSION['nome']."</p>";
                      echo "<div id='menu_dropdown' class='dropdown-conteudo'>";
                        echo "<p>".$_SESSION['email']."</p>";
                        echo "<a href='editar_conta.php'>"."Editar conta"."</a>";
                        echo "<a href='logout.php'>"."Sair"."</a>";
                      echo "</div>";
                    echo "</div>";
                  }
                  else{
                      echo "<a href='login.php' class='dropbtn' id='account-text'>Entrar</a>";
                  }
              ?>
            </span>
        </nav>
    </header>
    <main>
      <section class="container titulo">
        <div>
          <img class="titulo-img" src="./img/nordeste/mapa.png" alt="" />
          <div class="titulo-textos">
            <h2 class="titulo-sessao">Sudeste</h2>
            <h3 class="titulos-importancia">Escolha a sua lenda</h3>
          </div>
        </div>
      </section>
      <section class="container">
        <div class="carrousel-cartas">
          <div class="swiper swiper-cartas">
            <ul class="swiper-wrapper">
              <!-- Ao clicar chame a função escolherCarta -->
              <li onclick="escolherCarta(0)" class="slide swiper-slide">
                <img class="carta" src="./img/sudeste/carta/missa.png" alt="" />
              </li>
              <li onclick="escolherCarta(1)" class="slide swiper-slide">
                <div>
                  <img class="carta" src="./img/sudeste/carta/mae.png" alt="" />
                </div>
              </li>
              <li onclick="escolherCarta(2)" class="slide swiper-slide">
                <img
                  class="carta"
                  src="./img/sudeste/carta/amorosa.png"
                  alt=""
                />
              </li>
              <li onclick="escolherCarta(3)" class="slide swiper-slide">
                <img
                  class="carta"
                  src="./img/sudeste/carta/chibamba.png"
                  alt=""
                />
              </li>
              <li onclick="escolherCarta(4)" class="slide swiper-slide">
                <img
                  class="carta"
                  src="./img/sudeste/carta/procissao.png"
                  alt=""
                />
              </li>
            </ul>
          </div>
          <div class="swiper-setas">
            <div class="swiper-button-prev">
              <img src="./img/icon-prev.png" alt="Seta para a esquerda" />
            </div>
            <div class="swiper-button-next">
              <img src="./img/icon-next.png" alt="Seta para a direita" />
            </div>
          </div>
        </div>
      </section>
      <section class="swiper swiper-lendas">
        <ul class="swiper-wrapper">
          <li class="swiper-slide slide">
            <div class="container lendas">
              <h2 class="titulo-sessao">A Missa dos Mortos</h2>
              <div class="detalhes">
                <img
                  class="detalhes-img"
                  src="./img/sudeste/detalhe/missa.png"
                  alt=""
                />
                <div class="detalhes-textos">
                  <div>
                    <p>
                      Por volta de 1900, na cidade de Ouro Preto (Minas Gerais),
                      João Leite era um zelador e sacristão da Igreja de Nossa
                      Senhora das Mercês de Cima. Uma noite, quando já estava em
                      sua cama, João escutou sons vindo da igreja. Acreditando
                      que fossem ladrões, o zelador decidiu ir à igreja.
                      Entretanto, quando chegou lá, encontrou apenas um grupo de
                      fiéis e um padre preparando-se para celebrar a missa. O
                      que mais chamou a atenção de João, além do horário incomum
                      e do ar frio que tomava conta do local, foi o modo como os
                      fiéis se vestiam: roupas escuras, com um capuz ocultando
                      seus rostos.
                    </p>
                    <p>
                      Na época as missas ainda eram celebradas com o padre de
                      costas para os fiéis, com o latim sendo o único idioma
                      utilizado. Quando o padre voltou-se aos fiéis para dizer
                      <i>Dominus vobiscum</i>
                      (“O Senhor esteja convosco” em latim), João percebeu que o
                      rosto dele, assim como de o de todos que participavam da
                      missa, era uma caveira. Assustado, o zelador foi embora
                      correndo e, voltando para o seu quarto, viu que a porta
                      que levava ao cemitério da igreja estava aberta.
                    </p>
                  </div>
                  <ul class="caracteristicas">
                    <li>
                      <h3 class="titulos-importancia">Protagonista</h3>
                      <p>
                        João Leite era zelador na Igreja de Nossa Senhora das
                        Mercês de Cima, dedicada a uma designação da Virgem
                        Maria que protege os cativos e escravizados.
                      </p>
                    </li>
                    <li>
                      <h3 class="titulos-importancia">Missa</h3>
                      <p>
                        No meio da noite, João encontrou um grupo de pessoas
                        celebrando uma missa na igreja. Para a surpresa dele,
                        porém, todas elas eram esqueletos.
                      </p>
                    </li>
                    <li>
                      <h3 class="titulos-importancia">Presságio</h3>
                      <p>
                        Para alguns, a Missa dos Mortos é um sinal de que alguém
                        morrerá em breve. Para outros, porém, a Missa é um sinal
                        de longevidade.
                      </p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </li>
          <li class="swiper-slide slide">
            <div class="container lendas">
              <h2 class="titulo-sessao">Mãe do Ouro</h2>
              <div class="detalhes">
                <img
                  class="detalhes-img"
                  src="./img/sudeste/detalhe/mae.jpg"
                  alt=""
                />
                <div class="detalhes-textos">
                  <div>
                    <p>
                      A Mãe do Ouro é um espírito que se parece com uma mulher
                      de longos cabelos dourados e vestida com roupas brancas,
                      mas que também pode aparecer como uma bola de fogo ou uma
                      estrela cadente. Em algumas versões, ela guia os
                      exploradores até as fontes de ouro e os protege durante a
                      mineração. Em outras, porém, ela faz o oposto, atuando
                      como protetora dos depósitos de ouro, afastando os
                      garimpeiros das jazidas. Algumas versões relatam que ela
                      também defende mulheres que são agredidas por seus maridos
                      ao atrair os agressores para cavernas e fazê-las desabar.
                      Ela, então, coloca felicidade e homens bons na vida dessas
                      mulheres.
                    </p>
                    <p>
                      Na história mais conhecida sobre a Mãe do Ouro é dito que
                      um homem cruel obrigava seus escravos a entregar-lhe uma
                      certa quantidade de ouro todos os dias. Um escravo idoso
                      conhecido como Pai Antônio não conseguia encontrar ouro
                      suficiente e, pensando nas punições que sofreria, começou
                      a chorar no meio da floresta. Foi então que a Mãe do Ouro
                      apareceu diante dele e pediu que ele comprasse para ela um
                      espelho e uma fita azul, uma vermelha e uma amarela. Ao
                      receber os presentes, o espírito mostrou a Antônio uma
                      mina de ouro, mas pediu que ele não contasse a ninguém sua
                      localização. O escravizado, então, levou uma grande
                      quantidade de ouro ao homem, que o questionou sobre a
                      localização da mina. Por se recusar a contar, Antônio foi
                      severamente punido pelo homem.
                    </p>
                    <p>
                      Ao encontrar-se com o escravizado de novo, a Mãe do Ouro
                      disse a ele que contasse ao homem onde ficava a mina. Ele
                      deveria, porém, sair do local antes do meio-dia. O homem
                      então foi à mina acompanhado por Pai Antônio e outros
                      vinte e dois escravizados. Ao meio-dia, Pai Antônio saiu
                      da mina e a Mãe do Ouro fez com que ela desabasse, matando
                      todos lá dentro.
                    </p>
                  </div>
                  <ul class="caracteristicas">
                    <li>
                      <h3 class="titulos-importancia">Aparência</h3>
                      <p>
                        A Mãe do Ouro é descrita geralmente como uma mulher com
                        cabelos dourados e roupas brancas, mas ela também pode
                        aparecer como uma bola de fogo ou uma estrela cadente.
                      </p>
                    </li>
                    <li>
                      <h3 class="titulos-importancia">Habilidades</h3>
                      <p>
                        Ela é capaz de encontrar jazidas de ouro, causar
                        desabamentos e se transformar em uma bola de fogo.
                      </p>
                    </li>
                    <li>
                      <h3 class="titulos-importancia">Função</h3>
                      <p>
                        A Mãe do Ouro afasta os garimpeiros das jazidas. Ela
                        também se vinga de homens que agridem suas esposas.
                      </p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </li>
          <li class="swiper-slide slide">
            <div class="container lendas">
              <h2 class="titulo-sessao">Amorosa</h2>
              <div class="detalhes">
                <img
                  class="detalhes-img"
                  src="./img/sudeste/detalhe/amorosa.webp"
                  alt=""
                />
                <div class="detalhes-textos">
                  <div>
                    <p>
                      Ipojucam e Jandira eram dois indígenas de tribos
                      diferentes da região onde atualmente é o município de
                      Conceição de Macabu. Enquanto Ipojucam era famoso por ser
                      um excelente caçador, Jandira era conhecida pelas suas
                      cestas e redes de palha feitas com folha de macaúba. Os
                      dois brincavam juntos desde que eram crianças em uma
                      cachoeira na região.
                    </p>
                    <p>
                      Um dia, Ipojucam saiu para caçar algo para Jandira quando
                      encontrou, dormindo de um tronco, um ser que se parecia
                      com uma criança, mas com muito cabelo e com os pés virados
                      para trás. A criatura foi acordada pelo indígena e,
                      assustada, fugiu para um rio, mas Ipojucam conseguiu
                      seguí-la. Ela então disse ao caçador que seu nome era
                      Curupira e que era o protetor dos animais e da mata.
                      Curioso, Curupira perguntou a Ipojucam por qual motivo ele
                      não o matou enquanto dormia e ele respondeu que não mata
                      seres indefesos. Contente com a resposta, Curupira
                      despediu-se do caçador e desapareceu na mata.
                    </p>
                    <p>
                      Os anos passaram e Jandira e Ipojucam, apaixonados,
                      decidiram se casar, com a cerimônia marcada para a
                      primeira noite de lua cheia de novembro. Um dia antes do
                      casamento, Ipojucam ofereceu uma caça a Tupã. Foi então
                      que Anhangá, espírito que invejava a destreza e a
                      inteligência do caçador, assumiu a forma de uma onça
                      branca e o atacou. Ipojucam a superou em combate e,
                      ferida, a onça correu para a cachoeira onde Jandira colhia
                      palha para uma rede. Desejando vingar-se de Ipojucam, a
                      onça tentou atacar a jovem, mas foi atingida por uma lança
                      que o caçador arremessou. Humilhado, Anhangá
                      transformou-se numa tromba d’água e arrastou Ipojucam e
                      Jandira para as profundezas da cachoeira, que ficou
                      conhecida como a Cachoeira da Amorosa.
                    </p>
                  </div>
                  <ul class="caracteristicas">
                    <li>
                      <h3 class="titulos-importancia">Protagonistas</h3>
                      <p>
                        A lenda conta a história de Ipojucam e Jandira, dois
                        indígenas de tribos diferentes que cresceram juntos e se
                        apaixonaram.
                      </p>
                    </li>
                    <li>
                      <h3 class="titulos-importancia">Habilidades</h3>
                      <p>
                        Ipojucam era um caçador renomado, enquanto Jandira era
                        conhecida por suas cestas e redes de palha feitas com
                        folha de macaúba.
                      </p>
                    </li>
                    <li>
                      <h3 class="titulos-importancia">Morte</h3>
                      <p>
                        O espírito Anhangá invejava as habilidades de Ipojucam
                        e, na forma de uma onça branca, o desafiou para um
                        combate. Após ser ferido pelo caçador, Anhangá se
                        transformou numa tromba d’água e levou o casal para as
                        profundezas da Cachoeira da Amorosa.
                      </p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </li>
          <li class="swiper-slide slide">
            <div class="container lendas">
              <h2 class="titulo-sessao">Chibamba</h2>
              <div class="detalhes">
                <img
                  class="detalhes-img"
                  src="./img/sudeste/detalhe/chibamba.jpg"
                  alt=""
                />
                <div class="detalhes-textos">
                  <div>
                    <p>
                      O Chibamba é uma criatura conhecida por assustar e até
                      mesmo devorar as crianças que são mal-educadas, teimosas
                      e, principalmente, que se recusam a dormir quando devem.
                      Para isso, o Chibamba, também conhecido como “espírito das
                      bananeiras”, se veste com longas folhas de bananeira, faz
                      barulhos parecidos com os de um porco e, ao invés de andar
                      normalmente, se move realizando uma dança.
                    </p>
                    <p>
                      Acredita-se que essa lenda tenha surgido na África e que
                      ela foi trazida para o Brasil pelos escravizados,
                      popularizando-se no sul de Minas Gerais.
                    </p>
                  </div>
                  <ul class="caracteristicas">
                    <li>
                      <h3 class="titulos-importancia">Origem</h3>
                      <p>
                        Acredita-se que a lenda do Chibamba surgiu na África e
                        foi trazida para Minas Gerais pelos escravizados.
                      </p>
                    </li>
                    <li>
                      <h3 class="titulos-importancia">Medo</h3>
                      <p>
                        É dito que essa criatura devora as crianças
                        mal-educadas, teimosas ou que não vão dormir cedo.
                      </p>
                    </li>
                    <li>
                      <h3 class="titulos-importancia">Características</h3>
                      <p>
                        Ele é descrito como uma figura humanoide que se veste
                        com folhas de bananeira, anda dançando e faz barulhos de
                        porco.
                      </p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </li>
          <li class="swiper-slide slide">
            <div class="container lendas">
              <h2 class="titulo-sessao">Procissão das Almas</h2>
              <div class="detalhes">
                <img
                  class="detalhes-img"
                  src="./img/sudeste/detalhe/procissao.webp"
                  alt=""
                />
                <div class="detalhes-textos">
                  <div>
                    <p>
                      Na cidade de Mariana, em Minas Gerais, havia uma senhora
                      chamada Maricota, que era conhecida na região por passar
                      seus dias na janela de casa observando a vida dos outros.
                      Por causa dessa má fama, ela decidiu se mudar de bairro e
                      passar a bisbilhotar a noite.
                    </p>
                    <p>
                      Em uma noite de Sexta-Feira Santa, Maricota viu uma
                      procissão passando pelas ruas da cidade, com seus
                      integrantes cobrindo os rostos com capuzes. Ela também
                      podia ouvir os sons de correntes sendo arrastadas pelo
                      chão, lamentações e a seguinte canção: “Reza mais, reza
                      mais, reza mais uma oração; reza mais, reza mais, pra alma
                      que morreu sem confissão". Curiosa, a senhora continuou
                      observando aquele cortejo, quando um dos integrantes foi
                      até ela e, após dizer que a noite é dos mortos, a pediu
                      para guardar a vela que depois ele voltaria para buscar.
                    </p>
                    <p>
                      Depois, quando a figura encapuzada retornou, Maricota foi
                      buscar a vela. Entretanto, ao ver que a vela havia se
                      transformado em um osso de perna humana, ela morreu de
                      susto. Desde então, ela passou a integrar a procissão
                      todos os anos.
                    </p>
                  </div>
                  <ul class="caracteristicas">
                    <li>
                      <h3 class="titulos-importancia">Protagonista</h3>
                      <p>
                        A lenda fala sobre Maricota, uma mulher da cidade de
                        Mariana conhecida por bisbilhotar a vida dos vizinhos.
                      </p>
                    </li>
                    <li>
                      <h3 class="titulos-importancia">Procissão</h3>
                      <p>
                        Na noite da Sexta-Feira Santa, Maricota viu uma
                        procissão pelas ruas da cidade. Um dos integrantes pediu
                        para que ela guardasse uma vela que ele iria buscar
                        depois. Porém, quando a figura encapuzada voltou, Maria
                        se assustou ao ver que a vela havia se transformado em
                        um osso humano e morreu.
                      </p>
                    </li>
                    <li>
                      <h3 class="titulos-importancia">Lição</h3>
                      <p>
                        Essa lenda serve como um alerta de que deve-se evitar
                        sair à noite na Sexta-Feira Santa, pois ela pertence aos
                        mortos.
                      </p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </section>
    </main>
    <!-- Importação do javascript do Swiper -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- Importação do nosso javascript -->
    <script src="./js/lendas.js"></script>
  </body>
</html>
