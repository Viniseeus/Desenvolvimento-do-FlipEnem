<?php

    if(!empty($_GET['id']))
    {

        include_once('conexao.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM usuarios WHERE id = $id";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows >0){
            while ($user_data = mysqli_fetch_assoc($result))
            {
                $user = $user_data['user'];
                $email = $user_data['email'];
                $senha = $user_data['senha'];
            }
            
        }
        else {
           echo "<script>
                alert('Usuário não encontrado');
                window.location.href='home.php'; 
            </script> ";
        }

        
     }
?>