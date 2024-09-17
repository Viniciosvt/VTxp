<?php
include 'classes/usuarios.class.php';
$usuario = new Usuarios();

if (!empty($_POST['email'])) {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $dt_nasc = $_POST['dt_nasc'];
    $cpf_cnpj = $_POST['cpf_cnpj'];   
    $email = $_POST['email'];
    $foto = $_POST['foto'];

    $resultado = $usuario->adicionar($email, $nome, $telefone, $endereco, $dt_nasc, $cpf_cnpj, $foto);

    if ($resultado) {
        header('Location: index.php');
    } else {
        echo '<script type="text/javascript">alert("Email já cadastrado!"); window.location.href="adicionarUsuario.php";</script>';
    }
} else {
    echo '<script type="text/javascript">alert("O email é obrigatório!"); window.location.href="adicionarUsuario.php";</script>';
}
