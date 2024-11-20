// Criar um carrousel de do time com swiper
const swiper = new Swiper(".mySwiper", {
  slidesPerView: 1.2,
  spaceBetween: 32,
  loop: true,
  breakpoints: {
    400: {
      slidesPerView: 1.5,
    },
    1000: {
      slidesPerView: 2.5,
    },
  },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
});

// Função para fechar ou abrir o header mobile
const menuMobile = () => {
  // Adiciona ou remove a classe css de ativa no header
  document.querySelector('.header').classList.toggle('active');
}

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