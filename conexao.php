<?php
$servername = "localhost"; //nome do servidor
$username = "root"; //nome do usuário
$password = "TheSuperMario64"; //senha
$dbname = "tccflipenem"; //nome do banco de dados

//cria uma conexão
$conn = mysqli_connect($servername, $username, $password, $dbname);

//verifica se houve erros na conexão
if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
    echo "Conexão bem-sucedida";
}
?>