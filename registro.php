
<?php
    include('conexao.php');
    include('usuario.php');
    
    if(empty($_POST['nome']) || empty($_POST['nomeusuario']) || empty($_POST['email']) || empty($_POST['senha'])){
        header('Location: registro.html');
        exit();
    }

    $ps = md5($_POST["senha"]);
	$user = new Usuario($_POST['nome'], $_POST["nomeusuario"], $_POST["email"], $ps);
    
    $nome = $user->getNome();
    $nomeusuario = $user->getUsuario();
    $email = $user->getEmail();
    $senha = $user->getSenha();
    $i = 0;

    $stmt = $conn ->prepare("INSERT INTO `usuario`(`nome`, `nomeusuario`, `email`, `senha`) 
    VALUES (:nome, :nomeusuario, :email, :senha)");

    $fetch = "SELECT `nomeusuario`,`email` FROM `usuario`";
    $result = $conn->query($fetch);
    while($row = $result->fetch()) {
        if($row['nomeusuario'] == $nomeusuario || $row['email'] == $email){
            $i++;
        }
    }

    if($i>0){
        echo "Usuário ou E-mail já existem";
    }else{
        $stmt->execute(array(':nome' => $nome, ':nomeusuario' => $nomeusuario, ':email' => $email, ':senha'=> $senha));

        echo "Cadastro realizado com sucesso.";
        header("Location: login.html");
    }
?>
