<?php

$host = "localhost";
$user = "root";
$pass = "root";
$db = "crud_veterinario";
$conn = new mysqli($host,$user,$pass,$db);


if($conn->connect_error){
    die("Erro na conexão");
}
?>