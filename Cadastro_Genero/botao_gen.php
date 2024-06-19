<!DOCTYPE html>
<html>
<head>
    <title>Busca por Generos</title>
</head>
<body>
    <h1>Busca por Generos</h1>
    <br>
    
    <form method="GET" action="">
        <input type="text" name="search" placeholder="Buscar por código">
        <button type="submit" name="submit" value="search">Consultar</button>
    </form>
    <br>
    <table border="1">
        <tr>
            <th>Código</th>
            <th>Gênero</th>
            <th>Ações</th>
        </tr>
        <?php
        include('conn.php');
        
        // Processar a busca
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $where = $search ? " WHERE codGenero = '$search'" : '';

        // Consulta SQL com busca
        $stmt = $pdo->query("SELECT * FROM tbgenero$where");
        
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
    <!-- <a href="../index.php"> </a> este comando é dentro do livro dentro do index e dentro do genero -->
</body>
<br><a href="../index.php">Voltar ao Menu Principal</a>
</html>
