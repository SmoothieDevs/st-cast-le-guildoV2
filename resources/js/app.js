
/*import { gsap } from "gsap";
import { Flip } from "gsap/Flip";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { Observer } from "gsap/Observer";
import { ScrollToPlugin } from "gsap/ScrollToPlugin";
import { Draggable } from "gsap/Draggable";
import { EaselPlugin } from "gsap/EaselPlugin";
import { MotionPathPlugin } from "gsap/MotionPathPlugin";
import { PixiPlugin } from "gsap/PixiPlugin";
import { TextPlugin } from "gsap/TextPlugin";
import Splitting from "splitting"; */

import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
gsap.registerPlugin(ScrollTrigger);

import "./weatherAPI.js";
import "./section2";
import "./footer";

document.addEventListener("DOMContentLoaded", function () {

    let hero = document.querySelector("section.hero-section")
    let navOpen = false;
    //////////// MAIN LOGO ANIMATION ON START SCROLL ////////////
    let mainLogo = document.querySelector(".main-logo");
    let tlMainLogo = gsap.timeline({ paused: true });

    tlMainLogo.add('scroll');
    tlMainLogo.to(mainLogo, { top: 50, duration: 1, ease: "power2.inOut" }, 'scroll')
        .to('.main-logo .sup', { fontSize: 30, duration: 1, ease: "power2.inOut" }, 'scroll')
        .to(".main-logo .sub", { fontSize: 18, duration: 1, ease: "power2.inOut" }, 'scroll')

    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20 && navOpen == false) {
        tlMainLogo.play(1);
    }

    //////////// Navigation Apparition ////////////
    let tl = gsap.timeline({ paused: true }).to(".bg-img", { scale: 1, duration: 1.5, delay: .5, ease: "power3.inOut" }, 'start')
        .to(".station", { opacity: 1, y: 0, duration: 1, delay: 1, ease: "power1.inOut" }, 'start')
        .to(".main-logo .sup", { opacity: 1, y: 0, duration: 1.5, delay: 1, ease: "power1.inOut" }, 'start')
        .to(".main-logo .sub", { opacity: 1, y: 0, duration: 1.5, delay: 1.2, ease: "power1.inOut" }, 'start');
    tl.play();
    /////////// NAVIGATION ///////////

    let button = document.querySelector(".btn-menu");
    let nav = document.querySelector("nav");
    let navAnimDone = true;

    button.addEventListener("click", function () {
        if (navOpen == false) {
            navAnimDone = false;
            openMenu();
            navOpen = true;
        } else {
            closeMenu();
            navOpen = false;
        }
    });

    let tlNavOpen = gsap.timeline({ paused: true });
    let tlNavClose = gsap.timeline({ paused: true });
    tlNavOpen.to("nav li a", { y: 0, duration: 1, ease: "power4.out", stagger: .05, onComplete: function () { navAnimDone = true; } })
    tlNavClose.to("nav li a", { y: "-100%", duration: .3, ease: "power1.in", stagger: .05 })

    function openMenu() {
        nav.classList.add("on");
        tlNavOpen.timeScale(1).play(0);
        if (document.body.scrollTop < 20 || document.documentElement.scrollTop < 20) {
            tlMainLogo.play();
        }
        /* if (document.body.classList.contains("black")) {
            black = true
    
            document.body.classList.toggle("black");
        } else if (black == true) {
            black = false
        } */
    }

    function closeMenu() {
        nav.classList.remove("on");
        if (navAnimDone == true) {
            tlNavClose.play(0);
        }else{
            tlNavOpen.timeScale(2).reverse();
        }
        
        if (document.documentElement.scrollTop < 20) {
            tlMainLogo.reverse();
        }
    }

    //////////// SCROLLING ////////////
    let sectionWhite = document.querySelectorAll('section[data-color="white"]');
    let sectionBlack = document.querySelectorAll('section[data-color="black"]');
    let lastScroll = 0;
    let actualNavColor = 0;

    function getWhiteTransitionTopValue() {
        let result = []
        sectionWhite.forEach(element => {
            result.push(element.getBoundingClientRect().top)
        })
        return result;
    }

    function getBlackTransitionTopValue() {
        let result = []
        sectionBlack.forEach(element => {
            result.push(element.getBoundingClientRect().top)
        })
        return result;
    }

    function getWhiteTransitionBottomValue() {
        let result = []
        sectionWhite.forEach(element => {
            result.push(element.getBoundingClientRect().bottom)
        })
        return result;
    }

    function getBlackTransitionBottomValue() {
        let result = []
        sectionBlack.forEach(element => {
            result.push(element.getBoundingClientRect().bottom)
        })
        return result;
    }

    let WhiteTransitionTopValue = getWhiteTransitionTopValue();
    let BlackTransitionTopValue = getBlackTransitionTopValue();
    let WhiteTransitionBottomValue = getWhiteTransitionBottomValue();
    let BlackTransitionBottomValue = getBlackTransitionBottomValue();

    function scrollFunction() {
        let currentScroll = document.documentElement.scrollTop || document.body.scrollTop; // Get Current Scroll Value
        if (currentScroll > 0 && lastScroll <= currentScroll) {
            lastScroll = currentScroll;
            //Downscroll code
            if (actualNavColor == 1) {
                WhiteTransitionTopValue.forEach(elem => {
                    if (document.documentElement.scrollTop + 100 > elem && document.documentElement.scrollTop < elem + 300) {
                        document.body.classList.remove("black");
                        actualNavColor = 0;
                    }
                })
            } else {
                BlackTransitionTopValue.forEach(elem => {
                    if (document.documentElement.scrollTop + 100 > elem && document.documentElement.scrollTop < elem + 300) {
                        document.body.classList.add("black")
                        actualNavColor = 1;
                    }
                })
            }
        }
        else {
            lastScroll = currentScroll;
            //UP
            if (actualNavColor == 1) {
                WhiteTransitionBottomValue.forEach(elem => {
                    if (document.documentElement.scrollTop < elem && document.documentElement.scrollTop > elem - 300) {
                        document.body.classList.remove("black")
                        actualNavColor = 0
                    }
                })
            } else {
                BlackTransitionBottomValue.forEach(elem => {
                    if (document.documentElement.scrollTop < elem && document.documentElement.scrollTop > elem - 300) {
                        document.body.classList.add("black")
                        actualNavColor = 1
                    }
                })
            }
        }
        if ((document.body.scrollTop > 20 || document.documentElement.scrollTop) > 20 && navOpen == false) {
            tlMainLogo.play();
        } else if ((document.body.scrollTop < 20 || document.documentElement.scrollTop < 20) && navOpen == false) {
            tlMainLogo.reverse();
        }
        if (document.body.scrollTop > 2000 || document.documentElement.scrollTop > 2000) {
            hero.classList.add("hide")
        } else {
            hero.classList.remove("hide")
        }
    }
    window.onscroll = function () { scrollFunction() };

    //////////// IMAGE EFFECT ON SCROLLING WITH GSAP ////////////
    let items = document.querySelectorAll('.item');
    items.forEach(function (el) {
        let elId = el.getAttribute('id');
        let elTransform = el.dataset.transform
        let parent = el.parentNode;
        let parentId = parent.getAttribute('id');

        gsap.to("#" + elId, {
            transform: elTransform,
            transformOrigin: 'center',
            ease: 'none',
            scrollTrigger: {
                trigger: "#" + parentId,
                scrub: 1,
                start: 'top bottom',
                end: 'bottom top',
                markers: false,
            }
        });
    });
})