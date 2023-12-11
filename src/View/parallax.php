<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3D Landing</title>
    <link rel="stylesheet" href="/css/parallax.css">
    <link rel='shortcut icon' type='/images/jpeg' href='/images/icon.jpeg'>
    <script src="/js/app.js" defer></script>
    <script src="/js/rain.js" defer></script>
</head>
<body>

<div class="logo" style="background-image: url('/images/parallax/BM.png');background-size: contain"></div>

<section class="layers">
    <div class="layers__container">
        <div class="layers__item layer-1" style="background-image: url('/images/parallax/layer-1.png');"></div>
        <div class="layers__item layer-5" style="background-image: url('/images/parallax/layer-2.png');"></div>
        <div class="layers__item layer-2" style="background-image: url('/images/parallax/layer-5.png');"></div>
        <div class="layers__item layer-3">
            <div class="hero-content">
                <h1>luxury sport cars<span>only here</span></h1>
                <div class="hero-content__p">Drive your dreams with us.</div>
                <a href="/main"><button class="button-start">Take a look</button></a>
            </div>
        </div>
        <div class="layers__item layer-4">
            <canvas class="rain"></canvas>
        </div>
<!--        <div class="layers__item layer-6" style="background-image: url('/images/parallax/layer-6.png');"></div>-->
    </div>
</section>

</body>
</html>