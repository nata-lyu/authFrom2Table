<?php 
require_once 'connectPDO.php';

// добавляем данные нового польз-ля в БД
$name = $_POST['name'];
$tel = $_POST['tel'];
$log = $_POST['login'];
$pass = $_POST['password'];

// вставляем новые данные в БД
//$db->query("INSERT INTO table_person (name, tel) VALUES ('$name', '$tel')");
//$db->query("INSERT INTO table_user (login, password) VALUES ('$log', '$pass')");

$db->exec("INSERT INTO table_person (name, tel) VALUES ('{$name}', '{$tel}')");
$db->exec("INSERT INTO table_user (login, password) VALUES ('{$log}', '{$pass}')");

include 'print.php';
?>