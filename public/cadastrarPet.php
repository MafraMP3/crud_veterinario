<?php

include "../infra\db\connect.php";



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
                <input class="form-control" type="number" name="idade" placeholder="Insira a idade do pet" required>
                
                <br>
                <br>

             
                <label class="form-label" for="id_cliente">Selecione o responsável pelo pet:</label>
                    <select class="form-select" name="id_cliente">
                            <option value="" selected disabled>
                                Selecione um usuário
                            </option>

                        <?php while ($cliente = mysqli_fetch_assoc($clientes)) { ?>
                                <option value="<?php echo $cliente["idCliente"]; ?>">
                                    <?php echo $cliente["nome"] ?>
                                </option>
                        <?php } ?>
                        
                    </select>
                
                <br>
                <br>
                <button type="submit">Enviar</button>

            </form>
        </div>
    </Main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>