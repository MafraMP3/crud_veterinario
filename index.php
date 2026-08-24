
<?php
include("infra/db/connect.php");
session_start();



if($_SERVER["REQUEST_METHOD"] == "POST"){

    $nome = $_POST["nomeUsuario"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM usuarios 
    WHERE nome = '$nome' 
    AND senha = '$senha'";

    $resultado = $conn -> query($sql);


    if($resultado -> num_rows > 0){
        $_SESSION["nomeUsuario"] = $nome;
        header("Location: public/home.php");
        exit();
    }else{
        $erro = "Usuário ou senha inválidos.";
    }

}



?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Veterinario</title>
</head>

<body>
    <Main>
        <div class="card container">

            <h3>Login</h3>

            <?php if (isset($erro)) { ?>
                <div class="alert alert-danger">
                    <?= $erro ?>
                </div>
            <?php } ?>

            <form method="POST" id="formulario" autocomplete="off" >

                <label class="form-label" for="nomeUsuario">Nome:</label>
                <input class="form-control" type="text" name="nomeUsuario" placeholder="Insira o nome" required  autocomplete="off">
          

                <label class="form-label" for="senha">Senha:</label>
                <input class="form-control" type="password" name="senha" placeholder="Insira sua senha" required  autocomplete="off">

          <br>
            
                <button type="submit">Enviar</button>

            </form>
        </div>
    </Main>

</body>
</html>