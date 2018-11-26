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
    public partial class AnimalTable : Form
    {
        AnimalRow[] row;
        Panel painel;

        public AnimalTable(Panel pnl)
        {
            InitializeComponent();
            painel = pnl;
            DataTable dt = new AnimalClass().retAnimais();
            row = new AnimalRow[dt.Rows.Count];
            for (int i = 0; i < dt.Rows.Count; i++)
            {
                AnimalClass animal = new AnimalClass();
                animal.codAnimal = dt.Rows[i]["codAnimal"].ToString();
                animal.Cliente_codCliente = dt.Rows[i]["Cliente_codCliente"].ToString();
                animal.nome = dt.Rows[i]["nome"].ToString();
                animal.anoNascimento = dt.Rows[i]["anoNascimento"].ToString();
                animal.peso = dt.Rows[i]["peso"].ToString();
                animal.grupo = dt.Rows[i]["grupo"].ToString();
                animal.raca = dt.Rows[i]["raca"].ToString();
                animal.genero = dt.Rows[i]["genero"].ToString();
                animal.vacinacao = dt.Rows[i]["vacinacao"].ToString();
                animal.comportamento = dt.Rows[i]["comportameto"].ToString();

                row[i] = new AnimalRow(animal, pnl);
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
            AnimalInserir objEdit = new AnimalInserir(painel);
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
