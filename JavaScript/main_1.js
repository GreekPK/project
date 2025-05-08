let menu = document.querySelector('.menu-icon');
let navbar = document.querySelector('.menu');

menu.onclick = () => {
    navbar.classList.toggle('active');
    menu.classList.toggle('move');
    bell.classList.remove('active');
}

// Notification
let bell = document.querySelector('.notification')

document.querySelector('#bell-icon').onclick = () =>{
    bell.classList.toggle('active');
}

// Swiper
var swiper = new Swiper(".trending-content", {
    slidesPerView: 1,
    spaceBetween: 10,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    autoplay: {
      delay:5000,
      disableOnInteraction: false,
    },
    breakpoints: {
      640: {
        slidesPerView: 2,
        spaceBetween: 10,
      },
      768: {
        slidesPerView: 3,
        spaceBetween: 15,
      },
      1068: {
        slidesPerView: 4,
        spaceBetween: 20,
      },
    },
  });

  // Custom Scroll Bar
  window.onscroll = function() {mufunction()};

  function mufunction() {
    var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
    var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    var scrolled = (winScroll / height) * 100;
    document.getElementById('scroll-bar').style.width = scrolled + '%';
  }

  // Scroll Animation
  window.addEventListener('scroll',function() {
    var anime = document.querySelectorAll('.animeX')

    for(var s = 0; s < anime.length; s++) {
      var windowheight = window.innerHeight;
      var animetop = anime[s].getBoundingClientRect().top;
      var animepoint = 150;

      if(animetop < windowheight - animepoint) {
          anime[s].classList.add('active');
      }
      else {
          anime[s].classList.remove('active');
      }
    }
  })

  // Filter

  let list = document.querySelectorAll('.list');
  let box = document.querySelectorAll('.box');
 
  for(let i = 0; i < list.length; i++){
      list[i].addEventListener('click', function(){
          for(let j = 0; j < list.length; j++){
              list[j].classList.remove('active');
          }
          this.classList.add('active');
          let dataFilter = this.getAttribute('data-filter');
               
          for(let k = 0; k < box.length; k++){
            box[k].classList.remove('active');
            box[k].classList.add('hide');
 
              if(box[k].getAttribute('data-item') == dataFilter || dataFilter == 'all'){
                box[k].classList.remove('hide');
                box[k].classList.add('active');
              }
          }
      })
  }