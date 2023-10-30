<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-color: #081b29;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .message-container {
            text-align: center;
            background-color: #007bff;
            color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body>
    <div class="message-container">
        <?php
        session_start();
        include_once('conexao.php');
        require('valida_login.php');

        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];

            $sql = "SELECT * FROM usuario WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            
            $sqlUserId = "SELECT iduser FROM usuario WHERE email = '$email'";
            $resultUserId = mysqli_query($conn, $sqlUserId);
            $rowUserId = mysqli_fetch_assoc($resultUserId);
            $userId = $rowUserId['iduser'];

            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $usuario = $_POST['usuario'];
                    $datanasc = $_POST['datanasc'];
                    $curso = $_POST['curso'];
                    $escolafaculdade = $_POST['escolafaculdade'];
                    
                    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
                        $imagem = $_FILES['imagem']['name'];
                
                        $target_dir = "userimage/";
                        $target_file = $target_dir . basename($imagem);
                
                        move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file);
                    } else {
                        $imagem = $row['imagem'];
                    }
                
                    $sql = "UPDATE usuario SET usuario = '$usuario', datanasc = '$datanasc', curso = '$curso', escolafaculdade = '$escolafaculdade', imagem = '$imagem' WHERE iduser = $userId";
                
                    if (mysqli_query($conn, $sql)) {
                        echo "Usuário atualizado com sucesso.";
                        header('Refresh: 2 url=Perfil.php');
                exit;

                    } else {
                        echo "Erro ao atualizar o usuário: " . mysqli_error($conn);
                    }
                }
            }
        }
        ?>
    </div>
</body>
</html>
