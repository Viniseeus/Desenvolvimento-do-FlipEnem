<?php
session_start();
include_once('conexao.php');
require('valida_login.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

}

$email = $_SESSION['email'];
$sqlUserId = "SELECT iduser, usuario, datanasc, curso, escolafaculdade, imagem FROM usuario WHERE email = '$email'";
$resultUserId = mysqli_query($conn, $sqlUserId);
$rowUserId = mysqli_fetch_assoc($resultUserId);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <style>
        h1{
            color:#007bff;
        }
        body {
            background-color: #081b29;
        }
        .linha{
            color: white;
            margin-top:18px;

        }
        .container{
            margin-left:38%;
        }
        .botaovoltar a{
            text-decoration:none;
            color:white;
            font-size:50%;
            margin-left:1%;
        }
        .botaovoltar a:hover{
            color: #00abf0;
            transition:0.5s;
        }
        
    </style>
</head>
<body>
<h1 class="botaovoltar"><a href="Perfil.php"><i class="bi bi-arrow-left"></i> Voltar</a></h1>

    <div class="container">
        <h1>Editar Perfil</h1>

        <form action="atualizaruser.php" method="POST" enctype="multipart/form-data">
            <div class="linha">    
                <label for="usuario">Nome de Usuário:</label>
                <input type="text" id="usuario" name="usuario" value="<?php echo $rowUserId['usuario']; ?>">
            </div>

            <div class="linha">
                <label for="datanasc">Data de Nascimento:</label>
                <input type="date" id="datanasc" name="datanasc" value="<?php echo $rowUserId['datanasc']; ?>">
            </div>

            <div class="linha">
                <label for="curso">Curso:</label>
                <input type="text" id="curso" name="curso" value="<?php echo $rowUserId['curso']; ?>">
            </div>

            <div class="linha">
                <label for="escolafaculdade">Escola/Faculdade:</label>
                <input type="text" id="escolafaculdade" name="escolafaculdade" value="<?php echo $rowUserId['escolafaculdade']; ?>">
            </div>
         
            <div class="linha">
                <label for="imagem">Imagem de Perfil:</label>
                <input type="file" id="imagem" name="imagem">
            </div>
            
            <div class="linha">
                <button type="submit">Salvar Alterações</button>
            </div>
        </form>
    </div>

</body>
</html>