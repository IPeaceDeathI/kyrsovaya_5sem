<!DOCTYPE html>
<html lang='en-gb' dir='ltr'>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name='theme-color' content='#2ECC8A'>

    <title>Body Kits</title>

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-grid.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/lity.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel='shortcut icon' type='images/jpeg' href='images/icon.jpeg'>
</head>

<?php 
require_once "src/View/templates/header.php"
?>

<div class='push larger'></div>

<div class='container'>

    <div id='content' class='row justify-content-center'>



        <div class="col-md-6 animated-short fadeInUp">
            <a id="bk_p" class='project  noselect' style='background-image:url("/images/body_kits/bk_porsche.jpg")' href='#'>
                <img src="/images/body_kits/bk_porsche.jpg" style="max-width: 60%;opacity: 0">
            </a>
            <p class='project-under'>
                <a href="#">ОБВЕСЫ НА АВТОМОБИЛИ PORSCHE</a>
            </p>
        </div>



        <div class="col-md-6 animated-short fadeInUp">
            <a id="bk_n" class='project  noselect' style='background-image:url("/images/body_kits/bk_nissan.jpg")' href='#'>
                <img src="/images/body_kits/bk_nissan.jpg" style="max-width: 60%;opacity: 0">
            </a>
            <p class='project-under'>
                <a href="#">ОБВЕСЫ НА АВТОМОБИЛИ NISSAN</a>
            </p>
        </div>


        <div class="col-md-6 animated-short fadeInUp">
            <a id="bk_d" class='project  noselect' style='background-image:url("/images/body_kits/bk_dodge.jpg")' href='#'>
                <img src="/images/body_kits/bk_dodge.jpg" style="max-width: 50%;opacity: 0">
            </a>
            <p class='project-under'>
                <a href="#">ОБВЕСЫ НА АВТОМОБИЛИ DODGE</a>
            </p>
        </div>


    </div>

</div>

<div class='push larger'></div>

<?php 
require_once "src/View/templates/footer.php"
?>

<script type='text/javascript' src='/js/jquery.js'></script>
<script type='text/javascript' src='/js/bootstrap.popper.js'></script>
<script type='text/javascript' src='/js/bootstrap.js'></script>
<script type='text/javascript' src='/js/lity.js'></script>

</body>
</html>

