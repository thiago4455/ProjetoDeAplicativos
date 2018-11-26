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
    public partial class AnimalInserir : Form
    {
        Panel painel;

        public AnimalInserir(Panel pnl)
        {
            InitializeComponent();
            painel = pnl;
        }

        private void btnSalvar_Click(object sender, EventArgs e)
        {
            AnimalClass animal = new AnimalClass();
            animal.codAnimal = animal.retProxCodAnimal();
            animal.Cliente_codCliente = codCliente.Text;
            animal.nome = nome.Text;
            animal.anoNascimento = anoNasc.Text;
            animal.peso = peso.Text;
            animal.grupo = grupo.Text;
            animal.raca = raca.Text;
            animal.genero = genero.Text;
            animal.vacinacao = vacinacao.Checked?"1":"0";
            animal.comportamento = comportamento.Text;
            animal.inserirAnimal();
            sair();
        }

        private void btnCancelar_Click(object sender, EventArgs e)
        {
            sair();
        }

        public void sair()
        {
            AnimalTable objForm = new SubForms.AnimalTable(painel);
            painel.Controls.Clear();
            objForm.TopLevel = false;
            painel.Controls.Add(objForm);
            objForm.Show();
        }
    }
}
