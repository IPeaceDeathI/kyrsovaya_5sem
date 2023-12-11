<?php

require_once 'src/Controller/connectionController.php';

$sql_cart = "SELECT * FROM cart";
$all_cart = $conn->query($sql_cart);
$sum_cart = $conn->query("SELECT SUM(price) FROM cart");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name='theme-color' content='#2ECC8A'>

    <title>Cart</title>

    <link rel="stylesheet" href="/css/cart.css">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-grid.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<?php 
require_once "src/View/templates/header.php"
?>

<body>

<main>
    <div class="head" style="align-items: center">
        <h1 class="amount" style="margin: 0">
                <span id="badge">
                    <?php echo mysqli_num_rows($all_cart); ?>
                </span>
            Машин<span id="enum"><?php
                if (mysqli_num_rows($all_cart) === 1) {
                    echo 'а';
                } else if (mysqli_num_rows($all_cart) >= 2 and mysqli_num_rows($all_cart) < 5) {
                    echo 'ы';
                } else if (mysqli_num_rows($all_cart) > 5) {
                    echo '';
                }
                ?></span>
        </h1>
        <button id="remove_all">Очистить корзину</button>
        <div id="cost"><?php if (mysqli_num_rows($all_cart)) {
                echo mysqli_fetch_assoc($sum_cart)["SUM(price)"];
            } else {
                echo '0';
            }
            ?>$
        </div>
    </div>
    <hr>
    <?php
    while ($row_cart = mysqli_fetch_assoc($all_cart)) {
        $sql = "SELECT product_id, product_name, price, CONCAT('http://', photo) AS photo_url FROM product WHERE product_id=" . $row_cart["product_id"];
        $all_product = $conn->query($sql);
        while ($row = mysqli_fetch_assoc($all_product)) {
            ?>
            <div class="card" id="<?php echo $row['product_id'] ?>">
                <div class="images">
                    <img src="<?php echo $row["photo_url"]; ?>" alt="">
                </div>

                <div class="caption">
                    <div class="rate">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="product_name"><?php echo $row["product_name"]; ?></div>
                    <div class="price"><b><?php echo $row["price"]; ?>$</b></div>
                    <button class="remove" data-id="<?php echo $row["product_id"]; ?>">Убрать из корзины</button>
                </div>
            </div>
            <?php

        }
    }
    ?>
</main>
<div class='push larger'></div>


<?php 
require_once "src/View/templates/footer.php"
?>

<script type='text/javascript' src='/js/jquery.js'></script>
<script>
    var remove = document.getElementsByClassName("remove");
    for (var i = 0; i < remove.length; i++) {
        remove[i].addEventListener("click", function (event) {
            var target = event.target;
            var cart_id = target.getAttribute("data-id");
            $.ajax({
                url: 'connection?cart_id=' + cart_id, //url: 'connection.php?cart_id=' + cart_id,
                method: "GET",
                dataType: "json",
            })
                .done(function (data) {
                    // console.log(document.getElementById("cost"))
                    if (data.amount - 1 === 1) {
                        document.getElementById("enum").innerHTML = 'а';
                    } else if ((data.amount - 1 >= 2) && (data.amount - 1 < 5)) {
                        document.getElementById("enum").innerHTML = 'ы';
                    } else {
                        document.getElementById("enum").innerHTML = '';
                    }
                    document.getElementById("badge").innerHTML = data.amount - 1;
                    if (data.sum) {
                        document.getElementById("cost").innerHTML = data.sum + '$';
                    } else {
                        document.getElementById("cost").innerHTML = '0$';
                    }
                    target.innerHTML = data.resp;
                    $(document).ready(function () {
                        $(document.getElementById(cart_id)).fadeOut(1000, function () {
                            $(this).remove();
                        });
                    });
                });
        })
    }

    var remove_all = document.getElementById("remove_all");
    remove_all.addEventListener("click", function (event) {
        var target = event.target;
        $.ajax({
            url: 'connection?rm_all=1',
            method: "GET",
            dataType: "json",
        })
            .done(function (data) {
                if (data.amount - 1 === 1) {
                    document.getElementById("enum").innerHTML = 'а';
                } else if ((data.amount - 1 >= 2) && (data.amount - 1 < 5)) {
                    document.getElementById("enum").innerHTML = 'ы';
                } else {
                    document.getElementById("enum").innerHTML = '';
                }
                document.getElementById("badge").innerHTML = data.amount;
                if (data.sum) {
                    document.getElementById("cost").innerHTML = data.sum + '$';
                } else {
                    document.getElementById("cost").innerHTML = '0$';
                }
                target.innerHTML = data.resp;
                $(document).ready(function () {
                    $(document.getElementsByClassName("card")).fadeOut(1000, function () {
                        $(this).remove();
                    });
                });
            });
    })

    // var remove = document.getElementsByClassName("remove");
    // for(var i = 0; i<remove.length; i++){
    //     remove[i].addEventListener("click",function(event){
    //         var target = event.target;
    //         var cart_id = target.getAttribute("data-id");
    //         var xml = new XMLHttpRequest();
    //         xml.onreadystatechange = function(){
    //             if(this.readyState == 4 && this.status == 200){
    //                target.innerHTML = this.responseText;
    //                target.style.opacity = .3;
    //             }
    //         }
    //
    //         xml.open("GET","connection.php?cart_id="+cart_id,true);
    //         xml.send();
    //     })
    // }

</script>
</body>
</html>