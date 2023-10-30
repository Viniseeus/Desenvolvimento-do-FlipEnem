<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Painel de Administração</title>
    <style>
        body {
            background-color: #081b29;
            color: white;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        .botaovoltar {
            text-align: center;
        }

        .table-container {
            background-color: #0a1c30;
            padding: 20px;
            border-radius: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #000;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #0a1c30;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #243f5f;
        }

        .table-responsive {
            background-color: #0a1c30;
            color: #fff;
            overflow-x: auto;
        }

        .search-bar {
            margin: 20px 0;
        }

        .scrollable-table {
            max-height: 500px;
            overflow-y: auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Painel de Administração - Lista de Usuários</h1>
        <h3 class="botaovoltar"><a href="index.php"><i class="bi bi-arrow-left"></i> Voltar a tela inicial</a></h3>

        <div class="table-container">
            <div class="search-bar">
                <input type="text" id="search" placeholder="Pesquisar...">
            </div>
            <div class="table-responsive scrollable-table">
                <table class="table table-bordered" id="userTable">
                    <tr>
                        <th>ID</th>
                        <th>Usuário</th>
                        <th>Email</th>
                        <th>Data de Nascimento</th>
                        <th>Erros</th>
                        <th>Acertos</th>
                        <th>Curso</th>
                        <th>Escola/Faculdade</th>
                        <th>Admin</th>
                        <th>Ações</th>
                    </tr>
                    <?php
                    session_start();
                    include_once('conexao.php');
                    require('valida_login.php');

                    $sql = "SELECT * FROM usuario WHERE email = '$email'";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) == 1) {
                        $row = mysqli_fetch_assoc($result);

                        if ($row['ADM'] == 0) {
                            echo "Você não tem permissão para acessar esta página.";
                            header("refresh:2;url=index.php");
                        } else {

                            $sql = "SELECT * FROM usuario";

                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['iduser'] . "</td>";
                                    echo "<td>" . $row['usuario'] . "</td>";
                                    echo "<td>" . $row['email'] . "</td>";
                                    echo "<td>" . $row['datanasc'] . "</td>";
                                    echo "<td>" . $row['erros'] . "</td>";
                                    echo "<td>" . $row['acertos'] . "</td>";
                                    echo "<td>" . $row['curso'] . "</td>";
                                    echo "<td>" . $row['escolafaculdade'] . "</td>";
                                    echo "<td>" . ($row['ADM'] == 1 ? 'Sim' : 'Não') . "</td>";
                                    echo "<td>
                      <a href='editaruseradm.php?id=" . $row['iduser'] . "'>Editar</a> |
                      <a href='ocultar.php?id=" . $row['iduser'] . "'>Ocultar</a>
                      </td>";
                                    echo "</tr>";
                                }
                            }
                        }
                    }
                    mysqli_close($conn);
                    ?>
                </table>
            </div>
        </div>
    </div>

    <script>
        const searchInput = document.getElementById("search");
        const userTable = document.querySelectorAll("#userTable tbody tr");

        searchInput.addEventListener("input", () => {
            const searchValue = searchInput.value.toLowerCase();

            userTable.forEach(row => {
                const userData = row.textContent.toLowerCase();

                if (userData.includes(searchValue)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });
    </script>
</body>

</html>
