<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-color: #081b29;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .message-container {
            text-align: center;
            background-color: #007bff;
            color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body>
    <div class="message-container">
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
</div>
</body>
</html>
