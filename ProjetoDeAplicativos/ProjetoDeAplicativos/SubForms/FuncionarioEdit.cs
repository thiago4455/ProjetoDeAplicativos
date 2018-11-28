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
    public partial class FuncionarioEdit : Form
    {
        FuncionarioClass funcionario;
        Panel painel;

        public FuncionarioEdit(FuncionarioClass func, Panel pnl)
        {
            InitializeComponent();
            funcionario = func;
            dataNasc.Text = func.dataNasc;
            nome.Text = func.nome;
            email.Text = func.email;
            senha.Text = func.senha;
            rg.Text = func.rg;
            telefone.Text = func.telefone;
            endereco.Text = func.endereco;
            bairro.Text = func.bairro;
            cidade.Text = func.cidade;
            estado.Text = func.estado;
            pais.Text = func.pais;
            tipo.Checked = func.codTipo==1;
            painel = pnl;
        }

        private void btnSalvar_Click(object sender, EventArgs e)
        {
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
            funcionario.editarFuncionario();
            sair();
        }

        private void btnExcluir_Click(object sender, EventArgs e)
        {
            funcionario.excluirFuncionario();
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
            objForm.Dock = DockStyle.Fill;
            objForm.Show();
        }
    }
}
