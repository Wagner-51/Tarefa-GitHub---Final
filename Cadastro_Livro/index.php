<!DOCTYPE html>
<html>
<head>
    <title>CRUD de Livros</title>
</head>
<body>
    <h1>CRUD de Livros</h1>
    <br>
    <a href="cadastro.php">Adicionar Livro</a><br><br>
    <table border="1">
        <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Lancamento</th>
            <th>Ações</th>
        </tr>
        <?php
        include('conn.php');
        $stmt = $pdo->query('SELECT * FROM tblivro');
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
    <!-- <a href="../index.php"> </a> este comando é dentro do livro dentro do index e dentro do genero -->
</body>
<br><a href="../index.php">Voltar ao Menu Principal</a>
</html>
