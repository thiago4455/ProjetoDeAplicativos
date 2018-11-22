using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Data;

namespace ProjetoDeAplicativos
{
    class AnimalClass
    {

        public string codAnimal { get; set; }
        public string Cliente_codCliente { get; set; }
        public string nome { get; set; }
        public string anoNascimento { get; set; }
        public string peso { get; set; }
        public string grupo { get; set; }
        public string raca { get; set; }
        public string genero { get; set; }
        public string vacinacao { get; set; }
        public string comportamento { get; set; }

        public DataTable retAnimais()
        {
            ClasseDB db = new ClasseDB();
            return db.RetornarTabela("SELECT * FROM Animal");
        }

        public void inserirAnimal()
        {
            ClasseDB db = new ClasseDB();
            db.ExecutarComando($"INSERT INTO Animal (codAnimal, Cliente_codCliente, nome, anoNascimento, peso, grupo, raca, genero, vacinacao, comportameto) VALUES ('{codAnimal}', '{Cliente_codCliente}', '{nome}', '{anoNascimento}', '{peso}', '{grupo}', '{raca}', '{genero}', '{vacinacao}', '{comportamento}')");
        }

        public void editarAnimal()
        {
            ClasseDB db = new ClasseDB();
            db.ExecutarComando($"UPDATE Animal SET codAnimal='{codAnimal}', Cliente_codCliente='{Cliente_codCliente}', nome='{nome}',anoNascimento='{anoNascimento}', peso='{peso}', grupo='{grupo}', raca='{raca}', genero='{genero}', vacinacao='{vacinacao}', comportameto='{comportamento}' WHERE codAnimal='{codAnimal}'");
        }

        public void excluirAnimal(string codAnimal)
        {
            ClasseDB db = new ClasseDB();
            db.ExecutarComando($"DELETE FROM Animal WHERE codAnimal='{codAnimal}'");
        }

        public void excluirAnimal()
        {
            ClasseDB db = new ClasseDB();
            db.ExecutarComando($"DELETE FROM Animal WHERE codAnimal='{codAnimal}'");
        }

        public string retProxCodAnimal()
        {
            DataTable tabelaanimais = retAnimais();
            int max = tabelaanimais.Rows.Count;
            string codAntigo = tabelaanimais.Rows[max - 1]["'codAnimal'"].ToString();
            codAntigo = codAntigo.Substring(4, 3);
            int numNovo = int.Parse(codAntigo) + 1;
            string numString = numNovo.ToString();
            while (numString.Length < 3)
            {
                numString = "0" + numString;
            }
            string codNovo = "ANI" + numString;
            return codNovo;
        }
    }
}
