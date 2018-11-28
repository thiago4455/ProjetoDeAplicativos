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
    public partial class ServicoEdit : Form
    {
        ServicoClass servico;
        Panel painel;

        public ServicoEdit(ServicoClass serv, Panel pnl)
        {
            InitializeComponent();
            servico = serv;
            nome.Text = serv.nome;
            descricao.Text = serv.descricao;
            valor.Text = serv.valor;
            painel = pnl;
        }

        private void btnSalvar_Click(object sender, EventArgs e)
        {
            servico.nome = nome.Text;
            servico.descricao = descricao.Text;
            servico.valor = valor.Text;
            servico.editarServico();
            sair();
        }

        private void btnExcluir_Click(object sender, EventArgs e)
        {
            servico.excluirServico();
            sair();
        }

        private void btnCancelar_Click(object sender, EventArgs e)
        {
            sair();
        }

        public void sair()
        {
            ServicoTable objForm = new SubForms.ServicoTable(painel);
            painel.Controls.Clear();
            objForm.TopLevel = false;
            painel.Controls.Add(objForm);
            objForm.Show();
        }
    }
}
