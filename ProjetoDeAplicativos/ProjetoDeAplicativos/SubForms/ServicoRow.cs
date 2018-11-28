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
    public partial class ServicoRow : Form
    {
        public ServicoRow(ServicoClass serv,Panel pnl)
        {
            InitializeComponent();
            codServ.Text = serv.codServico;
            nome.Text = serv.nome;
            descricao.Text = serv.descricao;
            valor.Text = serv.valor;

            codServ.Click += (sender, e) => click(sender, e, pnl, serv);
            nome.Click += (sender, e) => click(sender, e, pnl, serv);
            descricao.Click += (sender, e) => click(sender, e, pnl, serv);
            valor.Click += (sender, e) => click(sender, e, pnl, serv);
            this.Click += (sender, e) => click(sender, e, pnl, serv);

        }

        private void click(object sender, EventArgs e, Panel pnl, ServicoClass serv)
        {
            ServicoEdit objEdit = new ServicoEdit(serv,pnl);
            pnl.Controls.Clear();
            objEdit.TopLevel = false;
            pnl.Controls.Add(objEdit);
            objEdit.Show();
        }
    }
}
