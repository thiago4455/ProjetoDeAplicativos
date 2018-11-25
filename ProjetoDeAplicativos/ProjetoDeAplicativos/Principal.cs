using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace ProjetoDeAplicativos
{
    public partial class Principal : Form
    {
        int X = 0;
        int Y = 0;

        int tipoServico = 0;

        Button[] botoes;

        Form[] objForm;

        public static FuncionarioClass funcLogado;

        public Principal(FuncionarioClass funcLogado)
        {
            InitializeComponent();
            Principal.funcLogado = funcLogado;
            objForm = new Form[] { new SubForms.FuncionarioTable(pnlPrincipal) };
            botoes = new Button[] { btnFuncionario, btnCliente, btnAnimal, btnServico };
            for (int i = 0; i < botoes.Length; i++)
            {
                int num = i;
                botoes[num].Click += (sender, e) => atualizar(sender, e, num);
            }
            atualizar();
        }

        private void picTopbar_MouseDown(object sender, MouseEventArgs e)
        {
            if (e.Button == MouseButtons.Left)
            {
                X = Left - MousePosition.X;
                Y = Top - MousePosition.Y;
            }
        }

        private void picTopbar_MouseMove(object sender, MouseEventArgs e)
        {
            if (e.Button == MouseButtons.Left)
            {
                Left = X + MousePosition.X;
                Top = Y + MousePosition.Y;
            }
        }

        private void btnFechar_Click(object sender, EventArgs e)
        {
            Application.Exit();
        }

        private void btnMinimizar_Click(object sender, EventArgs e)
        {
            WindowState = FormWindowState.Minimized;
        }

        private void btnMaximizar_Click(object sender, EventArgs e)
        {
            if (WindowState == FormWindowState.Normal)
                WindowState = FormWindowState.Maximized;
            else
                WindowState = FormWindowState.Normal;
        }

        private void atualizar(object sender, EventArgs e, int num)
        {
            tipoServico = num;

            atualizar();
        }

        private void atualizar()
        {

            for (int i = 0; i < botoes.Length; i++)
            {
                if (i == tipoServico)
                {
                    botoes[i].BackColor = Color.FromArgb(13, 115, 84);
                }
                else
                {
                    botoes[i].BackColor = Color.FromArgb(19, 170, 125);
                }
            }

            objForm[tipoServico].TopLevel = false;
            pnlPrincipal.Controls.Add(objForm[tipoServico]);
            objForm[tipoServico].FormBorderStyle = System.Windows.Forms.FormBorderStyle.None;
            objForm[tipoServico].Dock = DockStyle.Fill;
            objForm[tipoServico].Show();
        }

        private void Principal_Load(object sender, EventArgs e)
        {

        }
    }
}
