<?php
require 'conexao.class.php';
class Usuarios
{
    private $id;
    private $nome;
    private $tipo;
    private $caracteristicas;
    private $fornecedor;
    private $con;

    public function __construct()
    {
        // Método construtor é o primeiro método a ser executado
        $this->con = new Conexao();
    }
    public function adicionar($nome, $tipo, $caracteristicas, $fornecedor)
    {
            try {
                $this->nome = $nome;
                $this->tipo = $tipo;
                $this->caracteristicas = $caracteristicas;
                $this->fornecedor = $fornecedor;
                $sql = $this->con->conectar()->prepare("INSERT INTO semente(nome, tipo, caracteristicas, fornecedor) VALUES 
                (:nome, :tipo, :caracteristicas, :fornecedor, :cpf_cnpj, :email, :foto)");
                vinivt chupa

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