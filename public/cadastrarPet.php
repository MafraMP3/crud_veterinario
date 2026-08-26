<?php

include "../infra\db\connect.php";

$querryClientes = mysqli_query($conn, "SELECT * FROM clientes");
if($_SERVER["REQUEST_METHOD"] == "POST"){


    $nome = $_POST["nomePet"] ?? "";
    $especie = $_POST["especie"] ?? "";
    $raca = $_POST["raca"]?? "";
    $idade = $_POST ["idade"] ?? "";
    $cliente_id = $_POST["cliente_id"] ??"";

    if(!empty ($nome) && !empty ($especie) && !empty ($raca) && !empty ($idade) && !empty ($cliente_id)){

    $sql = "INSERT INTO animais (nome,especie,raca,idade,cliente_id) VALUES (?,?,?,?,?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt ,"sssii", $nome, $especie, $raca, $idade, $cliente_id);
    if(mysqli_stmt_execute($stmt)){
        header("Location: cadastrarPet.php");
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

            <h3>Cadastro de Pets</h3>

            <form method="POST" id="formulario">

                <label class="form-label" for="nomeCliente">Nome:</label>
                <input class="form-control" type="text" name="nomePet" placeholder="Insira o nome" required>

                <br>
                <br>

                <label class="form-label" for="especie">Espécie:</label>
                <input class="form-control" type="text" name="especie" placeholder="Insira a espécie pet" required>

                <br>
                <br>

                <label class="form-label" for="email">Raça:</label>
                <input class="form-control" type="text" name="raca" placeholder="Insira insira a raça, ou informe SRD" required>

                <br>
                <br>

                <label class="form-label" for="idade">Idade:</label>
                <input class="form-control" type="number" name="idade" min="0" placeholder="Insira a idade do pet" required>
                
                <br>
                <br>

             
                <label class="form-label" for="cliente_id">Selecione o responsável pelo pet:</label>
                    <select class="form-select" name="cliente_id">
                            <option value="" selected disabled>
                                Selecione um usuário
                            </option>

                        <?php while ($clientes = mysqli_fetch_assoc($querryClientes)) { ?>
                                <option value="<?php echo $clientes["id"]; ?>">
                                    <?php echo $clientes["nome"] ?>
                                </option>
                        <?php } ?>

                    </select>
                
                <br>
                <br>
                <button type="submit">Enviar</button>

            </form>
        </div>
                <div>
        <?php
        include("components/table_animais.php")

        ?>
        </div>
    </Main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>