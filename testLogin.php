<?php
session_start();

if (!empty($_POST['email']) && !empty($_POST['senha'])) {
    include_once('conexao.php');

    $email = $_POST['email'];
    $senha = ($_POST['senha']);

    $sql = "SELECT * FROM usuario WHERE email = '$email' and senha = '$senha'";

    $result = $conn->query($sql);

    if (mysqli_num_rows($result) < 1) {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);


        echo"<script>
                alert('Usuário não cadastrado');
                window.location='cadastro.php';
            </script> ";
    } else {
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;

        echo "  <script>
                alert('Usuário encontrado com sucesso !');
                window.location='index.php';
            </script>";
    }
} else {
    header('location: cadastro.php');
}
