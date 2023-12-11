<?php
require "system/Routing.php";
/*
//Запускаем сессию
session_start();

//Устанавливаем кодировку и вывод всех ошибок
header('Content-Type: text/html; charset=UTF8');
error_reporting(E_ALL);

//Включаем буферизацию содержимого
ob_start();

//Определяем переменную для переключателя
$mode = isset($_GET['mode'])  ? $_GET['mode'] : false;
$user = isset($_SESSION['user']) ? $_SESSION['user'] : false;
$err = array();

//Устанавливаем ключ защиты
define('BEZ_KEY', true);
 
//Подключаем конфигурационный файл
include './system/config.php';
 
//Подключаем скрипт с функциями
include './func/funct.php';

//подключаем MySQL
include './bd/bd.php';

switch($mode)
{
    //Подключаем обработчик с формой регистрации
    case 'reg':
        include './scripts/reg/reg.php';
        include './scripts/reg/reg_form.html';
    break;
    
    //Подключаем обработчик с формой авторизации
    case 'auth':
        include './scripts/auth/auth.php';
        // include './pages/auth.php';
        include './scripts/auth/auth_form.html';
        include './scripts/auth/show.php';
    break;

}

//Получаем данные с буфера
$content = ob_get_contents();
ob_end_clean();

//Подключаем наш шаблон
include './html/index.html';*/

$url = key($_GET);

$r = new Router();
// $r->addRoute("/", "main.php");
$r->addRoute("/main", "View/main.php");
$r->addRoute("/cart", "View/cart.php");
$r->addRoute("/connection", "Controller/connectionController.php");
$r->addRoute("/privacy", "View/privacy.php");
$r->addRoute("/car", "View/car.php");
$r->addRoute("/auth", "View/auth.php");
$r->addRoute("/details", "View/details.php");
$r->addRoute("/body_kits", "View/body_kits.php");
$r->addRoute("/landing", "View/parallax.php");

$r->route("/".$url);

