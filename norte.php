<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Norte | WikitalleS</title>
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
            <h2 class="titulo-sessao">Norte</h2>
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
                  src="./img/norte/carta/carruagem.png"
                  alt=""
                />
              </li>
              <li onclick="escolherCarta(1)" class="slide swiper-slide active">
                <div>
                  <img
                    class="carta"
                    src="./img/norte/carta/mapinguari.png"
                    alt=""
                  />
                </div>
              </li>
              <li onclick="escolherCarta(2)" class="slide swiper-slide">
                <img class="carta" src="./img/norte/carta/acai.png" alt="" />
              </li>
              <li onclick="escolherCarta(3)" class="slide swiper-slide">
                <img
                  class="carta"
                  src="./img/norte/carta/mandioca.png"
                  alt=""
                />
              </li>
              <li onclick="escolherCarta(4)" class="slide swiper-slide">
                <img class="carta" src="./img/norte/carta/vitoria.png" alt="" />
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
              <h2 class="titulo-sessao">Carruagem de Ana Jassen</h2>
              <div class="detalhes">
                <img
                  class="detalhes-img"
                  src="./img/norte/detalhe/carruagem.jpeg"
                  alt=""
                />
                <div class="detalhes-textos">
                  <div>
                    <p>
                      Diz a lenda que Ana Jansen era poderosa e discutida
                      matrona maranhense (mulher de idade madura) de marcante
                      presença na vida econômica, social e política de São Luís
                      no século XIX, ela ficou conhecida na cidade pela
                      desumanidade e maus tratos que, segundo rumores, aplicava
                      a seus escravos.
                    </p>
                    <p>
                      Conta a lenda que os notívagos (pessoa que possuí hábitos
                      ou costumes noturnos) da cidade, ao pressentirem a
                      aproximação de uma horrenda carruagem penada, fugiam
                      aterrorizados, à procura de um abrigo seguro. Se assim não
                      fizessem, estariam sujeitos a receber a alma penada de Ana
                      Jansen, uma vela acesa que amanheceria transformada em
                      osso de defunto. Dizem ainda que o coche era puxado por
                      cavalos decapitados conduzidos por um escravo também
                      decapitado e com o corpo sangrando. Por onde passava,
                      horripilantes sons eram ouvidos, que pareciam resultantes
                      da combinação de atrito de velhas e gastas ferragens com o
                      coro de lamentações dos escravos.
                    </p>
                  </div>
                  <ul class="caracteristicas">
                    <li>
                      <h3 class="titulos-importancia">Personagem Principal</h3>
                      <p>
                        Ana Jansen, uma mulher rica e poderosa que viveu no
                        século XIX. Ela é retratada como uma figura autoritária
                        e cruel, conhecida por seus caprichos e crueldades com
                        seus escravos e empregados.
                      </p>
                    </li>
                    <li>
                      <h3 class="titulos-importancia">A Carruagem</h3>
                      <p>
                        Ana Jansen é frequentemente associada a uma carruagem
                        puxada por cavalos negros, adornada com detalhes
                        sinistros e macabros. Diz-se que essa carruagem
                        fantasmagórica aparece nas estradas à noite,
                        transportando Ana Jansen em suas viagens pelo além.
                      </p>
                    </li>
                    <li>
                      <h3 class="titulos-importancia">Atos Cruéis</h3>
                      <p>
                        A lenda atribui a Ana Jansen uma série de atos cruéis e
                        desumanos, incluindo punições severas a seus escravos e
                        empregados, bem como supostos pactos com o diabo para
                        manter sua riqueza e poder.
                      </p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </li>
          <li class="swiper-slide slide">
            <div class="container lendas">
              <h2 class="titulo-sessao">Mapinguari</h2>
              <div class="detalhes">
                <img
                  class="detalhes-img"
                  src="./img/norte/detalhe/mapinguari.jfif"
                  alt=""
                />
                <div class="detalhes-textos">
                  <div>
                    <p>
                      O Mapinguari emite um gritos semelhantes ao grito dado
                      pelos caçadores. Se alguém responder ele logo vai ao
                      encontro do desavisado, que acaba perdendo a vida. A
                      criatura é selvagem e não teme nem caçador, porque é capaz
                      de dilatar o aço quando sopra no cano da espingarda. Os
                      ribeirinhos amazônicos contam muitas histórias de grandes
                      combates entre o Mapinguari e valentes caçadores. O
                      Mapinguari sempre leva vantagem e os caçadores que
                      conseguem sobreviver, muitas vezes ficam aleijados ou com
                      terríveis marcas no corpo para o resto de suas vidas.
                    </p>
                    <p>
                      Há quem diga que o Mapinguari só anda pelas florestas de
                      dia, guardando a noite para dormir. Quando anda pela mata,
                      vai gritando, quebrando galhos e derrubando árvores,
                      deixando um rastro de destruição. Outros contam que ele só
                      aparece nos dias santos ou feriados. Dizem que ele só foge
                      quando vê um bicho preguiça.
                    </p>
                  </div>
                  <ul class="caracteristicas">
                    <li>
                      <h3 class="titulos-importancia">Criatura Misteriosa</h3>
                      <p>
                        O Mapinguari é descrito como uma criatura lendária, uma
                        espécie de monstro ou criptídeo que habita as
                        profundezas da selva amazônica. Sua aparência varia, mas
                        muitas vezes é descrito como um ser grande, peludo e de
                        aspecto monstruoso, com características que lembram
                        tanto um primata quanto um grande réptil.
                      </p>
                    </li>
                    <li>
                      <h3 class="titulos-importancia">Habitat</h3>
                      <p>
                        Acredita-se que o Mapinguari habite regiões remotas e
                        inexploradas da floresta amazônica, longe da presença
                        humana. Ele é frequentemente associado a áreas densas e
                        de difícil acesso da selva.
                      </p>
                    </li>
                    <li>
                      <h3 class="titulos-importancia">
                        Características Físicas
                      </h3>
                      <p>
                        Entre as características frequentemente atribuídas ao
                        Mapinguari estão sua pelagem espessa, garras afiadas,
                        boca cheia de dentes e, em algumas versões, um olho no
                        meio da testa. Algumas versões também sugerem que ele
                        possui uma pele resistente a balas.
                      </p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </li>
          <li class="swiper-slide slide">
            <div class="container lendas">
              <h2 class="titulo-sessao">Açaí</h2>
              <div class="detalhes">
                <img
                  class="detalhes-img"
                  src="./img/norte/detalhe/acai.webp"
                  alt=""
                />
                <div class="detalhes-textos">
                  <div>
                    <p>
                      A lenda do açaí é uma lenda indígena que tem origem na
                      Região Norte do Brasil. Diz a lenda que, nessa região,
                      havia uma tribo cujo número de habitantes era bastante
                      elevado. Por esse motivo, cada dia estava se tornando mais
                      difícil conseguir uma quantidade de mantimentos suficiente
                      para alimentar a todos. Itaki, então cacique da tribo, se
                      viu obrigado a tomar uma decisão um tanto radical e que
                      deixou todos preocupados e chocados. Como forma de
                      controlar o número de habitantes, o cacique decidiu que
                      todas as crianças que nascessem a partir de determinada
                      data deveriam ser sacrificadas. Para ele, essa seria uma
                      maneira de conter o aumento populacional de sua tribo.
                    </p>
                    <p>
                      Um dia, a medida drástica acometeu a própria família de
                      Itaki. Sua filha Iaçã deu à luz uma criança que logo teve
                      de ser sacrificada para fazer valer as decisões do próprio
                      avô. Iaçã sofreu demais com a morte da filhinha. Diz-se
                      que ela passou dias e dias sem sair de sua oca, sofrendo e
                      chorando sem parar por vários dias e noites. Assim, Iaçã
                      elevou os seus pensamentos a Tupã, divindade indígena, e
                      pediu a ele que fizesse com que seu pai encontrasse outra
                      maneira de resolver a questão da provisão de alimentos,
                      sem que fosse necessário o sacrifício das crianças.Tupã
                      ficou muito sensibilizado com a dor da índia e decidiu que
                      ajudaria Itaki a encontrar outra solução para o problema
                      da tribo.
                    </p>
                    <p>
                      Foi então que certo dia, Iaçã ouviu um choro de criança
                      vindo de fora de sua oca. Ao sair, para sua surpresa e
                      felicidade, avistou sua filhinha ao lado de uma palmeira.
                      Iaçã correu em sua direção e abraçou a menina que,
                      misteriosamente, desapareceu nos braços da mãe.Mais uma
                      vez inconsolável, Iaçã chorou tanto durante a noite a
                      ponto de perder as forças e acabar por falecer.O corpo da
                      filha de Itaki foi encontrado na manhã seguinte, abraçado
                      à palmeira. Iaçã estava com um semblante sereno e parecia
                      sorrir levemente. Seus olhos estavam abertos e
                      direcionados ao topo da árvore.
                    </p>
                  </div>
                  <ul class="caracteristicas">
                    <li>
                      <h3 class="titulos-importancia">Origem Misteriosa</h3>
                      <p>
                        A lenda urbana do açaí muitas vezes conta uma história
                        sobre a origem misteriosa do fruto. Pode envolver
                        elementos sobrenaturais ou eventos inexplicáveis
                        relacionados ao surgimento do açaí na cultura humana.
                      </p>
                    </li>
                    <li>
                      <h3 class="titulos-importancia">
                        Poderes Mágicos ou Curativos
                      </h3>
                      <p>
                        Alguns relatos da lenda afirmam que o açaí possui
                        poderes mágicos ou curativos, conferindo saúde,
                        longevidade ou até mesmo habilidades sobrenaturais para
                        aqueles que o consomem regularmente.
                      </p>
                    </li>
                    <li>
                      <h3 class="titulos-importancia">
                        Histórias Assustadoras
                      </h3>
                      <p>
                        Algumas versões da lenda urbana do açaí incluem
                        elementos de suspense ou terror, com histórias sobre
                        pessoas que tiveram experiências estranhas ou até mesmo
                        perigosas relacionadas ao consumo do fruto.
                      </p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </li>
          <li class="swiper-slide slide">
            <div class="container lendas">
              <h2 class="titulo-sessao">Mandioca</h2>
              <div class="detalhes">
                <img
                  class="detalhes-img"
                  src="./img/norte/detalhe/mandioca.webp"
                  alt=""
                />
                <div class="detalhes-textos">
                  <div>
                    <p>
                      Com alegria contagiante, Mani era uma jovem indígena muito
                      estimada pela tribo tupi onde vivia. Ela era neta do
                      cacique e a gravidez da sua mãe foi motivo de tristeza
                      para o chefe da tribo. Isso porque ela tinha engravidado e
                      não era casada com um bravo guerreiro, tal como ele
                      desejava. O cacique obrigou a filha a dizer quem era o pai
                      do seu filho, mas ela dizia que não sabia como tinha
                      ficado grávida. A desonestidade da filha desagradava muito
                      o cacique. Até que um dia, ele teve um sonho que o
                      aconselhava a acreditar na filha, pois ela continuava pura
                      e dizia a verdade ao pai. Desde então, aceitou a gravidez
                      e ficou muito contente com a chegada da sua neta.
                    </p>
                    <p>
                      Certo dia, pela manhã, Mani foi encontrada morta por sua
                      mãe. Ela simplesmente tinha morrido durante o sono e,
                      mesmo sem vida, apresentava um semblante sorridente.
                      Triste com a perda, sua mãe enterrou Mani dentro da sua
                      oca e suas lágrimas umedeciam a terra tal como se
                      estivesse sendo regada. Dias depois, nesse mesmo local,
                      nasceu uma planta, diferente de todas as que conhecia, a
                      qual ela passou a cuidar. Percebendo que a terra estava
                      ficando rachada, cavou na esperança de que pudesse
                      desenterrar sua filha com vida. No entanto, encontrou uma
                      raiz, a mandioca, que recebeu esse nome em decorrência da
                      junção do nome de Mani e da palavra oca.
                    </p>
                  </div>
                  <ul class="caracteristicas">
                    <li>
                      <h3 class="titulos-importancia">Origem Mítica</h3>
                      <p>
                        A lenda geralmente descreve a origem da mandioca como um
                        presente ou dádiva divina para os povos indígenas,
                        muitas vezes associada a uma história de sacrifício ou
                        generosidade de uma divindade.
                      </p>
                    </li>
                    <li>
                      <h3 class="titulos-importancia">Importância Cultural</h3>
                      <p>
                        A mandioca desempenha um papel vital na subsistência e
                        na cultura das comunidades indígenas, sendo retratada
                        como uma fonte de alimento essencial e como um elemento
                        central em cerimônias e rituais.
                      </p>
                    </li>
                    <li>
                      <h3 class="titulos-importancia">Personagens</h3>
                      <p>
                        Algumas versões da lenda incluem personagens
                        específicos, como uma figura divina que presenteia os
                        humanos com a mandioca, ou mesmo uma protagonista humana
                        que desempenha um papel crucial na disseminação e
                        cultivo da planta.
                      </p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </li>
          <li class="swiper-slide slide">
            <div class="container lendas">
              <h2 class="titulo-sessao">Vitória-Régia</h2>
              <div class="detalhes">
                <img
                  class="detalhes-img"
                  src="./img/norte/detalhe/vitoria.jfif"
                  alt=""
                />
                <div class="detalhes-textos">
                  <div>
                    <p>
                      A planta aquática vitória-régia é originalmente uma
                      indígena que se afogou após se inclinar no rio para tentar
                      tocar o reflexo da Lua. Para os índígenas, a deusa da Lua
                      na mitologia tupi era Jaci, que transformava as mulheres
                      que escolhia em estrelas do céu. Quando Jaci tocava nelas,
                      ela as transformava em estrelas. Naiá, que viria a ser
                      transformada na vitória-régia, admirava a beleza de Jaci e
                      queria muito que Jaci a transformasse numa estrela para
                      viver ao seu lado.
                    </p>
                    <p>
                      Apesar de a tribo alertar Naiá que ela deixaria de ser
                      indígena se fosse levada por Jaci, ninguém conseguia
                      convencê-la e conforme o tempo passava, desejava cada vez
                      se encontrar com ela. Certa noite, sentada à beira do rio,
                      a imagem da Lua estava sendo refletida na água. Assim,
                      parecendo estar diante de Jaci, inconscientemente Naiá se
                      inclina para a tocas, e cai no rio despertando da ilusão.
                      No entanto, apesar do seu esforço, não consegue se salvar
                      e morre afogada.
                    </p>
                    <p>
                      Ao saber o que tinha acontecido com Naiá, Jaci, com grande
                      comoção, quis homenageá-la. Em vez de transformá-la em uma
                      estrela como fazia com as outras mulheres, transformou-a
                      em uma planta aquática, a vitória-régia, que é conhecida
                      como a estrela das águas.
                    </p>
                  </div>
                  <ul class="caracteristicas">
                    <li>
                      <h3 class="titulos-importancia">Origem Indígena</h3>
                      <p>
                        A lenda da Vitória-Régia é uma narrativa de origem
                        indígena, comum entre tribos da região amazônica,
                        especialmente entre os povos tupis-guaranis.
                      </p>
                    </li>
                    <li>
                      <h3 class="titulos-importancia">
                        Transformação em Planta
                      </h3>
                      <p>
                        A protagonista da lenda, Vitória, é uma jovem índia que
                        se apaixona por um guerreiro inimigo. Para evitar a
                        guerra entre suas tribos, ela se entrega ao rio, onde é
                        transformada em uma planta aquática exuberante: a
                        Vitória-Régia.
                      </p>
                    </li>
                    <li>
                      <h3 class="titulos-importancia">Grandeza e Beleza</h3>
                      <p>
                        Na lenda, a Vitória-Régia é descrita como uma planta
                        majestosa, com grandes folhas verdes que flutuam sobre a
                        água. Suas flores brancas desabrocham à noite, exalando
                        um perfume doce e envolvente.
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
