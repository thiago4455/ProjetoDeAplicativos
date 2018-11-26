using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Data;
using MySql.Data.MySqlClient;

namespace ProjetoDeAplicativos
{
    class ClasseDB
    {
        MySqlConnection conn;

        public ClasseDB()
        {
            string servidor = "localhost";
            string db = "dbPrimoPet";
            conn = new MySqlConnection(String.Format("Server={0};Database={1};Uid=root", servidor, db));
        }

        public void ExecutarComando(string comando)
        {
            using (MySqlCommand cmd = new MySqlCommand(comando, conn))
            {
                conn.Open();
                cmd.ExecuteNonQuery();
                conn.Close();
            }
        }

        public DataTable RetornarTabela(string comando)
        {
            DataTable dt = new DataTable();
            new MySqlDataAdapter(comando, conn).Fill(dt);
            return dt;
        }
    }
}
