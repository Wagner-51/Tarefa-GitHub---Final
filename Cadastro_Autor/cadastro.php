<?php
include('conn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $codAutor = $_POST['codAutor'];
     $nomeAutor = $_POST['nomeAutor'];
     


     $stmt = $pdo->prepare('INSERT INTO tbautor(codAutor, nomeAutor) VALUES (?, ?)');
     $stmt->execute([$codAutor, $nomeAutor]);

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Autor</title>
</head> 
<body>
    <h2>Adicionar os dados do Autor</h2>
    <form method="POST">
      
      <label for="codAutor">Código do Autor:</label>
        <input type="number" name="codAutor" required><br>

        <label for="nomeAutor">Nome do Autor:</label>
        <input type="text" name="nomeAutor" required><br>

  

       

        <input type="submit" value="Adicionar">



    </form>
</body>
<br><a href="../index.php">Voltar ao Menu Principal</a>
</html>
