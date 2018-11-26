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
    public partial class AnimalRow : Form
    {
        public AnimalRow(AnimalClass animal,Panel pnl)
        {
            InitializeComponent();
            codAnimal.Text = animal.codAnimal;
            Cliente_codCliente.Text = animal.Cliente_codCliente;
            nome.Text = animal.nome;
            dataNasc.Text = animal.anoNascimento;
            peso.Text = animal.peso;
            grupo.Text = animal.grupo;
            raca.Text = animal.raca;
            genero.Text = animal.genero;
            vacinacao.Text = animal.vacinacao=="True"?"Sim":"Não";
            comportamento.Text = animal.comportamento;

            codAnimal.Click += (sender, e) => click(sender, e, pnl, animal);
            Cliente_codCliente.Click += (sender, e) => click(sender, e, pnl, animal);
            dataNasc.Click += (sender, e) => click(sender, e, pnl, animal);
            nome.Click += (sender, e) => click(sender, e, pnl, animal);
            this.Click += (sender, e) => click(sender, e, pnl, animal);

        }

        private void click(object sender, EventArgs e, Panel pnl, AnimalClass animal)
        {
            AnimalEdit objEdit = new AnimalEdit(animal, pnl);
            pnl.Controls.Clear();
            objEdit.TopLevel = false;
            pnl.Controls.Add(objEdit);
            objEdit.Show();
        }

        private void ClienteRow_Load(object sender, EventArgs e)
        {

        }
    }
}
