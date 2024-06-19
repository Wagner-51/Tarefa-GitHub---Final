<!DOCTYPE html>
<html>
<head>
    <title>Busca por Generos</title>
</head>
<body>
    <h1>Busca por Generos</h1>
    <br>
    <a href="cadastro.php">Adicionar Genero</a><br><br>
    <label for="search">Buscar por Gênero:</label>
    <input type="text" id="search" name="search" onkeyup="searchGenres()">
    <br><br>
    <table border="1">
        <tr>
            <th>Código</th>
            <th>Gênero</th>
            <th>Ações</th>
        </tr>
        <?php
        include('conn.php');
        $stmt = $pdo->query('SELECT * FROM tbgenero');
        while ($row = $stmt->fetch()) {
            echo "<tr>";
            echo "<td>{$row['codGenero']}</td>";
            echo "<td>{$row['Genero']}</td>";
           
            echo "<td>
                      <a href='editar.php?id={$row['codGenero']}'>Editar</a> |
                      <a href='excluir.php?id={$row['codGenero']}'>Excluir</a>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>

    <script>
        function searchGenres() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("search");
            filter = input.value.toUpperCase();
            table = document.querySelector("table");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 1; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1]; // Change index to match the column of genre
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</body>
<br><a href="../index.php">Voltar ao Menu Principal</a>
</html>
