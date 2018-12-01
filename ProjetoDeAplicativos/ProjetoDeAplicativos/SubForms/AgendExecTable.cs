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
    public partial class AgendExecTable : Form
    {
        AgendExecRow[] row;
        Panel painel;

        public AgendExecTable(Panel pnl)
        {
            InitializeComponent();
            painel = pnl;
            DataTable dt = new AgendaExecClass().retAgendaExec();
            row = new AgendExecRow[dt.Rows.Count];
            for (int i = 0; i < dt.Rows.Count; i++)
            {
                AgendaExecClass agenda = new AgendaExecClass();
                agenda.codAgendamento = dt.Rows[i]["codAgendamento"].ToString();
                agenda.dataPrevista = dt.Rows[i]["dataPrevista"].ToString();
                agenda.horaPrevista = dt.Rows[i]["horaPrevista"].ToString();
                agenda.observacoes = dt.Rows[i]["observacoes"].ToString();
                agenda.codAnimal = dt.Rows[i]["Animal_codAnimal"].ToString();
                agenda.codServico = dt.Rows[i]["Servico_codServico"].ToString();
                agenda.codVeterinario = dt.Rows[i]["codVeterinario"].ToString();
                agenda.dataExecucao = dt.Rows[i]["dataExecucao"].ToString();
                agenda.horaExecucao = dt.Rows[i]["horaExecucao"].ToString();

                row[i] = new AgendExecRow(agenda, pnl);
                row[i].TopLevel = false;
                row[i].Location = new Point(0, i * 32);
                pnlTable.Controls.Add(row[i]);
                row[i].Show();

                int index = i;
                row[i].MouseEnter += (sender, e) => mouseEnter(sender, e, index);
            }
        }

        private void mouseEnter(object sender, EventArgs e, int num)
        {
            for (int i = 0; i < row.Length; i++)
            {
                row[i].BackColor = SystemColors.Control;
            }

            row[num].BackColor = SystemColors.ControlLight;

        }

        private void btnSalvar_Click(object sender, EventArgs e)
        {
            AgendExecInserir objEdit = new AgendExecInserir(painel);
            painel.Controls.Clear();
            objEdit.TopLevel = false;
            painel.Controls.Add(objEdit);
            objEdit.Dock = DockStyle.Fill;
            objEdit.Show();
        }

        private void AgendaExecTable_Scroll(object sender, ScrollEventArgs e)
        {
            if(e.ScrollOrientation == ScrollOrientation.HorizontalScroll)
            {
                btnSalvar.Location = new Point((btnSalvar.Location.X + (e.NewValue-e.OldValue)), btnSalvar.Location.Y);
            }
        }
    }
}
