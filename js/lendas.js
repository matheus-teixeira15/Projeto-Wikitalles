// Criar um carrousel de cartas com javascript e configurações para o swiper
const swiperCartas = new Swiper(".swiper-cartas", {
  slidesPerView: 1.2,
  spaceBetween: 32,
  loop: false,
  breakpoints: {
    480: {
      slidesPerView: 1.7,
    },
    800: {
      slidesPerView: 2.2,
    },
    1000: {
      slidesPerView: 2.7,
    },
    1300: {
      slidesPerView: 3.5,
    },
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

// Criar um carrousel de lendas com javascript e configurações para o swiper
const swiperLendas = new Swiper(".swiper-lendas", {
  slidesPerView: 1,
  spaceBetween: 0,
  mousewheel: false,
  touch: false,
  allowTouchMove: false,
});

// Função para escolher carta que recebe qual das cartas foi escolhida (de 0 a 4)
const escolherCarta = (index) => {
  // Faz o carrousel de cartas rolar até a carta escolhida
  swiperCartas.slideTo(index);

  // Seleciona todos os slides das cartas
  const slides = document.querySelectorAll(".carrousel-cartas .slide");

  // Passa por todos os slides e deixa todos com a remove a classe css
  slides.forEach((element) => {
    element.classList.remove("hover-active");
  });

  // Adiciona a classe css no slide escolhido, para ficar com efeito de carta pra cima
  // slides[index].classList.add("hover-active");

  // Também muda o carrousel de lendas para a lenda da carta escolhida
  swiperLendas.slideTo(index);
};

// Função para fechar ou abrir o header mobile
const menuMobile = () => {
  // Adiciona ou remove a classe css de ativa no header
  document.querySelector(".header").classList.toggle("active");
};

/* Função para fechar ou abrir o dropdown do usuário no header */
function functionDropdown() {
  document.getElementById('menu_dropdown').classList.toggle('show');
}

function functionDropdownMobile() {
  document.getElementById('menu_dropdownMobile').classList.toggle('show');
}

// Fecha o dropdown se o usuário clicar fora dele
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName('dropdown-conteudo');
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
