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
// document.getElementById('toggle-theme').addEventListener('click', function() {
//   document.documentElement.classList.toggle('dark');
// });

// const toggleThemeButton = document.getElementById('toggle-theme');

// toggleThemeButton.addEventListener('click', function() {
//     toggleThemeButton.classList.toggle('dark');
// });
// dark mode

// SPLIDE
document.addEventListener( 'DOMContentLoaded', function () {
  // Home Hero Banner
  var homeHeroBanner = new Splide('.home-hero-banner', {
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
    var h1 = slide.querySelector('.animate-h1');
    var p = slide.querySelector('.animate-p');
    var img = slide.querySelector('.animate-img');
    var h5 = slide.querySelector('.animate-h5');
    var button = slide.querySelector('.animate-button');
    var icon = slide.querySelector('.animate-icon');

    animateElement(icon, 500); // 0.5 segundos después (borde)
    animateElement(h1, 750); // 0.75 segundos después
    animateElement(p, 1000); // 1 segundo después
    animateElement(img, 1250); // 1.25 segundos después
    animateElement(h5, 1500); // 1.5 segundos después (texto dentro del borde)
    animateElement(button, 1750); // 1.75 segundos después
  }

  function animateSlideOutElements(slide) {
    var elements = slide.querySelectorAll('.active');
    elements.forEach(function(element) {
      element.classList.remove('active');
    });
  }
});
  // Fin Home Hero Banner
  // Services home
  document.addEventListener( 'DOMContentLoaded', function () {
  var servicesAttributes = new Splide( '#servicesAttributes', {
    type       : 'fade',
    heightRatio: 0.5,
    pagination : false,
    arrows     : false,
    cover      : true,
    breakpoints     : {
      480 : {
        fixedHeight: '100%',
      },
    }
  } );
  
  var btnService = new Splide( '#btnService', {
    rewind          : true,
    isNavigation    : true,
    gap             : 10,
    focus           : 'center',
    pagination      : false,
    arrows          : false,
    cover           : true,
  });
  
  servicesAttributes.sync( btnService );
  servicesAttributes.mount();
  btnService.mount();
});
// Fin Services Home
  

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