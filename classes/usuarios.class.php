<?php
require 'conexao.class.php';
class Usuarios
{
    private $id;
    private $nome;
    private $telefone;
    private $endereço;
    private $dt_nasc;
    private $cpf_cnpj;
    private $email;
    private $foto;

    private $con;

    public function __construct()
    {
        // Método construtor é o primeiro método a ser executado
        $this->con = new Conexao();
    }
    private function existeEmail($email)
    {
        $sql = $this->con->conectar()->prepare("SELECT id FROM usuario WHERE email = :email");
        $sql->bindParam(':email', $email, PDO::PARAM_STR);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch(); //fetch retorna o email encontrado
        } else {
            $array = array();
        }
        return $array;
    }
    public function adicionar($email, $nome, $telefone, $endereco, $dt_nasc, $cpf_cnpj, $foto)
    {
        $emailExistente = $this->existeEmail($email);
        if (count($emailExistente) == 0) {
            try {
                $this->nome = $nome;
                $this->telefone = $telefone;
                $this->endereco = $endereco;
                $this->dt_nasc = $dt_nasc;
                $this->cpf_cnpj = $cpf_cnpj;
                $this->email = $email;
                $this->foto = $foto;
                $sql = $this->con->conectar()->prepare("INSERT INTO usuario(nome, telefone, endereco, dt_nasc, cpf_cnpj, email, foto ) VALUES 
                (:nome, :telefone, :endereco, :dt_nasc, :cpf_cnpj, :email, :foto)");

                $sql->bindParam(':nome', $nome, PDO::PARAM_STR);
                $sql->bindParam(':telefone', $telefone, PDO::PARAM_STR);
                $sql->bindParam(':endereco', $endereco, PDO::PARAM_STR);
                $sql->bindParam(':dt_nasc', $dt_nasc, PDO::PARAM_STR);
                $sql->bindParam(':cpf_cnpj', $cpf_cnpj, PDO::PARAM_STR);
                $sql->bindParam(':email', $email, PDO::PARAM_STR);
                $sql->bindParam(':foto', $foto, PDO::PARAM_STR);
                $sql->execute();
                return TRUE;
                
            } catch (PDOException $ex) {
                return 'ERRO: ' . $ex->getMessage();
            }
        } else {
            return FALSE;
        }
    }

    public function listar() {
        try{
            $sql = $this->con->conectar()->prepare("SELECT  * FROM usuario");
            $sql ->execute();
            return $sql->fetchAll();
        }catch(PDOException $ex){
            echo"ERRO:".$ex->getMessage();
        }
    }
    public function buscar($id)
    {
        try{
            $sql=$this->con->conectar()->prepare("SELECT * FROM usuarios  WHERE id = :id");
            $sql->bindValue(':id', $id);
            $sql->execute();
            if($sql->rowCount() > 0){
                return $sql -> fetch();
            }else{
                return array();
            }
         }catch (PDOException $ex){
                echo "ERRO: " .$ex->getMessage();
            }    
    }  
}