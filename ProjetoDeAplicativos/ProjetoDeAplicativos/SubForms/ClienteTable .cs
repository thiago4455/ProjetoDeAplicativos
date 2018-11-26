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
    public partial class ClienteTable : Form
    {
        ClienteRow[] row;
        Panel painel;

        public ClienteTable(Panel pnl)
        {
            InitializeComponent();
            painel = pnl;
            DataTable dt = new ClienteClass().retClientes();
            row = new ClienteRow[dt.Rows.Count];
            for (int i = 0; i < dt.Rows.Count; i++)
            {
                ClienteClass cliente = new ClienteClass();
                cliente.codCliente = dt.Rows[i]["codCliente"].ToString();
                cliente.dataCad = dt.Rows[i]["dataCadastro"].ToString();
                cliente.dataNasc = dt.Rows[i]["dataNascimento"].ToString();
                cliente.nome = dt.Rows[i]["nome"].ToString();
                cliente.email = dt.Rows[i]["email"].ToString();
                cliente.rg = dt.Rows[i]["rg"].ToString();
                cliente.telefone = dt.Rows[i]["telefone"].ToString();
                cliente.endereco = dt.Rows[i]["endereco"].ToString();
                cliente.cidade = dt.Rows[i]["cidade"].ToString();
                cliente.estado = dt.Rows[i]["estado"].ToString();
                cliente.pais = dt.Rows[i]["pais"].ToString();
                cliente.bairro = dt.Rows[i]["bairro"].ToString();

                row[i] = new ClienteRow(cliente, pnl);
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
            ClienteInserir objEdit = new ClienteInserir(painel);
            painel.Controls.Clear();
            objEdit.TopLevel = false;
            painel.Controls.Add(objEdit);
            objEdit.Show();
        }

        private void ClienteTable_Load(object sender, EventArgs e)
        {

        }
    }
}
