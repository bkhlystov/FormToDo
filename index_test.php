<?php
/**
 * Created by PhpStorm.
 * User: BOGDAN
 * Date: 18.01.2017
 * Time: 15:58
 */
$name = 'Bohdan';
$login = 'bogda';
$password = '12345';
$mysqli = @mysqli_connect("localhost","root","","Bohdan");
if(mysqli_connect_error()){
    echo "Подключение не возможно:  ".mysqli_connect_error();
    json_encode("Подключение не возможно:  ".mysqli_connect_error());
};
$mysqli -> query("SETNAMES 'utf-8'");
$mysqli -> query("INSERT INTO `reg_users`(`name`, `login`, `password`) VALUES ('".$name."','".$login."','".$password."')");
