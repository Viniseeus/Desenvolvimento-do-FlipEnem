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
    </style>


    <title>Meu Usuario</title>
</head>

<body>
    <div class="container">
        <div class="esquerda">
            <ul>
                <li><a href="index.php">Voltar</a></li>
                <li><a href="feed.php">Feedbacks</a></li>
                <li><a href="sobreprojeto.php">Sobre o projeto</a></li>
                <li><a href="historico.php">Histórico</a></li>
                <li><a href="config.php">Configurações</a></li>
            </ul>
        </div>


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