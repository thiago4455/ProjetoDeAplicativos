<?php

class ClienteClass {

    //-- Propriedades privadas
    private $codCliente;
    private $dataCad;
    private $dataNasc;
    private $nome;
    private $email;
    private $rg;
    private $telefone;
    private $endereco;
    private $bairro;
    private $cidade;
    private $estado;
    private $pais;

    //-- Encapsulamento das propriedades (Método GET e SET)
    function getCod() {
        return $this->codCliente;
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


    function setCod($codCliente) {
        $this->codCliente = $codCliente;
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

            //-------------- CRUD-----------------------
    public function retClientes() {
        require_once('class/ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "", "dbPrimoPet");
        $tableClientes = $objConexao->selecionarDados("SELECT * FROM Cliente");

        return $tableClientes;
    }

    public function inserirCliente($objCliente) {
        require_once('class/ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "", "dbPrimoPet");   
        
        $codCliente = $objCliente->getCod();
        $dataCad = $objCliente->getDataCad();
        $dataNasc = $objCliente->getDataNasc();
        $nome = $objCliente->getNome();
        $email = $objCliente->getEmail();
        $rg = $objCliente->getRg();
        $telefone = $objCliente->getTelefone();
        $endereco = $objCliente->getEndereco();
        $bairro = $objCliente->getBairro();
        $cidade = $objCliente->getCidade();
        $estado = $objCliente->getEstado();
        $pais = $objCliente->getPais();
        
        $objConexao->exercutarComandoSQL("INSERT INTO Cliente (codCliente, dataCadastro, dataNascimento, nome, rg, telefone, email, endereco, cidade, bairro, estado, pais) VALUES ('$codCliente', '$dataCad', '$dataNasc', '$nome', '$rg', '$telefone', '$email', '$endereco', '$cidade', '$bairro', '$estado', '$pais')");               

        return true;
    }
            
    public function editarCliente($objCliente) {
        require_once('class/ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "", "dbPrimoPet");   
        
        $codCliente = $objCliente->getCod();
        $dataCad = $objCliente->getDataCad();
        $dataNasc = $objCliente->getDataNasc();
        $nome = $objCliente->getNome();
        $email = $objCliente->getEmail();
        $rg = $objCliente->getRg();
        $telefone = $objCliente->getTelefone();
        $endereco = $objCliente->getEndereco();
        $bairro = $objCliente->getBairro();
        $cidade = $objCliente->getCidade();
        $estado = $objCliente->getEstado();
        $pais = $objCliente->getPais();
       
        $objConexao->exercutarComandoSQL("UPDATE Cliente SET codCliente='$codCliente', dataCadastro='$dataCad', dataNascimento='$dataNasc', nome='$nome',email='$email', rg='$rg', telefone='$telefone', endereco='$endereco', cidade='$cidade', bairro='$bairro', estado='$estado', pais='$pais'  WHERE codCliente='$codCliente'");               

        return true;
    }
    
    public function excluirCliente($codCliente) {
        require_once('class/ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "", "dbPrimoPet");   
        
        $objConexao->exercutarComandoSQL("DELETE FROM Animal WHERE Cliente_codCliente = '$codCliente'");
        $objConexao->exercutarComandoSQL("DELETE FROM Cliente WHERE codCliente='$codCliente'");               

        return true;
    }

    public function retProxCodCliente(){
        $tableclientes = $this->retClientes();
        if ($tableclientes == "") {
            $codNovo = 'CLIC000';
        }
        else{
        $max = sizeof($tableclientes);
        $codAntigo  = $tableclientes[$max-1]['codCliente'];
        $codAntigo = substr($codAntigo,4,3);
        $numNovo =  intval($codAntigo)+1;
        $numString = (string)$numNovo;
        while (strlen($numString) < 3){
            $numString = '0'.$numString;
        }
        $codNovo = 'CLIC'.$numString;
        }
        return $codNovo;
    }
}
