
<?php
  try {
    $nomeusuario = "root";
    $senha = "";  
  
    $con = new PDO('mysql:host=localhost;dbname=ava2', $nomeusuario, $senha);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
  } catch(PDOException $e) {
    echo 'Erro: ' . $e->getMessage();
  }
?>