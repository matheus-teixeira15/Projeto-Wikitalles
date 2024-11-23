<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sul | WikitalleS</title>
    <link href="./css/lendas.css" rel="stylesheet" type="text/css" />
    <link href="./css/reset.css" rel="stylesheet" type="text/css" />
    <link href="./css/compartilhado.css" rel="stylesheet" type="text/css" />
    <!-- Ícone de usuário antes do login -->
    <link 
      rel="stylesheet" 
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=account_circle" 
    />
    <!-- Ícone de usuário depois do login -->
    <link 
      rel="stylesheet" 
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=account_circle" 
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
  <body>
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
                    echo "<span onclick='functionDropdownMobile()' class='material-symbols-rounded dropbtn'>".'account_circle'."</span>";
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
            <h2 class="titulo-sessao">Sul</h2>
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
                <img class="carta" src="./img/sul/cartas/bruxa.png" alt="" />
              </li>
              <li onclick="escolherCarta(1)" class="slide swiper-slide active">
                <div>
                  <img class="carta" src="./img/sul/cartas/erva.png" alt="" />
                </div>
              </li>
              <li onclick="escolherCarta(2)" class="slide swiper-slide">
                <img class="carta" src="./img/sul/cartas/gralha.png" alt="" />
              </li>
              <li onclick="escolherCarta(3)" class="slide swiper-slide">
                <img class="carta" src="./img/sul/cartas/aho.png" alt="" />
              </li>
              <li onclick="escolherCarta(4)" class="slide swiper-slide">
                <img class="carta" src="./img/sul/cartas/bradador.png" alt="" />
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
              <h2 class="titulo-sessao">Bruxas de Itaguaçu</h2>
              <div class="detalhes">
                <img
                  class="detalhes-img"
                  src="./img/sul/detalhe/bruxa.webp"
                  alt=""
                />
                <div class="detalhes-textos">
                  <div>
                    <p>
                      A ilha de Florianópolis é conhecida como ilha da Magia,
                      pois dizem que muitos seres sobrenaturais povoam aquelas
                      praias e são responsáveis por vários fenômenos estranhos.
                    </p>
                    <p>
                      A praia de Itaguaçu, por exemplo, tem formações rochosas
                      bastante curiosas. Os nativos dizem, que certo dia, as
                      bruxas que viviam por ali resolveram dar uma festa e
                      convidaram vários amigos, como a Mula-sem-cabeça, o
                      Curupira, o Saci, o Lobisomem e muitos outros. Só não
                      chamaram o diabo, porque ele cheirava mal!
                    </p>
                    <p>
                      Porém, o diabo ficou sabendo da celebração e resolveu
                      aparecer mesmo assim. Quando ele chegou, as bruxas ficaram
                      surpresas e não sabiam o que fazer. Furioso, o diabo foi
                      transformando as feiticeiras em pedras e elas estão ali
                      até hoje, esperando que a raiva do coisa-ruim passe e as
                      converta em bruxas novamente.
                    </p>
                  </div>
                  <ul class="caracteristicas">
                    <li>
                      <h3 class="titulos-importancia">Localização Remota</h3>
                      <p>
                        As bruxas são frequentemente situadas em locais
                        isolados, como florestas densas, montanhas ou cavernas,
                        onde realizam seus rituais e vivem longe da civilização.
                      </p>
                    </li>
                    <li>
                      <h3 class="titulos-importancia">Poderes Sobrenaturais</h3>
                      <p>
                        São dotadas de habilidades mágicas e poderes
                        sobrenaturais, como lançar feitiços, prever o futuro,
                        voar ou se transformar em animais.
                      </p>
                    </li>
                    <li>
                      <h3 class="titulos-importancia">Aspecto Sinistro</h3>
                      <p>
                        São descritas como seres de aparência sinistra, com
                        aspecto enrugado, cabelos desgrenhados, olhos
                        penetrantes e riso maligno.
                      </p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </li>
          <li class="swiper-slide slide">
            <div class="container lendas">
              <h2 class="titulo-sessao">Erva-Mate</h2>
              <div class="detalhes">
                <img
                  class="detalhes-img"
                  src="./img/sul/detalhe/erva.jpg"
                  alt=""
                />
                <div class="detalhes-textos">
                  <div>
                    <p>
                      Havia na floresta um velho índio guerreiro que vivia com
                      sua filha, Yari, numa caverna. Sem forças para guerrear, o
                      índio hospedava os viajantes que ali passavam. Um dia,
                      chegou um caçador pedindo repouso e ele foi acolhido com
                      todas as honras.
                    </p>
                    <p>
                      Após o jantar, a filha se pôs a cantar para o jovem que
                      dormiu imediatamente. No dia seguinte, o caçador revelou
                      sua identidade e lhes disse que era um enviado do deus
                      Tupã.
                    </p>
                    <p>
                      Em agradecimento pela hospitalidade, mostrou ao ancião uma
                      erva da qual poderia fazer um chá para recuperar suas
                      forças. Também transformou a jovem índia na deusa que
                      guardaria aquelas plantas e ensinaria os homens a
                      cultivá-las e viverem em paz. Por isso, a erva-mate, é um
                      símbolo da fraternidade e da convivência pacífica entre os
                      seres humanos e é sempre compartilhada entre todos.
                    </p>
                  </div>
                  <ul class="caracteristicas">
                    <li>
                      <h3 class="titulos-importancia">Origens Místicas</h3>
                      <p>
                        A lenda da erva-mate muitas vezes tem raízes místicas ou
                        sobrenaturais, com histórias sobre como a erva-mate foi
                        descoberta por povos indígenas ou seres mágicos que
                        revelaram seus poderes curativos.
                      </p>
                    </li>
                    <li>
                      <h3 class="titulos-importancia">Domínio Indígena</h3>
                      <p>
                        A lenda frequentemente destaca a importância da
                        erva-mate para os povos indígenas da região, que a
                        consideravam uma planta sagrada e atribuíam a ela
                        propriedades curativas e revitalizantes.
                      </p>
                    </li>
                    <li>
                      <h3 class="titulos-importancia">
                        Benevolência da Natureza
                      </h3>
                      <p>
                        A erva-mate é retratada como um presente da natureza,
                        concedido às pessoas para seu benefício. Há narrativas
                        que enfatizam a conexão entre os seres humanos e o mundo
                        natural, destacando a importância de preservar e
                        respeitar o meio ambiente.
                      </p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </li>
          <li class="swiper-slide slide">
            <div class="container lendas">
              <h2 class="titulo-sessao">Gralha Azul</h2>
              <div class="detalhes">
                <img
                  class="detalhes-img"
                  src="./img/sul/detalhe/gralha.webp"
                  alt=""
                />
                <div class="detalhes-textos">
                  <div>
                    <p>
                      A gralha azul é um pássaro que vive nas florestas de
                      araucária (ou pinhão) e tem um hábito interessante.
                      Previdente, ela sempre enterra algumas sementes do fruto.
                      No entanto, como acaba esquecendo o local onde plantou,
                      muitas germinam se transformando em lindas árvores. Há
                      muito tempo, quando Deus criou o mundo, pediu ajuda aos
                      pássaros para espalhar as sementes da araucária. Nenhum
                      deles quis, pois estavam ocupados em contemplar suas
                      coloridas penas ou compor melodias com seu canto. Somente
                      a gralha negra, de grito estridente, se ofereceu e passou
                      a plantar as sementes da árvore. Para agradecer o seu
                      gesto, Deus a cobriu com um manto azul da cor do céu,
                      tornando-a distinta de todas as aves de sua espécie. Os
                      índios coroados imitavam seu canto e os negros
                      escravizados afirmavam que nenhum tiro de espingarda
                      atingia a gralha azul.
                    </p>
                  </div>
                  <ul class="caracteristicas">
                    <li>
                      <h3 class="titulos-importancia">Símbolo Regional</h3>
                      <p>
                        A Gralha-Azul é um símbolo icônico da região sul do
                        Brasil, especialmente do estado do Paraná, onde é
                        considerada uma espécie emblemática da fauna local.
                      </p>
                    </li>
                    <li>
                      <h3 class="titulos-importancia">
                        Beleza e Singularidade
                      </h3>
                      <p>
                        A Gralha-Azul é conhecida por sua beleza distintiva, com
                        plumagem azul-escura e um topete característico. Sua
                        aparência única contribui para sua identificação como um
                        símbolo regional.
                      </p>
                    </li>
                    <li>
                      <h3 class="titulos-importancia">Protetora da Floresta</h3>
                      <p>
                        Em algumas versões da lenda, a Gralha-Azul é retratada
                        como uma guardiã da floresta, protegendo seu habitat
                        natural e as criaturas que nele habitam.
                      </p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </li>
          <li class="swiper-slide slide">
            <div class="container lendas">
              <h2 class="titulo-sessao">Ahó Ahó</h2>
              <div class="detalhes">
                <img
                  class="detalhes-img"
                  src="./img/sul/detalhe/aho.webp"
                  alt=""
                />
                <div class="detalhes-textos">
                  <div>
                    <p>
                      Durante o tempo das missões jesuíticas no território dos
                      índios guaranis, os padres da Companhia de Jesus
                      aproveitaram as lendas existentes para assustar os novos
                      conversos. Um das histórias que circulavam entre as
                      reduções era a do Ahó Ahó. Este era uma criatura parecida
                      com uma ovelha, mas bem maior, robusta e tinha dentes
                      terríveis. Só vivia em bando e comunicavam-se entre si
                      emitindo gritos que produziam o som "aó aó" e daí seu
                      nome.
                    </p>
                    <p>
                      Conta-se que o Ahó Ahó perseguia as pessoas que andavam
                      desavisadas pelas florestas. O único jeito de escapar era
                      subindo numa palmeira, árvores cujas folhas são usadas no
                      Domingo de Ramos.Também dizem que Ahó Ahó recebia as
                      crianças que foram raptadas por outro personagem da
                      floresta, o Jaci Jaterê. Este vigiava aqueles meninos e
                      meninas que não dormiam a sesta. A lenda do Ahó Ahó
                      igualmente faz parte do folclore da Argentina e do
                      Paraguai.
                    </p>
                  </div>
                  <ul class="caracteristicas">
                    <li>
                      <h3 class="titulos-importancia">
                        Espíritos e Seres Sobrenaturais
                      </h3>
                      <p>
                        As lendas do Ahó Ahó frequentemente apresentam uma
                        variedade de espíritos e seres sobrenaturais, como os
                        Nhandereko (ancestrais), M'byá (espíritos), Caipora
                        (guardião da floresta) e outros seres místicos.
                      </p>
                    </li>
                    <li>
                      <h3 class="titulos-importancia">
                        Conexão com a Natureza
                      </h3>
                      <p>
                        Essas lendas geralmente enfatizam a profunda ligação
                        entre os povos indígenas e a natureza ao seu redor.
                        Elementos naturais, como árvores, rios, animais, e
                        fenômenos climáticos, muitas vezes desempenham papéis
                        significativos nas histórias.
                      </p>
                    </li>
                    <li>
                      <h3 class="titulos-importancia">Transmissão Oral</h3>
                      <p>
                        As lendas do Ahó Ahó são tradicionalmente transmitidas
                        oralmente de uma geração para outra. Elas são contadas
                        em rituais, cerimônias, e nas rodas de conversa,
                        mantendo viva a tradição cultural e o conhecimento
                        ancestral.
                      </p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </li>
          <li class="swiper-slide slide">
            <div class="container lendas">
              <h2 class="titulo-sessao">Bradador</h2>
              <div class="detalhes">
                <img
                  class="detalhes-img"
                  src="./img/sul/detalhe/bradador.webp"
                  alt=""
                />
                <div class="detalhes-textos">
                  <div>
                    <p>
                      O Bradador é um espírito errante que vive assustando os
                      incautos que viajam sozinhos.Conta-se que um homem
                      faleceu, na cidade de Atuba (PR), foi enterrado sem pagar
                      todos os pecados que havia cometido em vida. Assim, a
                      terra lhe recusou a dar descanso e o devolveu. A partir
                      desse dia, todas as sextas-feiras, após a meia-noite, uma
                      criatura meio fantasma, meio homem passou a errar pelos
                      campos soltando gritos terríveis que assustam até os mais
                      valentes. Por causa do som horripilante, os lugarejos
                      passaram a chamá-lo de Bradador e evitar os caminhos
                      solitários.
                    </p>
                    <p>
                      São poucos os que viveram para contar como é a aparência
                      dessa alma que permanece entre dois mundos. O encanto só
                      vai terminar quando o Bradador encontrar por sete vezes
                      uma moça de nome Maria e assim ter seus pecados perdoados.
                      O problema é encontrar alguém que tenha coragem para
                      enfrentar os brados assustadores dessa criatura errante.
                    </p>
                  </div>
                  <ul class="caracteristicas">
                    <li>
                      <h3 class="titulos-importancia">Personagem Central</h3>
                      <p>
                        O "Bradador" é o protagonista da lenda, frequentemente
                        retratado como uma figura misteriosa e assustadora, que
                        habita áreas isoladas, como florestas densas, campos ou
                        montanhas.
                      </p>
                    </li>
                    <li>
                      <h3 class="titulos-importancia">Grito Enigmático</h3>
                      <p>
                        Uma das características mais distintivas do "Bradador" é
                        seu grito, que é descrito como extremamente alto e
                        aterrorizante. Esse grito pode ser ouvido à distância,
                        causando medo e apreensão naqueles que o escutam.
                      </p>
                    </li>
                    <li>
                      <h3 class="titulos-importancia">Origens Misteriosas</h3>
                      <p>
                        As origens do "Bradador" são muitas vezes desconhecidas
                        ou envoltas em mistério. Algumas versões da lenda
                        sugerem que ele é uma alma penada ou um espírito errante
                        que busca vingança ou redenção.
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
