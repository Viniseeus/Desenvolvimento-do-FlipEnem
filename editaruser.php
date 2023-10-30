<?php
session_start();
include_once('conexao.php');
require('valida_login.php');

// Verifique se o formulário de edição foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Processar as informações enviadas no formulário
    // Atualizar o banco de dados com as informações modificadas
    // Redirecionar o usuário de volta para a página de perfil
}

// Obtenha as informações do usuário da sessão
$email = $_SESSION['email'];
$sqlUserId = "SELECT iduser, usuario, datanasc, curso, escolafaculdade, imagem FROM usuario WHERE email = '$email'";
$resultUserId = mysqli_query($conn, $sqlUserId);
$rowUserId = mysqli_fetch_assoc($resultUserId);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Seus metadados e links para CSS aqui -->
</head>
<body>
    <!-- Seu cabeçalho, menu ou barra de navegação aqui -->

    <div class="container">
        <h1>Editar Perfil</h1>

        <!-- Formulário de edição de perfil -->
        <form action="atualizaruser.php" method="POST" enctype="multipart/form-data">
            <!-- Campo para alterar o nome de usuário -->
            <label for="usuario">Nome de Usuário:</label>
            <input type="text" id="usuario" name="usuario" value="<?php echo $rowUserId['usuario']; ?>">
            <br>
            <!-- Campo para alterar a data de nascimento -->
            <label for="datanasc">Data de Nascimento:</label>
            <input type="date" id="datanasc" name="datanasc" value="<?php echo $rowUserId['datanasc']; ?>">
            <br>    
            <!-- Campo para alterar o curso -->
            <label for="curso">Curso:</label>
            <input type="text" id="curso" name="curso" value="<?php echo $rowUserId['curso']; ?>">
            <br>
            <!-- Campo para alterar a escola/faculdade -->
            <label for="escolafaculdade">Escola/Faculdade:</label>
            <input type="text" id="escolafaculdade" name="escolafaculdade" value="<?php echo $rowUserId['escolafaculdade']; ?>">
            <br>
            <!-- Campo para alterar a imagem de perfil (se aplicável) -->
            <label for="imagem">Imagem de Perfil:</label>
            <input type="file" id="imagem" name="imagem">
            
            <button type="submit">Salvar Alterações</button>
        </form>
    </div>

    <!-- Seu rodapé aqui -->
</body>
</html>
