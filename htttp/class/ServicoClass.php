<?php

class ProfessorClass {

    //-- Propriedades privadas
    private $codProfessor;
    private $email;
    private $senha;

    //-- Encapsulamento das propriedades (Método GET e SET)
    function getCodProfessor() {
        return $this->codProfessor;
    }

    function getEmail() {
        return $this->email;
    }

    function getSenha() {
        return $this->senha;
    }

    function setCodProfessor($codProfessor) {
        $this->codProfessor = $codProfessor;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

            //-------------- CRUD-----------------------
    public function retProfessores() {
        require_once('class/ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "", "dbPhpBancoDados");
        $tableProfs = $objConexao->selecionarDados("Select * from Professor");

        return $tableProfs;
    }

    public function inserirProfessor($objProfessor) {
        require_once('class/ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "", "dbPhpBancoDados");   
        
        $email = $objProfessor->getEmail();
        $senha = $objProfessor->getSenha();
        
        $objConexao->exercutarComandoSQL("INSERT INTO Professor (email,senha) VALUES ('$email','$senha')");               

        return true;
    }
    
    public function editarProfessor($objProfessor) {
        require_once('class/ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "", "dbPhpBancoDados");   
        
        $codProfessor = $objProfessor->getCodProfessor();
        $email = $objProfessor->getEmail();
        $senha = $objProfessor->getSenha();
        
        $objConexao->exercutarComandoSQL("UPDATE Professor SET email ='$email',senha='$senha' WHERE codProfessor='$codProfessor'");               

        return true;
    }
    
    public function excluirProfessor($objProfessor) {
        require_once('class/ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "", "dbPhpBancoDados");   
        
        $codProfessor = $objProfessor->getCodProfessor();        
        
        $objConexao->exercutarComandoSQL("DELETE FROM Professor WHERE codProfessor='$codProfessor'");               

        return true;
    }

    //-------------- OUTROS MÉTODOS -----------------------
    public function retQuantCaracEmail($email) {

        $quantCaracteres = strlen($email);

        return $quantCaracteres;
    }

}
