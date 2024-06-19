<!DOCTYPE html>
<html>
<head>
    <title>Busca por Código do Livro</title>
</head>
<body>
    <h1>Busca por Código do Livro</h1>
    <br>
    <a href="cadastro.php">Adicionar Livro</a><br><br>
    <form method="GET" action="">
        <input type="text" name="search" placeholder="Buscar por código do livro">
        <input type="submit" value="Buscar">
    </form>
    <br>
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
        $where = $search ? " WHERE codLivro = '$search'" : '';

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
</body>

<br><a href="../index.php">Voltar ao Menu Principal</a>
</html>
