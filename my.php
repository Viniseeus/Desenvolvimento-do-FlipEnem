<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">


    <style>
        .foto {
            max-width: 100%;
        }

        h1,
        p {
            margin-bottom: 10px;
        }

        .texto-destaque {
            font-weight: bold;
        }

        .nav-item {
            padding-left: 10px;
        }
    </style>


    <title>Meu Usuario</title>
</head>

<body>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Meu perfil</a>
        <button class="navbar-toggler ms-auto" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a href="index.php"  style="text-decoration:none;color:#000000">Voltar</a></li>
                <li class="nav-item"><a href="feed.php"  style="text-decoration:none;color:#000000">Feedback</a></li>
                <li class="nav-item"><a href="sobreprojeto.php"  style="text-decoration:none;color:#000000">Sobre o projeto</a></li>
                <li class="nav-item"><a href="historico.php"  style="text-decoration:none;color:#000000">Histórico</a></li>
                <li class="nav-item"><a href="config.php" style="text-decoration:none;color:#000000">Configurações</a></li>

            </ul>
        </div>
    </nav>

        <div class="container">
      <div class="row">
        <div class="col-md-4">
          <img src="foto.jpg" class="img-thumbnail foto">
        </div>
        <div class="col-md-8">
          <h1 class="text-primary">Nome do usuário</h1>
          <p>Curso do usuário</p>
          <p class="texto-destaque">Idade do usuário</p>
        </div>
      </div>
    </div>

        <?php
        /* Recupera o ID do usuário a partir do parâmetro na URL
        $id = $_GET['id'];

        // Recupera as informações do usuário a partir do banco de dados
        $query = "SELECT * FROM usuarios WHERE id = $id";
        $resultado = mysqli_query($conexao, $query);

        // Exibe as informações do usuário na página
        while ($row = mysqli_fetch_assoc($resultado)) {
            echo "<img src='" . $row['foto'] . "'><br>";
            echo "Nome: " . $row['nome'] . "<br>";
            echo "Curso: " . $row['curso'] . "<br>";
            echo "Idade: " . $row['idade'] . "<br>";
        }
        */
        ?>
</body>

</html>