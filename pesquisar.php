
<?php
    include('conexao.php');

    if(empty($_POST['pesquisar'])){
        header('Location: listausuario.php');
        exit();
    }

    $pesquisar = $_POST['pesquisar'];

    $statement = $con->prepare("SELECT `nomeusuario` FROM `usuario` WHERE `nomeusuario` = :look");

    $statement->bindparam(":look", $pesquisar);
    $statement->execute();

    if($statement->rowCount() == 0){
        echo "Usuário não existe. <br>";
    }else{
        $result = $statement->fetch(PDO::FETCH_ASSOC);
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

