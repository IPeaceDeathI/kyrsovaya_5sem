<?php

 //Ключ защиты
 if(!defined('BEZ_KEY'))
 {
     header("HTTP/1.1 404 Not Found");
     exit(file_get_contents('./404.html'));
 }

 //Адрес базы данных
 define('BEZ_DBSERVER','localhost');

 //Логин БД
 define('BEZ_DBUSER','root');

 //Пароль БД
 define('BEZ_DBPASSWORD','');

 //БД
 define('BEZ_DATABASE','addtocart');

 //Errors
 define('BEZ_ERROR_CONNECT','Немогу соеденится с БД');

 //Errors
 define('BEZ_NO_DB_SELECT','Данная БД отсутствует на сервере');

 //Адрес хоста сайта
 define('BEZ_HOST','http://'. $_SERVER['HTTP_HOST'] .'/');
 
 //Адрес почты от кого отправляем
 define('BEZ_MAIL_AUTOR','den4ikboyko@yandex.ru');
 ?>