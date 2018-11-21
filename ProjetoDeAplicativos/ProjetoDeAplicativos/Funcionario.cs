using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Data;

namespace ProjetoDeAplicativos
{
    public class Funcionario
    {
        public int Cod { get; set; }
        public string DataCadastro { get; set; }
        public string Nome { get; set; }
        public string DataNascimento { get; set; }
        public string Rg { get; set; }
        public string Telefone { get; set; }
        public string Email { get; set; }
        public string Endereco { get; set; }
        public string Cidade { get; set; }
        public string Estado { get; set; }
        public string Pais { get; set; }
        public int CodTipo { get; set; }


        public static DataTable retFuncionarios()
        {
            return new DataTable();
        }

        public bool editar()
        {
            return true;
        }

        public bool excluir()
        {
            return true;
        }

        public bool inserir()
        {
            return true;
        }


    }
}
