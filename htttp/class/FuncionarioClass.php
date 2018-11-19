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
    private $codTipo;

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

    function getTipo() {
        return $this->codTipo;
    }


    function setCod($codFunc) {
        $this->codFunc = $codFunc;
    }

    function setDataCad($dataCad) {
        $this->dataCad = $dataCad;
    }

    function setDataNasc($dataNasc) {
        $this->dataNasc = $dataNasc;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setRg($rg) {
        $this->rg = $rg;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setPais($pais) {
        $this->pais = $pais;
    }

    function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    function setTipo($codTipo) {
        $this->codTipo = $codTipo;
    }

            //-------------- CRUD-----------------------
    public function retFuncionarios() {
        require_once('class/ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "", "dbPrimoPet");
        $tableFuncs = $objConexao->selecionarDados("SELECT * FROM Funcionario");

        return $tableFuncs;
    }

    public function inserirFuncionario($objFunc) {
        require_once('class/ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "", "dbPrimoPet");   
        
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
        $codTipo = $objFunc->getTipo();
        
        
        $objConexao->exercutarComandoSQL("INSERT INTO Funcionario (codFuncionario, dataCadastro, dataNascimento, nome, rg, telefone, email, senha, endereco, cidade, bairro, estado, pais, codTipo) VALUES ('$codFunc', '$dataCad', '$dataNasc', '$nome', '$rg', '$telefone', '$email', '$senha', '$endereco', '$cidade', '$bairro', '$estado', '$pais', '$codTipo')");               

        return true;
    }
    
    public function editarFuncionario($objFunc) {
        require_once('class/ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "", "dbPrimoPet");   
        
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
        $codTipo = $objFunc->getTipo();
        
        $objConexao->exercutarComandoSQL("UPDATE Funcionario SET codFuncionario='$codFunc', dataCadastro='$dataCad', dataNascimento='$dataNasc', nome='$nome', rg='$rg', telefone='$telefone', email='$email', senha='$senha', endereco='$endereco', cidade='$cidade', bairro='$bairro', estado='$estado', pais='$pais', codTipo='$codTipo'  WHERE codFuncionario='$codFunc'");               

        return true;
    }
    
    public function excluirFuncionario($codFunc) {
        require_once('class/ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "", "dbPrimoPet");   
        
        $objConexao->exercutarComandoSQL("DELETE FROM Funcionario WHERE codFuncionario='$codFunc'");               

        return true;
    }
    public function retProxCodFunc(){
        $tableclientes = $this->retFuncionarios();
        $max = sizeof($tableclientes);
        $codAntigo  = $tableclientes[$max-1]['codFuncionario'];
        $codAntigo = substr($codAntigo,4,3);
        $numNovo =  intval($codAntigo)+1;
        $numString = (string)$numNovo;
        while (strlen($numString) < 3){
            $numString = '0'.$numString;
        }
        $codNovo = 'FUNC'.$numString;
        return $codNovo;
    }
}
