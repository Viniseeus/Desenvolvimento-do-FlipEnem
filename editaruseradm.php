<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Editar Usuário</title>
</head>

<body>
    <h1>Editar Usuário</h1>
    <h3 class="botaovoltar"><a href="moduseradm.php"><i class="bi bi-arrow-left"></i> Voltar</a></h3>

    <?php
    session_start();
    include_once('conexao.php');
    require('valida_login.php');

    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];

        $sql = "SELECT * FROM usuario WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);

            if ($row['ADM'] == 0) {
                echo "Você não tem permissão para acessar esta página.";
                header("refresh:2;url=index.php");
            } else {
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM usuario WHERE iduser = $id";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) == 1) {
                        $row = mysqli_fetch_assoc($result);
    ?>
                        <form method="POST" action="atualizaruseradm.php">
                            <input type="hidden" name="id" value="<?php echo $row['iduser']; ?>">
                            <label for="usuario">Usuário:</label>
                            <input type="text" name="usuario" value="<?php echo $row['usuario']; ?>"><br>

                            <label for="email">Email:</label>
                            <input type="text" name="email" value="<?php echo $row['email']; ?>"><br>

                            <label for="datanasc">Data de Nascimento:</label>
                            <input type="date" name="datanasc" value="<?php echo $row['datanasc']; ?>" min="1900-01-01"><br>

                            <label for="curso">Curso:</label>
                            <input type="text" name="curso" value="<?php echo $row['curso']; ?>"><br>

                            <label for="escolafaculdade">Escola ou Faculdade:</label>
                            <input type="text" name="escolafaculdade" value="<?php echo $row['escolafaculdade']; ?>"><br>

                            <label for="ADM">ADM?:</label>
                            <select name="ADM">
                                <option value="1" <?php if ($row['ADM'] == 1) echo 'selected'; ?>>Sim</option>
                                <option value="0" <?php if ($row['ADM'] == 0) echo 'selected'; ?>>Não</option>
                            </select><br>


                            <input type="submit" value="Atualizar">
                        </form>
    <?php
                    } else {
                        echo "Usuário não encontrado.";
                    }
                } else {
                    echo "ID do usuário não especificado.";
                }
            }
        }
    } else {
        echo "Sessão de email não encontrada. Faça login primeiro.";
        // Você pode adicionar um redirecionamento para a página de login aqui
    }

    mysqli_close($conn);
    ?>
</body>

</html>