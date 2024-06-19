<?php
include('conn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $codGenero = $_POST['codGenero'];
     $Genero = $_POST['Genero'];
    


     $stmt = $pdo->prepare('INSERT INTO tbgenero(codGenero, Genero) VALUES (?, ?)');
     $stmt->execute([$codGenero, $Genero]);

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Genero</title>
</head> 
<body>
    <h2>Adicionar Genero</h2>
    <form method="POST">
      
      <label for="codGenero">Código do Genero:</label>
        <input type="number" name="codGenero" required><br>

        <label for="Genero">Genero:</label>
        <input type="text" name="Genero" required><br>


       

        <input type="submit" value="Adicionar">



    </form>
</body>
</html>
