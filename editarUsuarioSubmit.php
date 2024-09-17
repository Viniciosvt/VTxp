<?php
require 'assests/classes/usuarios.class.php';

$usuario = new Usuario();

if(!empty ($_POST['id'])&& | !empty($_POST['email'])&& !empty ($_POST['senha'])){
    $id = intval($_POST['id']);
    $nome = $_POST['nome'];
    $nome = $_POST['nome'];
    $usuario->($id, $nome, $email, $senha);

}
?>