let MNSK = {
	FSStepBase: 5, // 5 means standard font size
	FSStep: 5, // initial setting, should be the same as FSStepBase, smaller will go down to 1, bigger up to 9
	FSStepRange: 4, // font size can be decreased/increased up to stepRange pixels

	toggleMobNav: () => {
		let $links = document.querySelectorAll(".js-nav-toggler");
		let toggleNav = function () {
			this.classList.toggle("is-active");

			let $topnav = document.getElementById("topNav");
			if ($topnav) {
				$topnav.classList.toggle("is-active");
			} else {
				alert("Top Navigation NOT Included!");
			}
		};

		$links.forEach(el => el.addEventListener("click", toggleNav));
	},
	prepareMobSubNav: () => {
		let $menuLi = document.querySelectorAll(".top-nav > li");
		let addSubmenu = function(el){
			let $submenu = el.querySelector("ul");

			if( $submenu ) {
				// let html = `<a class="submenu-toggler js-submenu-toggler" href="javascript:void(0);"></a>`;
				let $submenuToggler = document.createElement("a");
				$submenuToggler.setAttribute("href", "javascript:void(0)");
				$submenuToggler.setAttribute("class", "submenu-toggler js-submenu-toggler");
				el.prepend($submenuToggler);
			}
		};

		$menuLi.forEach(el => addSubmenu(el));

		MNSK.toggleMobSubNav();
		MNSK.goBackMobSubNav();
	},
	toggleMobSubNav: () => {
		let $links = document.querySelectorAll(".js-submenu-toggler");
		let toggleSubNav = function(){
			let $subnav = this.closest("li").querySelector("ul");
			if ($subnav) {
				let sublinksHTML = $subnav.innerHTML;				 
				let $subnavWrap = document.querySelector(".subnav-wrap ul");

				$subnavWrap.innerHTML = sublinksHTML;

				MNSK.toggleMobNavWrapper();
			}
		}

		$links.forEach(el => el.addEventListener("click", toggleSubNav));
	},
	toggleMobNavWrapper: () => {
		let $mobnavWrap = document.querySelector(".mobnav-wrap");

		$mobnavWrap.classList.toggle("is-opened");
	},
	goBackMobSubNav: () => {
		let $links = document.querySelectorAll(".js-submenu-back");
		let toggleWrapper = function(){
			MNSK.toggleMobNavWrapper();
		}

		$links.forEach(el => el.addEventListener("click", toggleWrapper));
	},
	initCarousel: () => {
		let $glide = document.querySelector(".glide");
		if (typeof ($glide) === 'undefined' || $glide === null) {
			return;
		}

		if (typeof Glide === 'undefined') {
			return;
		}

		if( window.innerWidth < 992 ) {
			document.querySelector(".glide__arrows").style.display = "none";
			
			return;
		}

		let perView = 3;

		let $items = document.querySelectorAll(".glide__slide");
			
		if( $items.length < perView ){
			document.querySelector(".glide__arrows").remove();

			return;
		}

		let glide = new Glide('.glide', {
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
		})
		
		glide.mount();

	},
	initArticleGallery: () => {
		let $glide = document.querySelector(".glide-sub");
		if (typeof ($glide) === 'undefined' || $glide === null) {
			return;
		}

		if (typeof Glide === 'undefined') {
			return;
		}

		let perView = 3;

		let $items = document.querySelectorAll(".glide__slide");
			
		if( $items.length < perView ){
			document.querySelector(".glide__arrows").remove();

			return;
		}

		let glide = new Glide('.glide-sub', {
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
		})

		glide.mount();
	},
	scrollToTop: () => {
		let $scrollTop = document.querySelector('.scroll-top');
		let scrollToTop = () => {
			document.body.scrollTop = 0;
			document.documentElement.scrollTop = 0;
		};

		$scrollTop.addEventListener('click', scrollToTop);
	},
	initPageLightbox: () => {
		let $gallery = document.getElementById('gallery');
		if (typeof ($gallery) === 'undefined' || $gallery === null) {
			return;
		}

		if (typeof lightGallery === 'undefined') {
			return;
		}
		lightGallery($gallery);
	},
	getNumberFromStringHelper: str => {
		if (str === undefined){
			str = "16px";
		}

		if( str.includes("NaN") ){
			str = "16px";
		}
		let num = parseInt( str.match(/(\d+)/) );

		return num;
	},
	toggleWebFontSize: () => {
		let $html = document.querySelector("html");
		let htmlCSS = window.getComputedStyle($html);
		let htmlFontSizeStr = htmlCSS.getPropertyValue('font-size');
		let htmlFontSizeNum = MNSK.getNumberFromStringHelper(htmlFontSizeStr);
		let setupNewFS = function(){
			let newFS = htmlFontSizeNum + MNSK.FSStep - MNSK.FSStepBase;
			let newFSstr = newFS + "px";

			$html.style.fontSize = newFSstr;

			if( newFS > htmlFontSizeNum ){
				$html.classList.add("has-big-fs");
			} else {
				$html.classList.remove("has-big-fs");
			}

			if (typeof Storage !== "undefined") {
				localStorage.fontSize = newFSstr;	
			}
		};

		if (typeof Storage !== "undefined") {
			if (localStorage.fontSize !== htmlFontSizeStr ) {
				let setFS = localStorage.fontSize;
				let setFSnum = MNSK.getNumberFromStringHelper(setFS);

				MNSK.FSStep = setFSnum - htmlFontSizeNum + MNSK.FSStepBase;

				setupNewFS();
			}
		}

		let $smaller = document.getElementById("smallerFontSize");
		$smaller.addEventListener("click", function(){
			if( MNSK.FSStep < MNSK.FSStepBase - MNSK.FSStepRange ){
				return;
			}
 
			MNSK.FSStep--;

			setupNewFS();
		});

		let $bigger = document.getElementById("biggerFontSize");
		$bigger.addEventListener("click", function(){
			if( MNSK.FSStep >= MNSK.FSStepBase + MNSK.FSStepRange ){
				return;
			}

			MNSK.FSStep++;

			setupNewFS();
		});
	},
	cookiePolicy:() => {
		let $cookies = document.getElementById('cookies');

		if ($cookies) {
			let toggleCookies = function toggleCookies() {
				document.getElementById('cookies').classList.toggle("opened");
			};
			let acceptCookies = function acceptCookies() {
				if (typeof Storage !== "undefined") {
					localStorage.cookies = true;
					let d = new Date();
					let acceptedAt = d.getTime();
					localStorage.acceptedAt = parseInt(acceptedAt);
				}

				toggleCookies();
			};
			let now = new Date();
			let nowTime = now.getTime();

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
	},
}

MNSK.toggleMobNav();
MNSK.prepareMobSubNav();
MNSK.initCarousel();
MNSK.initArticleGallery();
MNSK.scrollToTop();
MNSK.initPageLightbox();
MNSK.toggleWebFontSize();
MNSK.cookiePolicy();