<?php

session_start();

include("../infra/db/connect.php");

$id = isset($_GET["id"]) ? (int)$_GET["id"] : 0;

$sql = "SELECT * FROM animais WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$resultado = mysqli_stmt_get_result($stmt);
$animal = $resultado->fetch_assoc();

mysqli_stmt_close($stmt);

if (!$animal) {
    exit("Pet não encontrado.");
}

$querryClientes = mysqli_query($conn, "SELECT * FROM clientes");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $novoNome = $_POST["nomePet"] ?? "";
    $novaEspecie = $_POST["especie"] ?? "";
    $novaRaca = $_POST["raca"] ?? "";
    $novaIdade = $_POST["idade"] ?? "";
    $novoClienteId = $_POST["cliente_id"] ?? "";

    if (
        !empty($novoNome) &&
        !empty($novaEspecie) &&
        !empty($novaRaca) &&
        !empty($novaIdade) &&
        !empty($novoClienteId)
    ) {

        $sql = "UPDATE animais 
                SET nome = ?, especie = ?, raca = ?, idade = ?, cliente_id = ?
                WHERE id = ?";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param(
            $stmt,
            "sssiii",
            $novoNome,
            $novaEspecie,
            $novaRaca,
            $novaIdade,
            $novoClienteId,
            $id
        );

        if (mysqli_stmt_execute($stmt)) {

            header("Location: cadastrarPet.php");
            exit();

        } else {

            echo "<script>alert('Erro ao atualizar o pet!')</script>";
        }

        mysqli_stmt_close($stmt);

        $animal["nome"] = $novoNome;
        $animal["especie"] = $novaEspecie;
        $animal["raca"] = $novaRaca;
        $animal["idade"] = $novaIdade;
        $animal["cliente_id"] = $novoClienteId;
    }
}

?>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <title>Editar Pet</title>

</head>

<body>

    <?php
    include 'components/navbar.php';
    ?>

    <div class="container card">

        <h3>Editar Pet</h3>

        <form method="POST" id="formulario">

            <label class="form-label" for="nomePet">Nome:</label>

            <input class="form-control" type="text" name="nomePet" id="nomePet"
            value="<?php echo $animal["nome"]; ?>"required>

            <br>
            <br>

            <label class="form-label" for="especie">
                Espécie:
            </label>

            <input class="form-control" type="text" name="especie" id="especie"
                value="<?php echo $animal["especie"]; ?>" required >
            <br>
            <br>

            <label class="form-label" for="raca"> Raça:</label>

            <input class="form-control" type="text" name="raca" id="raca"
                value="<?php echo $animal["raca"]; ?>" required>

            <br>
            <br>

            <label class="form-label" for="idade">Idade:</label>

            <input class="form-control" type="number" name="idade" id="idade" min="0"
                value="<?php echo $animal["idade"]; ?>"required>

            <br>
            <br>

            <label class="form-label" for="cliente_id"> Selecione o responsável pelo pet: </label>

            <select class="form-select" name="cliente_id" id="cliente_id" required >
                <option value="" disabled>  Selecione um responsável </option>

                <?php while ($clientes = mysqli_fetch_assoc($querryClientes)) { ?>

                    <option
                        value="<?php echo $clientes["id"]; ?>"
                        <?php
                        if ($clientes["id"] == $animal["cliente_id"]) {
                            echo "selected";
                        }
                        ?>
                    >
                        <?php echo $clientes["nome"]; ?>
                    </option>

                <?php } ?>

            </select>

            <br>
            <br>

            <button type="submit" class="btn btn-primary">
                Salvar alterações
            </button>


        </form>

    </div>

</body>

</html>