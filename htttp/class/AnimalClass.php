<?php

class AnimalClass {
    //-- Propriedades privadas
    private $codAnimal;
    private $Cliente_codCliente;
    private $nome;
    private $anoNascimento;
    private $peso;
    private $grupo;
    private $raca;
    private $genero;
    private $vacinacao;
    private $comportamento;

    //-- Encapsulamento das propriedades (Método GET e SET)
    function getCodAnimal() {
        return $this->codAnimal;
    }

    function getCliente_CodCliente() {
        return $this->Cliente_codCliente;
    }

    function getNome() {
        return $this->nome;
    }

    function getAnoNascimento() {
        return $this->anoNascimento;
    }

    function getPeso() {
        return $this->peso;
    }

    function getGrupo() {
        return $this->grupo;
    }

    function getRaca() {
        return $this->raca;
    }

    function getGenero() {
        return $this->genero;
    }

    function getVacinacao() {
        return $this->vacinacao;
    }

    function getComportamento() {
        return $this->comportamento;
    }

    function setCodAnimal($codAnimal) {
        $this->codAnimal = $codAnimal;
    }

    function setCliente_CodCliente($Cliente_codCliente) {
        $this->Cliente_codCliente = $Cliente_codCliente;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setAnoNascimento($anoNascimento) {
        $this->anoNascimento = $anoNascimento;
    }

    function setPeso($peso) {
        $this->peso = $peso;
    }


    function setGrupo($grupo) {
        $this->grupo = $grupo;
    }

    function setRaca($raca) {
        $this->raca = $raca;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setGenero($genero) {
        $this->genero = $genero;
    }

    function setVacinacao($vacinacao) {
        $this->vacinacao = $vacinacao;
    }

    function setComportamento($comportamento) {
        $this->comportamento = $comportamento;
    }

    //Métodos CRUD
    public function retAnimais() {
        require_once('class/ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "", "dbPrimoPet");
        $tableAnimal = $objConexao->selecionarDados("SELECT * FROM Animal");

        return $tableAnimal;
    }

    public function inserirAnimal($objAnimal) {
        require_once('class/ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "", "dbPrimoPet");   
        
        $codAnimal = $objAnimal->getCodAnimal();
        $Cliente_codCliente = $objAnimal->getCliente_CodCliente();
        $nome = $objAnimal->getNome();
        $anoNascimento = $objAnimal->getAnoNascimento();
        $peso = $objAnimal->getPeso();
        $grupo = $objAnimal->getGrupo();
        $raca = $objAnimal->getRaca();
        $genero = $objAnimal->getGenero();
        $vacinacao = $objAnimal->getVacinacao();
        $comportamento = $objAnimal->getComportamento();
        
        $objConexao->exercutarComandoSQL("INSERT INTO Animal (codAnimal, Cliente_codCliente, nome, anoNascimento, peso, grupo, raca, genero, vacinacao, comportamento) VALUES ('$codAnimal', '$Cliente_codCliente', '$nome', '$anoNascimento', '$peso', '$grupo', '$raca', '$genero', '$vacinacao', '$comportamento')");               

        return true;
    }

    public function editarAnimal($objAnimal) {
        require_once('class/ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "", "dbPrimoPet");   
        
        $codAnimal = $objAnimal->getCodAnimal();
        $Cliente_codCliente = $objAnimal->getCliente_CodCliente();
        $nome = $objAnimal->getNome();
        $anoNascimento = $objAnimal->getAnoNascimento();
        $peso = $objAnimal->getPeso();
        $grupo = $objAnimal->getGrupo();
        $raca = $objAnimal->getRaca();
        $genero = $objAnimal->getGenero();
        $vacinacao = $objAnimal->getVacinacao();
        $comportamento = $objAnimal->getComportamento();
       
        $objConexao->exercutarComandoSQL("UPDATE Animal SET codAnimal='$codAnimal', Cliente_codCliente='$Cliente_codCliente', nome='$nome',anoNascimento='$anoNascimento', peso='$peso', grupo='$grupo', raca='$raca', genero='$genero', vacinacao='$vacinacao', comportamento='$comportamento' WHERE codAnimal='$codAnimal'");               

        return true;
    }

    public function excluirAnimal($codAnimal) {
        require_once('class/ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "", "dbPrimoPet");   
        
        $objConexao->exercutarComandoSQL("DELETE FROM Animal WHERE codAnimal='$codAnimal'");               

        return true;
    }

    public function retProxCodAnimal(){
        $tableclientes = $this->retAnimais();
        $max = sizeof($tableclientes);
        $codAntigo  = $tableclientes[$max-1]['codAnimal'];
        $codAntigo = substr($codAntigo,4,3);
        $numNovo =  intval($codAntigo)+1;
        $numString = (string)$numNovo;
        while (strlen($numString) < 3){
            $numString = '0'.$numString;
        }
        $codNovo = 'ANI'.$numString;
        return $codNovo;
    }
}
