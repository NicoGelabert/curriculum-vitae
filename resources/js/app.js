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
  
  Alpine.data('lightbox', () => ({
    isOpen: false,
    imageUrl: '',
    openLightbox(url) {
        this.imageUrl = url;
        this.isOpen = true;
    }
  }))
  
});

Alpine.start();
// dark mode
const toggleThemeButtons = document.querySelectorAll('.toggle-theme');
function toggleTheme() {
  document.documentElement.classList.toggle('dark');
  toggleThemeButtons.forEach(button => {
    button.classList.toggle('dark');
  });
}
toggleThemeButtons.forEach(button => {
  button.addEventListener('click', toggleTheme);
});
// dark mode

// SPLIDE
document.addEventListener( 'DOMContentLoaded', function () {
  // Home Hero Banner
  var homeHeroBanner = new Splide('.home-hero-banner-content', {
      type        : 'fade',
      rewind      : true,
      pagination  : true,
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
// Experience
  var experiences = new Splide( '#experiences', {
    perPage     : 1,
    height      : '20rem',
    direction   : 'ttb',
    arrows      : false,
    pagination  : false,
    wheel       : true,
    gap         : '10rem',
    breakpoints : {
      480 : {
        height      : '40rem',
        perPage     : 1,
        direction   : 'ltr',
        wheel       : false,
      }
    }
  });
  var bar_ex = experiences.root.querySelector( '.my-slider-progress-bar' );
  experiences.on( 'mounted move', function () {
    var end  = experiences.Components.Controller.getEnd() + 1;
    var rate = Math.min( ( experiences.index + 1 ) / end, 1 );
    bar_ex.style.width = String( 100 * rate ) + '%';
  } );
  experiences.mount();
  
// Experience

// Education
var education = new Splide( '#education', {
  perPage     : 1,
  height      : '20rem',
  direction   : 'ttb',
  arrows      : false,
  pagination  : false,
  wheel       : true,
  gap         : '10rem',
  breakpoints : {
    480 : {
      height      : '30rem',
      perPage     : 1,
      direction   : 'ltr',
      wheel       : false,
    }
  }
});
var bar_ed = education.root.querySelector( '.my-slider-progress-bar' );
education.on( 'mounted move', function () {
  var end  = education.Components.Controller.getEnd() + 1;
  var rate = Math.min( ( education.index + 1 ) / end, 1 );
  bar_ed.style.width = String( 100 * rate ) + '%';
} );
education.mount();

// Education

});
  // Fin Home Hero Banner

// Service galery
if (document.querySelector('#service_gallery')) {
  var servicegallery = new Splide('#service_gallery', {
    type        : 'loop',
    drag        : 'free',
    focus       : 'center',
    arrows      : false,
    pagination  : false,
    fixedWidth  : 300,
    autoScroll  : {
      speed     : 1,
    },
  });

  servicegallery.mount({ AutoScroll });
}
// Fin Service galery