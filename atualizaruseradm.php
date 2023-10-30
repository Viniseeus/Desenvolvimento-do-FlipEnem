<?php
session_start();
include_once('conexao.php');
require('valida_login.php');

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    $sql = "SELECT * FROM usuario WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        if ($row['ADM'] == 0) {
            echo "Você não tem permissão para acessar esta página.";
            header("refresh:2;url=index.php");
        } else {
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $datanasc = $_POST['datanasc'];
    $curso = $_POST['curso'];
    $escolafaculdade = $_POST['escolafaculdade'];
    $ADM = $_POST['ADM'];

    $sql = "UPDATE usuario SET usuario = '$usuario', email = '$email', datanasc = '$datanasc', curso = '$curso' 
    ,escolafaculdade = '$escolafaculdade' ,ADM = '$ADM' WHERE iduser = $id";
    
    if (mysqli_query($conn, $sql)) {
        echo "Usuário atualizado com sucesso.";
        header('Refresh: 2 url= moduseradm.php');
        exit;
    } else {
        echo "Erro ao atualizar o usuário: " . mysqli_error($conn);
    }
    
    mysqli_close($conn);
}}}}
?>
