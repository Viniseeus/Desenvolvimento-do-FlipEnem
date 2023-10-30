<?php
session_start();
include_once('conexao.php');
require('valida_login.php');

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    $sql = "SELECT iduser FROM usuario WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $iduser = $row['iduser'];

        $sql = "SELECT usuario FROM usuario WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $nomeuser = $row['usuario'];

            $feedback = $_POST['feedback'];
            $data = date('Y-m-d');

            $sql = "INSERT INTO feed (Iduser, nomeuser, feedback, datafeed) VALUES ('$iduser', '$nomeuser', '$feedback', '$data')";

            if (mysqli_query($conn, $sql)) {
                echo "Feedback enviado com sucesso!";
            } else {
                echo "Erro ao enviar o feedback: " . mysqli_error($conn);
            }
        }
    }
    mysqli_close($conn);
}
?>
