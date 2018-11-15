<?php

class FuncionarioClass {

    //-- Propriedades privadas
    private $codFunc;
    private $dataCad;
    private $dataNasc;
    private $nome;
    private $email;
    private $senha;
    private $rg;
    private $telefone;
    private $endereco;
    private $bairro;
    private $cidade;
    private $estado;
    private $pais;

    //-- Encapsulamento das propriedades (Método GET e SET)
    function getCod() {
        return $this->codFunc;
    }

    function getDataCad() {
        return $this->dataCad;
    }

    function getDataNasc() {
        return $this->dataNasc;
    }

    function getNome() {
        return $this->nome;
    }

    function getEmail() {
        return $this->email;
    }

    function getSenha() {
        return $this->senha;
    }

    function getRg() {
        return $this->rg;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getCidade() {
        return $this->cidade;
    }

    function getEstado() {
        return $this->estado;
    }

    function getPais() {
        return $this->pais;
    }

    function getBairro() {
        return $this->bairro;
    }



    function setCod($codFunc) {
        $this->codFunc = $codFunc;
    }

    function setDataCad() {
        $this->dataCad = $dataCad;
    }

    function setDataNasc() {
        $this->dataNasc = $dataNasc;
    }

    function setNome() {
        $this->nome = $nome;
    }

    function setEmail() {
        $this->email = $email;
    }

    function setSenha() {
        $this->senha = $senha;
    }

    function setRg() {
        $this->rg = $rg;
    }

    function setTelefone() {
        $this->telefone = $telefone;
    }

    function setEndereco() {
        $this->endereco = $endereco;
    }

    function setCidade() {
        $this->cidade = $cidade;
    }

    function setEstado() {
        $this->estado = $estado;
    }

    function setPais() {
        $this->pais = $pais;
    }

    function setBairro() {
        $this->bairro = $bairro;
    }

            //-------------- CRUD-----------------------
    public function retFuncionarios() {
        require_once('class/ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "", "dbPhpBancoDados");
        $tableFuncs = $objConexao->selecionarDados("SELECT * FROM Professor");

        return $tableFuncs;
    }

    public function inserirFuncionario($objFunc) {
        require_once('class/ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "", "dbPhpBancoDados");   
        
        $codFunc = $objFunc->getCod();
        $dataCad = $objFunc->getDataCad();
        $dataNasc = $objFunc->getDataNasc();
        $nome = $objFunc->getNome();
        $email = $objFunc->getEmail();
        $senha = $objFunc->getSenha();
        $rg = $objFunc->getRg();
        $telefone = $objFunc->getTelefone();
        $endereco = $objFunc->getEndereco();
        $bairro = $objFunc->getBairro();
        $cidade = $objFunc->getCidade();
        $estado = $objFunc->getEstado();
        $pais = $objFunc->getPais();
        
        
        $objConexao->exercutarComandoSQL("INSERT INTO Funcionario (email,senha) VALUES ('$email','$senha')");               

        return true;
    }
    
    public function editarFuncionario($objFunc) {
        require_once('class/ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "", "dbPhpBancoDados");   
        
        $codFunc = $objFunc->getCod();
        $dataCad = $objFunc->getDataCad();
        $dataNasc = $objFunc->getDataNasc();
        $nome = $objFunc->getNome();
        $email = $objFunc->getEmail();
        $senha = $objFunc->getSenha();
        $rg = $objFunc->getRg();
        $telefone = $objFunc->getTelefone();
        $endereco = $objFunc->getEndereco();
        $bairro = $objFunc->getBairro();
        $cidade = $objFunc->getCidade();
        $estado = $objFunc->getEstado();
        $pais = $objFunc->getPais();
        
        $objConexao->exercutarComandoSQL("UPDATE Funcionario SET  WHERE codFuncionario='$codFunc'");               

        return true;
    }
    
    public function excluirProfessor($objFunc) {
        require_once('class/ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "", "dbPhpBancoDados");   
        
        $codFunc = $objFunc->getCodProfessor();        
        
        $objConexao->exercutarComandoSQL("DELETE FROM Funcionario WHERE codFuncionario='$codFunc'");               

        return true;
    }

}
