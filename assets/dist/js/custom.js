"use strict";

var MNSK = {
  FSStepBase: 5,
  // 5 means standard font size
  FSStep: 5,
  // initial setting, should be the same as FSStepBase, smaller will go down to 1, bigger up to 9
  FSStepRange: 4,
  // font size can be decreased/increased up to stepRange pixels
  toggleMobNav: function toggleMobNav() {
    var $links = document.querySelectorAll(".js-nav-toggler");

    var toggleNav = function toggleNav() {
      this.classList.toggle("is-active");
      var $topnav = document.getElementById("topNav");

      if ($topnav) {
        $topnav.classList.toggle("is-active");
      } else {
        alert("Top Navigation NOT Included!");
      }
    };

    $links.forEach(function (el) {
      return el.addEventListener("click", toggleNav);
    });
  },
  prepareMobSubNav: function prepareMobSubNav() {
    var $menuLi = document.querySelectorAll(".top-nav > li");

    var addSubmenu = function addSubmenu(el) {
      var $submenu = el.querySelector("ul");

      if ($submenu) {
        // let html = `<a class="submenu-toggler js-submenu-toggler" href="javascript:void(0);"></a>`;
        var $submenuToggler = document.createElement("a");
        $submenuToggler.setAttribute("href", "javascript:void(0)");
        $submenuToggler.setAttribute("class", "submenu-toggler js-submenu-toggler");
        el.prepend($submenuToggler);
      }
    };

    $menuLi.forEach(function (el) {
      return addSubmenu(el);
    });
    MNSK.toggleMobSubNav();
    MNSK.goBackMobSubNav();
  },
  toggleMobSubNav: function toggleMobSubNav() {
    var $links = document.querySelectorAll(".js-submenu-toggler");

    var toggleSubNav = function toggleSubNav() {
      var $subnav = this.closest("li").querySelector("ul");

      if ($subnav) {
        var sublinksHTML = $subnav.innerHTML;
        var $subnavWrap = document.querySelector(".subnav-wrap ul");
        $subnavWrap.innerHTML = sublinksHTML;
        MNSK.toggleMobNavWrapper();
      }
    };

    $links.forEach(function (el) {
      return el.addEventListener("click", toggleSubNav);
    });
  },
  toggleMobNavWrapper: function toggleMobNavWrapper() {
    var $mobnavWrap = document.querySelector(".mobnav-wrap");
    $mobnavWrap.classList.toggle("is-opened");
  },
  goBackMobSubNav: function goBackMobSubNav() {
    var $links = document.querySelectorAll(".js-submenu-back");

    var toggleWrapper = function toggleWrapper() {
      MNSK.toggleMobNavWrapper();
    };

    $links.forEach(function (el) {
      return el.addEventListener("click", toggleWrapper);
    });
  },
  initCarousel: function initCarousel() {
    var $glide = document.querySelector(".glide");

    if (typeof $glide === 'undefined' || $glide === null) {
      return;
    }

    if (typeof Glide === 'undefined') {
      return;
    }

    if (window.innerWidth < 992) {
      document.querySelector(".glide__arrows").style.display = "none";
      return;
    }

    var perView = 3;
    var $items = document.querySelectorAll(".glide__slide");

    if ($items.length < perView) {
      document.querySelector(".glide__arrows").remove();
      return;
    }

    var glide = new Glide('.glide', {
      type: 'carousel',
      startAt: 0,
      perView: perView,
      keyboard: true,
      animationTimingFunc: 'ease',
      animationDuration: 600,
      breakpoints: {
        768: {
          perView: 1
        }
      }
    });
    glide.mount();
  },
  initArticleGallery: function initArticleGallery() {
    var $glide = document.querySelector(".glide-sub");

    if (typeof $glide === 'undefined' || $glide === null) {
      return;
    }

    if (typeof Glide === 'undefined') {
      return;
    }

    var perView = 3;
    var $items = document.querySelectorAll(".glide__slide");

    if ($items.length < perView) {
      document.querySelector(".glide__arrows").remove();
      return;
    }

    var glide = new Glide('.glide-sub', {
      type: 'carousel',
      startAt: 0,
      perView: 3,
      keyboard: true,
      animationTimingFunc: 'ease',
      animationDuration: 600,
      breakpoints: {
        768: {
          perView: 2
        }
      }
    });
    glide.mount();
  },
  scrollToTop: function scrollToTop() {
    var $scrollTop = document.querySelector('.scroll-top');

    var scrollToTop = function scrollToTop() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    };

    $scrollTop.addEventListener('click', scrollToTop);
  },
  initPageLightbox: function initPageLightbox() {
    var $gallery = document.getElementById('gallery');

    if (typeof $gallery === 'undefined' || $gallery === null) {
      return;
    }

    if (typeof lightGallery === 'undefined') {
      return;
    }

    lightGallery($gallery);
  },
  getNumberFromStringHelper: function getNumberFromStringHelper(str) {
    if (str === undefined) {
      str = "16px";
    }

    if (str.includes("NaN")) {
      str = "16px";
    }

    var num = parseInt(str.match(/(\d+)/));
    return num;
  },
  toggleWebFontSize: function toggleWebFontSize() {
    var $html = document.querySelector("html");
    var htmlCSS = window.getComputedStyle($html);
    var htmlFontSizeStr = htmlCSS.getPropertyValue('font-size');
    var htmlFontSizeNum = MNSK.getNumberFromStringHelper(htmlFontSizeStr);

    var setupNewFS = function setupNewFS() {
      var newFS = htmlFontSizeNum + MNSK.FSStep - MNSK.FSStepBase;
      var newFSstr = newFS + "px";
      $html.style.fontSize = newFSstr;

      if (newFS > htmlFontSizeNum) {
        $html.classList.add("has-big-fs");
      } else {
        $html.classList.remove("has-big-fs");
      }

      if (typeof Storage !== "undefined") {
        localStorage.fontSize = newFSstr;
      }
    };

    if (typeof Storage !== "undefined") {
      if (localStorage.fontSize !== htmlFontSizeStr) {
        var setFS = localStorage.fontSize;
        var setFSnum = MNSK.getNumberFromStringHelper(setFS);
        MNSK.FSStep = setFSnum - htmlFontSizeNum + MNSK.FSStepBase;
        setupNewFS();
      }
    }

    var $smaller = document.getElementById("smallerFontSize");
    $smaller.addEventListener("click", function () {
      if (MNSK.FSStep < MNSK.FSStepBase - MNSK.FSStepRange) {
        return;
      }

      MNSK.FSStep--;
      setupNewFS();
    });
    var $bigger = document.getElementById("biggerFontSize");
    $bigger.addEventListener("click", function () {
      if (MNSK.FSStep >= MNSK.FSStepBase + MNSK.FSStepRange) {
        return;
      }

      MNSK.FSStep++;
      setupNewFS();
    });
  },
  cookiePolicy: function cookiePolicy() {
    var $cookies = document.getElementById('cookies');

    if ($cookies) {
      var toggleCookies = function toggleCookies() {
        document.getElementById('cookies').classList.toggle("opened");
      };

      var acceptCookies = function acceptCookies() {
        if (typeof Storage !== "undefined") {
          localStorage.cookies = true;
          var d = new Date();
          var acceptedAt = d.getTime();
          localStorage.acceptedAt = parseInt(acceptedAt);
        }

        toggleCookies();
      };

      var now = new Date();
      var nowTime = now.getTime();

      if (localStorage.cookies === 'true') {
        if (nowTime - localStorage.acceptedAt > 900000000) {
          localStorage.cookies = false;
          toggleCookies();
        }
      } else {
        toggleCookies();
      }

      document.getElementById('close-cookies--accept').addEventListener('click', acceptCookies);
    }
  }
};
MNSK.toggleMobNav();
MNSK.prepareMobSubNav();
MNSK.initCarousel();
MNSK.initArticleGallery();
MNSK.scrollToTop();
MNSK.initPageLightbox();
MNSK.toggleWebFontSize();
MNSK.cookiePolicy();
