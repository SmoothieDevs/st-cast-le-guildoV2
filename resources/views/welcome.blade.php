<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>St-Cast-Le-Guildo</title>
  @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/scss/app.scss'])
</head>

<body>
  <div class="body">
    <div class="main-logo">
      <h1>
        <a href="/">
          <span class="sup">St Cast</span>
          <span class="sub">Le Guildo</span>
      </h1>
      </a>
    </div>
    <div class="station">
      <span class="icon"></span>
      <time class="time"></time>
      <p class="lieu"><span>|</span></p>
    </div>
    <button class="btn-menu">

    </button>
    <main>
      <div class="inner-main">
        <section id="section-hero" class="hero-section" data-color="white">
          <div class="bg-img">

          </div>
      </div>
      <div class="main-page">
        <section id="section1" class="section1" data-color="black">
          <div class="container">
            <div class="wrapper">
              <div class="wrapper-left">
                <div class="title">
                  <h2 class="bar">Un appartement au <br>bord de la mer</h2>
                </div>
                <div class="description">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus
                    venenatis.</p>
                </div>
              </div>
              <div class="wrapper-right">
                <figure id="figure-1">
                  <img id="item-1" loading="lazy" class="item" data-transform="translate(0px,-200px) rotate(3deg)" src="{{ asset('images/st-cast/St-Cast-section1.1.jpg')}}" alt="Image du port">
                  <img id="item-2" loading="lazy" class="item" data-transform="translate(0px,-200px) rotate(-5deg)" src="{{ asset('images/st-cast/St-Cast-section1.3.jpg')}}" alt="La mer">
                  <img id="item-3" loading="lazy" class="item" data-transform="translate(0px,-200px) rotate(1deg)" src="{{ asset('images/st-cast/St-Cast-section1.2.jpg')}}" alt="la Cote">
                </figure>
              </div>
            </div>
          </div>
        </section>
        <section id="section2" class="section2" data-color="black">
          <div class="container">
            <div class="wrapper">
              <div class="wrapper-left">
                <div class="slider">
                  <div class="hidder-l"></div>
                  <div class="hidder-r"></div>
                  <figure>
                    <img src="{{ asset('images/st-cast/slider1.jpg')}}">
                    <img style="display: none ;" src="{{ asset('images/st-cast/slider2.jpg')}}">
                    <img style="display: none ;" src="{{ asset('images/st-cast/slider3.jpg')}}">
                    <img style="display: none ;" src="{{ asset('images/st-cast/slider4.jpg')}}">
                  </figure>
                  <div class="index">
                    <p class="actual"></p>
                    <span></span>
                    <p class="total"></p>
                  </div>
                </div>
              </div>
              <div class="wrapper-right">
                <div class="title">
                  <h2 class="bar">Venez découvrir <br>St-Cast Le Guildo</h2>
                </div>
                <div class="description">
                  <p>Explorer le merveilleux littoral et les belles <br>campagnes de Saint-Cast Le Guildo.</p>
                </div>
                <ul>
                  <li class="plage">
                    <p>7 Magnifiques plages</p>
                  </li>
                  <li class="nautique">
                    <p>Un Centre Nautique</p>
                  </li>
                  <li class="phare">
                    <p>Proche du Cap Fréhel</p>
                  </li>
                  <li class="arbre">
                    <p>Un Acrobranche</p>
                  </li>
                </ul>
                <div class="wrapper-btn">
                  <a class="btn" href="https://villedesaintcastleguildo.fr/" target="_blank">En savoir plus</a>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section id="banner-img" class="section3" data-color="white">
          <figure>
            <img width="100%" height="412px" loading="lazy" src="{{ asset('images/st-cast/banner-img.jpg')}}" alt="Image du port de St-Cast-Le-Guildo">
          </figure>
          <div class="container">
            <div class="wrapper">
              <h3>Le Port</h3>
            </div>
          </div>
        </section>
        <section id="section4" class="section4" data-color="black">
          <div class="container">
            <div class="wrapper-top">
              <h2>Un Sublime Appartement</h2>
            </div>
            <div class="wrapper">
              <div class="wrapper-left">
                <figure id="figure-1">
                  <img id="item-1" loading="lazy" class="item" data-transform="translate(0,-20%) rotate(2.3deg)" src="{{ asset('images/st-cast/Appartement1.jpg')}}" alt="Image du port">
                  <img id="item-2" loading="lazy" class="item" data-transform="translate(0,-20%) rotate(-9.3deg)" src="{{ asset('images/st-cast/Appartement2.jpg')}}" alt="La mer">
                </figure>
              </div>
              <div class="wrapper-right">
                <div class="title">
                  <h3 class="bar">Description</h3>
                </div>
                <div class="description">
                  <p>Nous vous proposons un duplex T3 à Saint-Cast Le Guildo. Situé à 300 mètres du centre et de la
                    grande plage, dans une ravissante résidence de standing.<br><br>Cet appartement est orienté vers
                    la mer avec un balcon-Terasse ou l’on peut appercevoir la mer au loin, quelle chance !</p>
                </div>
              </div>

            </div>
          </div>
        </section>
      </div>
  </div>
  </main>
  </div>
</body>

</html>