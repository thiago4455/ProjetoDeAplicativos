using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Data;

namespace ProjetoDeAplicativos
{
    class AgendaExecClass
    {
        public string codAgendamento { get; set; }
        public string dataPrevista { get; set; }
        public string horaPrevista { get; set; }
        public string observacoes { get; set; }
        public string codAnimal { get; set; }
        public string codServico { get; set; }
        public string codVeterinario { get; set; }
        public string dataExecucao { get; set; }
        public string horaExecucao { get; set; }

        public DataTable retAgendaExec()
        {
            ClasseDB db = new ClasseDB();
            return db.RetornarTabela("SELECT * FROM Agendamento INNER JOIN Execucao ON (Execucao.Agendamento_codAgendamento = Agendamento.codAgendamento)");
        }

        public void inserirAgendaExec()
        {
            ClasseDB db = new ClasseDB();
            db.ExecutarComando($"INSERT INTO Agendamento(codAgendamento,dataPrevista,horaPrevista,observacoes,Animal_codAnimal,Servico_codServico,codVeterinario) VALUES ('{codAgendamento}','{dataPrevista}','{horaPrevista}','{observacoes}','{codAnimal}','{codServico}','{codVeterinario}')");
            db.ExecutarComando($"INSERT INTO Execucao(codExecucao,dataExecucao,horaExecucao,observacoes,Animal_codAnimal,Agendamento_codAgendamento,codVeterinario) VALUES ('{codAgendamento}','{dataExecucao}','{horaExecucao}','{observacoes}','{codAnimal}','{codAgendamento}','{codVeterinario}')");
        }

        public void executarAgendaExec()
        {
            ClasseDB db = new ClasseDB();
            db.ExecutarComando($"UPDATE Agendamento SET dataPrevista='{dataPrevista}',horaPrevista='{horaPrevista}',observacoes='{observacoes}',Animal_codAnimal='{codAnimal}',Servico_codServico='{codServico}',codVeterinario='{codVeterinario}' WHERE codAgendamento = '{codAgendamento}'");
            db.ExecutarComando($"UPDATE Execucao SET dataExecucao='{dataExecucao}',horaExecucao='{horaExecucao}',observacoes='{observacoes}',Animal_codAnimal='{codAnimal}',Agendamento_codAgendamento='{codAgendamento}',codVeterinario='{codVeterinario}' WHERE codExecucao = '{codAgendamento}'");
        }

        public void excluirAgendaExec()
        {
            ClasseDB db = new ClasseDB();
            db.ExecutarComando($"DELETE FROM Execucao WHERE Agendamento_codAgendamento='{codAgendamento}'");
            db.ExecutarComando($"DELETE FROM Agendamento WHERE codAgendamento='{codAgendamento}'");
        }

        public string retProxCodAgendamento()
        {
            DataTable tableagendexec = retAgendaExec();
            int max = tableagendexec.Rows.Count;
            string codAntigo = tableagendexec.Rows[max - 1]["'codAgendamento'"].ToString();
            codAntigo = codAntigo.Substring(4, 3);
            int numNovo = int.Parse(codAntigo) + 1;
            string numString = numNovo.ToString();
            while (numString.Length < 3)
            {
                numString = "0" + numString;
            }
            string codNovo = "AGE" + numString;
            return codNovo;
        }

    }
}
