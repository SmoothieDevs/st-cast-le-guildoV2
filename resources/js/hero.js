import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
gsap.registerPlugin(ScrollTrigger);

document.addEventListener("DOMContentLoaded", function () {

  let tl = gsap.timeline();
  let items = document.querySelectorAll('.section1 .item');
  let mainLogo = document.querySelector(".main-logo");
  let tlMainLogo = gsap.timeline({ paused: true });

  tlMainLogo.add('scroll');
  tlMainLogo.to(mainLogo, { top: 50, duration: 1, ease: "power2.inOut" }, 'scroll')
    .to('.main-logo .sup', { fontSize: 30, duration: 1, ease: "power2.inOut" }, 'scroll')
    .to(".main-logo .sub", { fontSize: 18, duration: 1, ease: "power2.inOut" }, 'scroll')

  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    tlMainLogo.play(1);

  }

  tl.add('start');
  tl.to(".bg-img", { scale: 1, duration: 1.5, delay: .5, ease: "power3.inOut" }, 'start')
    .to(".station", { opacity: 1, y: 0, duration: 1, delay: 1, ease: "power1.inOut" }, 'start')
    .to(".main-logo .sup", { opacity: 1, y: 0, duration: 1.5, delay: 1, ease: "power1.inOut" }, 'start')
    .to(".main-logo .sub", { opacity: 1, y: 0, duration: 1.5, delay: 1.2, ease: "power1.inOut" }, 'start');

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

  let section = document.querySelectorAll('section');
  let sectionWhite = document.querySelectorAll('section[data-color="white"]');
  let sectionBlack = document.querySelectorAll('section[data-color="black"]');
  let station = document.querySelector(".station");
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
      console.log("DOWN");
      if (actualNavColor == 1) {
        WhiteTransitionTopValue.forEach((elem, index) => {
          if (document.documentElement.scrollTop + 100  > elem && document.documentElement.scrollTop < elem + 300) {
            mainLogo.classList.remove("black")
            station.classList.remove("black")
            actualNavColor = 0
          }
        })
      }else{
        BlackTransitionTopValue.forEach(elem => {
          if (document.documentElement.scrollTop+ 100  > elem && document.documentElement.scrollTop < elem + 300) {
            mainLogo.classList.add("black")
            station.classList.add("black")
            actualNavColor = 1
          }
        })
      }
    }
    else {
      lastScroll = currentScroll;
      console.log("UP");
      if (actualNavColor == 1) {
        WhiteTransitionBottomValue.forEach(elem => {
          if (document.documentElement.scrollTop< elem && document.documentElement.scrollTop > elem - 300) {
            mainLogo.classList.remove("black")
            station.classList.remove("black")
            actualNavColor = 0
          }
        })
      }else{
        BlackTransitionBottomValue.forEach(elem => {
          if (document.documentElement.scrollTop< elem && document.documentElement.scrollTop > elem - 300) {
            mainLogo.classList.add("black")
            station.classList.add("black")
            actualNavColor = 1
          }
        })
      }
    }
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      tlMainLogo.play();
    } else {
      tlMainLogo.reverse();
    }
  }
  window.onscroll = function () { scrollFunction() };
})