<?php
session_start();
include_once('conexao.php');
require('valida_login.php');

if ((!isset($_SESSION['email'])) and (!isset($_SESSION['senha']))) {
    header("location: inicio.php");
}

$email = $_SESSION['email'];
$sqlUserId = "SELECT iduser FROM usuario WHERE email = '$email'";
$resultUserId = mysqli_query($conn, $sqlUserId);
$rowUserId = mysqli_fetch_assoc($resultUserId);
$userId = $rowUserId['iduser'];

$sqlUserADM = "SELECT ADM FROM usuario WHERE email = '$email'";
$resultUserADM = mysqli_query($conn, $sqlUserADM);
$rowUserADM = mysqli_fetch_assoc($resultUserADM);
$admStatus = $rowUserADM['ADM'];

// Consulta SQL para obter os dados do usuário
$sqlUserData = "SELECT acertos, erros FROM usuario WHERE iduser = $userId";
$resultUserData = mysqli_query($conn, $sqlUserData);
$rowUserData = mysqli_fetch_assoc($resultUserData);

// Dados do usuário para preencher o gráfico
$userData = array(
    'acertos' => $rowUserData['acertos'],
    'erros' => $rowUserData['erros']
);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <title>FlipEnem</title>
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

        .logo {
            color: #007bff;
            font-size: 30pt;

        }

        .nav-link {
            color: #081b29;
        }

        .dropdown-menu {
            background-color: #F4F4F4;
        }

        .headerb {
            background-color: #081b29;
            border: solid 2px black;
        }

        .corbt {
            background-color: #00abf0;
        }
    </style>
</head>

<body>
    <header class="header headerb navbar-fixed">
        <nav class="navbar navbar-expand-lg navbar-blue p-1 m-2">
            <div class="container">
                <h1 class="logo"><i class="bi bi-joystick"></i>FlipEnem</h1>


                <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="nav col-12 mb-2 justify-content-end mb-md-0">
                        <li class="nav-item"><a href="index.php" class="nav-link px-2 link-secondary bi bi-house-fill"> Home</a></li>
                        <li class="nav-item"><a href="feed.php" class="nav-link px-2 link-secondary bi bi-chat-dots-fill"> Feedback</a></li>
                        <li class="nav-item"><a href="sobreprojeto.php" class="nav-link px-2 link-secondary bi bi-device-ssd-fill"> Sobre o projeto</a></li>
                    </ul>
                </div>

                <div class="btn-group dropleft">
                <div class="dropdown text-end">
                    <a href="#" class="link-secondary text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle"></i>
                    </a>
                    <ul class="dropdown-menu text-small">
                        <li><a class="dropdown-item bi bi-person-vcard-fill" href="Perfil.php"> Meu perfil</a></li>
                        <li><a class="dropdown-item bi bi-clock-history" href="historico.php"> Histórico</a></li>
                        <li><a class="dropdown-item bi bi-gear-fill" href="configurações.php"> Configurações</a></li>
                         <?php
                        if ($admStatus == 1) {
                            echo '<li><a class="dropdown-item bi bi-question-octagon-fill" href="perguntas.php"> Cadastrar perguntas</a></li>';
                            echo '<li><a class="dropdown-item bi bi-person-add" href="moduseradm.php"> Modificar user</a></li>';
                        }
                        ?> 
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item bi bi-box-arrow-left" href="sair.php">Sair</a></li>
                       
                    </ul>
                </div>
                </div>

        </nav>
    </header>

    <header class="header">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>
        </div>
    </header>

    <section class="home">
        <div class="home-content container text-center text-md-start p-4">
            <!-- Conteúdo à esquerda -->
            <div class="row">
                <div class="col-md-6">
                    <h1 class="display-4">Seja bem-vindo ao FlipEnem!</h1>
                    <p class="lead">Uma maneira mais divertida de estudar para o Enem.</p>
                    <h3>Bora jogar?</h3>
                    <div class="d-flex justify-content-md-start justify-content-center mt-5">
                        <a href="jogar.php" class="btn btn-primary me-2">Jogar</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="chart-container">
                        <canvas id="chart"></canvas>
                        <div class="d-flex justify-content-center mt-3">
                            <button class="btn corbt" onclick="redirectToRanking()">Ver Classificação Geral</button>
                        </div>
                    </div>
                </div>
                <script>
                    // Dados do usuário recuperados do PHP
                    var userData = <?php echo json_encode($userData); ?>;

                    // Verificar se há dados suficientes para construir o gráfico
                    var hasData = userData.acertos !== null && userData.erros !== null;

                    // Obter o contexto do gráfico
                    var ctx = document.getElementById('chart').getContext('2d');

                    if (hasData) {
                        // Construir o gráfico com os dados do usuário
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: ['Acertos', 'Erros'],
                                datasets: [{
                                    label: 'Desempenho',
                                    data: [userData.acertos, userData.erros],
                                    backgroundColor: ['#27AE60', '#E74C3C']
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    } else {
                        // Mostrar o gráfico com dados insuficientes
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: ['Dados insuficientes'],
                                datasets: [{
                                    label: 'Desempenho',
                                    data: [0],
                                    backgroundColor: ['gray']
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    }

                    function redirectToRanking() {
                        window.location.href = 'ranking.php';
                    }
                </script>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>