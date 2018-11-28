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
    public partial class FuncionarioTable : Form
    {
        FuncionarioRow[] row;
        Panel painel;

        public FuncionarioTable(Panel pnl)
        {
            InitializeComponent();
            painel = pnl;
            DataTable dt = new FuncionarioClass().retFuncionarios();
            row = new FuncionarioRow[dt.Rows.Count];
            for (int i = 0; i < dt.Rows.Count; i++)
            {
                FuncionarioClass func = new FuncionarioClass();
                func.codFunc = dt.Rows[i]["codFuncionario"].ToString();
                func.dataCad = dt.Rows[i]["dataCadastro"].ToString();
                func.dataNasc = dt.Rows[i]["dataNascimento"].ToString();
                func.nome = dt.Rows[i]["nome"].ToString();
                func.email = dt.Rows[i]["email"].ToString();
                func.senha = dt.Rows[i]["senha"].ToString();
                func.rg = dt.Rows[i]["rg"].ToString();
                func.telefone = dt.Rows[i]["telefone"].ToString();
                func.endereco = dt.Rows[i]["endereco"].ToString();
                func.cidade = dt.Rows[i]["cidade"].ToString();
                func.estado = dt.Rows[i]["estado"].ToString();
                func.pais = dt.Rows[i]["pais"].ToString();
                func.bairro = dt.Rows[i]["bairro"].ToString();
                func.codTipo = int.Parse(dt.Rows[i]["codTipo"].ToString());

                row[i] = new FuncionarioRow(func,pnl);
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
            FuncionarioInserir objEdit = new FuncionarioInserir(painel);
            painel.Controls.Clear();
            objEdit.TopLevel = false;
            painel.Controls.Add(objEdit);
            objEdit.Dock = DockStyle.Fill;
            objEdit.Show();
        }

        private void FuncionarioTable_Scroll(object sender, ScrollEventArgs e)
        {
            if(e.ScrollOrientation == ScrollOrientation.HorizontalScroll)
            {
                btnSalvar.Location = new Point((btnSalvar.Location.X + (e.NewValue-e.OldValue)), btnSalvar.Location.Y);
            }
        }
    }
}
