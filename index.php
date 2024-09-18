<?php
include 'classes/usuarios.class.php';
include 'inc/header.inc.php';
$usuario = new Usuarios();   
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VTxp - Lista de Usuários</title>
    <link rel="stylesheet" href="css/indexstyle.css"> 
</head>
<body>

    <main>
        <button><a href="adicionarUsuario.php">ADICIONAR</a></button>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>TELEFONE</th>
                    <th>ENDEREÇO</th>
                    <th>DATA DE NASCIMENTO</th>
                    <th>CPF_CNPJ</th>
                    <th>EMAIL</th>
                    <th>FOTO</th>
                    <th>AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $lista = $usuario->listar();
                    if ($lista) 
                        foreach($lista as $item):
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['id']); ?></td>
                    <td><?php echo htmlspecialchars($item['nome']); ?></td>
                    <td><?php echo htmlspecialchars($item['telefone']); ?></td>
                    <td><?php echo htmlspecialchars($item['endereco']); ?></td>
                    <td><?php echo htmlspecialchars($item['dt_nasc']); ?></td>
                    <td><?php echo htmlspecialchars($item['cpf_cnpj']); ?></td>
                    <td><?php echo htmlspecialchars($item['email']); ?></td>
                    <td><img src="<?php echo htmlspecialchars($item['foto']); ?>" alt="Foto"></td>
                    <td class="actions">
                        <a href="#">EDITAR</a>
                        <a href="#" class="delete">EXCLUIR</a>
                    </td>
                </tr>
                <?php
                endforeach;
                ?>
            </tbody>
        </table>
    </main>
</body>
</html>
