<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>St-Cast-Le-Guildo</title>
  @vite(['resources/css/loader.css','resources/js/loader.js'])
  @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/scss/app.scss'])
</head>

<body style="position: fixed;" id="body">

  <div class="loader">
    <div class="wrapper">
      <div class="icon"></div>
      <p>Chargement...</p>
    </div>
  </div>
  <div class="main-logo">
    <h1>
      <a href="/">
        <span class="sup">Cézembre</span>
        <span class="sub">Le Guildo</span>
    </h1>
    </a>
  </div>
  <div class="station">
    <span class="icon"></span>
    <time class="time"></time>
    <p class="lieu">Saint-Cast-le-Guildo</p>
    <p class="temperature"></p>

  </div>
  <button class="btn-menu">
    menu
  </button>
  <x-booking-form />
  <nav>
    <div class="nav-bg"></div>
    <div class="nav-container">
      <div class="nav-wrapper">
        <div class="nav-wrapper-l">
          <ul>
            <li><a class="accueil" href="">Accueil</a></li>
            <li><a class="st-cast" href="">St-Cast</a></li>
            <li><a class="appartement" href="">Appartement</a></li>
            <li><a class="contact" href="">Contact</a></li>
          </ul>
        </div>
        <div class="nav-wrapper-r"></div>
      </div>

    </div>
  </nav>

  <main>

    <section id="section-hero" class="hero-section" data-color="white">
      <img class="bg-img" src="{{ asset('images/st-cast/St-Cast-Hero.jpg')}}">
    </section>
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
            <figure id="figure-2">
              <img id="item-4" loading="lazy" class="item" data-transform="translate(0,-330px) rotate(2.3deg)" src="{{ asset('images/st-cast/Appartement1.jpg')}}" alt="Image du port">
              <img id="item-5" loading="lazy" class="item" data-transform="translate(0,-330px) rotate(-9.3deg)" src="{{ asset('images/st-cast/Appartement2.jpg')}}" alt="La mer">
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
    <section id="section5" class="section5" data-color="black">
      <div class="container">
        <div class="wrapper">
          <div class="wrapper-left">
            <div class="title">
              <h3 class="bar">Caractéristiques</h3>
            </div>
            <div class="caracteristique">
              <ul>
                <li><span class="wc">Double WC</span></li>
                <li><span class="frigo">Frigo et Congélateur</span></li>
                <li><span class="vaisselle">Lave vaisselle</span></li>
                <li><span class="bouilloire">Bouilloire</span></li>
              </ul>
              <ul>
                <li><span class="linge">Lave linge</span></li>
                <li><span class="télé">Télévision</span></li>
                <li><span class="ondes">Micro-ondes</span></li>
                <li><span class="four">Four</span></li>
              </ul>
              <ul>
                <li><span class="internet">Pas de connexion internet</span></li>
                <li><span class="balcon">Balcon-Terasse orienté vers la mer</span></li>
                <li><span class="garage">Garage Privé</span></li>
                <li><span class="porte">Porte Sécurisé</span></li>
              </ul>
            </div>
          </div>
          <div class="wrapper-right">
            <figure id="figure-3">
              <img id="item-6" loading="lazy" class="item" data-transform="translate(0,-150px) rotate(-2.8deg)" src="{{ asset('images/st-cast/Appartement3.jpg')}}" alt="Image du port">
              <img id="item-7" loading="lazy" class="item" data-transform="translate(0,-150px) rotate(1deg)" src="{{ asset('images/st-cast/Appartement4.jpg')}}" alt="La mer">
            </figure>
          </div>
        </div>
    </section>
    <section id="section6" class="section6" data-color="white">
      <div class="container-s">
        <div class="wrapper">
          <div class="wrapper-top">
            <div class="title">
              <h3>Une question ? Une envie de réserver ?</h3>
            </div>
          </div>
          <div class="wrapper-left">
            <p class="description">Vous pouvez nous contacter par mail ou par téléphone</p>
          </div>
          <div class="wrapper-right">
            <a class="btn ghost">Nous contacter</a>
          </div>
        </div>
      </div>
    </section>

    <footer>
      <div class="container">
        <div class="wrapper">
          <div class="title">
            <span>St Cast</span>
            <span>Le Guildo</span>
          </div>
          <ul>
            <li class="mentions"><a href="/">Mentions légales</a></li>
            <li class="reglement"><a href="/">Règlement intérieur</a></li>
            <li class="conditions"><a href="/">Conditions générales de vente</a></li>
          </ul>
          <a href="#body" class="top"></a>
          <address><span>Téléphone : </span><a href="tel:+33660739864">+33 6 60 73 98 64</a></address>
          <p class="copyright">Fait avec <span></span> par Will</p>
        </div>
      </div>
    </footer>
  </main>
</body>

</html>