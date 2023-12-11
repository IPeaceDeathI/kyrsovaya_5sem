<?php
require_once 'src/Controller/connectionController.php';

$photo = mysqli_fetch_array($photo_sql);
$car = mysqli_fetch_assoc($car_sql);

?>
<!doctype html>
<html lang="en, rus">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <title><?php echo $car['product_name'] ?></title>

    <link rel="stylesheet" href="/css/carousel.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/123.css">
    <link rel="stylesheet" href="/css/321.css">
    <link rel='shortcut icon' type='images/jpeg' href='/images/icon.jpeg'>
</head>

<main>
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel" style="margin-bottom: 1rem">
        <div class="carousel-indicators">
            <?php
                echo '<button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>';
                for ($i = 1; $i <= mysqli_num_rows($photo_sql); $i++){
                    echo "<button type='button' data-bs-target='#myCarousel' data-bs-slide-to='$i' aria-label='Slide $i'></button>";
                }
            ?>
        </div>
        <div class="carousel-inner">
            <?php
                echo "
                        <div class='carousel-item active'>
                            <div class='container'>
                                <div class='carousel-caption'>  
                                    <img src = '/".str_replace("\\", "/", substr($photo['url'], 8))."' >
                                </div>
                            </div>
                        </div>";

                while ($photo = mysqli_fetch_array($photo_sql)):
                    echo "<div class='carousel-item'>
                            <div class='container'>
                                <div class='carousel-caption'>
                                    <img src = '/".str_replace("\\", "/", substr($photo['url'], 8))."' >
                                </div>
                            </div>
                          </div>";
                endwhile;

                for ($i = 2; $i <= mysqli_num_rows($photo_sql); $i++){
                    echo "
                        <div class='carousel-item'>
                            <div class='container'>
                                <div class='carousel-caption'>
                                    <img src='/images/".$car['mark']."/$i.jpg' >
                                </div>
                            </div>
                        </div>";
                }
            ?>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <section id="details" class="px-4 mx-auto max-w-screen-2xl">
        <div class="relative pt-7 md:pt-10 xl:px-20 md:pb-30 md:grid md:grid-cols-12">
            <h3 class="absolute top-0 hidden -mt-4 text-4xl antialiased uppercase lg:block font-condensed right-full whitespace-nowrap transform origin-top-right -rotate-90">Описание</h3>
            <strong class="block pb-6 text-2xl uppercase col-start-2 col-end-12 md:text-xl"><?php echo $car['product_name'] ?></strong>
            <div class="md:col-start-2 md:col-end-8">
                <div class="pb-3 text-lg md:text-xl listing-story">
                    <p class="p1"><?=$car['story']?></p>
                </div>
                <?php
                if (mysqli_num_rows($tuning_sql) != 0) {
                    echo '<div class="pb-3 border-t border-gray-300 md:border-0"><h2 class="pt-6 pb-3 text-lg tracking-wide uppercase font-condensed md:text-base"><strong>Тюнинг</strong></h2>
                    <ul class="block text-lg md:text-base antialiased columns-1 xl:columns-2">';
                    while ($tuning = mysqli_fetch_assoc($tuning_sql)):
                        echo "<li class='relative inline-block w-full pb-3 pl-4 leading-5'><span class='absolute left-0 block select-none -top-1px'>•</span>$tuning[car_tuning]</li>";
                    endwhile;
                    echo '</ul>
                    </div>';
                }

                if($_SESSION['role'] == '1') {
                    echo "<form method='POST' style='padding-bottom: 10px'>Внести данные: <input  id='add_adm' name='add_adm' style='border: solid 1px; border-radius: 10px; padding: 5px; margin-right: 10px' type='text'/><button type='submit' class='btn btn-primary'>Добавить</button></form>";
                    $data_to_add = ""; 
                    if ($_POST && $_POST['add_adm']){
                        $data_to_add = $_POST['add_adm'];
                        $sql = "INSERT INTO tuning(car_id, car_tuning) VALUES ($car_id, $data_to_add)";
                        $conn->query($sql);
                    }
                } else echo "вы не админ";

                if (mysqli_num_rows($recent_maintenance_sql) != 0) {
                    echo '<div class="pb-3 border-t border-gray-300"><h2 class="pt-6 pb-3 text-lg tracking-wide uppercase font-condensed md:text-base"><strong>Недавнее обслуживание</strong></h2>
                    <ul class="block text-lg md:text-base antialiased columns-1 xl:columns-2">';
                    while ($maintenance = mysqli_fetch_assoc($recent_maintenance_sql)):
                        echo "<li class='relative inline-block w-full pb-3 pl-4 leading-5'><span class='absolute left-0 block select-none -top-1px'>•</span>$maintenance[text]</li>";
                    endwhile;
                    echo '</ul>
                    </div>';
                }

                if (mysqli_num_rows($known_disadvantages_sql) != 0) {
                    echo '<div class="pb-3 border-t border-gray-300"><h2 class="pt-6 pb-3 text-lg tracking-wide uppercase font-condensed md:text-base"><strong>Известные недостатки</strong></h2>
                    <ul class="block text-lg md:text-base antialiased columns-1 xl:columns-2">';
                    while ($disadvantages = mysqli_fetch_assoc($known_disadvantages_sql)):
                        echo "<li class='relative inline-block w-full pb-3 pl-4 leading-5'><span class='absolute left-0 block select-none -top-1px'>•</span>$disadvantages[disadvantage]</li>";
                    endwhile;
                    echo '</ul>
                    </div>';
                }
                ?>

                <div class="pt-10 pb-6 xl:col-span-10 xl:col-start-2">
                    <div class="text-sm antialiased uppercase md:max-w-2xs">
                        <a class="uppercase flex font-bold antialiased justify-center items-center transition-colors outline-none pb-1px tracking-wider h-14 md:h-12 text-lg md:text-base text-white bg-black border border-black hover-hover:hover:bg-bfb hover-hover:hover:border-bfb focus:bg-bfb focus:border-bfb" href="/">Связаться с продавцом</a>
                        <strong class="uppercase flex font-bold antialiased justify-center items-center transition-colors outline-none pb-1px h-14 md:h-12 text-lg md:text-base">Цена $<?php echo $car['price']?></strong>
                    </div>
                </div>
            </div>
            <div class="hidden md:col-start-9 md:col-end-12 md:block">
                <ul class="py-4 md:py-4 md:px-6 md:border-l md:border-gray-300">
                    <li class="text-lg md:text-base pb-3 "><label for="car-fact-mileage" class="inline-block tracking-wide font-condensed uppercase pr-1">Километраж:</label><span id="car-fact-mileage" class="inline-block select-all"><?=$car['kilometrage']?></span></li>
                    <li class="text-lg md:text-base pb-3 "><label for="car-fact-title" class="inline-block tracking-wide font-condensed uppercase pr-1">Сертификат(USA):</label><span id="car-fact-title" class="inline-block select-all"><?=$car['certificate']?></span></li>
                    <li class="text-lg md:text-base pb-3 "><label for="car-fact-engine" class="inline-block tracking-wide font-condensed uppercase pr-1">Двигатель:</label><span id="car-fact-engine" class="inline-block select-all"><?=$car['engine']?></span></li>
                    <li class="text-lg md:text-base pb-3 "><label for="car-fact-trans" class="inline-block tracking-wide font-condensed uppercase pr-1">КПП:</label><span id="car-fact-trans" class="inline-block select-all"><?=$car['transmission']?></span></li>
                    <li class="text-lg md:text-base pb-3 "><label for="car-fact-exterior" class="inline-block tracking-wide font-condensed uppercase pr-1">Экстерьер:</label><span id="car-fact-exterior" class="inline-block select-all"><?=$car['exterior']?></span></li>
                    <li class="text-lg md:text-base pb-3 "><label for="car-fact-interior" class="inline-block tracking-wide font-condensed uppercase pr-1">Интерьер:</label><span id="car-fact-interior" class="inline-block select-all"><?=$car['interior']?></span></li>
                    <?php if($_SESSION['role']=='1'){
                        echo("<div style='color:red;font-weight: 700;'>ONLY FOR ADMIN:</div><li class='text-lg md:text-base pb-3  uppercase'><label for='car-fact-vin' class='inline-block tracking-wide font-condensed uppercase pr-1'>VIN:</label><span id='car-fact-vin' class='inline-block select-all'>$car[vin]</span></li>");}
                    ?>
                    <li class="text-lg md:text-base pb-3 "><label for="car-fact-seller-type" class="inline-block tracking-wide font-condensed uppercase pr-1">Тип продавца:</label><span id="car-fact-seller-type" class="inline-block select-all"><?=$car['seller_type']?></span></li>
                    <li class="text-lg md:text-base pb-3 "><label for="car-fact-location" class="inline-block tracking-wide font-condensed uppercase pr-1">Расположение:</label><span id="car-fact-location" class="inline-block select-all"><?=$car['location']?></span></li>
                </ul>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="container" >
        <p class="float-end"><a href="/main">На главную</a></p>
        <p>&copy; Boyko Denis IKBO-01-21 &middot; <a href="privacy">Политика конфиденциальности</a></p>
    </footer>

</main>


<script src="/js/bootstrap.bundle.min.js"></script>
</body>
</html>
