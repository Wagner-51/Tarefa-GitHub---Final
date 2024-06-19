<?php
include('conn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $codLivro = $_POST['codLivro'];
    $nomeLivro = $_POST['nomeLivro'];
    $anoLancamento = $_POST['anoLancamento'];

    $stmt = $pdo->prepare('UPDATE tblivro SET nomeLivro = ?, anoLancamento = ? WHERE codLivro = ?');
    $stmt->execute([$nomeLivro, $anoLancamento, $id]);

    header('Location: index.php');
}

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM tblivro WHERE codLivro = ?');
$stmt->execute([$id]);
$Livro = $stmt->fetch();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar livro</title>
</head>
<body>
    <h2>Editar livro</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $Livro['codLivro']; ?>">
        
        <label for="nomeLivro">Nome do livro:</label>
        <input type="text" name="nomeLivro" value="<?php echo $Livro['nomeLivro']; ?>" required><br>

        <label for="anoLancamento">Ano do Lançamento:</label>
        <input type="text" name="anoLancamento" value="<?php echo $Livro['anoLancamento']; ?>" required><br>

       

        <input type="submit" value="Editar">
    </form>
</body>
</html>
