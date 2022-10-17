import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
gsap.registerPlugin(ScrollTrigger);
import Splitting from "splitting";
import { easepick } from '@easepick/core';
import { LockPlugin } from '@easepick/lock-plugin';
import { RangePlugin } from '@easepick/range-plugin';
import { AmpPlugin } from '@easepick/amp-plugin';
document.addEventListener("DOMContentLoaded", function () {
    if (document.getElementById("admin-dashboard")) {
        const charSplit = Splitting({ by: 'chars' });
        //////////// Navigation Apparition ////////////
        let tl = gsap.timeline({ paused: true }).to(".station", { opacity: 1, y: 0, duration: 1, delay: 1, ease: "power1.inOut" }, 'start')
            .to(".main-logo .sup .char", { y: 0, stagger: .08, duration: 1, delay: 1, ease: "power1.inOut" }, 'start')
            .to(".main-logo .sub .char", { y: 0, stagger: .08, duration: 1, delay: 1.5, ease: "power1.inOut" }, 'start');
        tl.play();


        const picker = new easepick.create({
            element: "#datepicker",
            css: [
                "images/css/easypick.css"
            ],
            zIndex: 10,
            lang: "fr-FR",
            format: "DD MMM YYYY",
            grid: 2,
            calendars: 2,
            inline: true,
            plugins: [
                AmpPlugin,
                RangePlugin,
                LockPlugin
            ]
        })

    }
});