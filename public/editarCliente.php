<?php

session_start();

include("../infra/db/connect.php");

$id = isset($_GET["id"]) ? (int)$_GET["id"] : 0;

$sql = "SELECT * FROM clientes WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$resultado = mysqli_stmt_get_result($stmt);
$cliente = $resultado->fetch_assoc();

mysqli_stmt_close($stmt);

if (!$cliente) {
    exit("Cliente não encontrado.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $novoNome = $_POST["nome"] ?? "";
    $novoEmail = $_POST["email"] ?? "";
    $novoTelefone = $_POST["telefone"] ?? "";
    $novoEndereco = $_POST["endereco"] ?? "";

    if (!empty($novoNome) && !empty($novoEmail) && !empty($novoTelefone) && !empty($novoEndereco)) {

        $sql = "UPDATE clientes SET nome = ?, email = ?, telefone = ?, endereco = ? WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssssi", $novoNome, $novoEmail, $novoTelefone, $novoEndereco, $id);

        if (mysqli_stmt_execute($stmt)) {
            header("Location: home.php");
            exit();
        } else {
            echo "<script>alert('Erro ao atualizar o cliente!')</script>";
        }

        mysqli_stmt_close($stmt);

        $cliente["nome"] = $novoNome;
        $cliente["email"] = $novoEmail;
        $cliente["telefone"] = $novoTelefone;
        $cliente["endereco"] = $novoEndereco;
    }
}

?>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Editar Cliente</title>
</head>

<body>

    <?php include 'components/navbar.php'; ?>

    <div class="container">

        <h3>Editar Cliente</h3>

        <form method="POST" id="formulario">

            <label class="form-label" for="nome">Nome:</label>
            <input class="form-control" type="text" name="nome" id="nome" value="<?php echo $cliente["nome"]; ?>" required>

            <br>
            <br>

            <label class="form-label" for="email">Email:</label>
            <input class="form-control" type="email" name="email" id="email" value="<?php echo $cliente["email"]; ?>" required>

            <br>
            <br>

            <label class="form-label" for="telefone">Telefone:</label>
            <input class="form-control" type="text" name="telefone" id="telefone" value="<?php echo $cliente["telefone"]; ?>" required>

            <br>
            <br>

            <label class="form-label" for="endereco">Endereço:</label>
            <input class="form-control" type="text" name="endereco" id="endereco" value="<?php echo $cliente["endereco"]; ?>" required>

            <br>
            <br>

            <button type="submit" class="btn btn-primary">Salvar alterações</button>

        </form>

    </div>

</body>

</html>