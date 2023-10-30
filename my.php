<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


    <style>
        body{
            background-color:#081b29;
        }
        .foto {
            max-width: 100%;
        }
        .lateral{
            background-color: #081b29;
            height:100vh;           
        }
        .meuperfil{
            font-size:30pt;
            text-align:center;
            margin-top: 3vh;
            color:#00abf0;
        }   
        .principal{
            margin-bottom:-50%;
            padding-bottom:50vh;
            border:solid 1px black;
            background-color: rgba(207, 207, 207, 0.1); 
        }
        .container-fluid{
            height:100%
        }
        .principal{
        margin-top:3vh;
       }
       .botaovoltar a {
            text-decoration:none;
            color:white;
            font-size:50%;   
            margin-left:4%;
        }
        .botaovoltar a:hover{
            color: #00abf0;
            transition:0.5s;
        }
       
        
    </style>


    <title>Meu perfil</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-1 col-md-1 lateral"></div>
             <div class="col-10 col-md-10 centro">
                <h1 class="meuperfil">Meu perfil</h1>
                <div class="row">
                    <div class="col-6 col-md-6 col-sm-12 principal">
                    <h1 class="botaovoltar"><a href="home.html"><i class="bi bi-arrow-left"></i> Voltar</a></h1></div>

                    <div class="col-6 col-md-6 col-sm-12 principal"></div>
                   
                </div>   
            </div>  
             <div class="col-1 col-md-1 lateral"></div>           
          
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