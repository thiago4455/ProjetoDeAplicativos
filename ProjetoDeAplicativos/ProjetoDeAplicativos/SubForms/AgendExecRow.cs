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
    public partial class AgendExecRow : Form
    {
        public AgendExecRow(AgendaExecClass agenda,Panel pnl)
        {
            InitializeComponent();
            codAgendamento.Text = agenda.codAgendamento;
            dataPrevista.Text = agenda.dataPrevista;
            horaPrevista.Text = agenda.horaPrevista;
            observacoes.Text = agenda.observacoes;
            codAnimal.Text = agenda.codAnimal;
            codServico.Text = agenda.codServico;
            codVeterinario.Text = agenda.codVeterinario;
            dataExecucao.Text = agenda.dataExecucao;
            horaExecucao.Text = agenda.horaExecucao;

            codAgendamento.Click += (sender, e) => click(sender, e, pnl, agenda);
            dataPrevista.Click += (sender, e) => click(sender, e, pnl, agenda);
            horaPrevista.Click += (sender, e) => click(sender, e, pnl, agenda);
            observacoes.Click += (sender, e) => click(sender, e, pnl, agenda);
            codAnimal.Click += (sender, e) => click(sender, e, pnl, agenda);
            codServico.Click += (sender, e) => click(sender, e, pnl, agenda);
            codVeterinario.Click += (sender, e) => click(sender, e, pnl, agenda);
            dataExecucao.Click += (sender, e) => click(sender, e, pnl, agenda);
            this.Click += (sender, e) => click(sender, e, pnl, agenda);

        }

        private void click(object sender, EventArgs e, Panel pnl, AgendaExecClass agenda)
        {
            AgendExecEdit objEdit = new AgendExecEdit(agenda, pnl);
            pnl.Controls.Clear();
            objEdit.TopLevel = false;
            pnl.Controls.Add(objEdit);
            objEdit.Show();
        }
    }
}
