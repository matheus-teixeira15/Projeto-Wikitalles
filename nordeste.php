<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nordeste | WikitalleS</title>
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
          <img
            class="titulo-img"
            src="./img/nordeste/mapa.png"
            alt="Mapa do nordeste"
          />
          <div class="titulo-textos">
            <h2 class="titulo-sessao">Nordeste</h2>
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
                  src="./img/nordeste/carta/princesa.png"
                  alt="Carta da Princesa encantada de Jericoacoara"
                />
              </li>
              <li onclick="escolherCarta(1)" class="slide swiper-slide active">
                <div>
                  <img
                    class="carta"
                    src="./img/nordeste/carta/comadre.png"
                    alt=""
                  />
                </div>
              </li>
              <li onclick="escolherCarta(2)" class="slide swiper-slide">
                <img
                  class="carta"
                  src="./img/nordeste/carta/barba.png"
                  alt=""
                />
              </li>
              <li onclick="escolherCarta(3)" class="slide swiper-slide">
                <img
                  class="carta"
                  src="./img/nordeste/carta/cabeca.png"
                  alt=""
                />
              </li>
              <li onclick="escolherCarta(4)" class="slide swiper-slide">
                <img
                  class="carta"
                  src="./img/nordeste/carta/alamoa.png"
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
              <h2 class="titulo-sessao">
                A Cidade encantada de Jericoacoara
              </h2>
              <div class="detalhes">
                <img
                  class="detalhes-img"
                  src="./img/nordeste/detalhe/princesa.jpeg"
                  alt=""
                />
                <div class="detalhes-textos">
                  <div>
                    <p>
                      Em Jericoacoara (Ceará), embaixo do farol do Morro do
                      Serrote, há uma cidade mágica, que guarda incontáveis
                      riquezas e onde vive uma linda princesa. Para chegar na
                      cidade é preciso ir até a praia e entrar, engatinhando, em
                      uma caverna, que só pode ser acessada quando a maré está
                      baixa.
                    </p>
                    <p>
                      Dentro da gruta há um enorme portão de ferro que bloqueia
                      o caminho e que só poderá ser aberto se uma pessoa for
                      sacrificada em frente a ele. Dentro da cidade está a
                      princesa encantada, que possui o corpo de uma serpente de
                      escamas douradas com os pés e a cabeça de uma mulher.
                    </p>
                    <p>
                      Para libertá-la do feitiço é necessário fazer no dorso da
                      princesa uma cruz com o sangue do sacrifício feito no
                      portão. Aquele que acabar com a maldição poderá casar-se
                      com ela e ficar com todos os tesouros da cidade.
                    </p>
                  </div>
                  <ul class="caracteristicas">
                    <li>
                      <h3 class="titulos-importancia">Cidade Escondida</h3>
                      <p>
                        A lenda diz que há uma cidade mágica cheia de riquezas
                        embaixo do farol do Morro do Serrote. Nela vive uma
                        princesa encantada, com corpo de serpente e escamas
                        douradas e cabeça e pés de humana.
                      </p>
                    </li>
                    <li>
                      <h3 class="titulos-importancia">Portão de Ferro</h3>
                      <p>
                        No caminho para a cidade há um grande portão de ferro,
                        que só pode ser aberto com um sacrifício humano.
                      </p>
                    </li>
                    <li>
                      <h3 class="titulos-importancia">Princesa Encantada</h3>
                      <p>
                        Para quebrar a maldição da princesa é preciso desenhar
                        no dorso dela uma cruz usando o sangue do sacrifício do
                        portão.
                      </p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </li>
          <li class="swiper-slide slide">
            <div class="container lendas">
              <h2 class="titulo-sessao">Comadre Fulozinha</h2>
              <div class="detalhes">
                <img
                  class="detalhes-img"
                  src="./img/nordeste/detalhe/comadre.jpeg"
                  alt=""
                />
                <div class="detalhes-textos">
                  <div>
                    <p>
                      Também conhecida como “Mãe da Mata”, Comadre Fulozinha é
                      um ser conhecido na Zona da Mata (principalmente Paraíba e
                      Pernambuco) como uma guardiã da natureza. Existem diversas
                      versões sobre a história de Comadre Fulozinha. Em uma, é
                      dito que ela era uma criança que se perdeu e morreu na
                      floresta.
                    </p>
                    <p>
                      Já outras dizem que ela era filha de uma mulher indígena e
                      um homem branco rico e cruel. Quando sua mãe faleceu,
                      Fulozinha teria saído de casa se tornado uma protetora dos
                      animais e das plantas, vingando-se de qualquer pessoa que
                      lhes fizesse mal. Para agradá-la são dadas oferendas como
                      mingau, mel, fumo e doces.
                    </p>
                    <p>
                      Sendo descrita como uma criança ou adulta cujos longos
                      cabelos negros cobrem todo o corpo, Fulozinha possui o
                      hábito de fazer travessuras como trançar as crinas e
                      caudas de cavalos e desorientar caçadores com seu assobio.
                      O assobio, inclusive, é uma das características mais
                      marcantes de Fulozinha.
                    </p>
                    <p>
                      Quanto mais próxima ela estiver de alguém, mais baixo fica
                      o assobio, dando a impressão de que ela está longe. Essa
                      artimanha é usada por ela para enganar e atacar a pessoa
                      que estiver perseguindo. Ela também é conhecida por
                      açoitar pessoas mal intencionadas com cipós, ramos de
                      urtiga e até mesmo com seu próprio cabelo. Ela também é
                      muito furtiva, sendo capaz de desaparecer sem deixar
                      rastros.
                    </p>
                  </div>
                  <ul class="caracteristicas">
                    <li>
                      <h3 class="titulos-importancia">Protagonista</h3>
                      <p>
                        Na versão mais conhecida, Comadre Fulozinha era uma
                        criança que fugiu de casa por sofrer maus-tratos do seu
                        pai e se perdeu numa floresta. Ela então se tornou uma
                        protetora da natureza.
                      </p>
                    </li>
                    <li>
                      <h3 class="titulos-importancia">Habilidades</h3>
                      <p>
                        Ela usa cipós, ramos de urtiga e até o próprio cabelo
                        para açoitar pessoas mal intencionadas. Ela também
                        consegue enganar as pessoas com seu assobio, que fica
                        mais baixo quando ela está por perto.
                      </p>
                    </li>
                    <li>
                      <h3 class="titulos-importancia">Presentes</h3>
                      <p>
                        Para agradar Fulozinha é preciso dar presentes como
                        mingau, mel, fumo e doces.
                      </p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </li>
          <li class="swiper-slide slide">
            <div class="container lendas">
              <h2 class="titulo-sessao">Barba Ruiva</h2>
              <div class="detalhes">
                <img
                  class="detalhes-img"
                  src="./img/nordeste/detalhe/barba.jpeg"
                  alt=""
                />
                <div class="detalhes-textos">
                  <div>
                    <p>
                      Barba Ruiva é um homem encantado que vive na lagoa de
                      Parnaguá, no Piauí. A história fala de uma viúva que vivia
                      com suas três filhas. Um dia, a mais velha ficou enjoada e
                      cansada. Todos acreditavam que ela estava doente, mas na
                      verdade ela estava grávida, aguardando o filho do seu
                      namorado, que morreu antes que eles pudessem se casar.
                    </p>
                    <p>
                      Envergonhada, a jovem decidiu dar à luz na mata e, não
                      desejando a criança, colocou o bebê em um tacho de bronze
                      e o lançou em um rio. O tacho, porém, não afundou graças
                      ao poder de Iara, a Mãe-d’água, que, enfurecida, deu
                      início a uma enchente que inundou toda a região. Surgiu
                      assim a lagoa de Parnaguá. Por anos, um choro de criança
                      podia ser ouvido vindo da lagoa todas as noites, até que
                      um dia parou.
                    </p>
                    <p>
                      Desde então, o Barba Ruiva, o bebê abandonado pela jovem,
                      passou a vagar pelas margens da lagoa. De manhã ele é um
                      menino. Pela tarde, um homem adulto e ruivo, que tenta
                      abraçar e beijar as mulheres que encontra na lagoa. Ao
                      anoitecer, um idoso com uma longa barba branca. Seu desejo
                      é encontrar uma moça corajosa o bastante para jogar água
                      benta sobre a cabeça dele, livrando-o do encanto.
                    </p>
                  </div>
                  <ul class="caracteristicas">
                    <li>
                      <h3 class="titulos-importancia">Protagonista</h3>
                      <p>
                        Barba Ruiva é um homem encantado que vive na lagoa de
                        Parnaguá, no Piauí. Ele foi jogado em um rio pela mãe,
                        mas foi salvo por Iara, a Mãe-d’água.
                      </p>
                    </li>
                    <li>
                      <h3 class="titulos-importancia">Maldição</h3>
                      <p>
                        O Barba Ruiva ainda vaga pelas margens da lagoa. De dia,
                        ele é uma criança. De tarde, um adulto que tenta abraçar
                        e beijar as mulheres que ficam perto da lagoa. De noite,
                        ele é um idoso de barba branca.
                      </p>
                    </li>
                    <li>
                      <h3 class="titulos-importancia">Desejo</h3>
                      <p>
                        Barba Ruiva deseja achar uma mulher que esteja disposta
                        a jogar água benta na cabeça dele para quebrar o
                        encanto.
                      </p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </li>
          <li class="swiper-slide slide">
            <div class="container lendas">
              <h2 class="titulo-sessao">Cabeça de Cuia</h2>
              <div class="detalhes">
                <img
                  class="detalhes-img"
                  src="./img/nordeste/detalhe/cabeca.jpeg"
                  alt=""
                />
                <div class="detalhes-textos">
                  <div>
                    <p>
                      Em Teresina, no Piauí, vivia um jovem chamado Crispim,
                      cuja família era muito pobre. Um dia, para o almoço, a mãe
                      de Crispim serviu uma sopa rala, feita com ossos e sobras,
                      já que não havia carne em casa. Crispim se revoltou e, com
                      raiva, arremessou na cabeça da mãe um osso e a matou.
                    </p>
                    <p>
                      Antes de morrer a mãe o amaldiçoou a vagar pelos rios
                      Parnaíba e Poti com uma cabeça enorme, no formato de uma
                      cuia. Para libertar-se da maldição, ele teria que devorar
                      sete virgens chamadas Maria. Tomado pelo desespero,
                      Crispim correu até o rio Parnaíba e se afogou.
                    </p>
                    <p>
                      O corpo de Crispim nunca foi encontrado e acredita-se que
                      ele continua buscando por virgens para devorar. É dito
                      também que ele mata banhistas e vira embarcações nos rios.
                    </p>
                  </div>
                  <ul class="caracteristicas">
                    <li>
                      <h3 class="titulos-importancia">Protagonista</h3>
                      <p>
                        Barba Ruiva é um homem encantado que vive na lagoa de
                        Parnaguá, no Piauí. Ele foi jogado em um rio pela mãe,
                        mas foi salvo por Iara, a Mãe-d’água.
                      </p>
                    </li>
                    <li>
                      <h3 class="titulos-importancia">Maldição</h3>
                      <p>
                        O Barba Ruiva ainda vaga pelas margens da lagoa. De dia,
                        ele é uma criança. De tarde, um adulto que tenta abraçar
                        e beijar as mulheres que ficam perto da lagoa. De noite,
                        ele é um idoso de barba branca.
                      </p>
                    </li>
                    <li>
                      <h3 class="titulos-importancia">Desejo</h3>
                      <p>
                        Barba Ruiva deseja achar uma mulher que esteja disposta
                        a jogar água benta na cabeça dele para quebrar o
                        encanto.
                      </p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </li>
          <li class="swiper-slide slide">
            <div class="container lendas">
              <h2 class="titulo-sessao">Alamoa</h2>
              <div class="detalhes">
                <img
                  class="detalhes-img"
                  src="./img/nordeste/detalhe/alamoa.jpeg"
                  alt=""
                />
                <div class="detalhes-textos">
                  <div>
                    <p>
                      Alamoa é uma criatura que vive no Morro do Pico em
                      Fernando de Noronha. Com a aparência de uma mulher branca
                      de olhos azuis e cabelos loiros, ela seduz os marinheiros
                      e pescadores que passam pela região.
                    </p>
                    <p>
                      Nas noites de lua cheia, Alamoa sai completamente nua e
                      atrai as pessoas até o Pico com a sua dança. Os pescadores
                      e marinheiros que se arriscam a escalar e chegar no topo
                      depois de superarem 323 metros de altura encontram seu
                      presente.
                    </p>
                    <p>
                      Alamoa, a linda mulher, se transforma em uma caveira e
                      aprisiona suas vítimas no morro ou as empurra de um
                      penhasco. É dito que o único modo de quebrar o feitiço
                      dela é se um raio iluminar a área.
                    </p>
                  </div>
                  <ul class="caracteristicas">
                    <li>
                      <h3 class="titulos-importancia">Criatura</h3>
                      <p>
                        Alamoa é uma criatura que assombra o Morro do Pico em
                        Fernando de Noronha. Ela seduz marinheiros e pescadores
                        para prender no morro ou empurrar de um penhasco.
                      </p>
                    </li>
                    <li>
                      <h3 class="titulos-importancia">Aparência</h3>
                      <p>
                        Para atrair as pessoas, ela assume a aparência de uma
                        mulher branca de olhos azuis e cabelos loiros e dança
                        nas praias da região. Entretanto, quando ela e suas
                        vítimas chegam no topo do morro, ela revela a sua
                        aparência de esqueleto.
                      </p>
                    </li>
                    <li>
                      <h3 class="titulos-importancia">Fraqueza</h3>
                      <p>
                        O único jeito de se libertar do encanto da Alamoa é se
                        um raio iluminar a área.
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
