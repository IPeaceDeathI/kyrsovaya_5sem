<?php 

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

?>
<script>
    export class cartController {
        removeByID(event){
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
        }

        removeAll(event){
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
        }
    }
</script>