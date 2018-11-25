using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Data;

namespace ProjetoDeAplicativos
{
    class ServicoClass
    {
        public string codServico { get; set; }
        public string nome { get; set; }
        public string descricao { get; set; }
        public string valor { get; set; }


        public DataTable retServicos()
        {
            ClasseDB db = new ClasseDB();
            return db.RetornarTabela("SELECT * FROM Servico");
        }

        public void inserirServico()
        {
            ClasseDB db = new ClasseDB();
            db.ExecutarComando($"INSERT INTO Servico (codServico, nome, descricao, valor) VALUES ('{codServico}', '{nome}', '{descricao}', '{valor}')");
        }

        public void editarServico()
        {
            ClasseDB db = new ClasseDB();
            db.ExecutarComando($"UPDATE Servico SET codServico='{codServico}', nome='{nome}',descricao='{descricao}', valor='{valor}' WHERE codServico='{codServico}'");
        }

        public void excluirServico()
        {
            ClasseDB db = new ClasseDB();
            db.ExecutarComando($"DELETE FROM Servico WHERE codServico='{codServico}'");
        }

        public string retProxCodServico()
        {
            DataTable tableservicos = retServicos();
            int max = tableservicos.Rows.Count;
            string codAntigo = tableservicos.Rows[max - 1]["codServico"].ToString();
            codAntigo = codAntigo.Substring(4, 3);
            int numNovo = int.Parse(codAntigo) + 1;
            string numString = numNovo.ToString();
            while (numString.Length < 3)
            {
                numString = "0" + numString;
            }
            string codNovo = "SER" + numString;
            return codNovo;
        }
    }
}
