import './bootstrap';

import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse'
import {get, post} from "./http.js";
import 'flowbite';
import Splide from '@splidejs/splide';
import { AutoScroll } from '@splidejs/splide-extension-auto-scroll';

Alpine.plugin(collapse)

window.Alpine = Alpine;

document.addEventListener("alpine:init", async () => {

  Alpine.data("toast", () => ({
    visible: false,
    delay: 5000,
    percent: 0,
    interval: null,
    timeout: null,
    message: null,
    close() {
      this.visible = false;
      clearInterval(this.interval);
    },
    show(message) {
      this.visible = true;
      this.message = message;

      if (this.interval) {
        clearInterval(this.interval);
        this.interval = null;
      }
      if (this.timeout) {
        clearTimeout(this.timeout);
        this.timeout = null;
      }

      this.timeout = setTimeout(() => {
        this.visible = false;
        this.timeout = null;
      }, this.delay);
      const startDate = Date.now();
      const futureDate = Date.now() + this.delay;
      this.interval = setInterval(() => {
        const date = Date.now();
        this.percent = ((date - startDate) * 100) / (futureDate - startDate);
        if (this.percent >= 100) {
          clearInterval(this.interval);
          this.interval = null;
        }
      }, 30);
    },
  }));

  Alpine.data("productItem", (product) => {
    return {
      product,
      addToCart(quantity = 1) {
        post(this.product.addToCartUrl, {quantity})
          .then(result => {
            this.$dispatch('cart-change', {count: result.count})
            this.$dispatch("notify", {
              message: "The item was added into the cart",
            });
          })
          .catch(response => {
            console.log(response);
          })
      },
      removeItemFromCart() {
        post(this.product.removeUrl)
          .then(result => {
            this.$dispatch("notify", {
              message: "The item was removed from cart",
            });
            this.$dispatch('cart-change', {count: result.count})
            this.cartItems = this.cartItems.filter(p => p.id !== product.id)
          })
      },
      changeQuantity() {
        post(this.product.updateQuantityUrl, {quantity: product.quantity})
          .then(result => {
            this.$dispatch('cart-change', {count: result.count})
            this.$dispatch("notify", {
              message: "The item quantity was updated",
            });
          })
      },
    };
  });
  
});

Alpine.start();
// dark mode
const toggleThemeButtons = document.querySelectorAll('.toggle-theme');
function toggleTheme() {
  document.documentElement.classList.toggle('dark');
  toggleThemeButtons.forEach(button => {
    button.classList.toggle('dark');
  });

  if (document.documentElement.classList.contains('dark')) {
    localStorage.setItem('theme', 'dark');
  } else {
    localStorage.setItem('theme', 'light');
  }

}
toggleThemeButtons.forEach(button => {
  button.addEventListener('click', toggleTheme);
});

document.addEventListener('DOMContentLoaded', () => {
  const savedTheme = localStorage.getItem('theme');

  if (savedTheme === 'dark') {
    document.documentElement.classList.add('dark');
    toggleThemeButtons.forEach(button => {
      button.classList.add('dark');
    });
  }
});
// dark mode

// SPLIDE
document.addEventListener( 'DOMContentLoaded', function () {
  // Home Hero Banner
  var homeHeroBanner = new Splide('.home-hero-banner-content', {
      type        : 'fade',
      rewind      : true,
      pagination  : false,
      isNavigation: false,
      arrows      : false,
      focus       : 'center',
      autoplay    : 'play',
      interval    : '5000'
  });

  homeHeroBanner.on('mounted move', function() {
    var activeSlide = homeHeroBanner.Components.Slides.getAt(homeHeroBanner.index).slide;
    var previousSlide = homeHeroBanner.Components.Slides.getAt(homeHeroBanner.index - 1);
    if (previousSlide) {
      animateSlideOutElements(previousSlide.slide);
    }
    animateSlideElements(activeSlide);
  });

  homeHeroBanner.mount();

  function animateElement(element, delay) {
    setTimeout(() => {
      element.classList.add('active');
    }, delay);
  }

  function animateSlideElements(slide) {
    var img = slide.querySelector('.animate-img');
    var h1 = slide.querySelector('.animate-h1');
    var p = slide.querySelector('.animate-p');
    var button = slide.querySelector('.animate-button');
    var icon = slide.querySelector('.animate-icon');

    animateElement(img, 250); // 1.25 segundos después
    animateElement(icon, 500); // 0.5 segundos después (borde)
    animateElement(h1, 750); // 0.75 segundos después
    animateElement(p, 1000); // 1 segundo después
    animateElement(button, 1250); // 1.75 segundos después
  }

  function animateSlideOutElements(slide) {
    var elements = slide.querySelectorAll('.active');
    elements.forEach(function(element) {
      element.classList.remove('active');
    });
  }
// Fin Home Hero Banner

// Experience and Education
  document.querySelectorAll('.modalSlider').forEach((el) => {
  let slider = new Splide(el, {
    perPage     : 3,
    perMove     : 1,
    arrows      : true,
    pagination  : false,
    wheel       : false,
    gap         : '3rem',
    breakpoints : {
      480: {
        direction: 'ttb',
        gap      : '1.5rem',
        height   : '500px',
        perPage  : 2,
      },
    }
  });

  // Buscamos la barra de progreso DENTRO de este slider
  let progressBar = el.querySelector('.my-slider-progress-bar');

  slider.on('mounted move', function () {
    let end = slider.Components.Controller.getEnd() + 1;
    let rate = Math.min((slider.index + 1) / end, 1);
    if (progressBar) {
      progressBar.style.width = String(100 * rate) + '%';
    }
  });

  slider.mount();
});

// Skills
var skills = new Splide('#skills', {
  type        : 'loop',
  perPage     : 6,
  drag        : 'free',
  pagination  : false,
  arrows      : false,
  width       : '95%',
  focus       : 'center',
  autoScroll  : {
    speed: 1,
  },
  breakpoints : {
    480 : {
      perPage : 3,
    }
  }
});

skills.mount( { AutoScroll } );
//Skills

// Portfolio
var main = new Splide( '#main-carousel', {
  type      : 'fade',
  rewind    : true,
  pagination: true,
  arrows    : true,
});

var thumbnails = new Splide( '#thumbnail-carousel', {
  type        : 'loop',
  perPage     : 3,
  gap         : 10,
  rewind      : true,
  pagination  : false,
  arrows      : false,
  isNavigation: true,
  breakpoints : {
    480 : {
      perPage : 6,
    }
  }
});

main.sync( thumbnails );
main.mount();
thumbnails.mount();

thumbnails.on('mounted', function(){
  limitPaginationDots(thumbnails);
})

function limitPaginationDots(thumbnails) {
  const maxDots = 5;
  const pagination = thumbnails.Components.Pagination;
  const dots = pagination.data.list.childNodes;

  if (dots.length > maxDots) {
    const step = Math.ceil(dots.length / maxDots);
    const newDots = [];

    for (let i = 0; i < maxDots; i++) {
      const dotIndex = i * step;
      newDots.push(dots[dotIndex]);
    }

    // Clear existing dots
    pagination.data.list.innerHTML = '';

    // Append limited dots
    newDots.forEach(dot => {
      pagination.data.list.appendChild(dot);
    });
  }
}
// Fin Portfolio

});


// Service galery
// if (document.querySelector('#service_gallery')) {
//   var servicegallery = new Splide('#service_gallery', {
//     type        : 'loop',
//   });

//   servicegallery.mount({ AutoScroll });
// }
// Fin Service galery