<?php
include 'classes/sementes.class.php';
$semente = new Sementes(); {
    $nome = $_POST['nome'];
    $telefone = $_POST['tipo'];
    $endereco = $_POST['caracteristicas'];
    $dt_nasc = $_POST['fornecedor'];
    $resultado = $usuario->adicionar($nome, $tipo, $caracteristicas, $fornecedor);

}
