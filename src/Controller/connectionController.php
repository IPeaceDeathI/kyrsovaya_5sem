<?php

$servername = "shop.ru";
$username = "root";
$password = "";
$db_name = "addtocart";

$conn = new mysqli($servername,$username,$password,$db_name);

$all_cart = $conn->query("SELECT * FROM cart");

$result_filter = $conn->query("SELECT * FROM product ORDER BY product_id");

$sum_cart = $conn->query("SELECT SUM(price) FROM cart");

//CarPage
if (isset($_GET["car_id"])) {
    $car_id = $_GET['car_id'];
    $photo_sql = $conn->query("SELECT * FROM photos WHERE car_id = $car_id");
    $car_sql = $conn->query("SELECT * FROM product WHERE product_id = $car_id");
    $tuning_sql = $conn->query("SELECT * FROM tuning WHERE car_id = $car_id");
    $recent_maintenance_sql = $conn->query("SELECT * FROM recent_maintenance WHERE car_id = $car_id");
    $known_disadvantages_sql = $conn->query("SELECT * FROM known_disadvantages WHERE car_id = $car_id");
}

//FILTER
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $color = isset($_POST['color']) ? trim($_POST['color']) : '';
    $mark = isset($_POST['mark']) ? trim($_POST['mark']) : '';
    $tuning = isset($_POST['tuning']) ? trim($_POST['tuning']) : '';
    $turbo = isset($_POST['turbo']) ? trim($_POST['turbo']) : '';

// формируем SQL-запрос
    if ($color== '' and $mark == '' and $tuning == '' and $turbo=='') {
        $query1 = "SELECT * FROM product ORDER BY product_id";
    }
    else {
        $query1 = "SELECT * FROM product JOIN product_categories ON product.product_id = product_categories.product_id JOIN color ON product_categories.color_id = color.id JOIN is_tuning ON product_categories.tuning_id = is_tuning.id JOIN is_turbo ON product_categories.turbo_id = is_turbo.id JOIN mark ON product_categories.mark_id = mark.id WHERE 1=1";
        if ($color) {
            $query1 .= " AND color.color = '$color'";//" AND color.name = '$color'";
        }
        if ($mark) {
            $query1 .= " AND mark.mark = '$mark'";//" AND mark.name = '$mark'";
        }
        if ($tuning =='yes') {
            $query1 .= " AND is_tuning.tuning = '$tuning'";//" AND tuning.name = '$tuning'";
        }
        if ($turbo == 'yes') {
            $query1 .= " AND is_turbo.turbo = '$turbo'";//" AND turbo.name = '$turbo'";
        }
        // echo $query1;
        if (!$result_filter) {
            die('Ошибка выполнения запроса: ' . $conn->error);
        }
        $result_filter = $conn->query($query1);
    }
    // выполняем SQL-запрос к базе данных
}


//DELETE FILTER
//if(isset($_GET["reset"])){
//    $sql1 = "SELECT * FROM product ORDER BY product_id";
//
//    $result_filter = $conn->query($sql1);
//    if (!$result_filter) {
//        die('Ошибка выполнения запроса: ' . $conn->error);
//    }
//}

 //ADD
if(isset($_GET["id"]) and isset($_GET["price"])){
    $user_id = getmyuid();
    $product_id = $_GET["id"];
    $price = $_GET["price"];
    $sql = "SELECT * FROM cart WHERE product_id = $product_id";
    $result = $conn->query($sql);
    $total_cart = "SELECT * FROM cart";
    $total_cart_result = $conn->query($total_cart);
    $cart_num = mysqli_num_rows($total_cart_result);

    if(mysqli_num_rows($result) > 0){
        $in_cart = "Уже в корзине";

        echo json_encode(["num_cart"=>$cart_num - 1,"in_cart"=>$in_cart]);
    }else{
        $insert = "INSERT INTO cart(product_id, user_id, price) VALUES ($product_id, $user_id, $price)";

        if($conn->query($insert) === true){
            $in_cart = "Добавлено в корзину";
            echo json_encode(["num_cart"=>$cart_num,"in_cart"=>$in_cart]);
        }else{
            echo "<script>alert(It does not insert)</script>";
        }
    }
}

//DELETE
if(isset($_GET["cart_id"])){
    $product_id = $_GET["cart_id"];
    $sql = "DELETE FROM cart WHERE product_id=".$product_id;

    if($conn->query($sql) === TRUE){
        $resp = "Удалено из корзины";
        $amount = mysqli_num_rows($all_cart);

        $sum_cart = $conn->query("SELECT SUM(price) FROM cart");
        $sum = mysqli_fetch_assoc($sum_cart)["SUM(price)"];

        echo json_encode(["resp"=>$resp, "amount"=>$amount, "sum"=>$sum]);
    }
}

//DELETE ALL
if(isset($_GET["rm_all"])){
    if ($_GET["rm_all"]){
        $sql = "DELETE FROM cart";

        if($conn->query($sql) === TRUE){
            $resp = "Удалено из корзины";
            $all_cart = $conn->query("SELECT * FROM cart");
            $amount = mysqli_num_rows($all_cart);

            $sum_cart = $conn->query("SELECT SUM(price) FROM cart");
            $sum = mysqli_fetch_assoc($sum_cart)["SUM(price)"];

            echo json_encode(["resp"=>$resp, "amount"=>$amount, "sum"=>$sum]);
        }
    }
}