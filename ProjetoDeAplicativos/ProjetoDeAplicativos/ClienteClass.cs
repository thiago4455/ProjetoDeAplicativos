using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Data;

namespace ProjetoDeAplicativos
{
    public class ClienteClass
    {
        public string codCliente { get; set; }
        public string dataCad { get; set; }
        public string dataNasc { get; set; }
        public string nome { get; set; }
        public string email { get; set; }
        public string rg { get; set; }
        public string telefone { get; set; }
        public string endereco { get; set; }
        public string bairro { get; set; }
        public string cidade { get; set; }
        public string estado { get; set; }
        public string pais { get; set; }

        public DataTable retClientes()
        {
            ClasseDB db = new ClasseDB();
            return db.RetornarTabela("SELECT * FROM Cliente");
        }

        public void inserirCliente()
        {
            ClasseDB db = new ClasseDB();
            db.ExecutarComando($"INSERT INTO Cliente (codCliente, dataCadastro, dataNascimento, nome, rg, telefone, email, endereco, cidade, bairro, estado, pais) VALUES ('{codCliente}', '{dataCad}', '{dataNasc}', '{nome}', '{rg}', '{telefone}', '{email}', '{endereco}', '{cidade}', '{bairro}', '{estado}', '{pais}')");
        }

        public void editarCliente()
        {
            ClasseDB db = new ClasseDB();
            db.ExecutarComando($"UPDATE Cliente SET codCliente='{codCliente}', dataCadastro='{dataCad}', dataNascimento='{dataNasc}', nome='{nome}',email='{email}', rg='{rg}', telefone='{telefone}', endereco='{endereco}', cidade='{cidade}', bairro='{bairro}', estado='{estado}', pais='{pais}'  WHERE codCliente='{codCliente}'");
        }

        public void excluirCliente(string codCliente)
        {
            ClasseDB db = new ClasseDB();
            db.ExecutarComando($"DELETE FROM Cliente WHERE codCliente='{codCliente}'");
        }

        public void excluirCliente()
        {
            ClasseDB db = new ClasseDB();
            db.ExecutarComando($"DELETE FROM Cliente WHERE codCliente='{codCliente}'");
        }

        public string retProxCodCliente()
        {
            DataTable tabelaclientes = retClientes();
            int max = tabelaclientes.Rows.Count;
            if (max!=0)
            {
                string codAntigo = tabelaclientes.Rows[max - 1]["codCliente"].ToString();
                codAntigo = codAntigo.Substring(4, 3);
                int numNovo = int.Parse(codAntigo) + 1;
                string numString = numNovo.ToString();
                while (numString.Length < 3)
                {
                    numString = "0" + numString;
                }
                return "CLIC" + numString;
            }
            else
            {
                return "CLIC000";
            }
        }
    }
}
