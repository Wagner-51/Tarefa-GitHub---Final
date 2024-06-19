<!DOCTYPE html>
<html>
<head>
    <title>Busca por Código do Autor</title>
</head>
<body>
    <h1>Busca por Código do Autor</h1>
    <br>
   
    <form method="GET" action="">
        <input type="text" name="search" placeholder="Buscar por código do autor">
        <input type="submit" value="Buscar">
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
        $where = $search ? " WHERE codAutor = '$search'" : '';

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
<br><br><a href="../index.php">Voltar ao Menu Principal</a>
</html>
