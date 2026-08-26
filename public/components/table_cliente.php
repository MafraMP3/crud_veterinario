

<h4>  Clientes cadastrados  </h4>

<table class="table  table-hover m-0 ">
    
 <tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Email</th>
    <th>Telefone</th>
    <th>Endereço</th>
    <th></th>
    <th></th>

 </tr>

 <?php
    
    $sqlClientes = "SELECT * FROM clientes";

    
    $resultadoClientes = $conn -> query($sqlClientes);


    while ($linha = $resultadoClientes->fetch_assoc()){
        echo"<tr>

            <td>" . $linha["id"] . "</td>
            <td>" . $linha["nome"] . "</td>
            <td>" . $linha["telefone"] . "</td>
            <td>" . $linha["email"] . "</td>
            <td>" . $linha["endereco"] . "</td>
            <td>
                <a href='editar_prato.php?id=" . $linha["id"] . "' 
                   class='btn btn-outline-dark'>
                    Editar
                </a>
            </td>

            <td>
 <a href='excluir.php?id=" . $linha["id"] . "&tipo=cliente'
                   class='btn btn-outline-danger'>
                    Excluir
                </a>
            </td>

        </tr>";

    }
?>




</table>