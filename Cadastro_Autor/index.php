<!DOCTYPE html>
<html>
<head>
    <title>CRUD de Autor</title>
</head>
<body>
    <h1>CRUD de Autor</h1>
    <br>
    <a href="cadastro.php">Adicionar Autor</a><br><br>
    <table border="1">
        <tr>
            <th>Código</th>
            <th>Nome</th>
       
            <th>Ações</th>
        </tr>
        <?php
        include('conn.php');
        $stmt = $pdo->query('SELECT * FROM tbautor');
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
    <!-- <a href="../index.php"> </a> este comando é dentro do livro dentro do index e dentro do genero -->
</body>
<br><a href="../index.php">Voltar ao Menu Principal</a>
</html>
