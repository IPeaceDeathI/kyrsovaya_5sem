<?php
$photo = [];
$car;
$data_to_add;
$maintenance;
$disadvantages;
$tuning;

function getCar($car_sql){
    return mysqli_fetch_assoc($car_sql);
}
function getPhoto($photo_sql){
    return mysqli_fetch_array($photo_sql);
}