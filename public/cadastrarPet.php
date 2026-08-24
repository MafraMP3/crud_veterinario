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
        <div class="container">

            <h3>Cadastro de Pets</h3>

            <form method="POST" id="formulario">

                <label class="form-label" for="nomeCliente">Nome:</label>
                <input class="form-control" type="text" name="nomeCliente" placeholder="Insira o nome" required>
                
                <br>
                <br>

                <label class="form-label" for="especie">Espécie:</label>
                <input class="form-control" type="text" name="especie" placeholder="Insira a espécie" required>
                                <br>
                <br>
                <label class="form-label" for="raca">Raça:</label>
                <input class="form-control" type="text" name="raca" placeholder="Insira a raça" required>
                
                <br>
                <br>

                <label class="form-label" for="idade">Idade:</label>
                <input class="form-control" type="text" name="idade" placeholder="insira a idade" required>
                
                <br>
                <br>
                
                <label class="form-label" for="idade">Responsavel:</label>
                <input class="form-control" type="text" name="idade" placeholder="insira a idade" required>
                
                <br>
                <br>
                <button type="submit">Enviar</button>

            </form>
        </div>
    </Main>

</body>
</html>