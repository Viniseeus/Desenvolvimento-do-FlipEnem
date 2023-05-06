<?php
include('conexao.php');

$user = $_POST['user'];
$pass = $_POST['password'];

$sql = "SELECT * FROM usuario WHERE nomeuser='$user' AND senha='$pass'";
$result = $conn->query($sql);
if ($result ->num_rows > 0) {
echo "usuário logado";
} else {
   echo "usuário não encontrado";
}