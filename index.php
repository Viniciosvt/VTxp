<?php
include 'classes/usuarios.class.php';
$usuario = new Usuarios();
?>
<?php include 'inc/header.inc.php'; ?>
<main>

<hr>
<button><a href="adicionarUsuario.php">ADICIONAR</a></button>
<br><br>
<table border="3" width="100%">
<tr>
    <th>ID</th>
    <th>NOME</th>
    <th>TELEFONE</th>
    <th>ENDEREÇO</th>
    <th>DATA DE NASCIMENTO</th>
    <th>CPF_CNPJ</th>
    <th>EMAIL</th>
    <th>FOTO</th>
</tr>
<?php
    $lista = $usuario->listar();
    if ($lista) 
        foreach($lista as $item):
?>
<tbody>
    <tr>
        <td><?php echo $item['id'] ?></td> 
        <td><?php echo $item['nome'] ?></td>
        <td><?php echo $item['telefone'] ?></td>
        <td><?php echo $item['endereco'] ?></td>
        <td><?php echo $item['dt_nasc'] ?></td>
        <td><?php echo $item['cpf_cnpj'] ?></td>
        <td><?php echo $item['email'] ?></td>
        <td><?php echo $item['foto'] ?></td>
        <td>
        <a href="editarContato.php?id=<?php echo $item['id']; ?>">Editar</a>
        <a href="#">EXCLUIR</a>  
    </td>    
    </tr>
</tbody>
<?php
endforeach;
?>
</table>
</main>
