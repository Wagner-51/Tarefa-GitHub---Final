<?php
include('conn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $codLivro = $_POST['codLivro'];
     $nomeLivro = $_POST['nomeLivro'];
     $anoLancamento = $_POST['anoLancamento'];


     $stmt = $pdo->prepare('INSERT INTO tblivro(codLivro, nomeLivro, anoLancamento) VALUES (?, ?, ?)');
     $stmt->execute([$codLivro, $nomeLivro, $anoLancamento]);

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Livro</title>
</head> 
<body>
    <h2>Adicionar os dados do livro</h2>
    <form method="POST">
      
      <label for="codLivro">Código do Livro:</label>
        <input type="number" name="codLivro" required><br>

        <label for="nomeLivro">Nome do livro:</label>
        <input type="text" name="nomeLivro" required><br>

        <label for="anoLancamento">Lancamento:</label>
        <input type="number" name="anoLancamento" required><br>

       

        <input type="submit" value="Adicionar">



    </form>
</body>
</html>
