<?php
session_start();
include_once('conexao.php');
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu perfil</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

        .profile-image {
            max-width: 100%;
            height: auto;
        }

        .user-info {
            padding: 20px;
        }

        .botaovoltar a {
            text-decoration: none;
            color: white;
            font-size: 14px;
        }

        .botaovoltar a:hover {
            color: #00abf0;
            transition: 0.5s;
        }

        .chart-container {
            text-align: center;
            margin-top: 20px;
        }

        .meuperfil {
            text-align: center;
            color: #00abf0;
        }

        .corbt {
            background-color: #00abf0;
            text-align: center;
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
                        <li class="nav-item"><a href="historico.php" class="nav-link px-2 link-secondary bi bi-clock-history"> Histórico</a></li>
                        <li class="nav-item"><a href="configura.php" class="nav-link px-2 link-secondary bi bi-gear-fill"> Configurações</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1 lateral"></div>
            <div class="col-md-10 centro">
                <h1 class="meuperfil">Meu perfil</h1>
                <div class="row">
                    <div class="col-md-6 principal user-info" style="background-color: rgba(0, 0, 0, 0.5); padding: 20px;">
                        <h1 class="botaovoltar"><a href="index.php"><i class="bi bi-arrow-left"></i> Voltar</a></h1>
                        <?php
                        if (!empty($rowUserData['imagem'])) {
                            echo "<img src='" . $rowUserData['imagem'] . "' class='foto profile-image' alt='Foto de Perfil'><br>";
                        } else {
                            echo "Sem foto<br>";
                        }
                        echo "Nome: " . $rowUserData['usuario'] . "<br>";
                        echo "Email: " . $rowUserData['email'] . "<br>";
                        echo "Curso: " . $rowUserData['curso'] . "<br>";
                        echo "Escolafaculdade: " . $rowUserData['escolafaculdade'] . "<br>";
                        echo "Data de nascimento: " . date('d/m/Y', strtotime($rowUserData['datanasc'])) . "<br>";
                        ?>
                    </div>
                    <div class="col-md-6 principal" style="background-color: rgba(0, 0, 0, 0.5); padding: 20px;">
                        <div class="chart-container">
                            <?php if ($userData['acertos'] !== null && $userData['erros'] !== null) : ?>
                                <canvas id="chart"></canvas>
                                <div class="text-center mt-3">
                                    <button class="btn corbt" onclick="redirectToRanking()">Ver Classificação Geral</button>
                                </div> 
                                <?php else : ?>
                                <p class="text-muted">Não há dados suficientes para gerar o gráfico de desempenho.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1 lateral"></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var userData = <?php echo json_encode($userData); ?>;
        var hasData = userData.acertos !== null && userData.erros !== null;
        var ctx = document.getElementById('chart').getContext('2d');

        if (hasData) {
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Acertos', 'Erros'],
                    datasets: [{
                        label: 'Desempenho Pessoal',
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
</body>

</html>