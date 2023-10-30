<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Formulário de cadastro</title>

    <?php
    include('conexao.php');
    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }
    ?>

    <style>
        body {
            background: #081b29;
        }

        .h1 {
            margin-top: 5%;
            margin-bottom: 5%;
            text-align: center;
            color: #00abf0;

        }

        .top {
            font-size: 13pt;
            font-family: 'Poppins', sans-serif;
            border: solid 1px black;
            border-radius: 5px;
            margin-bottom: 3%;
            margin-top: 5%;
        }

        .container {
            background-color: rgba(207, 207, 207, 0.1);
            border: solid 1px black;
            margin-top: 5%;
            border-radius: 5px;
        }

        .teste {
            text-align: center;
            margin-bottom: 5%;
        }

        .voltar {
            margin-top: 5%;
            padding-left: 5%;
        }

        .voltar a {
            text-decoration: none;
            color: white;
        }

        .voltar a:hover {
            color: #00abf0;
            transition: 0.5s;
        }

        .info {
            color: white;
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4 voltar"><a href="inicio.php"><i class="bi bi-arrow-left"></i> Voltar</a></div>
            <div class="col-md-4 col-sm-4 top">
                <h1 class="h1">Formulário de cadastro:</h1>
            </div>
            <div class="col-md-4 col-sm-4"></div>
        </div>
        <form action="cadastro.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-4 col-sm-4"></div>
                <div class="col-md-4 col-sm-4">
                    <div class="form-group">
                        <label for="pergunta1" class="info"><i class="bi bi-person"></i> Usuário :</label>
                        <input type="text" class="form-control" id="usuario" name="usuario" required>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4"></div>
            </div>

            <div class="row">
                <div class="col-md-4 col-sm-4"></div>
                <div class="col-md-4 col-sm-4">
                    <div class="form-group">
                        <label for="pergunta1" class="info"><i class="bi bi-envelope-at"></i> E-mail:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4"></div>
            </div>


            <div class="row">
                <div class="col-md-4 col-sm-4"></div>
                <div class="col-md-4 col-sm-4">
                    <div class="form-group">
                        <label for="pergunta1" class="info"><i class="bi bi-lock"></i> Senha :</label>
                        <input type="password" class="form-control" id="senha" name="senha" required>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4"></div>
            </div>

            <div class="row">
                <div class="col-md-4 col-sm-4"></div>
                <div class="col-md-4 col-sm-4 teste">
                    <button type="submit" name="btncad" class="btn btn-primary">Cadastrar</button>
                </div>
                <div class="col-md-4 col-sm-4"></div>
            </div>
    </div>
    </form>

    <?php
if (isset($_POST['btncad'])) {
    $user = $_POST["usuario"];
    $email = $_POST["email"];
    $senha = ($_POST["senha"]);  

    $sql = "INSERT INTO usuario (usuario, senha, email, acertos, erros)
            VALUES ('$user', '$senha', '$email', 0, 0)";

    if ($conn->query($sql) === TRUE) {
        echo "<script> alert ('Dados inseridos com sucesso')
            window.location.href='login.php'
            </script>";
    } else {
        echo "Erro ao inserir dados: " . $conn->error;
    }

    $conn->close();
}

    ?>


</body>

</html>