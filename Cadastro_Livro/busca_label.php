<!DOCTYPE html>
<html>
<head>
    <title>CRUD de Livros</title>
</head>
<body>
    <h1>CRUD de Livros</h1>
    <br>
  
    <label for="search">Buscar por Nome do Livro:</label>
    <input type="text" id="search" name="search" onkeyup="searchBooks()">
    <br><br>
    <table border="1">
        <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Lançamento</th>
            <th>Ações</th>
        </tr>
        <?php
        include('conn.php');

        // Processar a busca
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $where = $search ? " WHERE nomeLivro LIKE '%$search%'" : '';

        // Consulta SQL com busca
        $stmt = $pdo->query("SELECT * FROM tblivro$where");
        
        while ($row = $stmt->fetch()) {
            echo "<tr>";
            echo "<td>{$row['codLivro']}</td>";
            echo "<td>{$row['nomeLivro']}</td>";
            echo "<td>{$row['anoLancamento']}</td>";
            echo "<td>
                      <a href='editar.php?id={$row['codLivro']}'>Editar</a> |
                      <a href='excluir.php?id={$row['codLivro']}'>Excluir</a>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>

    <script>
        function searchBooks() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("search");
            filter = input.value.toUpperCase();
            table = document.querySelector("table");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 1; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1]; // Change index to match the column of book name
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
