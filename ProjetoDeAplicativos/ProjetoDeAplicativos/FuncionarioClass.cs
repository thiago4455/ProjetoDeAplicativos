using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Data;

namespace ProjetoDeAplicativos
{
    public class FuncionarioClass
    {
        public string codFunc { get; set; }
        public string dataCad { get; set; }
        public string dataNasc { get; set; }
        public string nome { get; set; }
        public string email { get; set; }
        public string senha { get; set; }
        public string rg { get; set; }
        public string telefone { get; set; }
        public string endereco { get; set; }
        public string bairro { get; set; }
        public string cidade { get; set; }
        public string estado { get; set; }
        public string pais { get; set; }
        public int codTipo { get; set; }

        public DataTable retFuncionarios()
        {
            ClasseDB db = new ClasseDB();
            return db.RetornarTabela("SELECT * FROM Funcionario");
        }

        public void inserirFuncionario()
        {
            ClasseDB db = new ClasseDB();
            db.ExecutarComando($"INSERT INTO Funcionario(codFuncionario, dataCadastro, dataNascimento, nome, rg, telefone, email, senha, endereco, cidade, bairro, estado, pais, codTipo) VALUES('{codFunc}', '{dataCad}', '{dataNasc}', '{nome}', '{rg}', '{telefone}', '{email}', '{senha}', '{endereco}', '{cidade}', '{bairro}', '{estado}', '{pais}', '{codTipo}')");
        }

        public void editarFuncionario()
        {
            ClasseDB db = new ClasseDB();
            db.ExecutarComando($"UPDATE Funcionario SET codFuncionario='{codFunc}', dataCadastro='{dataCad}', dataNascimento='{dataNasc}', nome='{nome}', rg='{rg}', telefone='{telefone}', email='{email}', senha='{senha}', endereco='{endereco}', cidade='{cidade}', bairro='{bairro}', estado='{estado}', pais='{pais}', codTipo='{codTipo}'  WHERE codFuncionario='{codFunc}'");
        }

        public void excluirFuncionario(string codFunc)
        {
            ClasseDB db = new ClasseDB();
            db.ExecutarComando($"DELETE FROM Funcionario WHERE codFuncionario='{codFunc}'");
        }

        public void excluirFuncionario()
        {
            ClasseDB db = new ClasseDB();
            db.ExecutarComando($"DELETE FROM Funcionario WHERE codFuncionario='{codFunc}'");
        }

        public string retProxCodFunc()
        {
            DataTable tabelafuncs = retFuncionarios();
            int max = tabelafuncs.Rows.Count;
            string codAntigo = tabelafuncs.Rows[max - 1]["'codFuncionario'"].ToString();
            codAntigo = codAntigo.Substring(4, 3);
            int numNovo = int.Parse(codAntigo) + 1;
            string numString = numNovo.ToString();
            while (numString.Length < 3)
            {
                numString = "0" + numString;
            }
            string codNovo = "'FUNC'" + numString;
            return codNovo;
        }
    }
}
