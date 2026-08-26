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
 <div class="container py-5">
    <div class="row g-4">

        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body p-4">
                    <h3 class="mb-4">Cadastro de Clientes</h3>

                    <form method="POST" id="formulario">
                        <div class="mb-3">
                            <label class="form-label" for="nomeCliente">Nome</label>
                            <input class="form-control" type="text" name="nomeCliente" id="nomeCliente" placeholder="Insira o nome" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="email">Email</label>
                            <input class="form-control" type="email" name="email" id="email" placeholder="Insira o email" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="telefone">Telefone</label>
                            <input class="form-control" type="text" name="telefone" id="telefone" placeholder="XX XXXXX-XXXX" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="endereco">Endereço</label>
                            <input class="form-control" type="text" name="endereco" id="endereco" placeholder="Insira o endereço" required>
                        </div>

                        <button type="submit" class="btn btn-primary px-4">Cadastrar cliente</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
    <div class="card shadow-sm border-0 h-100">
        <div class="card-body p-3">


        <div style="max-height: 400px; overflow-y: auto; overflow-x: auto;">
            <?php include("components/table_cliente.php"); ?>
        </div>

        </div>
    </div>
</div>

    </div>
</div>
    </Main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>