<?php
include('conn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $codAutor = $_POST['codAutor'];
    $nomeAutor = $_POST['nomeAutor'];
    $a
    $stmt = $pdo->prepare('UPDATE tbAutor SET nomeAutor = ?,  WHERE codAutor = ?');
    $stmt->execute([$nomeAutor,  $id]);

    header('Location: index.php');
}

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM tblivro WHERE codAutor = ?');
$stmt->execute([$id]);
$Autor = $stmt->fetch();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar livro</title>
</head>
<body>
    <h2>Editar livro</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $Autor['codAutor']; ?>">
        
        <label for="nomeAutor">Nome do livro:</label>
        <input type="text" name="nomeAutor" value="<?php echo $Autor['nomeAutor']; ?>" required><br>



       

        <input type="submit" value="Editar">
    </form>
</body>
</html>
