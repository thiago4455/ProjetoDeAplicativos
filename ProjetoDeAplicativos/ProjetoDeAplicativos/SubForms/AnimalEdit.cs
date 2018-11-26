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
    public partial class AnimalEdit : Form
    {
        AnimalClass animal;
        Panel painel;

        public AnimalEdit(AnimalClass animal, Panel pnl)
        {
            InitializeComponent();
            this.animal = animal;
            codCliente.Text = animal.Cliente_codCliente;
            nome.Text = animal.nome;
            anoNasc.Text = animal.anoNascimento;
            peso.Text = animal.peso;
            grupo.Text = animal.grupo;
            raca.Text = animal.raca;
            genero.Text = animal.genero;
            vacinacao.Checked = animal.vacinacao=="True";
            comportamento.Text = animal.comportamento;
            painel = pnl;
        }

        

        private void btnSalvar_Click(object sender, EventArgs e)
        {
            animal.codAnimal = animal.codAnimal;
            animal.Cliente_codCliente = codCliente.Text;
            animal.nome = nome.Text;
            animal.anoNascimento = anoNasc.Text;
            animal.peso = peso.Text;
            animal.grupo = grupo.Text;
            animal.raca = raca.Text;
            animal.genero = genero.Text;
            animal.vacinacao = vacinacao.Checked ? "1" : "0";
            animal.comportamento = comportamento.Text;
            animal.editarAnimal();
            sair();
        }

        private void btnExcluir_Click(object sender, EventArgs e)
        {
            animal.excluirAnimal();
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
