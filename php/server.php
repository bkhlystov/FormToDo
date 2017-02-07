<?php
/**
 * Created by PhpStorm.
 * User: BOGDAN
 * Date: 17.01.2017
 * Time: 10:32
 */
/*получает данные с обьекта json*/
$answer = json_decode(file_get_contents('php://input'),true);
if(isset($answer['name']) && isset($answer['login']) && isset($answer['password'])){
    //echo $answer;
    $name = htmlspecialchars(trim($answer['name']));
    $login = htmlspecialchars(trim($answer['login']));
    $password = htmlspecialchars(trim($answer['password']));
    echo json_encode($answer);  //отправляет результат на фронт в обьекте json
}else{
    echo "Введенные данные не корректны";
};
$mysqli = @new mysqli("localhost","root","","Bohdan");
if(mysqli_connect_error()){
    echo "Подключение не возможно:  ".mysqli_connect_error();
    json_encode("Подключение не возможно:  ".mysqli_connect_error());
};
$mysqli -> query("SETNAMES 'utf-8'");
$mysqli -> query("INSERT INTO `reg_users`(`name`, `login`, `password`) VALUES ('".$name."','".$login."','".$password."')");
//$mysqli -> query("UPDATE `reg_users` SET `name`='".$name."',`login`= '".$login."',`password`='".$password."' WHERE `login`= '".$login."' OR `name`='".$name."'");
//$mysqli -> query("DELETE FROM `reg_users` WHERE `name`='".$name."' OR `login`= '".$login."'");
function select($resultt_set){
    while($row = $resultt_set -> fetch_assoc() !=false){
        print_r($row);
    }
}
$resultt_set = $mysqli -> query("SELECT * FROM `reg_users`");
//select($resultt_set);

mysqli_close($mysqli);