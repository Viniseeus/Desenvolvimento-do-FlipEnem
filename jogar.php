<?php
session_start();
include('conexao.php');
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

require('valida_login.php');

$email = $_SESSION['email'];
$sqlUserId = "SELECT iduser FROM usuario WHERE email = '$email'";
$resultUserId = mysqli_query($conn, $sqlUserId);
$rowUserId = mysqli_fetch_assoc($resultUserId);
$userId = $rowUserId['iduser'];

$sqlUserData = "SELECT * FROM usuario WHERE iduser = $userId";
$resultUserData = mysqli_query($conn, $sqlUserData);
$rowUserData = mysqli_fetch_assoc($resultUserData);

$dataAtual = new DateTime();
$formattedDate = $dataAtual->format('Y-m-d H:i:s');

$sqlAttempts = "SELECT COUNT(*) as resposta FROM `resultado` WHERE DATE(data_hora) = CURDATE() AND codusuario = $userId";
$resultAttempts = mysqli_query($conn, $sqlAttempts);
$rowAttempts = mysqli_fetch_assoc($resultAttempts);
$numAttempts = $rowAttempts['resposta'];


$sqlAttempts = "SELECT COUNT(*) as resposta FROM `resultado` WHERE DATE(data_hora) = CURDATE() AND codusuario = $userId";
$resultAttempts = mysqli_query($conn, $sqlAttempts);
$rowAttempts = mysqli_fetch_assoc($resultAttempts);
$numAttempts = $rowAttempts['resposta'];

if ($numAttempts >= 3) {
    echo '<div style="display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100vh; text-align: center; background-color: #081b29; color: white;">
    <h1>Você já atingiu o limite de tentativas diárias.</h1>        
     <div class="foto">
            <img src="iconflipenem.png" width="200vh">
        </div></div>';
    header('Refresh: 2 url= index.php');
    exit;
}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="estilos.css">
    <title>Quiz com Temporizador</title>
    <style>
        body {
            background-color: #081b29;
            padding-top: 80px;
        }

        #timer {
            font-size: 24px;
            text-align: center;
        }

        .timer-red {
            color: red;
        }

        .options input[type="radio"] {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            width: 16px;
        }

        .quiz-container {
            background-color: whitesmoke;
            border: solid 4px #00abf0;
        }

        .logo {
            color: #007bff;
            font-size: 25pt;
        }

        .navbar-fixed {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            background-color: blue;
        }

        .headerb {
            background-color: #081b29;
        }
    </style>
</head>

<body>
    <?php

    $sql = "SELECT * FROM questao AS q 
INNER JOIN areaconhe AS a ON a.idArea=q.idarea 
ORDER BY RAND() LIMIT 1";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
    ?>

            <header class="header headerb navbar-fixed">
                <nav class="navbar navbar-expand-lg navbar-blue p-1 m-2">
                    <div class="container">
                        <h1 class="logo"><i class="bi bi-joystick"></i>FlipEnem</h1>
                        <div class="question-info">
                            <div class="question-year">Ano: <?php echo $row['anoquest']; ?></div>
                        </div>

                        <div id="timer"></div>

                        <div class="question-info">
                            <div class="question-area">Área: <?php echo $row['descArea']; ?></div>
                        </div>

                    </div>
                </nav>
            </header>

            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-8 offset-md-2 text-center">
                        <div class="quiz-container ">
                            <div class="question">
                                <p><?php echo $row['enunciado']; ?></p>
                            </div>
                            <?php if (!empty(trim($row["img"]))) : ?>
                                 <div class="question">
                                    <p><?php echo "<img src='uploads/" . $row["img"] . "' style='display:block;margin:auto; width: 60%;'>"; ?></p>
                                </div>
                            <?php endif; ?>
                            <div class="question-statement">
                                <p><?php echo $row['pergunta']; ?></p>
                            </div>
                            <div class="question-source">
                                <p><?php echo $row['fonte']; ?></p>
                            </div>
                            <form action="verificar.php" method="post">
                                <input type="hidden" name="id_questao" value="<?php echo $row['idquest']; ?>">
                                <div class="options">
                                    <input type="radio" name="resposta" value="1" id="opcao1"><label for="opcao1" class="option"><?php echo $row['quest1']; ?></label><br>
                                    <input type="radio" name="resposta" value="2" id="opcao2"><label for="opcao2" class="option"><?php echo $row['quest2']; ?></label><br>
                                    <input type="radio" name="resposta" value="3" id="opcao3"><label for="opcao3" class="option"><?php echo $row['quest3']; ?></label><br>
                                    <input type="radio" name="resposta" value="4" id="opcao4"><label for="opcao4" class="option"><?php echo $row['quest4']; ?></label><br>
                                    <input type="radio" name="resposta" value="5" id="opcao5"><label for="opcao5" class="option"><?php echo $row['quest5']; ?></label><br>
                                </div>
                                <button type="submit" class="submit-button <?php echo isset($buttonClass) ? $buttonClass : ''; ?>">Enviar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <script src="script.js"></script>
    <?php
            $resposta = $row['resultado'];
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $selectedOption = $_POST["resposta"];
                if ($selectedOption === null) {
                    echo "<script>
         alert('Selecione uma opção!');
         </script>";
                }
            }
        }
    }
    $conn->close();
    ?>
</body>

</html>