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
    public partial class ServicoTable : Form
    {
        ServicoRow[] row;
        Panel painel;

        public ServicoTable(Panel pnl)
        {
            InitializeComponent();
            painel = pnl;
            DataTable dt = new ServicoClass().retServicos();
            row = new ServicoRow[dt.Rows.Count];
            for (int i = 0; i < dt.Rows.Count; i++)
            {
                ServicoClass serv = new ServicoClass();
                serv.codServico = dt.Rows[i]["codServico"].ToString();
                serv.nome = dt.Rows[i]["nome"].ToString();
                serv.descricao = dt.Rows[i]["descricao"].ToString();
                serv.valor = dt.Rows[i]["valor"].ToString();

                row[i] = new ServicoRow(serv,pnl);
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
            ServicoInserir objEdit = new ServicoInserir(painel);
            painel.Controls.Clear();
            objEdit.TopLevel = false;
            painel.Controls.Add(objEdit);
            objEdit.Show();
        }
    }
}
