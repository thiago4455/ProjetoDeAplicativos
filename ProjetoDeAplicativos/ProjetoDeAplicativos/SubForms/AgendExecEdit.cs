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
    public partial class AgendExecEdit : Form
    {
        AgendaExecClass agendaExec;
        Panel painel;

        public AgendExecEdit(AgendaExecClass agenda, Panel pnl)
        {
            InitializeComponent();
            agendaExec = agenda;
            codAgendamento.Text = agenda.codAgendamento;
            dataPrevista.Text = agenda.dataPrevista;
            horaPrevista.Text = agenda.horaPrevista;
            observacoes.Text = agenda.observacoes;
            codAnimal.Text = agenda.codAnimal;
            codServico.Text = agenda.codServico;
            codVeterinario.Text = agenda.codVeterinario;
            dataExecucao.Text = agenda.dataExecucao;
            horaExecucao.Text = agenda.horaExecucao;
            painel = pnl;
        }

        private void btnSalvar_Click(object sender, EventArgs e)
        {
            agendaExec.codAgendamento = codAgendamento.Text;
            agendaExec.dataPrevista = dataPrevista.Text;
            agendaExec.horaPrevista = horaPrevista.Text;
            agendaExec.observacoes = observacoes.Text;
            agendaExec.codAnimal = codAnimal.Text;
            agendaExec.codServico = codServico.Text;
            agendaExec.codVeterinario = codVeterinario.Text;
            agendaExec.dataExecucao = dataExecucao.Text;
            agendaExec.horaExecucao = horaExecucao.Text;
            agendaExec.editarAgendaExec();
            sair();
        }

        private void btnExcluir_Click(object sender, EventArgs e)
        {
            agendaExec.excluirAgendaExec();
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
