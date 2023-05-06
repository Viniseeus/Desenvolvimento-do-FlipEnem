<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="cronometro.js"></script>
    <link rel="stylesheet" type="text/css" href="estilos.css">

    <?php
    // Conecta ao banco de dados
    //   $conn = new mysqli($servername, $username, $password, $dbname);
    include('conexao.php');
    // Verifica se a conexão foi bem-sucedida
    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }
    ?>

    <title>Responda!!</title>
</head>

<body>
    <div class="contagem">
        <h1 id="timer"></h1>
    </diV>

<?php
    // Consulta SQL para obter as informações do banco de dados
    $sql = "SELECT * FROM questao AS q 
			INNER JOIN areaconhe AS a ON a.idArea=q.idarea 
			ORDER BY RAND() LIMIT 1";
		
	$result = $conn->query($sql);

		if ($result ->num_rows > 0) {
			// Loop que percorre as linhas do resultado da consulta
		    while($row = $result->fetch_assoc()) {
			  	// Exibindo as informações na tela
		        echo "<h2 style='text-align:center;'>" . $row["enunciado"] . "</h2>";
		        echo "<img src='uploads/" . $row["img"] . "' style='display:block;margin:auto; width: 70%;'>";
		        echo "<div style='text-align:right	;'>" . $row["anoquest"] . "</div>";
				echo "<div style='text-align:left;'>" . $row["idarea"] . " - " . $row['descArea'] . "</div>";
		        echo "<br>";
		        echo "<form method='POST'>";
		        echo "<div style='text-align : center;'>";
				echo "<div class='questoes'>";
		        echo "<input type='radio' name='resposta' value='1'> " . $row["quest1"] . "<br>";
				echo "<input type='radio' name='resposta' value='2'> " . $row["quest2"] . "<br>";
		        echo "<input type='radio' name='resposta' value='3'> " . $row["quest3"] . "<br>";
		        echo "<input type='radio' name='resposta' value='4'> " . $row["quest4"] . "<br>";
		        echo "<input type='radio' name='resposta' value='5'> " . $row["quest5"] . "<br>";
				echo "</div>";
		        echo "</div>";
		        echo "<br>";
		        echo "<div style='text-align:center;'>" . $row["fonte"] . "</div>";
		        echo "<input type='submit' style='text-aling:left; color: green;' value='Responda'>";
		        echo "</form>";

		        // Verificando se a resposta do usuário está correta
		        if ($_SERVER["REQUEST_METHOD"] == "POST") {
		        	if ($_POST["resposta"] == $row["resultado"]) {
		        		echo "<p style='color:green;'>Você acertou!</p>";
		        	} else {
		        		echo "<p style='color:red;'>Você errou!</p>";
		        	}
		        }
		    }
		} else {
		    echo "Não foram encontradas perguntas no banco de dados.";
		}

		// Fechando a conexão com o banco de dados
		$conn->close();
	?>
</body>
</html>