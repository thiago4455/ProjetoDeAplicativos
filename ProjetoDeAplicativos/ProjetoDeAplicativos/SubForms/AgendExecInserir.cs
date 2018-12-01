using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace ProjetoDeAplicativos.SubForms
{
    public partial class AgendExecInserir : Form
    {
        Panel painel;

        public AgendExecInserir(Panel pnl)
        {
            InitializeComponent();
            painel = pnl;
        }

        private void btnSalvar_Click(object sender, EventArgs e)
        {
            AgendaExecClass agenda = new AgendaExecClass();
            agenda.codAgendamento = agenda.retProxCodAgendamento();
            agenda.dataPrevista = dataPrevista.Text;
            agenda.horaPrevista = horaPrevista.Text;
            agenda.observacoes = observacoes.Text;
            agenda.codAnimal = codAnimal.Text;
            agenda.codServico = codServico.Text;
            agenda.codVeterinario = codVeterinario.Text;
            agenda.dataExecucao = dataExecucao.Text;
            agenda.horaExecucao = horaExecucao.Text;
            agenda.inserirAgendaExec();
            sair();
        }

        private void btnCancelar_Click(object sender, EventArgs e)
        {
            sair();
        }

        public void sair()
        {
            AgendExecTable objForm = new SubForms.AgendExecTable(painel);
            painel.Controls.Clear();
            objForm.TopLevel = false;
            painel.Controls.Add(objForm);
            objForm.Dock = DockStyle.Fill;
            objForm.Show();
        }
    }
}
