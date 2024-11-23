<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Centro-Oeste | WikitalleS</title>
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
          <img class="titulo-img" src="./img/nordeste/mapa.png" alt="Mapa" />
          <div class="titulo-textos">
            <h2 class="titulo-sessao">Centro-Oeste</h2>
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
                <img
                  class="carta"
                  src="./img/centro-oeste/cartas/arranca.png"
                  alt="Carta do Arranca-Línguas"
                />
              </li>
              <li onclick="escolherCarta(1)" class="slide swiper-slide active">
                <div>
                  <img
                    class="carta"
                    src="./img/centro-oeste/cartas/casa.png"
                    alt="Carta da Casa das 365 Janelas"
                  />
                </div>
              </li>
              <li onclick="escolherCarta(2)" class="slide swiper-slide">
                <img
                  class="carta"
                  src="./img/centro-oeste/cartas/minhocao.png"
                  alt="Carta do Minhocão do Pari"
                />
              </li>
              <li onclick="escolherCarta(3)" class="slide swiper-slide">
                <img
                  class="carta"
                  src="./img/centro-oeste/cartas/pe.png"
                  alt="Carta do Pé de Garrafa"
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
              <h2 class="titulo-sessao">Arranca-Línguas</h2>
              <div class="detalhes">
                <img
                  class="detalhes-img"
                  src="./img/centro-oeste/detalhe/arranca.jpg"
                  alt="Imagem do Arranca-Línguas"
                />
                <div class="detalhes-textos">
                  <div>
                    <p>
                      O Arranca-Línguas é um ser que vive nas margens do rio
                      Araguaia, que banha os estados de Goiás, Mato Grosso,
                      Tocantins e Pará. Ele é uma criatura monstruosa, que
                      parece um grande gorila e fica à espreita de suas vítimas
                      que podem ser seres humanos ou animais.
                    </p>
                    <p>
                      Para atrair suas vítimas ele usa um recurso bastante
                      original. Dizem que ele se disfarça de árvore frondosa ou
                      de tronco caído para que as pessoas possam se encostar e
                      descansar. Justamente quando o viajante cansado está
                      repousando, tranquilo na beira do rio, ele o ataca, o mata
                      e arranca sua língua.
                    </p>
                    <p>
                      As matas e caminhos do sertão estão povoadas de criaturas
                      assustadoras. São monstros e seres do outro mundo que
                      andavam pelos campos quase sempre de noite.
                    </p>
                  </div>
                  <ul class="caracteristicas">
                    <li>
                      <h3 class="titulos-importancia">Região</h3>
                      <p>
                        O Arranca-Línguas é um ser que vive próximo ao rio
                        Araguaia, na região Centro-Oeste.
                      </p>
                    </li>
                    <li>
                      <h3 class="titulos-importancia">Criatura</h3>
                      <p>
                        De aparência similar à de um gorila, alimenta-se das
                        línguas de humanos e animais.
                      </p>
                    </li>
                    <li>
                      <h3 class="titulos-importancia">Estratégia</h3>
                      <p>
                        Ele se disfarça de árvore e ataca as pessoas quando elas
                        descansam perto do rio.
                      </p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </li>
          <li class="swiper-slide slide">
            <div class="container lendas">
              <h2 class="titulo-sessao">Casa das 365 Janelas</h2>
              <div class="detalhes">
                <img
                  class="detalhes-img"
                  src="./img/centro-oeste/detalhe/casa.jpg"
                  alt="Imagem da Casa das 365 Janelas"
                />
                <div class="detalhes-textos">
                  <div>
                    <p>
                      A lenda se inicia com a morte do comendador Joaquim, que
                      era um dos homens mais ricos de Goiás no século XIX, tinha
                      tanto dinheiro que mandou fazer um belo casarão com 365
                      janelas, uma para cada dia do ano. Para construí-la, não
                      olhou para gastos, empregou as madeiras mais finas, usou
                      acabamentos em ouro e as lâmpadas eram feitas de um
                      cristal puríssimo.
                    </p>
                    <p>
                      A casa tinha salões de reuniões, salão de baile, quartos,
                      alcovas para os viajantes, cozinha, despensas e tudo mais
                      que significava conforto naqueles tempos. Não havia morada
                      mais bonita e todos os que passavam por aqueles campos se
                      aproximavam para contemplá-la. A fama da mansão era tão
                      grande que mesmo artistas que nunca a tinham visto faziam
                      pinturas sobre ela.
                    </p>
                    <p>
                      Como Joaquim não deixou herdeiros, o povo entrou na casa,
                      vasculhou todos os seus recantos embusca dos tesouros
                      escondidos que o comendador tinha. Quem não conseguiu
                      levar os copos dourados ou os macios lençóis, arrancou
                      pedaços do piso de madeira e também as lindas janelas que
                      eram a joia daquela construção.
                    </p>
                    <p>
                      Diz a lenda que vários pedaços da casa serviram para
                      edificar outras em Goiás e, por isso, é possível ouvir os
                      passos do Comendador pelas ruas buscando partes de sua
                      antiga casa das 365 janelas.
                    </p>
                  </div>
                  <ul class="caracteristicas">
                    <li>
                      <h3 class="titulos-importancia">Dono</h3>
                      <p>
                        O comendador Joaquim era um dos homens mais ricos de
                        Goiás e mandou construir a casa.
                      </p>
                    </li>
                    <li>
                      <h3 class="titulos-importancia">Estrutura</h3>
                      <p>
                        A casa tinha 365 janelas (uma para cada dia do ano) e
                        possuía apenas materiais e móveis de luxo.
                      </p>
                    </li>
                    <li>
                      <h3 class="titulos-importancia">Destino</h3>
                      <p>
                        Após a morte de Joaquim, que não deixou herdeiros, a
                        população invadiu a casa e levou todos os móveis e
                        materiais. O comendador passou a assombrar as ruas de
                        Goiás atrás das partes da casa.
                      </p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </li>
          <li class="swiper-slide slide">
            <div class="container lendas">
              <h2 class="titulo-sessao">Minhocão do Pari</h2>
              <div class="detalhes">
                <img
                  class="detalhes-img"
                  src="./img/centro-oeste/detalhe/minhocao.png"
                  alt="Imagem do Minhocão do Pari"
                />
                <div class="detalhes-textos">
                  <div>
                    <p>
                      Todo pescador tem um caso para contar sobre suas
                      pescarias. Geralmente, o peixe que escapou era o maior do
                      mundo. No entanto, os pescadores também relatam histórias
                      de criaturas que guardam zelosamente os habitantes das
                      águas doces.
                    </p>
                    <p>
                      Os mais antigos contam que no rio Cuiabá havia uma
                      criatura que parecia uma cobra que vigiava as águas. Era
                      tão grande e forte que vários ribeirinhos, durante à
                      noite, atravessaram o rio andando sobre suas costas,
                      achando que era um tronco de árvore. O bicho ficava
                      furioso quando encontrava pescadores que capturavam peixes
                      na época da reprodução e, por isso, virava as canoas
                      daqueles que não respeitavam o momento da piracema.
                    </p>
                    <p>
                      A força do Minhocão do Pari era tão grande que os
                      barrancos dos rios não continham o movimento das ondas.
                      Daí que foram ficando cada vez mais largos. Hoje a
                      criatura já não aparece mais para proteger os peixes e
                      dizem que ela foi embora na grande enchente de 1974.
                    </p>
                  </div>
                  <ul class="caracteristicas">
                    <li>
                      <h3 class="titulos-importancia">Criatura</h3>
                      <p>
                        É uma serpente enorme que vivia nas águas do rio Cuiabá,
                        no Mato Grosso.
                      </p>
                    </li>
                    <li>
                      <h3 class="titulos-importancia">Protetor</h3>
                      <p>
                        Ela atacava os pescadores que tentassem capturar peixes
                        durante a piracema (período de reprodução dos peixes).
                      </p>
                    </li>
                    <li>
                      <h3 class="titulos-importancia">Desaparecimento</h3>
                      <p>
                        É dito que a criatura desapareceu durante a grande
                        enchente de 1974.
                      </p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </li>
          <li class="swiper-slide slide">
            <div class="container lendas">
              <h2 class="titulo-sessao">Pé de Garrafa</h2>
              <div class="detalhes">
                <img
                  class="detalhes-img"
                  src="./img/centro-oeste/detalhe/pe.jpg"
                  alt="Imagem do Pé de Garrafa"
                />
                <div class="detalhes-textos">
                  <div>
                    <p>
                      O Pé de Garrafa é um homem que vive nas florestas, cujo pé
                      tem formato de garrafa, o corpo é coberto de pelos, exceto
                      o umbigo, que é branco e é considerado o seu ponto fraco.
                      As suas pegadas são muito curiosas e não se parecem com as
                      de nenhum animal. Por isso, mais de um caçador já teve a
                      infelicidade de chegar perto do Pé de Garrafa.
                    </p>
                    <p>
                      A criatura anda pelas matas, emitindo um grito agudo e
                      atraindo os caçadores para seus domínios. É dito que ela
                      possui poder sobre os ventos e algumas plantas, como
                      cipós, assim como a habilidade de desaparecer e mudar de
                      tamanho, ficando maior ou menor conforme necessário. Ele
                      também utiliza as suas pegadas circulares para confundir
                      as pessoas, já que elas não conseguem descobrir para qual
                      direção ele foi.
                    </p>
                    <p>
                      O Pé de Garrafa costuma matar suas presas ou aprisionar
                      suas almas em garrafas. A única maneira de escapar das
                      suas garras é atingir em cheio o umbigo branco do monstro.
                      Porém, por via das dúvidas, o melhor é fugir. Algumas
                      pessoas acreditam que ele aparece apenas nas noites de
                      sexta-feira e que devora pessoas desobedientes.
                    </p>
                  </div>
                  <ul class="caracteristicas">
                    <li>
                      <h3 class="titulos-importancia">Aparência</h3>
                      <p>
                        Parecido com um ser humano, com um único pé no formato
                        de garrafa, corpo coberto por pelos e um umbigo branco.
                      </p>
                    </li>
                    <li>
                      <h3 class="titulos-importancia">Habilidades</h3>
                      <p>
                        A criatura controla ventos e plantas e consegue
                        desaparecer e mudar de tamanho.
                      </p>
                    </li>
                    <li>
                      <h3 class="titulos-importancia">Rastros</h3>
                      <p>
                        Ele usa suas pegadas circulares para confundir suas
                        vítimas, já que elas não sabem para qual lado ele foi.
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
