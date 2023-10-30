<?php
$servername = "localhost";
$username = "root"; 
$password = "TheSuperMario64"; 
$dbname = "tccflipenem"; 

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}
?>