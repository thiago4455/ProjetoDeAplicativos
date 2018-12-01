using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Net.Mail; using System.Net;

namespace ProjetoDeAplicativos
{
    public partial class Login : Form
    {

        int X = 0;
        int Y = 0;

        int LarguraInicial = 0;
        int XLargura = 0;
        int AlturaInicial = 0;
        int YAltura = 0;

        public Login()
        {
            InitializeComponent();
            pnlRecuperarSenha.Hide();
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
            Close();
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

        private void picTopbar_Click(object sender, EventArgs e)
        {

        }

        private void btnEntrar_Click(object sender, EventArgs e)
        {
            FuncionarioClass objFunc = new FuncionarioClass();
            DataTable tablefuncs = objFunc.retFuncionarios();

            for (int i = 0; i < tablefuncs.Rows.Count; i++)
            {
                if (txtEmail.Text == tablefuncs.Rows[i]["email"].ToString() && txtSenha.Text == tablefuncs.Rows[i]["senha"].ToString())
                {
                    objFunc.codFunc = tablefuncs.Rows[i]["codFuncionario"].ToString();
                    objFunc.codTipo = int.Parse(tablefuncs.Rows[i]["codTipo"].ToString());
                    Principal principal = new Principal(objFunc);
                    principal.Show();
                    principal.Location = Location;
                    principal.WindowState = WindowState;
                    Hide();
                }
            }
            
        }

        private void Login_Load(object sender, EventArgs e)
        {

        }

        private void mouseHover(object sender, EventArgs e)
        {
            Cursor = Cursors.SizeWE;
        }

        private void mouseHoverNS(object sender, EventArgs e)
        {
            Cursor = Cursors.SizeNS;
        }

        private void mouseHoverC2(object sender, EventArgs e)
        {
            Cursor = Cursors.SizeNWSE;
        }

        private void mouseLeave(object sender, EventArgs e)
        {
            Cursor = Cursors.Default;
        }

        private void picRight_MouseDown(object sender, MouseEventArgs e)
        {
            if (e.Button == MouseButtons.Left)
            {
                LarguraInicial = Width;
                XLargura = MousePosition.X;
            }
        }

        private void picRight_MouseMove(object sender, MouseEventArgs e)
        {
            if (e.Button == MouseButtons.Left)
            {
                Width = LarguraInicial + (MousePosition.X - XLargura);

            }
        }

        private void picLeft_MouseDown(object sender, MouseEventArgs e)
        {
            if (e.Button == MouseButtons.Left)
            {
                LarguraInicial = Width;
                XLargura = MousePosition.X;
                X = Left - MousePosition.X;

                
            }
        }

        private void picLeft_MouseMove(object sender, MouseEventArgs e)
        {
            if (e.Button == MouseButtons.Left)
            {

                 if (Width > MinimumSize.Width)
                      Left = X + MousePosition.X;

                Width = LarguraInicial + (XLargura - MousePosition.X);

            }
        }
        

        private void picBottom_MouseDown(object sender, MouseEventArgs e)
        {
            if (e.Button == MouseButtons.Left)
            {
                AlturaInicial = Height;
                YAltura= MousePosition.Y;
            }
        }

        private void picBottom_MouseMove(object sender, MouseEventArgs e)
        {
            if (e.Button == MouseButtons.Left)
            {
                Height = AlturaInicial + (MousePosition.Y - YAltura);

            }
        }

        private void picCorner2_MouseDown(object sender, MouseEventArgs e)
        {
            if (e.Button == MouseButtons.Left)
            {
                AlturaInicial = Height;
                YAltura = MousePosition.Y;
                LarguraInicial = Width;
                XLargura = MousePosition.X;
            }
        }

        private void picCorner2_MouseMove(object sender, MouseEventArgs e)
        {
            if (e.Button == MouseButtons.Left)
            {
                Height = AlturaInicial + (MousePosition.Y - YAltura);
                Width = LarguraInicial + (MousePosition.X - XLargura);

            }
        }

        private void picCorner1_MouseDown(object sender, MouseEventArgs e)
        {
            if (e.Button == MouseButtons.Left)
            {
                AlturaInicial = Height;
                YAltura = MousePosition.Y;
                LarguraInicial = Width;
                XLargura = MousePosition.X;
            }
        }

        private void picCorner1_MouseMove(object sender, MouseEventArgs e)
        {
            if (e.Button == MouseButtons.Left)
            {
                Height = AlturaInicial + (MousePosition.Y - YAltura);
                Width = LarguraInicial + (XLargura - MousePosition.X);

            }
        }

        private void mouseHoverC1(object sender, EventArgs e)
        {
            Cursor = Cursors.SizeNESW;
        }

        private void lnkRecuperarSenha_LinkClicked(object sender, LinkLabelLinkClickedEventArgs e)
        {
            pnlRecuperarSenha.Show();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            FuncionarioClass objFunc = new FuncionarioClass();
            DataTable tablefuncs = objFunc.retFuncionarios();
            string senha = "";
            for (int i = 0; i < tablefuncs.Rows.Count; i++)
            {
                if (tablefuncs.Rows[i]["email"].ToString() == txtRecEmail.Text)
                {
                    senha = tablefuncs.Rows[i]["senha"].ToString();
                }
            }

            try             {                 var client = new SmtpClient("smtp.gmail.com", 587)                 {                     Credentials = new NetworkCredential("fabricadepapeisx@gmail.com", "adminfabrica"),                     EnableSsl = true                 };                 object a = true;                 client.SendAsync("fabricadepapeisx@gmail.com", txtRecEmail.Text, "Recuperação de senha", "Sua senha é " + senha, a);             }             catch             {                 throw;             }
        }
    }
}
