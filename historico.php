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

    <title>Histórico de Usuario</title>
    <style>
        
        .lateral{
            background-color: #081b29; 
            height:100vh;           
        }
        .titulo{
            font-size:30pt;
            text-align:center;
            margin-top: 3vh;
            color:#00abf0;
        }
        .centro{  
            background-color: #081b29;
        }   
        .principal{
            background-color: rgba(207, 207, 207, 0.1); 
            height:78vh;    
            border-radius: 5px;
        } 
        p{
            font-size:15pt;
            text-align: center;
            margin-top:2vh;
            margin-bottom:2vh;
            color:white;
        }
        .botaovoltar a{
            text-decoration:none;
            color:white;
            font-size:50%;
            margin-left:2%;
        }
        .botaovoltar a:hover{
            color: #00abf0;
            transition:0.5s;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
            <div class="col-1 lateral"></div>
                <div class="col-10 centro">
                     <h1 class="titulo">Meu histórico</h1>
                     <p>Aqui ficará salvo o seu histórico de suas jogadas </p>
                <div class="row">
                    <div class="col-12 principal">
                    <h1 class="botaovoltar"><a href="home.html"><i class="bi bi-arrow-left"></i> Voltar</a></h1>
                    </div>
                </div>
                </div>   
            <div class="col-1 lateral"></div>           
    </div>
    </div>
</body>
</html>