<?php

include "../infra\db\connect.php";
session_start();



if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = $_POST["nomeCliente"] ?? "";
    $email = $_POST["email"] ?? "";
    $telefone = $_POST ["telefone"] ?? "";
    $endereco = $_POST ["endereco"] ?? "";

if(!empty ($nome) && !empty($email) && !empty($telefone) && !empty($endereco)){

$sql = "INSERT INTO clientes (nome,email,telefone,endereco) VALUES (?,?,?,?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt,"ssss", $nome, $email, $telefone, $endereco);
if(mysqli_stmt_execute($stmt)){
    header("Location: home.php");
    exit();
}
    mysqli_stmt_close($stmt);

}

}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Veterinario</title>
</head>

<body>
    <Main>
        <?php
        include 'components/navbar.php';
        ?>
        <div class="container">

            <h3>Cadastro de Clientes</h3>

            <form method="POST" id="formulario">

                <label class="form-label" for="nomeCliente">Nome:</label>
                <input class="form-control" type="text" name="nomeCliente" placeholder="Insira o nome" required>
                
                <br>
                <br>

                <label class="form-label" for="email">Email:</label>
                <input class="form-control" type="email" name="email" placeholder="Insira o seu email" required>
                                <br>
                <br>
                <label class="form-label" for="telefone">Telefone:</label>
                <input class="form-control" type="text" name="telefone" placeholder="XX XXXXX-XXXX" required>
                
                <br>
                <br>

                <label class="form-label" for="endereco">Endereço:</label>
                <input class="form-control" type="text" name="endereco" placeholder="Insira seu Endereço" required>
                
                <br>
                <br>
                <button type="submit">Enviar</button>

            </form>
        </div>
        <div>
        <?php
        include("components/table_cliente.php")

        ?>
        </div>
    </Main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>