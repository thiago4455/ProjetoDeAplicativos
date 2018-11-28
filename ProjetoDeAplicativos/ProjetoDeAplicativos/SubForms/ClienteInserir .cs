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
    public partial class ClienteInserir : Form
    {
        Panel painel;

        public ClienteInserir(Panel pnl)
        {
            InitializeComponent();
            painel = pnl;
        }

        private void btnSalvar_Click(object sender, EventArgs e)
        {
            ClienteClass cliente = new ClienteClass();
            cliente.codCliente = cliente.retProxCodCliente();
            cliente.dataCad = DateTime.Now.ToString("dd/MM/yyyy");
            cliente.dataNasc = dataNasc.Text;
            cliente.nome = nome.Text;
            cliente.email = email.Text;
            cliente.rg = rg.Text;
            cliente.telefone = telefone.Text;
            cliente.endereco = endereco.Text;
            cliente.bairro = bairro.Text;
            cliente.cidade = cidade.Text;
            cliente.estado = estado.Text;
            cliente.pais = pais.Text;
            cliente.inserirCliente();
            sair();
        }

        private void btnCancelar_Click(object sender, EventArgs e)
        {
            sair();
        }

        public void sair()
        {
            ClienteTable objForm = new SubForms.ClienteTable(painel);
            painel.Controls.Clear();
            objForm.TopLevel = false;
            painel.Controls.Add(objForm);
            objForm.Dock = DockStyle.Fill;
            objForm.Show();
        }
    }
}
