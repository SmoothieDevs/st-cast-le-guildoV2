<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<<<<<<< HEAD
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
=======
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
>>>>>>> Fixed : Nav color transition
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