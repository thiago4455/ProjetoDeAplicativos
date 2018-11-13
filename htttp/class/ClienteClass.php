<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AlunoClass
 *
 * @author Aluno
 */
class AlunoClass {

    //-- Propriedades privadas
    private $codAluno;
    private $nome;
    private $idade;
    private $cpf;

    //-- Encapsulamento das propriedades (Método GET e SET)
    function getCodAluno() {
        return $this->codAluno;
    }

    function getNome() {
        return $this->nome;
    }

    function getIdade() {
        return $this->idade;
    }

    function getCpf() {
        return $this->cpf;
    }

    function setCodAluno($codAluno) {
        $this->codAluno = $codAluno;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setIdade($idade) {
        $this->idade = $idade;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    //-------------- CRUD-----------------------
    public function retAluno() {
        require_once('class/ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "", "dbPhpBancoDados");
        $tableAlunos = $objConexao->selecionarDados("Select * from Aluno");

        return $tableAlunos;
    }

    public function inserirAluno($objAluno) {
        require_once('class/ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "", "dbPhpBancoDados");

        $nome = $objAluno->getNome();
        $idade = $objAluno->getIdade();
        $cpf = $objAluno->getCpf();

        $objConexao->exercutarComandoSQL("INSERT INTO Aluno (nome,idade,cpf) VALUES ('$nome','$idade','$cpf')");

        return true;
    }

    public function editarAluno($objAluno) {
        require_once('class/ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "", "dbPhpBancoDados");

        $codAluno = $objAluno->getCodAluno();
        $nome = $objAluno->getNome();
        $idade = $objAluno->getIdade();
        $cpf = $objAluno->getCpf();
        
        $objConexao->exercutarComandoSQL("UPDATE Aluno SET nome ='$nome',idade='$idade',cpf='$cpf' WHERE codAluno='$codAluno'");

        return true;
    }

    public function excluirAluno($objAluno) {
        require_once('class/ConexaoClass.php');
        $objConexao = new ConexaoClass("localhost", "root", "", "dbPhpBancoDados");

        $codAluno = $objAluno->getCodAluno();

        $objConexao->exercutarComandoSQL("DELETE FROM Aluno WHERE codAluno='$codAluno'");

        return true;
    }

    //-------------- OUTROS MÉTODOS -----------------------
    public function retQuantCaracEmail($email) {

        $quantCaracteres = strlen($email);

        return $quantCaracteres;
    }

}
