<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">


    <style>
        .foto {
            max-width: 100%;
        }
        .lateral{
            background-color: rgba(207, 207, 207, 0.4); 
            height:100vh;           
        }
        h1{
            font-size:30pt;
            text-align:center;
            margin-top: 3vh;
            margin-bottom:3vh;
        }
        .centro{
            background-color: rgba(207, 207, 207, 0.4);  
        }    
        .principal{
            background-color: rgba(207, 207, 207, 0.5); 
            padding:15%;
            padding-bottom:50vh;
            border:solid 1px black;
        }
        .voltar button{
           margin-left:100vh;
        }
        .container-fluid{
            height:100%
        }
        
    </style>


    <title>Meu Usuario</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2 col-md-2  lateral"></div>
             <div class="col-8 col-md-8 centro">
                <h1>Meu perfil.</h1>
                <div class="row">
                    <div class="col-6 col-md-6 col-sm-12 principal">teste</div>
                    <div class="col-6 col-md-6 col-sm-12 principal">teste
                    <a href="index.php">
                            <button>Voltar</button>
                        </a>
                    </div>
                   
                </div>   
            </div>  
             <div class="col-2 col-md-2 lateral"></div>           
          
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