<?php

class ServicoClass {

    //-- Propriedades privadas
    private $codServico;
    private $nome;
    private $descricao;
    private $valor;    

    //-- Encapsulamento das propriedades (Método GET e SET)
    function getCodServico() {
        return $this->codServico;
    }

    function getNome() {
        return $this->nome;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getValor() {
        return $this->valor;
    }


    function setCodServico($codServico) {
        $this->codServico = $codServico;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }

            //-------------- CRUD-----------------------
    public function retServicos() {
        require_once('class/ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "", "dbPrimoPet");
        $tableServicos = $objConexao->selecionarDados("SELECT * FROM Servico");

        return $tableServicos;
    }
    
    public function inserirServico($objServico) {
        require_once('class/ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "", "dbPrimoPet");   
        
        $codServico = $objServico->getCodServico();
        $nome = $objServico->getNome();
        $descricao = $objServico->getDescricao();
        $valor = $objServico->getValor();
                       
        $objConexao->exercutarComandoSQL("INSERT INTO Servico (codServico, nome, descricao, valor) VALUES ('$codServico', '$nome', '$descricao', '$valor')");               

        return true;
    }
    
     public function editarServico($objServico) {
        require_once('class/ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "", "dbPrimoPet");   
        
        $codServico = $objServico->getCodServico();
        $nome = $objServico->getNome();
        $descricao = $objServico->getDescricao();
        $valor = $objServico->getValor();
       
        $objConexao->exercutarComandoSQL("UPDATE Servico SET codServico='$codServico', nome='$nome',descricao='$descricao', valor='$valor' WHERE codServico='$codServico'");               

        return true;
    }
    
    public function excluirServico($codServico) {
        require_once('class/ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "", "dbPrimoPet");   
        
        $objConexao->exercutarComandoSQL("DELETE FROM Servico WHERE codServico='$codServico'");               

        return true;
    }
    
    public function retProxCodServico(){
        $tableclientes = $this->retServicos();
        if ($tableclientes == "") {
            $codNovo = 'SER000';
        }
        else{
        $max = sizeof($tableclientes);
        $codAntigo  = $tableclientes[$max-1]['codServico'];
        $codAntigo = substr($codAntigo,4,3);
        $numNovo =  intval($codAntigo)+1;
        $numString = (string)$numNovo;
        while (strlen($numString) < 3){
            $numString = '0'.$numString;
        }
        $codNovo = 'SER'.$numString;
        }
        return $codNovo;
    }
}