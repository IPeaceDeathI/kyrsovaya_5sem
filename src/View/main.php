<!DOCTYPE html>
<html lang='en-gb' dir='ltr'>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name='theme-color' content='#2ECC8A'>

    <title>Boyko &bull; Motors</title>

    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/bootstrap-grid.css">
    <link rel="stylesheet" href="/css/bootstrap-reboot.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/lity.css">
    <link rel="stylesheet" href="/css/animate.css">
    <link rel='shortcut icon' type='/images/jpeg' href='/images/icon.jpeg'>
</head>

<?php
require_once "src/Controller/connectionController.php";
?>

<header>
    <div class="message"><p>Следите за нами в <a href="https://vk.com/ipeace_deathi">VK</a> или <a
                    href="https://web.telegram.org/lPeace_Deathl">Telegram</a>!</p></div>

    <div class='top-bar noselect' >

        <div class='container'>
            <div class='float-left'>
                <a href='landing' id='logo'>
                    <img src='/images/logo.png' width="100px" height="100px">
                </a>
            </div>

            <div class="basket">
                <a href="cart">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-cart-fill" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                    <span id="badge"><?php echo mysqli_num_rows($all_cart); ?></span>
                </a>
            </div>

            <?php 
            if($_SESSION['role'] == '1'){
                echo "<a href='/' style='text-decoration: none !important; border: none; border-radius:5px; margin-left:105px; padding: 5px; background:red; color:white;position: absolute; top:0px;display: flex; justify-content: center; align-items: center'>Администратор</a>";
            } else if($_SESSION['role'] == '2'){
                echo "<a href='/' style='text-decoration: none !important; border: none; border-radius:5px; margin-left:105px; padding: 5px; background:yellow; color:white;position: absolute; top:0px;display: flex; justify-content: center; align-items: center'>Модератор</a>";
            } else if($_SESSION['role'] == '3'){
                echo "<a href='/' style='text-decoration: none !important; border: none; border-radius:5px; margin-left:105px; padding: 5px; background:#2ECC9B; color:white; position: absolute; top:0px;display: flex; justify-content: center; align-items: center'>Пользователь</a>";
            }
            ?>

            <div class='float-right'>
                <ul class='d-none d-lg-block'>
                    <li>
                        <a href='' class='active'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-car-front-fill" viewBox="0 0 16 16">
                                <path d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679c.033.161.049.325.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.807.807 0 0 0 .381-.404l.792-1.848ZM3 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2ZM6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2H6ZM2.906 5.189a.51.51 0 0 0 .497.731c.91-.073 3.35-.17 4.597-.17 1.247 0 3.688.097 4.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 11.691 3H4.309a.5.5 0 0 0-.447.276L2.906 5.19Z"/>
                            </svg>
                            Машины
                        </a>
                    </li>
                    <li>
                        <a href='details' class=''>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-tools" viewBox="0 0 16 16">
                                <path d="M1 0 0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.27 3.27a.997.997 0 0 0 1.414 0l1.586-1.586a.997.997 0 0 0 0-1.414l-3.27-3.27a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3c0-.269-.035-.53-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814L1 0Zm9.646 10.646a.5.5 0 0 1 .708 0l2.914 2.915a.5.5 0 0 1-.707.707l-2.915-2.914a.5.5 0 0 1 0-.708ZM3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026L3 11Z"/>
                            </svg>
                            Запчасти
                        </a>
                    </li>
                    <li>
                        <a href='body_kits' class='' style="padding-top: 0.7rem"><img
                                    src="/images/icons8-bumper-32.png"> Обвесы</a>
                    </li>
                    <li>
                        <a href='/' class=''>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                <path fill-rule="evenodd"
                                      d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                            </svg>
                            Авторизация
                        </a>
                    </li>
                </ul>

                <ul class='d-md-block d-lg-none'>
                    <div class='dropdown show'>
                        <li id='dropdownMenuButton' role='button' data-toggle='dropdown' aria-haspopup='true'
                            aria-expanded='false'>
                            <a href='#'><img src="/images/menu-burger.png"/></a>
                        </li>
                        <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                            <a class='dropdown-item' href=''>
                                Машины
                            </a>
                            <a class='dropdown-item' href='details'>
                                Запчасти
                            </a>
                            <a class='dropdown-item' href='body_kits'>
                                Обвесы
                            </a>
                            <a class='dropdown-item' href='/'>
                                Авторизация
                            </a>
                        </div>
                    </div>
                </ul>
            </div>

            <div class='clearfix'></div>

        </div>
    </div>

    <div class='push'></div>

    <form class="filter-panel" method="post" action="">
        <div class="form_labels">
            <label for="color">Цвет:&nbsp;</label>
            <select name="color" id="color">
                <option value=""></option>
                <option value="black">Черный</option>
                <option value="white">Белый</option>
                <option value="other_colors">Другой</option>
            </select>
            <label for="mark">Марка:&nbsp;</label>
            <select name="mark" id="mark">
                <option value=""></option>
                <option value="bmw">BMW</option>
                <option value="mercedes">Mercedes</option>
                <option value="chevrolet">Chevrolet</option>
                <option value="porsche">Porsche</option>
                <option value="nissan">Nissan</option>
                <option value="lotus">Lotus</option>
                <option value="formula_3">Formula 3</option>
            </select>
            <label for="tuning">Тюнинг:&nbsp;</label>
            <select name="tuning" id="tuning">
                <option value=""></option>
                <option value="yes">С тюнингом</option>
                <option value="no">Без тюнинга</option>
            </select>
            <label for="turbo">С турбиной:&nbsp;</label>
            <select name="turbo" id="turbo">
                <option value=""></option>
                <option value="yes">С турбонагнетателем</option>
                <option value="no">Без турбонагнетателя</option>
            </select>
        </div>

        <div class="form_buttons">
            <button type="submit">Применить фильтры</button>
<!--            <button type="reset">Сбросить фильтры</button>-->
        </div>
    </form>

</header>

<body>

<div class='container'>

    <div id='content' class='row'>
        <?php require_once "main_inner.php"; ?>
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
<script>
    var product_id = document.getElementsByClassName("add");
    for (var i = 0; i < product_id.length; i++) {
        product_id[i].addEventListener("click", function (event) {
            var target = event.target;
            var id = target.getAttribute("data-id");
            var price = target.getAttribute("price");
            $.ajax({
                url: 'connection?id=' + id + '&price=' + price,
                method: "GET",
                dataType: "json",
                success: function (data) {
                    console.log(<?= getmyuid(); ?>);// ЕСЛИ "0" - ЗНАЧИТ ЗАПУЩЕНО ОТ СУПЕРПОЛЬЗОВАТЕЛЯ (root'а) 
                    target.innerHTML = data.in_cart;
                    document.getElementById("badge").innerHTML = data.num_cart + 1;
                },
            })
        })
    };

    document.querySelector('form').addEventListener('submit', function (e) {

        var color = document.querySelector('#color').value;
        var mark = document.querySelector('#mark').value;
        var tuning = document.querySelector('#tuning').value;
        var turbo = document.querySelector('#turbo').value;
        
        $.ajax({
            url: 'connection',
            method: "POST",
            data: {
                color: color,
                mark: mark,
                tuning: tuning,
                turbo: turbo,
            },
        })
    });

    //RESET
    // window.onload = function () {
    //     document.querySelector('form').addEventListener('reset', function (e) {
    //         $.ajax({
    //             url: 'connection.php?reset=1',
    //             method: "GET",
    //             dataType: "json",
    //         })
    //     })
    // }

    //Выбор тачки
    var car_page = document.getElementsByClassName("carpage");
    for (var i = 0; i < car_page.length; i++) {
        car_page[i].addEventListener("click", function (event) {
            event.preventDefault();
            var target1 = event.target;
            var car_id = target1.getAttribute("data-id");
            $.ajax({
                url: 'connection?car_id=' + car_id,
                type: "GET",
                success: function () {
                    window.location.replace("car?car_id="+car_id);
                },
            })
        })
    }
</script>

</body>
</html>

