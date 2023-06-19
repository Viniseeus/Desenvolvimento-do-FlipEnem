<!DOCTYPE html>
<html>
<?php
// Conecta ao banco de dados
//   $conn = new mysqli($servername, $username, $password, $dbname);
include('conexao.php');
// Verifica se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}
?>

<head>
    <title>Cadastro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <style>
        h1 {
            text-align: center;
            padding: 10px;
        }

        h2 {
            text-align: center;
            padding: 10px;
        }

        .label-bg {
            background-color: #ADD8E6;
            padding: 5px;
        }

        body {
            background-color: gray;
        }
    </style>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Cadastro de Perguntas</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="index.php">Voltar</a>
                </li>
            </ul>
        </div>
    </nav>


    <div class="cabecalho">
        <div class="logo">
            <div class="container mt-3">
                <h1 class="text-bg-success">Tela de cadastro</h1>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <h2 class="text-danger"> Coloque o maximo de informações!!</h2>
        <br>
        <br>
    </div>

    <div class="container">



        <form action="cadastroperguntas.php" method="Post" enctype="multipart/form-data">

            <div class="form-group">
                <select name="tccflipenem">
                    <option>Selecione</option>
                    <?php
                    $query = "SELECT * FROM areaconhe";
                    $result = $conn->query($query);
                    while ($row = $result->fetch_array()) {
                        echo '<option value="' . $row['idarea'] . '">' . $row['descArea'] . '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="data" class="label-bg">Ano da questão:</label>
                <input type="number" min="2000" max="2022" placeholder="EX.:2020" class="form-control" id="anoquest" name="anoquest">
            </div>

            <div class="form-group">
                <label for="enunciado" class="label-bg">Enunciado:</label>
                <textarea class="form-control" rows="5" id="enunciado" name="enunciado"></textarea>
            </div>

            <div class="form-group">
                <label for="pergunta" class="label-bg">Pergunta:</label>
                <textarea class="form-control" rows="5" id="pergunta" name="pergunta"></textarea>
            </div>

            <div class="form-group">
                <label for="resposta1" class="label-bg">Resposta 1:</label>
                <input type="text" class="form-control" id="resposta1" name="resposta1">
            </div>

            <div class="form-group">
                <label for="resposta2" class="label-bg">Resposta 2:</label>
                <input type="text" class="form-control" id="resposta2" name="resposta2">
            </div>

            <div class="form-group">
                <label for="resposta3" class="label-bg">Resposta 3:</label>
                <input type="text" class="form-control" id="resposta3" name="resposta3">
            </div>

            <div class="form-group">
                <label for="resposta4" class="label-bg">Resposta 4:</label>
                <input type="text" class="form-control" id="resposta4" name="resposta4">
            </div>

            <div class="form-group">
                <label for="resposta5" class="label-bg">Resposta 5:</label>
                <input type="text" class="form-control" id="resposta5" name="resposta5">
            </div>

            <div class="form-group">
                <label for="correta" class="label-bg">Qual das respostas está correta?</label>
                <select class="form-control" id="correta" name="correta">
                    <option value="1">Resposta 1</option>
                    <option value="2">Resposta 2</option>
                    <option value="3">Resposta 3</option>
                    <option value="4">Resposta 4</option>
                    <option value="5">Resposta 5</option>
                </select>
            </div>

            <div class="form-group">
                <label for="imagem" class="label-bg">Imagem:</label>
                <input type="file" value="null" class="form-control-file" id="imagem" name="img">
            </div>

            <div class="form-group">
                <label for="fonte" class="label-bg">Fonte:</label>
                <input type="text" class="form-control" id="fonte" name="fonte">

            </div>

            <div class="form-group">
                <label for="observacao" class="label-bg">Observações:</label>
                <textarea class="form-control" id="observacao" name="observacao" rows="5"></textarea>
            </div>



            <button type="submit" name="btnCadastrar" class="btn btn-primary">Cadastrar</button>
            <button type="submit" class="btn btn-danger">Cancelar</button>
        </form>
    </div>


    <?php
    if (isset($_POST['btnCadastrar'])) {

        // Processa os dados do formulário.
        // As variaveis perguntas vem das colunas Resposta1,2,3,4 e 5.
        $enunciado = $_POST["enunciado"];
        $pergunta = $_POST["pergunta"];
        $resposta1 = $_POST["resposta1"];
        $resposta2 = $_POST["resposta2"];
        $resposta3 = $_POST["resposta3"];
        $resposta4 = $_POST["resposta4"];
        $resposta5 = $_POST["resposta5"];
        $correta = $_POST["correta"];
        $data = $_POST["anoquest"];
        $imagem = $_FILES["img"]["name"];
        $fonte = $_POST["fonte"];
        $observacao = $_POST["observacao"];

        // Faz o upload da imagem
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["img"]["name"]);
        move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);

        // Insere os dados no banco de dados
        $sql = "INSERT INTO questao (enunciado, pergunta, quest1, quest2, quest3, quest4, quest5, resultado, anoquest, img, fonte, observacao)
VALUES ('$enunciado', '$pergunta', '$resposta1', '$resposta2', '$resposta3', '$resposta4', '$resposta5', '$correta', '$data', '$imagem', '$fonte', '$observacao')";

        if ($conn->query($sql) === TRUE) {
            echo "Dados inseridos com sucesso";
        } else {
            echo "Erro ao inserir dados: " . $conn->error;
        }

        // Fecha a conexão com o banco de dados
        $conn->close();
    }
    ?>
</body>

</html>