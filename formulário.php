<!DOCTYPE html>
<html>
<head>
    <title>Formulário de Coleta de Dados Pessoais</title>
    <style>
        .container2 {
            width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 5px 2px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 14px;
        }

        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 14px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 3px;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container2">
        <h1>Insira seus dados</h1>
        <form action="/processar_formulario" method="post">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" required>
            
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" required>
            
            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" required>
            
            <label for="idade">Idade</label>
            <input type="number" id="idade" name="idade" required>
            
            
            <input type="submit" value="Enviar">
        </form>
    </div>
</body>
</html>