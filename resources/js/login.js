import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
gsap.registerPlugin(ScrollTrigger);

document.addEventListener("DOMContentLoaded", function () {
    if (document.getElementById("login")) {
        let tl = gsap.timeline({ paused: true }).to(".station", { opacity: 1, y: 0, duration: 1, delay: 1, ease: "power1.inOut" }, 'start')
            .to(".main-logo .sup", { opacity: 1, y: 0, duration: 1.5, delay: 1, ease: "power1.inOut" }, 'start')
            .to(".main-logo .sub", { opacity: 1, y: 0, duration: 1.5, delay: 1.2, ease: "power1.inOut" }, 'start');
        tl.play();
    }
});