<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Cadastro de Perguntas do ENEM</title>

    <?php
  // Conecta ao banco de dados
//   $conn = new mysqli($servername, $username, $password, $dbname);
include('conexao.php');
// Verifica se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}
    ?>

    <style>
        body {
            background-color: aliceblue;
        }

        h1 {
            text-align: center;
            padding: 2%;
            background: linear-gradient(to right, rgb(67, 45, 104), rgb(152, 152, 235), rgb(0, 45, 104));
            border-radius: 2px;
            color: white;
            font-family: 'Courier New', Courier, monospace
        }

        h2 {
            font-size: 15pt;
            text-align: center;
        }

        .container-fluid {
            margin: 3%;
        }
        .inputfoto {
            background-color: gray;
            color: #FFF;
            text-transform: uppercase;
            text-align: center;
            display: block;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <h1>Cadastro de perguntas</h1>
    <form action="CadasPerguntas.php" method="post" enctype="multipart/form-data">


        <div class="row">
            <div class="ml-3 col-7">
                <label class="form-label"></label>
                <div class="input-group">
                    <span class="input-group-text">Área da questão</span>


                    <div class="ml-3 form-group">
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
                </div>
            </div>

            <div class="ml-3 col-4">
                <label class="form-label"></label>
                <div class="input-group">
                    <span class="input-group-text">Ano da questão</span>
                    <input type="number" min="2000" max="2022" placeholder="EX.:2020" class="ml-3 form-control" id="anoquest" name="anoquest">
                </div>
            </div>
        </div>




        <div class="ml-3 my-3"><label class="ml-3 form-label"></label>
            <div class="input-group">
                <span class="input-group-text">Enunciado</span>
                <input class="ml-3 form-control" type="text" rows="5" id="enunciado" name="enunciado">
            </div>
        </div>
        <div class="ml-3 my-3"><label class="ml-3 form-label"></label>
        <div class="input-group">
            <span class="input-group-text">Pergunta</span>
                <input class="ml-3 form-control" type="text" rows="5" id="pergunta" name="pergunta">
            </div>
        </div><br>

        <h2>Alternativas</h2>

        <div class="ml-3"><label class="ml-3 form-label"></label>
            <div class="input-group">
                <span class="input-group-text">Alternativa A</span>
                <input class="ml-3 form-control" type="text" id="resposta1" name="resposta1">
                <span class="input-group-text">Imagem:
                    <input type="file" value="null" class="ml-3 form-control-file" id="imagem" name="imgr1"></span>
            </div>
        </div>

        <div class="ml-3"><label class="ml-3 form-label"></label>
            <div class="input-group">
                <span class="input-group-text">Alternativa B</span>
                <input class="ml-3 form-control" type="text" id="resposta2" name="resposta2">
                <span class="input-group-text">Imagem:
                    <input type="file" value="null" class="ml-3 form-control-file inputfoto" id="imagem" name="imgr2"></span>
            </div>
        </div>

        <div class="ml-3"><label class="ml-3 form-label"></label>
            <div class="input-group">
                <span class="input-group-text">Alternativa C</span>
                <input class="ml-3 form-control" type="text" id="resposta3" name="resposta3">
                <span class="input-group-text">Imagem:
                    <input type="file" value="null" class="ml-3 form-control-file" id="imagem" name="imgr3"></span>
            </div>
        </div>

        <div class="ml-3"><label class="ml-3 form-label"></label>
            <div class="input-group">
                <span class="input-group-text">Alternativa D</span>
                <input class="ml-3 form-control" type="text" id="resposta4" name="resposta4">
                <span class="input-group-text">Imagem:
                    <input type="file" value="null" class="ml-3 form-control-file" id="imagem" name="imgr4"></span>
            </div>
        </div>

        <div class="ml-3"><label class="ml-3 form-label"></label>
            <div class="input-group">
                <span class="input-group-text">Alternativa E</span>
                <input class="ml-3 form-control" type="text" id="resposta5" name="resposta5">
              <span class="input-group-text">Imagem:
                    <input type="file" value="null" class="ml-3 form-control-file" id="imagem" name="imgr5"></span>
            </div>
        </div>

        <div class="ml-3 "><label class="form-label my-3">Alternativa correta</label>
            <select class="ml-3 form-select" id="correta" name="correta">
                <option value="1">A</option>
                <option value="2">B</option>
                <option value="3">C</option>
                <option value="4">D</option>
                <option value="5">E</option>
            </select>
        </div>

        <div class="ml-3 form-group ">
            <label for="imagem" class="label-bg"></label>
            <div class="input-group">
                <span class="input-group-text">Imagem:
                    <input type="file" value="null" class="ml-3 form-control-file" id="imagem" name="img"></span>
            </div>
        </div>

        <div class="form-group ml-3">
            <label for="fonte" class="label-bg"></label>
            <div class="input-group">
                <span class="input-group-text">Fonte:</span>
                <input type="text" class="ml-3 form-control" id="fonte" name="fonte">
            </div>
        </div>

        <div class="form-group ml-3">
            <label for="observacao" class="label-bg"></label>
            <div class="input-group">
                <span class="input-group-text">Observações:</span>
                <textarea class="ml-3 form-control" id="observacao" name="observacao" rows="5"></textarea>
            </div>
        </div>


        <button type="submit" class="mr-3 ml-3 mb-3 btn btn-danger">Cancelar</button>
        <button type="submit" name="btnCadastrar" class="mb-3 btn btn-primary">Cadastrar</button>
    </form>   

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