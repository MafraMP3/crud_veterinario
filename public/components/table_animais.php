

<h4>  Clientes cadastrados  </h4>

<table class="table  table-hover m-0 ">
    
 <tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Espécie</th>
    <th>Raça</th>
    <th>Idade</th>
    <th>Responsável</th>
    <th></th>
    <th></th>

 </tr>

 <?php
    
    $sqlAnimais = "SELECT animais.*, clientes.nome AS responsavel
               FROM animais
               INNER JOIN clientes ON animais.cliente_id = clientes.id";
    
    $resultadoAnimais = $conn -> query($sqlAnimais);


    while ($linha = $resultadoAnimais->fetch_assoc()){
        echo"<tr>

            <td>" . $linha["id"] . "</td>
            <td>" . $linha["nome"] . "</td>
            <td>" . $linha["especie"] . "</td>
            <td>" . $linha["raca"] . "</td>
            <td>" . $linha["idade"] . "</td>
            <td>" . $linha["responsavel"] . "</td>
            <td>
                <a href='editarPet.php?id=" . $linha["id"] . "' 
                   class='btn btn-outline-dark'>
                    Editar
                </a>
            </td>

            <td>
                <a href='excluir.php?id=" . $linha["id"] . "&tipo=animal'
                   class='btn btn-outline-danger'>
                    Excluir
                </a>
            </td>

        </tr>";

    }
?>




</table>