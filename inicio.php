<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<link rel="icon" href="iconflipenem.png" type="image/x-icon">

<title>FlipEnem</title>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Handjet:wght@300&family=Rubik+Iso&family=Smooch&family=Source+Code+Pro:ital,wght@1,300&family=Vina+Sans&display=swap');
  body {
    margin: 0;
    padding: 0;
    background-color: #081b29;
    
  }

  .btn-box {
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
    padding-top: 15vh;
  }

  .btn {
    display: inline-block;
    padding: 10px 20px;
    margin: 10px;
    border: none;
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
    border-radius: 5px;
    text-decoration: none;
  }
  .logo{
    background-color: #00abf0;
    text-align: center;
    height: 16vh;
    border-radius: 5px;
    font-size: 25pt ;
    margin: 25px;

  }
 h1{
        padding: 4vh;
        font-family: 'Handjet', cursive;        
        color: #000;
        text-shadow: #081b29 0.1em 0.1em 0.2em;
        letter-spacing: 4px;
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
        .foto{
            text-align: center;
            margin-top: 25vh;
        }
        
</style>
</head>
<body>
    <div class = "logo">
        <h1></i>FlipEnem</h1>
    </div>
    <div class="foto">
        <img src="iconflipenem.png" width="200vh">
    </div>
<div class="btn-box">
  <a class="btn" href="cadastro.php">Cadastrar</a>
  <a class="btn" href="login.php">Login</a>
</div>
</body>
</html>
