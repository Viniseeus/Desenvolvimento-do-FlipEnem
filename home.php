<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>FlipEnem</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body{
            background-color: #081b29;
            color: #ededed;

        }
        .header{
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding:30px 10%;
            background: transparent;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 100;
        }
        .logo{
            font-size: 50px;
            color: #00abf0;
            text-decoration: none;
            font-weight: 600;
        }
        .navbar a{
            font-size: 18px;
            color: #ededed;
            text-decoration: none;
            font-weight: 500;
            margin-left:35px;
            transition: .3s;
        }
        .navbar a:hover{
            color: #00abf0;
            transition: 0.5s;
        }
        .home{
            height: 100vh;
            display: flex;
            align-items: center;
            padding: 0 10%;
        }
        .home-content{
            max-width: 600px;
        }
        .home-content h1 {
            font-size: 56px;
            font-weight: 700;
            line-height: 1.2;
        }
        .home-content h3{
            font-size: 32px;
            font-weight: 700;
            color: #00abf0;
        }
        .home-content p{
            font-size: 20px;
            margin: 20px 0 30px;
        }
        .home-content .btn-box{
            width: 345px;
            height: 50px;
            justify-content: space-between;
            display: flex;
        }
        .btn-box a {
            position: relative;
            width: 150px;
            height: 100%;
            background: #00abf0;
            border: 2px solid #00abf0;
            border-radius: 8px;
            display: inline-flex;
            font-size: 19px;
            color: #081b29;
            font-weight: 600;
            text-decoration: none;
            letter-spacing: 1px;
            justify-content: center;
            align-items: center;
            z-index: 1;
            overflow: hidden;
            transition: .5s;
        }

        .btn-box a:hover{
            color: #00abf0;
        }


        .btn-box a:nth-child(2){
            background: transparent;
            color: #00abf0;
        }
        .btn-box a:nth-child(2):hover{
            color: #081b29;
        }
        .btn-box a:nth-child(2)::before{
             background: #00abf0;
        }
        .btn-box a::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 0;
            height: 100%;
            background: #081b29;
            z-index: -1; 
            transition: .9s;   
        }
        .btn-box a:hover::before {
            width: 100%;
        }

        </style>
</head>
<body>
    
<header class="header"> 
    <a href="#" class="logo"><i class="bi bi-joystick"></i> FlipEnem</a>
    
    <nav class="navbar">
        <a href="my.php" class="active"><i class="bi bi-person"></i> Meu perfil</a>
        <a href="historico.php"> <i class="bi bi-hourglass-split"></i> Meu histórico</a>
        <a href="feed.php"><i class="bi bi-pencil"></i> Feedbacks</a>
        <a href="sobreprojeto.php"><i class="bi bi-journal-bookmark"></i> Sobre o projeto</a>
        <a href="config.php"><i class="bi bi-gear"></i> Configurações</a>
    </nav>
</header>

<section class="home">
    <div class="home-content">
        <h1>Seja bem vindo ao FlipEnem !</h1>
        <br>
        <p>Uma maneira mais divertida de estudar para o Enem. </p>
        <br>
        <h3>Bora jogar ?</h3>
        <br>
        <div class="btn-box">
            <a href="telaresponda.php">Jogar</a>
            <a href="formulário.php">Cadastrar</a>

        </div>
    </div>
</section>

</body>
</html>