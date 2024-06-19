<?php
include('conn.php');

$id = $_GET['id'];
$stmt = $pdo->prepare('DELETE FROM tbgenero WHERE codGenero = ?');
$stmt->execute([$id]);

header('Location: index.php');
?>
