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
    public partial class FuncionarioRow : Form
    {
        public FuncionarioRow(FuncionarioClass func,Panel pnl)
        {
            InitializeComponent();
            codFunc.Text = func.codFunc;
            dataCad.Text = func.dataCad;
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
            codTipo.Text = func.codTipo.ToString();

            codFunc.Click += (sender, e) => click(sender, e, pnl, func);
            dataCad.Click += (sender, e) => click(sender, e, pnl, func);
            dataNasc.Click += (sender, e) => click(sender, e, pnl, func);
            nome.Click += (sender, e) => click(sender, e, pnl, func);
            email.Click += (sender, e) => click(sender, e, pnl, func);
            senha.Click += (sender, e) => click(sender, e, pnl, func);
            rg.Click += (sender, e) => click(sender, e, pnl, func);
            telefone.Click += (sender, e) => click(sender, e, pnl, func);
            bairro.Click += (sender, e) => click(sender, e, pnl, func);
            cidade.Click += (sender, e) => click(sender, e, pnl, func);
            estado.Click += (sender, e) => click(sender, e, pnl, func);
            pais.Click += (sender, e) => click(sender, e, pnl, func);
            codTipo.Click += (sender, e) => click(sender, e, pnl, func);
            this.Click += (sender, e) => click(sender, e, pnl, func);

        }

        private void click(object sender, EventArgs e, Panel pnl, FuncionarioClass func)
        {
            FuncionarioEdit objEdit = new FuncionarioEdit(func,pnl);
            pnl.Controls.Clear();
            objEdit.TopLevel = false;
            pnl.Controls.Add(objEdit);
            objEdit.Show();
        }
    }
}
