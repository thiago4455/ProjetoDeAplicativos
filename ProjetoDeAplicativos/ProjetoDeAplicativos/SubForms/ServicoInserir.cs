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
    public partial class ServicoInserir : Form
    {
        Panel painel;

        public ServicoInserir(Panel pnl)
        {
            InitializeComponent();
            painel = pnl;
        }

        private void btnSalvar_Click(object sender, EventArgs e)
        {
            ServicoClass serv = new ServicoClass();
            serv.codServico = serv.retProxCodServico();
            serv.nome = nome.Text;
            serv.descricao = descricao.Text;
            serv.valor = valor.Text;
            serv.inserirServico();
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
