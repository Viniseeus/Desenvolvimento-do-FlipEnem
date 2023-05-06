<!DOCTYPE html>
<html>

<head>
    <title>Cadastro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>



    <div class="cabecalho">
        <div class="logo">
            <div class="container mt-3">
                <h1 class="text-bg-success">Tela de cadastro</h1>
            </div>
        </div>
    </div>

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

<style>
  h1 {
    text-align: center;
    padding: 10px;
  }
  .label-bg {
    background-color: #ADD8E6;
    padding: 5px;
  }
  body {
    background-color: #656565;
  }

  </style>

    <form action="cadastro.php" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="data" class="label-bg">Data da questão:</label>
            <input type="date" class="form-control" id="anoquest" name="anoquest">
        </div>

        <div class="form-group">
            <label for="enunciado" class="label-bg">Enunciado:</label>
            <textarea class="form-control" rows="5" id="enunciado" name="enunciado"></textarea>
        </div>

        <div class="form-group">
            <label for="pergunta1" class="label-bg">Pergunta 1:</label>
            <input type="text" class="form-control" id="pergunta1" name="pergunta1">
        </div>

        <div class="form-group">
            <label for="pergunta2" class="label-bg">Pergunta 2:</label>
            <input type="text" class="form-control" id="pergunta2" name="pergunta2">
        </div>

        <div class="form-group">
            <label for="pergunta3" class="label-bg">Pergunta 3:</label>
            <input type="text" class="form-control" id="pergunta3" name="pergunta3">
        </div>

        <div class="form-group" >
            <label for="pergunta4" class="label-bg">Pergunta 4:</label>
            <input type="text" class="form-control" id="pergunta4" name="pergunta4">
        </div>

        <div class="form-group">
            <label for="pergunta5" class="label-bg">Pergunta 5:</label>
            <input type="text" class="form-control" id="pergunta5" name="pergunta5">
        </div>

        <div class="form-group">
            <label for="resposta" class="label-bg">Qual das perguntas está correta?</label>
            <select class="form-control" id="resposta" name="resposta">
                <option value="1">Pergunta 1</option>
                <option value="2">Pergunta 2</option>
                <option value="3">Pergunta 3</option>
                <option value="4">Pergunta 4</option>
                <option value="5">Pergunta 5</option>
            </select>
        </div>

        <div class="form-group">
            <label for="imagem" class="label-bg">Imagem:</label>
            <input type="file" class="form-control-file" id="imagem" name="imagem">
        </div>

        <div class="form-group">
            <label for="fonte" class="label-bg">Fonte:</label>
            <input type="text" class="form-control" id="fonte" name="fonte">

        </div>

        <div class="form-group">
            <label for="observacoes" class="label-bg">Observações:</label>
            <textarea class="form-control" id="observacoes" name="observacoes" rows="5"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar</button>
        <button type="submit" class="btn btn-danger">Cancelar</button>
    </form>
    </div>


    <?php
    // Conecta ao banco de dados
    $servername = "localhost:3307";
    $username = "root";
    $password = "TheSuperMario64";
    $dbname = "tccflipenem";
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica se a conexão foi bem-sucedida
    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Processa os dados do formulário
    $enunciado = $_POST["enunciado"];
    $pergunta1 = $_POST["quest1"];
    $pergunta2 = $_POST["quest2"];
    $pergunta3 = $_POST["quest3"];
    $pergunta4 = $_POST["quest4"];
    $pergunta5 = $_POST["quest5"];
    $resposta = $_POST["resultado"];
    $data = $_POST["anoqeust"];
    $imagem = $_FILES["img"]["name"];
    $fonte = $_POST["fonte"];
    $observacoes = $_POST["observacoes"];

    // Faz o upload da imagem
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["img"]["name"]);
    move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);

    // Insere os dados no banco de dados
    $sql = "INSERT INTO formulario (enunciado, quest1, quest2, quest3, quest4, quest5, resultado, dataquest, img, fonte, observacoes)
VALUES ('$enunciado', '$pergunta1', '$pergunta2', '$pergunta3', '$pergunta4', '$pergunta5', '$resposta', '$data', '$imagem', '$fonte', '$observacoes')";

    if ($conn->query($sql) === TRUE) {
        echo "Dados inseridos com sucesso";
    } else {
        echo "Erro ao inserir dados: " . $conn->error;
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
    ?>


</body>

</html>