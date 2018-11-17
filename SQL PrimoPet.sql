CREATE DATABASE dbPrimoPet;

USE dbPrimoPet;

CREATE TABLE Funcionario(
	codFuncionario VARCHAR(10) PRIMARY KEY NOT NULL,
    dataCadastro VARCHAR(10) NOT NULL,
    dataNascimento VARCHAR(10) NOT NULL,
    nome VARCHAR(50) NOT NULL,
    rg VARCHAR(14) NOT NULL,
    telefone VARCHAR(15) NOT NULL,
    email VARCHAR(50) NOT NULL,
    senha VARCHAR(50) NOT NULL,
    endereco VARCHAR(100) NOT NULL,
    cidade VARCHAR(20) NOT NULL,
    bairro VARCHAR(20) NOT NULL,
    estado VARCHAR(20) NOT NULL,
    pais VARCHAR(20) NOT NULL,
    codTipo INT NOT NULL
) ENGINE=INNODB;

CREATE TABLE Cliente(   
	codCliente VARCHAR(10) PRIMARY KEY NOT NULL,
    dataCadastro VARCHAR(10) NOT NULL,
    dataNascimento VARCHAR(10) NOT NULL,
    nome VARCHAR(50) NOT NULL,
    rg VARCHAR(14) NOT NULL,
    telefone VARCHAR(15) NOT NULL,
    email VARCHAR(50) NOT NULL,
    endereco VARCHAR(100) NOT NULL,
    cidade VARCHAR(20) NOT NULL,
    bairro VARCHAR(20) NOT NULL,
    estado VARCHAR(20) NOT NULL,
    pais VARCHAR(20) NOT NULL
) ENGINE=INNODB;


CREATE TABLE Animal(
	codAnimal VARCHAR(10) PRIMARY KEY NOT NULL,
    nome VARCHAR(50) NOT NULL,
    rg VARCHAR(14) NOT NULL,
    anoNascimento INT NOT NULL,
    peso DECIMAL NOT NULL,
    grupo VARCHAR(20) NOT NULL,
    raca VARCHAR(20) NOT NULL,
    genero VARCHAR(1) NOT NULL,
    vacinacao BOOLEAN NOT NULL,
    comportameto VARCHAR(200) NOT NULL,
    Cliente_codCliente VARCHAR(10) NOT NULL,
    FOREIGN KEY (Cliente_codCliente) REFERENCES Cliente(codCliente)
) ENGINE=INNODB;

CREATE TABLE Servico(
    codServico VARCHAR(10) PRIMARY KEY NOT NULL,
    nome VARCHAR(20) NOT NULL,
    descricao VARCHAR(50) NOT NULL,
    valor DECIMAL NOT NULL
) ENGINE=INNODB;

CREATE TABLE Agendamento(
    codAgendamento VARCHAR(10) PRIMARY KEY NOT NULL,
    dataPrevista VARCHAR(10) NOT NULL,
    horaPrevista VARCHAR(5) NOT NULL,
    observacoes VARCHAR(200) NOT NULL,
    Animal_codAnimal VARCHAR(10) NOT NULL,
    FOREIGN KEY (Animal_codAnimal) REFERENCES Animal(codAnimal),
    Servico_codServico VARCHAR(10) NOT NULL,
    FOREIGN KEY (Servico_codServico) REFERENCES Servico(codServico),
    codVeterinario VARCHAR(10) NOT NULL,
    FOREIGN KEY (codVeterinario) REFERENCES Funcionario(codFuncionario)
) ENGINE=INNODB;

CREATE TABLE Execucao(
    codAgendamento VARCHAR(10) PRIMARY KEY NOT NULL,
    dataExecucao VARCHAR(10) NOT NULL,
    horaExecucao VARCHAR(5) NOT NULL,
    observacoes VARCHAR(200) NOT NULL,
    Animal_codAnimal VARCHAR(10) NOT NULL,
    FOREIGN KEY (Animal_codAnimal) REFERENCES Animal(codAnimal),
    Servico_codServico VARCHAR(10) NOT NULL,
    FOREIGN KEY (Servico_codServico) REFERENCES Servico(codServico),
    codVeterinario VARCHAR(10) NOT NULL,
    FOREIGN KEY (codVeterinario) REFERENCES Funcionario(codFuncionario)
) ENGINE=INNODB;

INSERT INTO Funcionario (codFuncionario, dataCadastro, dataNascimento, nome, rg, telefone, email, senha, endereco, cidade, bairro, estado, pais, codTipo) VALUES ('FUNC000','16/11/2018','00/00/0000','Administrador','00.000.000-00','(00) 00000-0000','admin@primopet.com','admin','Rua dos Bororós 105','Belo Horizonte','Santa Mônica', 'Minas Gerais','Brasil',1);