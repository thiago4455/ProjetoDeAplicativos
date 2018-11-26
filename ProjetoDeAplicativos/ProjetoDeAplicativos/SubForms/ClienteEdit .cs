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
    public partial class ClienteEdit : Form
    {
        ClienteClass cliente;
        Panel painel;

        public ClienteEdit(ClienteClass cliente, Panel pnl)
        {
            InitializeComponent();
            this.cliente = cliente;
            dataNasc.Text = cliente.dataNasc;
            nome.Text = cliente.nome;
            email.Text = cliente.email;
            rg.Text = cliente.rg;
            telefone.Text = cliente.telefone;
            endereco.Text = cliente.endereco;
            bairro.Text = cliente.bairro;
            cidade.Text = cliente.cidade;
            estado.Text = cliente.estado;
            pais.Text = cliente.pais;
            painel = pnl;
        }

        private void btnSalvar_Click(object sender, EventArgs e)
        {
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
            cliente.editarCliente();
            sair();
        }

        private void btnExcluir_Click(object sender, EventArgs e)
        {
            cliente.excluirCliente();
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
            objForm.Show();
        }
    }
}
