<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Feedbacks</title>
    <style>
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
            height:80vh;
        }
        p{
            font-size:15pt;
            text-align: center;
            margin-top:3vh;
            margin-bottom:3vh;
        }
        
    </style>
</head>
<body>
    
    <div class="container-fluid">
    <div class="row">
            <div class="col-1 col-sm-1 lateral"></div>
                <div class="col-10 com-sm-10 centro">
                     <h1>Feedback</h1>
                     <p>Dúvidas, reclamações, agradecimentos ou dicas de aprimoramentos serão bem vindas ! </p>
                <div class="row">
                    <div class="col-12 col-sm-12 principal">
                    Deixe seu feed: <input type="text-area"> 
                    <input type="submit" value="Enviar">
                    <a href="index.php">
                            <button>Voltar</button>
                     </a>
                    </div>
                </div>
                </div>   
            <div class="col-1 col-sm-1 lateral"></div>           
    </div>
    </div>
</body>
</html>