const swiper = new Swiper('.swiper-container', {
  // Optional parameters
  loop: true,

  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
  },
  autoplay: {
    delay: 5000,
  },
});

let menuToggle = $('.header-menu-toggle');
menuToggle.on('click', function (event){
  event.preventDefault();
  console.log('Клик по кнопке меню');
  $('.header-nav').slideToggle(200);
})