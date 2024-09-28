<?php
include 'classes/usuarios.class.php';
$contato = new Contatos();

if(!empty($_GET['id'])){
    $id = $_GET['id'];
    $info = $contato->buscar($id);
}else{
    header("Location: /VTxp");
    exit;
}

?>

<h1>EDITAR USUÁRIO</h1>

<form method="POST" action="editarUsuarioSubmit.php">
    <input type="hidden" name="id" value="<?php echo $info['id'];
    ?>">
Nome: <br>
<input type="text" name="nome" value="<?php echo $info ['nome']?>"><br><br>
Telefone: <br>
<input type="text" name="telefone" value="<?php echo $info ['telefone']?>"><br><br>
Endereço: <br>
<input type="text" name="endereco" value="<?php echo $info ['endereco']?>"> <br><br>
Nascimento: <br>
<input type="text" name="dt_nasc" value="<?php echo $info ['dt_nasc']?>"><br><br>
Descrição: <br>
<input type="text" name="CPF_CNPJ" value="<?php echo $info ['CPF_CNPJ']?>"><br><br>
Email: <br>
<input type="text" name="email" value="<?php echo $info ['email']?>"><br><br>
Foto: <br>
<input type="text" name="foto" value="<?php echo $info ['foto']?>"><br><br>
<input type="submit" name="btAlterar" value="ALTERAR"/>
</form>