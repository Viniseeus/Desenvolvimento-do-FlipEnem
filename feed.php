

<?php
session_start();
include_once('conexao.php');
require('valida_login.php');

$usuario = 'nome_de_usuario';

$sql = "SELECT ADM FROM usuario WHERE email = '$email'";

$result = $conn->query($sql);

if ($result) {
    $row = $result->fetch_assoc();

    $adm = $row['ADM'];

    if ($adm == 0) {
    } elseif ($adm == 1) {

        $feedback_query = "SELECT feedback, datafeed, iduser, nomeuser FROM feed";
        $feedback_result = $conn->query($feedback_query);
    }
} else {
    echo "Erro na consulta: " . $conn->error;
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <title>Feedbacks</title>
    <style>
        .lateral{
            background-color: #081b29; 
            height:100vh;           
        }
        .feed{
            font-size:30pt;
            text-align:center;
            margin-top: 3vh;
            margin-bottom:3vh;
            color:#00abf0;
        }
        .centro{
            background-color: #081b29; 
        }    
        .principal{
            background-color: rgba(207, 207, 207, 0.1); 
            height:80vh;
        }
        p{
            font-size:15pt;
            text-align: center;
            margin-top:3vh;
            margin-bottom:3vh;
            color:white;
        }
        .principal input{
            border-radius:8px;
        }
        .principal button{
            border-radius:8px;
        }
        .botaovoltar a{
            text-decoration:none;
            color:white;
            font-size:50%;
            margin-left:1%;
        }
        .botaovoltar a:hover{
            color: #00abf0;
            transition:0.5s;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #00abf0;
            color: white;
        }

        tr:nth-child(odd) {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #d4d4d4;
        }

        .cor {
            color:#000; 
        }
        .cor2 {
            color:white; 
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-1 col-sm-1 lateral"></div>
        <div class="col-10 com-sm-10 centro">
            <h1 class="feed">Feedback</h1>
            <div class="row">
                <div class="col-12 col-sm-12 principal">
                    <h1 class="botaovoltar"><a href="index.php"><i class="bi bi-arrow-left"></i> Voltar</a></h1>
                    
                    <?php
                    if ($adm == 0) {
                    ?>
                    <form method="POST" action="feedprocess.php">
                        <h1 class="feed">Deixe seu feedback: <input name="feedback" type="text" placeholder=" . . ." required>
                            <input type="submit" value="Enviar"></h1>
                    </form>
                    <p>Dúvidas, reclamações, agradecimentos ou dicas de aprimoramentos serão bem vindas ! </p>
                    
                    <?php
                    } elseif ($adm == 1) {
                        if ($feedback_result->num_rows > 0) {
                            echo "<h1 class='cor2'>Feedbacks dos Usuários:</h1>";
                            echo "<table>";
                            echo "<tr><th>ID</th><th>Nome do Usuário</th><th>Data do Feedback</th><th>Feedback</th></tr>";
                            while ($row = $feedback_result->fetch_assoc()) {
                                echo "<tr><td>" . $row['iduser'] . "</td><td>" . $row['nomeuser'] . "</td><td>" . $row['datafeed'] . "</td><td>" . $row['feedback'] . "</td></tr>";
                            }
                            echo "</table>";
                        } else {
                            echo "Nenhum feedback de usuário encontrado.";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-1 col-sm-1 lateral"></div>
    </div>
</div>
</body>
</html>
