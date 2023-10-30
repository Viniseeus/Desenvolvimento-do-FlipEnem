<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="cronometro.js"></script>


    <?php
    // Conecta ao banco de dados
    //   $conn = new mysqli($servername, $username, $password, $dbname);
    include('conexao.php');
    // Verifica se a conexão foi bem-sucedida
    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }
    ?>

    <title>Responda ! </title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #081b29;
        }

        .container {
            border: solid 1px black;
            margin-top: 4.5%;
            line-height: 5vh;
            padding: 1.5%;
            background-color: rgba(207, 207, 207, 0.1);
            border-radius: 6px;
        }

        .teste {
            background-color: rgb(31, 167, 167);
            border: solid 1px black;
            margin-top: 2%;
            border-radius: 4px;
            line-height: 1.2;
            font-size: 13pt;
            vertical-align: middle;
        }

        .teste1 {
            background-color: rgb(88, 241, 68);
            border: solid 1px black;
            margin-top: 2%;
            text-align: center;
            border-radius: 4px;
        }

        .fonte {
            text-align: left;
            background-color: rgb(31, 167, 167);
            border: solid 1px black;
            margin-top: 2%;
            margin-bottom: 1%;
            border-radius: 4px;
        }

        .enunciado {
            background-color: rgb(31, 167, 167);
            border: solid 1px black;
            margin-top: 2%;
            line-height: 1.2;
            font-size: 13pt;
            border-radius: 4px;

        }

        .pergunta {
            background-color: rgb(31, 167, 167);
            border: solid 1px black;
            margin-top: 2%;
            line-height: 1.5;
            font-size: 12pt;
            border-radius: 4px;

        }

        .contagem {
            border: solid 1px black;
            text-align: center;
            border-radius: 4px;
            color: white;

        }

        .area {
            background-color: rgb(31, 167, 167);
            border-radius: 4px;
        }

        .input {
            display: none;
        }

        .botaovoltar a {
            text-decoration: none;
            color: white;
        }

        .botaovoltar a:hover {
            color: #00abf0;
            transition: 0.5s;
        }
        .responder {
            text-align: center;
            padding:5px;
        }
        .btnresponder{
            background-color: #00abf0;
            border: solid 1px black;
            padding: 5px;
            border-radius: 5px;
            font-size: 20px;
        }
        .selecionavel {
  cursor: pointer;
  border: solid 1px black;
            margin-top: 2%;
            border-radius: 4px;
            line-height: 1.2;
            font-size: 13pt;
            vertical-align: middle;
}
.selecionado {
    background-color: rgb(31, 167, 167, 0.6);
 /* Por exemplo, definindo a cor azul */
  color: whitesmoke;
}
        
    </style>
</head>

<body>


    <?php
    // Consulta SQL para obter as informações do banco de dados
    $sql = "SELECT * FROM questao AS q 
			INNER JOIN areaconhe AS a ON a.idArea=q.idarea 
			ORDER BY RAND() LIMIT 1";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Loop que percorre as linhas do resultado da consulta
        while ($row = $result->fetch_assoc()) {
            // Exibindo as informações na tela

?>

<form method="POST" action="">

     <div class='container'>
        
        <div class='row'>  
            <div class='col-4 col-sm-4 col-md-4 col-xs-4 botaovoltar '><a href='home.php'><i class='bi bi-arrow-left'></i> Voltar</a></div>
                <div class='col-4 col-sm-4 coml-md-4 col-xs-4 contagem'><h1 id='timer'></h1></diV>
            <div class='col-4 col-sm-4 col-md-4 col-xs-4'></div>
        </div>    
 <div class='row'>
            
                <div class='col-4 col-sm-4 col-md-4 col-xs-4 teste'>
                    <div class='row'>
                        <div class='col-6 col-sm-6 col-md-6 col-xs-6  area'>Área da questão:</div>
                        <div class='col-6 col-sm-6 col-md-6 col-xs-6  area'><?php echo $row['descArea'] ?></div>
                    </div>
                </div>
        <div class='col-4 col-sm-4 col-md-4 col-xs-4 '></div>
            <div class='col-4 col-sm-4 col-md-4 col-xs-4  teste'>
                <div class='row'>
                    <div class='col-6 col-sm-6 col-md-6 col-xs-6 area'>Ano da questão:</div>
                <div class='col-6 col-sm-6 col-md-6 col-xs-6 area'><?php  echo $row['anoquest']?> </div>
                </div>
            </div>
        </div>    

            <div class='row'>  
            <div class='col-12 sm-12 col-md-12 col-xs-12 enunciado'><?php echo $row['enunciado'] ?></div>
        </div>
        
       <div class='row'>  
                 <div class='col-3 col-sm-2 col-sm-2 col-xs-2'></div>
                 <div class='col-3 col-sm-8 col-md-8 col-xs-8 pergunta'><?php echo $row['pergunta'] ?></div>
                 <div class='col-3 col-sm-2 col-sm-2 col-xs-2'></div>
        </div> 
        
  

        <div class='row'>    
    <div id='div1' class='div-conteudo col-12 col-sm-12 col-md-12 col-xs-12 teste selecionavel'>
        <?php echo "<input id='op5' type='radio' name='resposta' value='5'><label for='op5'> " . $row["quest5"] . "</label><br>"; ?>
    </div>
</div>


                <div class='row'>  
            <div id='div1' class='div-conteudo col-12 col-sm-12 col-md-12 col-xs-12 teste selecionavel' data-id="2" onclick="alternarSelecao(this)"><?php echo "<input id='op2' type='radio' name='resposta' value='2'><label for='op2'> " . $row["quest2"] . "</label><br>"; ?></div>
        </div>

              <div class='row'>   
            <div id='div1' class='div-conteudo col-12 col-sm-12 col-md-12 col-xs-12 teste selecionavel' data-id="3" onclick="alternarSelecao(this)"><?php echo "<input id='op3' type='radio' name='resposta' value='3'><label for='op3'> " . $row["quest3"] . "</label><br>"; ?></div>
        </div>
   
        <div class='row'>    
            <div id='div1' class='div-conteudo col-12 col-sm-12 col-md-12 col-xs-12 teste selecionavel' data-id="4" onclick="alternarSelecao(this)"><?php echo "<input id='op4' type='radio' name='resposta' value='4'><label for='op4'> " . $row["quest4"] . "</label><br>"; ?></div>
        </div>
    

            <div class='row'>    
        <div id='div1' class='div-conteudo col-12 col-sm-12 col-md-12 col-xs-12 teste selecionavel'><?php echo "<input id='op5' type='radio' name='resposta' value='5'><label for='op5'> " . $row["quest5"] . "</label><br>"; ?></div>
        </div>    

       <div class='row'>    
            <div class='col-12 col-sm-12 col-md-12 col-xs-12 fonte'><?php echo $row['fonte'] ?></div>

        </div>  
        <div class='col-12 col-sm-12 col-md-12 col-xs-12 responder '><input type="submit" value="Responder" class="btnresponder">
</div>

        </div>
        </div>

</form>

<?php
           
       // Verificando se a resposta do usuário está correta

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($_POST["resposta"] == null ){
                    echo "<script>
                        alert('Selecione uma questão !');
                    </script>";
            }
                elseif ($_POST["resposta"] == $row["resultado"]) {
                    echo "<script>
                    window.location.replace('home.php'); 

                    </script>"; header("location:home.php");
                } else {
                    echo "<script>alert('Você errou, a resposta é');  
                    window.location.replace('home.php'); 
                    </script>";
                 }
            }
        }     

    }  else {
        echo "Não foram encontradas perguntas no banco de dados.";
    }

   
    // Fechando a conexão com o banco de dados
    $conn->close();
    ?>


<script>
    // Adiciona um evento de clique à label
    document.querySelector('.selecionavel label').addEventListener('click', function() {
        // Encontra a div-pai da label clicada
        var divPai = this.closest('.div-conteudo');
        
        // Verifica se a div-pai tem a classe 'selecionado', e alterna a classe
        if (divPai.classList.contains('selecionado')) {
            divPai.classList.remove('selecionado');
        } else {
            divPai.classList.add('selecionado');
        }
    });
</script>


</body>

</html>
