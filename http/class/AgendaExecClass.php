<?php

class AgendaExecClass {
    private $codAgendamento;
    private $dataPrevista;
    private $horaPrevista;
    private $observacoes;
    private $codAnimal;
    private $codServico;
    private $codVeterinario;
    private $dataExecucao;
    private $horaExecucao;
    
    function getCodAgendamento() {
        return $this->codAgendamento;
    }

    function getDataPrevista() {
        return $this->dataPrevista;
    }

    function getHoraPrevista() {
        return $this->horaPrevista;
    }

    function getObs() {
        return $this->observacoes;
    }

    function getCodAnimal() {
        return $this->codAnimal;
    }

    function getCodServico() {
        return $this->codServico;
    }

    function getCodVeterinario() {
        return $this->codVeterinario;
    }
    
    function getDataExecucao() {
        return $this->dataExecucao;
    }
    
    function getHoraExecucao() {
        return $this->horaExecucao;
    }
       
    function setCodAgendamento($codAgendamento) {
        $this->codAgendamento = $codAgendamento;
    }

    function setDataPrevista($dataPrevista) {
        $this->dataPrevista = $dataPrevista;
    }

    function setHoraPrevista($horaPrevista) {
        $this->horaPrevista = $horaPrevista;
    }

    function setObs($observacoes) {
        $this->observacoes = $observacoes;
    }

    function setCodAnimal($codAnimal) {
        $this->codAnimal = $codAnimal;
    }

    function setCodServico($codServico) {
        $this->codServico = $codServico;
    }

    function setCodVeterinario($codVeterinario) {
        $this->codVeterinario = $codVeterinario;
    }

    function setDataExecucao($dataExecucao) {
        $this->dataExecucao = $dataExecucao;
    }

    function setHoraExecucao($horaExecucao) {
        $this->horaExecucao = $horaExecucao;
    }

    public function retAgendaExec() {
        require_once('class/ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "", "dbPrimoPet");
        $tableAgendaExec = $objConexao->selecionarDados("SELECT * FROM Agendamento INNER JOIN Execucao ON (Execucao.Agendamento_codAgendamento = Agendamento.codAgendamento)");

        return $tableAgendaExec;
    }
    
    public function inserirAgendaExec($objAgendaExec) {
        require_once('class/ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "", "dbPrimoPet");   
                
        $codAgendamento = $objAgendaExec->getCodAgendamento();
        $dataPrevista = $objAgendaExec->getDataPrevista();
        $horaPrevista = $objAgendaExec->getHoraPrevista();
        $observacoes = $objAgendaExec->getObs();
        $codAnimal = $objAgendaExec->getCodAnimal();
        $codServico = $objAgendaExec->getCodServico();
        $codVeterinario = $objAgendaExec->getCodVeterinario();
        $dataExecucao = $objAgendaExec->getDataExecucao();
        $horaExecucao = $objAgendaExec->getHoraExecucao();
        $objConexao->exercutarComandoSQL("INSERT INTO Agendamento(codAgendamento,dataPrevista,horaPrevista,observacoes,Animal_codAnimal,Servico_codServico,codVeterinario) VALUES ('$codAgendamento','$dataPrevista','$horaPrevista','$observacoes','$codAnimal','$codServico','$codVeterinario')");               
        $objConexao->exercutarComandoSQL("INSERT INTO Execucao(codExecucao,dataExecucao,horaExecucao,observacoes,Animal_codAnimal,Agendamento_codAgendamento,codVeterinario) VALUES ('$codAgendamento','$dataExecucao','$horaExecucao','$observacoes','$codAnimal','$codAgendamento','$codVeterinario')");               

        return true;
    }

    public function editarAgendaExec($objAgendaExec) {
        require_once('class/ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "", "dbPrimoPet");   
        
        $codAgendamento = $objAgendaExec->getCodAgendamento();
        $dataPrevista = $objAgendaExec->getDataPrevista();
        $horaPrevista = $objAgendaExec->getHoraPrevista();
        $observacoes = $objAgendaExec->getObs();
        $codAnimal = $objAgendaExec->getCodAnimal();
        $codServico = $objAgendaExec->getCodServico();
        $codVeterinario = $objAgendaExec->getCodVeterinario();
        $dataExecucao = $objAgendaExec->getDataExecucao();
        $horaExecucao = $objAgendaExec->getHoraExecucao();
        
        $objConexao->exercutarComandoSQL("UPDATE Agendamento SET dataPrevista='$dataPrevista',horaPrevista='$horaPrevista',observacoes='$observacoes',Animal_codAnimal='$codAnimal',Servico_codServico='$codServico',codVeterinario='$codVeterinario' WHERE codAgendamento = '$codAgendamento'");               
        $objConexao->exercutarComandoSQL("UPDATE Execucao SET dataExecucao='$dataExecucao',horaExecucao='$horaExecucao',observacoes='$observacoes',Animal_codAnimal='$codAnimal',Agendamento_codAgendamento='$codAgendamento',codVeterinario='$codVeterinario' WHERE codExecucao = '$codAgendamento'");               

        return true;
    }
    
    public function excluirAgendaExec($codAgendamento) {
        require_once('class/ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "", "dbPrimoPet");   
        
        $objConexao->exercutarComandoSQL("DELETE FROM Execucao WHERE Agendamento_codAgendamento='$codAgendamento'");  
        $objConexao->exercutarComandoSQL("DELETE FROM Agendamento WHERE codAgendamento='$codAgendamento'");               

        return true;
    }
    
    
    public function retProxCodAgendamento(){
        $tableclientes = $this->retAgendaExec();
        if ($tableclientes == "") {
            $codNovo = 'AGE000';
        }
        else{
        $max = sizeof($tableclientes);
        $codAntigo  = $tableclientes[$max-1]['codAgendamento'];
        $codAntigo = substr($codAntigo,4,3);
        $numNovo =  intval($codAntigo)+1;
        $numString = (string)$numNovo;
        while (strlen($numString) < 3){
            $numString = '0'.$numString;
        }
        $codNovo = 'AGE'.$numString;
        }
        return $codNovo;
    }
}
