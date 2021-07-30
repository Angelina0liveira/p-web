listausuario.php
<?php
    include('conexao.php');

    ?>
        <form method="POST" name="form" action="pesquisar.php">
            <br>
            <label for="pesquisar">Pesquisar por usuário: </label>
            <input type="text" name="pesquisar">
            <br>
            <button type="submit" value="Send">Buscar</button>
            <br>
        </form>
    <?php

    echo 'Usuários cadastrados';
    echo '<br/>'; echo '<br/>';

    $sql = $conn->prepare("SELECT `NOME` FROM `USUARIO`");
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    for ($i=0; $i < count($result); $i++) { 
        echo "Usuário: ".($i+1)."<br>";
        foreach ($result[$i] as $key => $value) {
            echo $key.": ".$value."<br>";
        }
        echo "<br>";
    }
?>