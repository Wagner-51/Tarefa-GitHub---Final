<!DOCTYPE html>
<html>
<head>
    <title>CRUD de Generos</title>
</head>
<body>
    <h1>CRUD de Generos</h1>
    <br>
    <a href="cadastro.php">Adicionar Genero</a><br><br>
    <table border="1">
        <tr>
            <th>Código</th>
            <th>Genero</th>
        
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
    <!-- <a href="../index.php"> </a> este comando é dentro do livro dentro do index e dentro do genero -->
</body>
<br><a href="../index.php">Voltar ao Menu Principal</a>
</html>
