<?php
session_start();
include_once('conexao.php'); // Certifique-se de que o arquivo 'conexao.php' esteja corretamente incluído
require('valida_login.php');

if ((!isset($_SESSION['email'])) and (!isset($_SESSION['senha']))) {
  header("location: inicio.php");
}

$email = $_SESSION['email'];
$sqlUserId = "SELECT iduser FROM usuario WHERE email = '$email'";
$resultUserId = mysqli_query($conn, $sqlUserId);
$rowUserId = mysqli_fetch_assoc($resultUserId);
$userId = $rowUserId['iduser'];


// Consulta SQL para obter os dados do usuário logado
$sqlUserData = "SELECT acertos, erros FROM usuario WHERE iduser = $userId";
$resultUserData = mysqli_query($conn, $sqlUserData);
$rowUserData = mysqli_fetch_assoc($resultUserData);

$sqlUsernome = "SELECT usuario FROM usuario WHERE iduser = $userId";
$resultUsernome = mysqli_query($conn, $sqlUsernome);
$rowUsernome = mysqli_fetch_assoc($resultUsernome);
$nome = $rowUsernome['usuario'];

$userData = array(
  'acertos' => $rowUserData['acertos'],
  'erros' => $rowUserData['erros']
);
?>

<!DOCTYPE html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<html>

<head>
  <title>Seu Ranking</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #081b29;
      color: white;
      padding-top: 80px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th,
    td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
      background-color: #081b15;

    }

    th {
      background-color: #081b15;
    }

    .navbar-fixed {
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 1000;
      background-color: brown;
    }

    .navbar-brand {
      color: #007bff;
    }

    .nav-link {
      color: #081b29;
    }

    .dropdown-menu {
      background-color: #F4F4F4;
    }

    .headerb {
      background-color: #081b29;
      border: solid 2px black;
    }
    .logo {
            color: #007bff;
            font-size: 30pt;

        }
  </style>
</head>

<body>
  <header class="header headerb navbar-fixed">
    <nav class="navbar navbar-expand-lg navbar-blue p-1 m-2">
      <div class="container">
      <h1 class="logo"><i class="bi bi-joystick"></i>FlipEnem</h1>


        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="nav col-12 mb-2 justify-content-end mb-md-0">
            <li class="nav-item"><a href="index.php" class="nav-link px-2 link-secondary bi bi-house-fill"> Home</a></li>
            <li class="nav-item"><a href="feed.php" class="nav-link px-2 link-secondary bi bi-chat-dots-fill"> Feedback</a></li>
            <li class="nav-item"><a href="sobreprojeto.php" class="nav-link px-2 link-secondary bi bi-device-ssd-fill"> Sobre o projeto</a></li>
          </ul>
        </div>

        <div class="dropdown text-end">
          <a href="#" class="link-secondary text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
            <i class="bi bi-person-circle"></i> <!-- Ícone do usuário -->
          </a>
          <ul class="dropdown-menu text-small">
            <li><a class="dropdown-item bi bi-person-vcard-fill" href="Perfil.php"> Meu perfil</a></li>
            <li><a class="dropdown-item bi bi-clock-history" href="historico.php"> Histórico</a></li>
            <li><a class="dropdown-item bi bi-gear-fill" href="configurações.php"> Configurações</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item bi bi-box-arrow-left" href="sair.php">Sair</a></li>
          </ul>
        </div>

      </div>
    </nav>
  </header>



  <h2>Ranking de Usuários</h2>
  <table id="ranking-table">
  <tr>
    <th>Posição</th>
    <th>Nome do Usuário</th>
    <th>Acertos</th>
    <th>Erros</th>
  </tr>
  <?php
  // Consulta SQL para buscar dados dos usuários
  $consulta = "SELECT usuario, acertos, erros FROM usuario ORDER BY acertos DESC";
  $resultado = mysqli_query($conn, $consulta);

  // Exibir os usuários na tabela
  $posicao = 1;
  while ($linha = mysqli_fetch_assoc($resultado)) {
    echo "<tr class='ranking-row'>";
    echo "<td>{$posicao}°</td>";
    echo "<td>{$linha['usuario']}</td>";
    echo "<td>{$linha['acertos']}</td>";
    echo "<td>{$linha['erros']}</td>";
    echo "</tr>";

    if ($linha['usuario'] == $nome) {
      $posicaoUsuario = $posicao;
    }

    $posicao++;
  }

  // Fechar o resultado
  mysqli_free_result($resultado);
  ?>
</table>

<div class="text-center">
  <button id="ver-mais-button" class="btn btn-primary mt-3">Ver Mais</button>
</div>

<script>

document.addEventListener("DOMContentLoaded", function () {
  const rankingTable = document.getElementById("ranking-table");
  const verMaisButton = document.getElementById("ver-mais-button");
  const usuariosOcultos = rankingTable.querySelectorAll(".ranking-row");

  let usuariosVisiveis = 10; // Inicialmente, exibir os 10 primeiros usuários

  // Função para mostrar mais 10 usuários
  const mostrarMaisUsuarios = () => {
    for (let i = usuariosVisiveis; i < usuariosVisiveis + 10; i++) {
      if (usuariosOcultos[i]) {
        usuariosOcultos[i].style.display = "table-row";
      }
    }
    usuariosVisiveis += 10;
    if (usuariosVisiveis >= usuariosOcultos.length) {
      verMaisButton.style.display = "none"; // Esconder o botão quando não houver mais usuários
    }
  };

  // Adicionar evento de clique ao botão "Ver Mais"
  verMaisButton.addEventListener("click", mostrarMaisUsuarios);

  // Inicialmente, esconder todos os usuários após o décimo
  for (let i = 10; i < usuariosOcultos.length; i++) {
    usuariosOcultos[i].style.display = "none";
  }
});
</script>


    <table>
      <tr>
        <H3>Meus dados:</H3>
      </tr>
      <tr>
        <th>Nome: <?php echo $nome ?></th>
        <th>Posição: <?php echo $posicaoUsuario ?>°</th>
        <th>Acertos: <?php echo $userData['acertos']; ?></th>
        <th>Erros: <?php echo $userData['erros']; ?></th>
      </tr>
    </table>
  </table>

</body>

</html>