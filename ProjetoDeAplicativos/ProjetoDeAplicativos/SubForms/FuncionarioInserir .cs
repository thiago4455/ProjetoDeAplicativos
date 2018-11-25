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
    public partial class FuncionarioInserir : Form
    {
        Panel painel;

        public FuncionarioInserir(Panel pnl)
        {
            InitializeComponent();
            painel = pnl;
        }

        private void btnSalvar_Click(object sender, EventArgs e)
        {
            FuncionarioClass funcionario = new FuncionarioClass();
            funcionario.codFunc = funcionario.retProxCodFunc();
            funcionario.dataCad = DateTime.Now.ToString("dd/MM/yyyy");
            funcionario.dataNasc = dataNasc.Text;
            funcionario.nome = nome.Text;
            funcionario.email = email.Text;
            funcionario.senha = senha.Text;
            funcionario.rg = rg.Text;
            funcionario.telefone = telefone.Text;
            funcionario.endereco = endereco.Text;
            funcionario.bairro = bairro.Text;
            funcionario.cidade = cidade.Text;
            funcionario.estado = estado.Text;
            funcionario.pais = pais.Text;
            funcionario.codTipo = tipo.Checked?1:0;
            funcionario.inserirFuncionario();
            sair();
        }

        private void btnCancelar_Click(object sender, EventArgs e)
        {
            sair();
        }

        public void sair()
        {
            FuncionarioTable objForm = new SubForms.FuncionarioTable(painel);
            painel.Controls.Clear();
            objForm.TopLevel = false;
            painel.Controls.Add(objForm);
            objForm.Show();
        }
    }
}
