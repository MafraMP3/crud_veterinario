<?php

include "../infra\db\connect.php";

$id = $_GET["id"]?? "";
$tipo =  $_GET["tipo"]?? "";

if (!empty($id) && !empty($tipo)) {

    if ($tipo == "animal") {

        $sql = "DELETE FROM animais WHERE id = ?";
        $pagina = "cadastrarPet.php";
    } elseif ($tipo == "cliente") {

        $sql = "DELETE FROM clientes WHERE id = ?";
        $pagina = "home.php";
    } else {

        exit("Tipo inválido.");

    }

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "i", $id);

    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

     header("Location: " . $pagina);
    exit();
}

header("Location: home.php");
exit();
?>