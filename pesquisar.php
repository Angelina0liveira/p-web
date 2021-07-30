
<?php
    include('conexao.php');

    if(empty($_POST['pesquisar'])){
        header('Location: listausuario.php');
        exit();
    }

    $pesquisar = $_POST['pesquisar'];

    $stmt = $conn->prepare("SELECT `nomeusuario` FROM `usuario` WHERE `nomeusuario` = :look");

    $stmt->bindparam(":look", $pesquisar);
    $stmt->execute();

    if($stmt->rowCount() == 0){
        echo "Usuário não existe. <br>";
    }else{
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        echo "Usuário: <br>";
        foreach ($result as $key => $value) {
            echo $key.": ".$value."<br>";
        }
        echo "<br>";
    }
    
    ?>
        <button><a href="listausuario.php">Voltar</a></button>
    <?php
?>

