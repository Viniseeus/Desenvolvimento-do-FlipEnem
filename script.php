<?php
session_start();
include('conexao.php');
require('valida_login.php');

$email = $_SESSION['email'];
$sqlUserId = "SELECT iduser FROM usuario WHERE email = '$email'";
$resultUserId = mysqli_query($conn, $sqlUserId);
$rowUserId = mysqli_fetch_assoc($resultUserId);
$userId = $rowUserId['iduser'];

// Consulta SQL para obter os dados do usuário
$sqlUserData = "SELECT * FROM usuario WHERE iduser = $userId";
$resultUserData = mysqli_query($conn, $sqlUserData);
$rowUserData = mysqli_fetch_assoc($resultUserData);

date_default_timezone_set('America/Sao_Paulo');
$dataAtual = new DateTime();
$formattedDate = $dataAtual->format('Y-m-d H:i');

// Inicializa as variáveis
$mensagem = "";
$selectedOption = "";
$row = array();

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idQuestao = $_POST["id_questao"];

    $sql = "SELECT * FROM questao WHERE idquest = $idQuestao";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        {
            if (null) {
                $mensagem = "Acabou o seu tempo!";
                $userId = $rowUserId['iduser'];
                $query = "UPDATE usuario SET acertos = acertos + 1 WHERE iduser = $userId";
                $resultado = 1; // Correct
            }
            if ($conn->query($query) === TRUE) {
                $formattedDateTime = $dataAtual->format('Y-m-d H:i:s'); // Format datetime with seconds
                $insertQuery = "INSERT INTO resultado (codusuario, codquest, data_hora, resposta) VALUES ($userId, $idQuestao, '$formattedDateTime', $resultado)";
                if ($conn->query($insertQuery) === TRUE) {
                } else {
                    echo "Erro ao registrar resultado: " . $conn->error;
                }
            } else {
                echo "Erro ao atualizar pontuação: " . $conn->error;
            }
        }
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="estilos.css">
    <title>Verificação de Resposta</title>
    <style>
        body {
            background-color: #081b29;
            color: white;
            padding-top: 80px;
        }

        .navbar-fixed {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            background-color: brown;
        }

        .navbar-brand {
            color: #081b29;
        }

        .nav-link {
            color: #081b29;
        }

        .dropdown-menu {
            background-color: #F4F4F4;
        }

        .resultado {
            text-align: center;
        }
        .logo {
            color: #007bff;
            font-size: 25pt;
            text-align: center;
            margin-bottom: 3%;
        }
        .botoes {
            margin-top: 1%;
            
        }
    </style>
</head>

<body>

<h1 class="logo"><i class="bi bi-joystick"></i>FlipEnem</h1>



    <div class="container">
        <div class="resultado">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 principal" style="background-color: rgba(0, 0, 0, 0.5); padding: 20px;">
                    <?php echo $mensagem; ?>
                </div>
                <div class="col-md-3"></div>
            </div>

            <div class="caixa-informacoes">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6 principal" style="background-color: rgba(0, 0, 0, 0.5); padding: 20px;">
                        <strong>Você não respondeu a tempo:</strong>
                    </div>
                    <div class="col-md-3"></div>
                </div>

                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6 principal" style="background-color: rgba(0, 0, 0, 0.5); padding: 20px;">
                        <strong>Alternativa correta:</strong>
                        <?php echo isset($row['quest' . $respostaCorreta]) ? $row['quest' . $respostaCorreta] : ''; ?>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>

            <div class="botoes">
                <a href="index.php" class="btn btn-primary">Voltar ao inicio</a>
                <a href="jogar.php" class="btn btn-success">Jogar Novamente</a>

            </div>
        </div>
    </div>
 </body>
</head>