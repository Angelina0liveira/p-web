
<?php
    include('conexao.php');
    include('usuario.php');
    
    if(empty($_POST['nomeusuario']) || empty($_POST['senha'])){
        header('Location: login.html');
        exit();
    }

    $nomeusuario = $_POST['nomeusuario'];
    $senha = $_POST['senha'];

    $statement = $con->prepare("SELECT `nomeusuario`, `senha` FROM `usuario` WHERE `nomeusuario` = :nomeusuario and `senha` = :senha");

    $statement->bindparam(":nomeusuario", $nomeusuario);
    $statement->bindValue(":senha", md5($senha));
    $statement->execute();

    if($statement->rowCount() == 0){
        echo "Usuário ou senha incorretas.";
        ?>
            <button><a href="login.html">Voltar</a></button>
        <?php
    }else{
        header("Location: listausuario.php");
    }
?>
