
// Modal On Load ==========================================================================
// $(window).on('load',function(){
//   setTimeout(function(){
//     $('.talk-modal').modal('show');
// }, 5000);
// });

// Scroll Animation ==========================================================================
$(document).ready(function() {
 
  (function($) {

    /**
     * Copyright 2012, Digital Fusion
     * Licensed under the MIT license.
     * http://teamdf.com/jquery-plugins/license/
     *
     * @author Sam Sehnert
     * @desc A small plugin that checks whether elements are within
     *     the user visible viewport of a web browser.
     *     only accounts for vertical position, not horizontal.
     */
  
    $.fn.visible = function(partial) {
      
        var $t            = $(this),
            $w            = $(window),
            viewTop       = $w.scrollTop(),
            viewBottom    = viewTop + $w.height(),
            _top          = $t.offset().top,
            _bottom       = _top + $t.height(),
            compareTop    = partial === true ? _bottom : _top,
            compareBottom = partial === true ? _top : _bottom;
      
      return ((compareBottom <= viewBottom) && (compareTop >= viewTop));
  
    };
      
  })(jQuery);
  
  var win = $(window);
  
  var allMods = $(".show-on-scroll");
  
  allMods.each(function(i, el) {
    var el = $(el);
    if (el.visible(true)) {
      el.addClass("scroll-animate"); 
    } 
  });
  
  win.scroll(function(event) {
    
    allMods.each(function(i, el) {
      var el = $(el);
      if (el.visible(true)) {
        el.addClass("is-visible"); 
      } 
    });
    
  });
  
  
 
  });

  //   ============================== Navigation ===============================================

// Nav Scroll -------------------------------------------------------------------------------------

window.onscroll = function() {
    var currentScrollPos = window.pageYOffset;
  
    // Hide Header on on scroll down DesktopNav
    // 20 is an arbitrary number here, just to make you think if you need the prevScrollpos variable:
    if (currentScrollPos > 150) {
      // I am using 'display' instead of 'top':
      document.getElementById("deskNavbar").classList.add("nav-down");
    } else {
      document.getElementById("deskNavbar").classList.remove("nav-down");
    }

    
    // Hide Header on on scroll down MobileNav
    // 20 is an arbitrary number here, just to make you think if you need the prevScrollpos variable:
    if (currentScrollPos > 150) {
      // I am using 'display' instead of 'top':
      document.getElementById("mobNavbar").classList.add("nav-down");
    } else {
      document.getElementById("mobNavbar").classList.remove("nav-down");
    }

  }


//   Mobile Nav Menu --------------------------------------------------------------------------------

// Main-Menu ---
  /* Set the width of the side navigation to 250px */
function openMobMenu() {
    document.getElementById("MobMenu").classList.add("menu-show");
  }
  
  /* Set the width of the side navigation to 0 */
  function closeMobMenu() {
    document.getElementById("MobMenu").classList.remove("menu-show");
  }

// Level-1 (Products) ---
function openMobMenuProducts() {
  document.getElementById("MobMenuProducts").classList.add("menu-show");
}

/* Set the width of the side navigation to 0 */
function closeMobMenuProducts() {
  document.getElementById("MobMenuProducts").classList.remove("menu-show");
}

// Level-1 (Services) ---
function openMobMenuServices() {
  document.getElementById("MobMenuServices").classList.add("menu-show");
}

/* Set the width of the side navigation to 0 */
function closeMobMenuServices() {
  document.getElementById("MobMenuServices").classList.remove("menu-show");
}

// FilterMenu ---
function openProductsFilters() {
  document.getElementById("FilterMenu").classList.add("menu-show");
}

/* Set the width of the side navigation to 0 */
function closeProductsFilters() {
  document.getElementById("FilterMenu").classList.remove("menu-show");
}

// Owl Carousals ==========================================================================

$(document).ready(function() {
 
  $('.gallery-owl').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    navText: ["<div class='gall-nav nav-btn nav-prev'><div class='img-box'><img src='./img/right-chevron.svg' alt='Icon'></div></div>", "<div class='gall-nav nav-btn nav-next'><div class='img-box'><img src='./img/right-chevron.svg' alt='Icon'></div></div>"],
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        }
    }
  })
  
 
  });

$(document).ready(function() {

  $('.why-owl').owlCarousel({
    loop:true,
    margin:0,
    nav:true,
    navText: ["<div class='gall-nav nav-btn nav-prev'><div class='img-box'><img src='./img/right-chevron.svg' alt='Icon'></div></div>", "<div class='gall-nav nav-btn nav-next'><div class='img-box'><img src='./img/right-chevron.svg' alt='Icon'></div></div>"],
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        575:{
          items:2,
          nav:true
        },
        768:{
          items:3,
          nav:true
        },
        1024:{
          items:4,
          nav:true
        }
    }
  })
  
  
  });

$(document).ready(function() {
  $('.testimonial-owl').owlCarousel({
    loop:true,
    margin:0,
    nav:true,
    navText: ["<div class='gall-nav nav-btn nav-prev'><div class='img-box'><img src='./img/right-chevron.svg' alt='Icon'></div></div>", "<div class='gall-nav nav-btn nav-next'><div class='img-box'><img src='./img/right-chevron.svg' alt='Icon'></div></div>"],
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        }
    }
  })
});

$(document).ready(function() {
  $('.prod-owl').owlCarousel({
    loop:true,
    margin:0,
    nav:true,
    navText: ["<div class='gall-nav nav-btn nav-prev'><div class='img-box'><img src='./img/right-chevron.svg' alt='Icon'></div></div>", "<div class='gall-nav nav-btn nav-next'><div class='img-box'><img src='./img/right-chevron.svg' alt='Icon'></div></div>"],
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        }
    }
  })
});

$(document).ready(function() {
  $('.pop-prod-owl').owlCarousel({
    loop:true,
    margin:0,
    nav:true,
    navText: ["<div class='gall-nav nav-btn nav-prev'><div class='img-box'><img src='./img/right-chevron.svg' alt='Icon'></div></div>", "<div class='gall-nav nav-btn nav-next'><div class='img-box'><img src='./img/right-chevron.svg' alt='Icon'></div></div>"],
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        575:{
          items:3,
          nav:true
        },
        992:{
          items:4,
          nav:true
        },
        1024:{
          items:5,
          nav:true
        }
    }
  })
});

// Products Filters ========================================================================
filterSelection("all")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("product-box");
  if (c == "all") c = "";
  // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

// Show filtered elements
function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {
      element.className += " " + arr2[i];
    }
  }
}

// Hide elements that are not selected
function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);
    }
  }
  element.className = arr1.join(" ");
}

// Add active class to the current control button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("tag-btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}