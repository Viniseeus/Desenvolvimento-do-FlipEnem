<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Histórico de Usuario</title>
    <style>
        body {
            background-color: #081b29;
        }
        .lateral {
            background-color: #081b29;
            height: 100vh;
        }

        .titulo {
            font-size: 30pt;
            text-align: center;
            margin-top: 3vh;
            color: #00abf0;
        }

        .centro {
            background-color: #081b29;
        }

        .principal {
            background-color: rgba(207, 207, 207, 0.1);
            border-radius: 5px;
        }

        p {
            font-size: 15pt;
            text-align: center;
            margin-top: 2vh;
            margin-bottom: 2vh;
            color: white;
        }

        .botaovoltar a {
            text-decoration: none;
            color: white;
            font-size: 50%;
            margin-left: 2%;
        }

        .botaovoltar a:hover {
            color: #00abf0;
            transition: 0.5s;
        }

        /* Estilos para centralizar a paginação */
        .pagination-container {
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-1 lateral"></div>
            <div class="col-10 centro">
                <h1 class="titulo">Meu histórico</h1>
                <p>Aqui ficará salvo o seu histórico de suas jogadas</p>
                <div class="row">
                    <div class="col-12 principal">
                        <h1 class="botaovoltar"><a href="index.php"><i class="bi bi-arrow-left"></i> Voltar</a></h1>
                        <!-- Exibir o histórico das respostas do usuário -->
                        <?php
                        session_start();
                        include('conexao.php');

                        // Recuperar o código do usuário com base na sessão de e-mail
                        $email = $_SESSION['email'];
                        $sqlUserId = "SELECT iduser FROM usuario WHERE email = '$email'";
                        $resultUserId = mysqli_query($conn, $sqlUserId);
                        $rowUserId = mysqli_fetch_assoc($resultUserId);
                        $userId = $rowUserId['iduser'];

                        // Definir o número de registros por página
                        $registrosPorPagina = 7;

                        // Determinar a página atual
                        $pagina = isset($_GET['page']) ? $_GET['page'] : 1;

                        // Calcular o início da seleção de registros
                        $inicio = ($pagina - 1) * $registrosPorPagina;

                        // Consulta SQL para obter o histórico de respostas do usuário
                        $sqlHistorico = "SELECT data_hora, resposta 
                        FROM resultado 
                        WHERE codusuario = $userId 
                        ORDER BY data_hora DESC 
                        LIMIT $inicio, $registrosPorPagina";
                        $resultHistorico = mysqli_query($conn, $sqlHistorico);

                        if (mysqli_num_rows($resultHistorico) > 0) {
                            echo '<table class="table">';
                            echo '<thead>';
                            echo '<tr>';
                            echo '<th style="color: white;">Data e Hora</th>';
                            echo '<th style="color: white;">Resultado</th>';
                            echo '</tr>';
                            echo '</thead>';
                            echo '<tbody>';

                            while ($rowHistorico = mysqli_fetch_assoc($resultHistorico)) {
                                $data_hora = date('d/m/Y H:i:s', strtotime($rowHistorico['data_hora']));
                                $resposta = $rowHistorico['resposta'];
                                
                                // Definir a cor com base na resposta (0 vermelho, 1 verde)
                                $cor = $resposta == 0 ? 'red' : 'green';
                                $resultado = $resposta == 0 ? 'Errou' : 'Acertou';
                                
                                echo '<tr>';
                                echo '<td style="color: white;">' . $data_hora . '</td>';
                                echo '<td style="color: ' . $cor . ';">' . $resultado . '</td>';
                                echo '</tr>';
                            }

                            echo '</tbody>';
                            echo '</table>';

                            // Paginação
                            $sqlTotalRegistros = "SELECT COUNT(*) as total FROM resultado WHERE codusuario = $userId";
                            $resultTotalRegistros = mysqli_query($conn, $sqlTotalRegistros);
                            $rowTotalRegistros = mysqli_fetch_assoc($resultTotalRegistros);
                            $totalRegistros = $rowTotalRegistros['total'];

                            $totalPaginas = ceil($totalRegistros / $registrosPorPagina);

                            // Exibir links para navegar entre as páginas
                            echo '<div class="pagination-container">';
                            echo '<ul class="pagination">';
                            for ($i = 1; $i <= $totalPaginas; $i++) {
                                echo '<li class="page-item ' . ($i == $pagina ? 'active' : '') . '">';
                                echo '<a class="page-link" href="?page=' . $i . '">' . $i . '</a>';
                                echo '</li>';
                            }
                            echo '</ul>';
                            echo '</div>';
                        } else {
                            echo '<p>Não há histórico disponível.</p>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-1 lateral"></div>
        </div>
    </div>
</body>
</html>
