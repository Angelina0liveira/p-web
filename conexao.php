conexao.php
<?php
  try {
    $nomeusuario = "root";
    $senha = "";  
  
    $conn = new PDO('mysql:host=localhost;dbname=ava2', $nomeusuario, $senha);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
  } catch(PDOException $e) {
    echo 'Erro: ' . $e->getMessage();
  }
?>