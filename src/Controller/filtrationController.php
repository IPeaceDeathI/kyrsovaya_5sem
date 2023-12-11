<?php

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
        applyFilter($conn, $query1);
    }
// выполняем SQL-запрос к базе данных
    
}

function applyFilter($conn, $query) {
    $result_filter = $conn->query($query);
    if (!$result_filter) {
        die('Ошибка выполнения запроса: ' . $conn->error);
    }
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