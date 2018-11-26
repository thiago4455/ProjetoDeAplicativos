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
    public partial class ClienteRow : Form
    {
        public ClienteRow(ClienteClass cliente,Panel pnl)
        {
            InitializeComponent();
            codFunc.Text = cliente.codCliente;
            dataCad.Text = cliente.dataCad;
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

            codFunc.Click += (sender, e) => click(sender, e, pnl, cliente);
            dataCad.Click += (sender, e) => click(sender, e, pnl, cliente);
            dataNasc.Click += (sender, e) => click(sender, e, pnl, cliente);
            nome.Click += (sender, e) => click(sender, e, pnl, cliente);
            email.Click += (sender, e) => click(sender, e, pnl, cliente);
            rg.Click += (sender, e) => click(sender, e, pnl, cliente);
            telefone.Click += (sender, e) => click(sender, e, pnl, cliente);
            bairro.Click += (sender, e) => click(sender, e, pnl, cliente);
            cidade.Click += (sender, e) => click(sender, e, pnl, cliente);
            estado.Click += (sender, e) => click(sender, e, pnl, cliente);
            pais.Click += (sender, e) => click(sender, e, pnl, cliente);
            this.Click += (sender, e) => click(sender, e, pnl, cliente);

        }

        private void click(object sender, EventArgs e, Panel pnl, ClienteClass cliente)
        {
            ClienteEdit objEdit = new ClienteEdit(cliente, pnl);
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
