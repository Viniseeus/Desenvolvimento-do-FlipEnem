<!DOCTYPE html>
<html lang="en">
<?php

include ('conexao.php');

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
            $areaquest = $_POST["areaquest"];

    
            // Faz o upload da imagem
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["img"]["name"]);
            move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
    
            // Insere os dados no banco de dados
            $sql = "INSERT INTO questao (anoquest, enunciado, pergunta, img, fonte, quest1, quest2, quest3, quest4, quest5,observacao, idarea, resultado)
    VALUES ('$data', '$enunciado', '$pergunta', '$imagem', '$fonte', '$resposta1', '$resposta2', '$resposta3', '$resposta4', '$resposta5', '$observacao', '$areaquest','$correta' )";
echo $sql;    
            if ($conn->query($sql) === TRUE) {
                echo "Dados inseridos com sucesso";
            } else {
                echo "Erro ao inserir dados: " . $conn->error;
            }
    
            // Fecha a conexão com o banco de dados
            $conn->close();
        }
        ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Cadastro de Perguntas do ENEM</title>
    <style>
       body{
        background-color: aliceblue;
       }
       h1{
            text-align: center;
            padding: 2%;
            background: linear-gradient(to right,rgb(67, 45, 104),rgb(152, 152, 235),rgb(0, 45, 104));
            border-radius: 2px;
            color: white;
            font-family: 'Courier New', Courier, monospace
        }
        h2{
            font-size: 15pt;
            text-align: center;
        }
        .container-fluid{
            margin:3%;
        }
    </style>
</head>
<body>
    <h1>Cadastro de perguntas</h1>
        <form class="" method="POST"  enctype="multipart/form-data">
            <div class="row">
            <div class="ml-3 col-7">
                <label class="form-label"></label>
                <div class="input-group">
                    <span class="input-group-text">Área da questão</span>
            <select class="ml-3 form-select" name="areaquest">
                <option value="1">Ciências Humanas e suas Tecnologias</option>
                <option value="2">Ciências da Natureza e suas Tecnologias</option>
                <option value="3">Linguagens, Códigos e suas Tecnologias</option>
                <option value="4">Matemática e suas Tecnologias</option>
             </select></div></div>
            
            <div class="ml-3 col-4">
                <label class="form-label"></label>
                <div class="input-group">
                    <span class="input-group-text">Ano da questão</span>
                <input type="number" class="ml-3 form-control" min="2009" max="2023" name="anoquest" id="anoquest" required>
            </div></div></div>

            
           
        
            <div class="ml-3 my-3"><label class="ml-3 form-label"></label>
                <div class="input-group">
                    <span class="input-group-text">Enunciado</span>
                    <input class="ml-3 form-control" type="text" name="enunciado" id="enunciado">
            </div></div><br>

            <div class="ml-3 my-3"><label class="ml-3 form-label"></label>
                <div class="input-group">
                    <span class="input-group-text">Pergunta</span>
                    <input class="ml-3 form-control" type="text" name="pergunta" id="pergunta">
            </div></div><br>

           <h2>Alternativas</h2>
        
           <div class="ml-3"><label class="ml-3 form-label"></label>
                <div class="input-group">
                    <span class="input-group-text">Alternativa 1</span>
            <input class="ml-3 form-control" type="text" name="resposta1" id="resposta1" required>
            </div></div>
           
            <div class="ml-3"><label class="ml-3 form-label"></label>
                <div class="input-group">
                    <span class="input-group-text">Alternativa 2</span>
            <input class="ml-3 form-control" type="text" name="resposta2" id="resposta2" required>
            </div></div>
           
            <div class="ml-3"><label class="ml-3 form-label"></label>
                <div class="input-group">
                    <span class="input-group-text">Alternativa 3</span>
            <input class="ml-3 form-control" type="text" name="resposta3" id="resposta3" required>
            </div></div>
           
            <div class="ml-3"><label class="ml-3 form-label"></label>
                <div class="input-group">
                    <span class="input-group-text">Alternativa 4</span>
            <input class="ml-3 form-control" type="text" name="resposta4" id="resposta4" required>
            </div> </div>
           
            <div class="ml-3"><label class="ml-3 form-label"></label>
                <div class="input-group">
                    <span class="input-group-text">Alternativa 5</span>
            <input class="ml-3 form-control" type="text" name="resposta5" id="resposta5" required>
            </div></div>
       
            <div class="ml-3 "><label class="form-label my-3">Alternativa correta:</label>
            <select class="ml-3 form-select" name="correta" name="correta">
                <option value="1">Questão 1</option>
                <option value="2">Questão 2</option>
                <option value="3">Questão 3</option>
                <option value="4">Questão 4</option>
                <option value="5">Questão 5</option>
            </select></div>
           
            <div class="form-group ml-3">
                <label for="imagem" class="label-bg"></label>
                <div class="input-group">
                    <span class="input-group-text">Imagem:  
                <input type="file" value="null" class="form-control-file" id="img" name="img"></span>
            </div></div>

            <div class="form-group ml-3">
                <label for="fonte" class="label-bg"></label>
                <div class="input-group">
                    <span class="input-group-text">Fonte:</span>
                <input type="text" class="form-control ml-3" id="fonte" name="fonte">
                </div></div>

            <div class="form-group ml-3">
                <label for="observacao" class="label-bg"></label>
                <div class="input-group">
                    <span class="input-group-text">Observações:</span>
                    <textarea class="form-control ml-3" id="observacao" name="observacao" rows="5"></textarea>
            </div></div>


            <button type="submit" class="btn btn-danger ml-3 mb-4">Cancelar</button>
            <button type="submit" name="btnCadastrar" class="btn btn-primary ml-3 mb-4">Cadastrar</button>
           
        </form>
        </form>

    

</body>
</html>