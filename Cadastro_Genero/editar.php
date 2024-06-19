<?php
include('conn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $codGenero = $_POST['codLivro'];
    $Genero = $_POST['nomeLivro'];
   

    $stmt = $pdo->prepare('UPDATE tngenero SET genero = ?,  WHERE codGenero = ?');
    $stmt->execute([$genero, $id]);

    header('Location: index.php');
}

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM tbgenero WHERE codGenero = ?');
$stmt->execute([$id]);
$Genero = $stmt->fetch();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar livro</title>
</head>
<body>
    <h2>Editar livro</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $Genero['codLivro']; ?>">
        
        <label for="nomeLivro">Genero:</label>
        <input type="text" name="nomeLivro" value="<?php echo $Genero['Genero']; ?>" required><br>


       

        <input type="submit" value="Editar">
    </form>
</body>
</html>
