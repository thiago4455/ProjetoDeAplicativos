namespace ProjetoDeAplicativos
{
    partial class Login
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(Login));
            this.panel1 = new System.Windows.Forms.Panel();
            this.picLogo = new System.Windows.Forms.PictureBox();
            this.txtLogin = new System.Windows.Forms.TextBox();
            this.txtSenha = new System.Windows.Forms.TextBox();
            this.btnLogar = new System.Windows.Forms.Button();
            this.panel1.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.picLogo)).BeginInit();
            this.SuspendLayout();
            // 
            // panel1
            // 
            this.panel1.BackColor = System.Drawing.Color.FromArgb(((int)(((byte)(19)))), ((int)(((byte)(170)))), ((int)(((byte)(125)))));
            this.panel1.Controls.Add(this.btnLogar);
            this.panel1.Controls.Add(this.txtSenha);
            this.panel1.Controls.Add(this.txtLogin);
            this.panel1.Controls.Add(this.picLogo);
            this.panel1.Location = new System.Drawing.Point(213, 33);
            this.panel1.Name = "panel1";
            this.panel1.Size = new System.Drawing.Size(331, 356);
            this.panel1.TabIndex = 0;
            // 
            // picLogo
            // 
            this.picLogo.Anchor = System.Windows.Forms.AnchorStyles.Top;
            this.picLogo.BackgroundImage = ((System.Drawing.Image)(resources.GetObject("picLogo.BackgroundImage")));
            this.picLogo.BackgroundImageLayout = System.Windows.Forms.ImageLayout.Zoom;
            this.picLogo.Location = new System.Drawing.Point(78, 16);
            this.picLogo.Name = "picLogo";
            this.picLogo.Size = new System.Drawing.Size(174, 67);
            this.picLogo.TabIndex = 5;
            this.picLogo.TabStop = false;
            // 
            // txtLogin
            // 
            this.txtLogin.Anchor = ((System.Windows.Forms.AnchorStyles)(((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Left) 
            | System.Windows.Forms.AnchorStyles.Right)));
            this.txtLogin.BorderStyle = System.Windows.Forms.BorderStyle.None;
            this.txtLogin.Font = new System.Drawing.Font("Microsoft Sans Serif", 15.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.txtLogin.ForeColor = System.Drawing.SystemColors.WindowFrame;
            this.txtLogin.Location = new System.Drawing.Point(59, 119);
            this.txtLogin.Multiline = true;
            this.txtLogin.Name = "txtLogin";
            this.txtLogin.Size = new System.Drawing.Size(212, 29);
            this.txtLogin.TabIndex = 6;
            this.txtLogin.Text = "Login";
            this.txtLogin.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // txtSenha
            // 
            this.txtSenha.Anchor = ((System.Windows.Forms.AnchorStyles)(((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Left) 
            | System.Windows.Forms.AnchorStyles.Right)));
            this.txtSenha.BorderStyle = System.Windows.Forms.BorderStyle.None;
            this.txtSenha.Font = new System.Drawing.Font("Microsoft Sans Serif", 15.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.txtSenha.ForeColor = System.Drawing.SystemColors.WindowFrame;
            this.txtSenha.Location = new System.Drawing.Point(59, 159);
            this.txtSenha.Multiline = true;
            this.txtSenha.Name = "txtSenha";
            this.txtSenha.Size = new System.Drawing.Size(212, 29);
            this.txtSenha.TabIndex = 7;
            this.txtSenha.Text = "Senha";
            this.txtSenha.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // btnLogar
            // 
            this.btnLogar.BackColor = System.Drawing.Color.White;
            this.btnLogar.FlatAppearance.BorderSize = 0;
            this.btnLogar.FlatStyle = System.Windows.Forms.FlatStyle.Flat;
            this.btnLogar.Location = new System.Drawing.Point(59, 241);
            this.btnLogar.Name = "btnLogar";
            this.btnLogar.Size = new System.Drawing.Size(212, 54);
            this.btnLogar.TabIndex = 8;
            this.btnLogar.Text = "LOGAR";
            this.btnLogar.UseVisualStyleBackColor = false;
            // 
            // Login
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.BackColor = System.Drawing.Color.FromArgb(((int)(((byte)(235)))), ((int)(((byte)(244)))), ((int)(((byte)(242)))));
            this.ClientSize = new System.Drawing.Size(784, 412);
            this.Controls.Add(this.panel1);
            this.Name = "Login";
            this.Text = "Login";
            this.panel1.ResumeLayout(false);
            this.panel1.PerformLayout();
            ((System.ComponentModel.ISupportInitialize)(this.picLogo)).EndInit();
            this.ResumeLayout(false);

        }

        #endregion

        private System.Windows.Forms.Panel panel1;
        private System.Windows.Forms.PictureBox picLogo;
        private System.Windows.Forms.TextBox txtSenha;
        private System.Windows.Forms.TextBox txtLogin;
        private System.Windows.Forms.Button btnLogar;
    }
}

