<?php
include('conexao.php');

if (isset($_SESSION['email']) && isset($_SESSION['senha'])) {
    $email = $_SESSION['email'];
    $pass = $_SESSION['senha'];

    $sql = "SELECT usuario FROM usuario WHERE email='$email' AND senha='$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); // Recuperar a linha do resultado
        $nomeUsuario = $row['usuario']; // Obtém o nome do usuário
    } else {
        echo "Usuário não encontrado";
    }
} else {
    echo "Usuário não autenticado";
}
?>
