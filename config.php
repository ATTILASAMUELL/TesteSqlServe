<?php
$db_host = "127.0.0.1:3312"; //Host da maquina 
$db_name ="testedesqlattila"; // Nome do banco de dados
$db_user = 'root'; // Nome do usuario
$db_pass = ''; // Senha se tiver

$pdo = new PDO("mysql:dbname=$db_name;host=$db_host", $db_user, $db_pass);
$array = [
    'error' => '',
    'result' => []
];