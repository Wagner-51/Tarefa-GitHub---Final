<!DOCTYPE html>
<html>
<head>
    <title>Busca por Autor</title>
</head>
<body>
    <h1>Busca por Autor</h1>
    <br>
    <a href="cadastro.php">Adicionar Autor</a><br><br>
    <form method="GET" action="">
        <label for="search">Buscar por nome de autor:</label>
        <input type="text" id="search" name="search">
        
    </form>
    <br>
    <table border="1">
        <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
        <?php
        include('conn.php');

        // Processar a busca
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $where = $search ? " WHERE nomeAutor LIKE '%$search%'" : '';

        // Consulta SQL com busca
        $stmt = $pdo->query("SELECT * FROM tbautor$where");

        while ($row = $stmt->fetch()) {
            echo "<tr>";
            echo "<td>{$row['codAutor']}</td>";
            echo "<td>{$row['nomeAutor']}</td>";
            echo "<td>
                      <a href='editar.php?id={$row['codAutor']}'>Editar</a> |
                      <a href='excluir.php?id={$row['codAutor']}'>Excluir</a>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
<br><a href="../index.php">Voltar ao Menu Principal</a>
</html>
