namespace ProjetoDeAplicativos
{
    partial class TelaInicial
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
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(TelaInicial));
            this.painelNavBar = new System.Windows.Forms.Panel();
            this.btnFuncionario = new System.Windows.Forms.Button();
            this.btnCliente = new System.Windows.Forms.Button();
            this.btnAnimal = new System.Windows.Forms.Button();
            this.btnServico = new System.Windows.Forms.Button();
            this.picLogo = new System.Windows.Forms.PictureBox();
            this.pnlTopBar = new System.Windows.Forms.Panel();
            this.picLinha = new System.Windows.Forms.PictureBox();
            this.painelNavBar.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.picLogo)).BeginInit();
            this.pnlTopBar.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.picLinha)).BeginInit();
            this.SuspendLayout();
            // 
            // painelNavBar
            // 
            this.painelNavBar.Anchor = ((System.Windows.Forms.AnchorStyles)(((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Bottom) 
            | System.Windows.Forms.AnchorStyles.Left)));
            this.painelNavBar.BackColor = System.Drawing.Color.FromArgb(((int)(((byte)(19)))), ((int)(((byte)(170)))), ((int)(((byte)(125)))));
            this.painelNavBar.Controls.Add(this.btnServico);
            this.painelNavBar.Controls.Add(this.btnAnimal);
            this.painelNavBar.Controls.Add(this.btnCliente);
            this.painelNavBar.Controls.Add(this.btnFuncionario);
            this.painelNavBar.Location = new System.Drawing.Point(0, 74);
            this.painelNavBar.Name = "painelNavBar";
            this.painelNavBar.Size = new System.Drawing.Size(174, 338);
            this.painelNavBar.TabIndex = 0;
            // 
            // btnFuncionario
            // 
            this.btnFuncionario.FlatAppearance.BorderSize = 0;
            this.btnFuncionario.FlatStyle = System.Windows.Forms.FlatStyle.Flat;
            this.btnFuncionario.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.btnFuncionario.ForeColor = System.Drawing.Color.White;
            this.btnFuncionario.Location = new System.Drawing.Point(0, 10);
            this.btnFuncionario.Name = "btnFuncionario";
            this.btnFuncionario.Size = new System.Drawing.Size(174, 39);
            this.btnFuncionario.TabIndex = 0;
            this.btnFuncionario.Text = "Funcionario";
            this.btnFuncionario.UseVisualStyleBackColor = true;
            this.btnFuncionario.Click += new System.EventHandler(this.btnFuncionario_Click);
            // 
            // btnCliente
            // 
            this.btnCliente.FlatAppearance.BorderSize = 0;
            this.btnCliente.FlatStyle = System.Windows.Forms.FlatStyle.Flat;
            this.btnCliente.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.btnCliente.ForeColor = System.Drawing.Color.White;
            this.btnCliente.Location = new System.Drawing.Point(0, 49);
            this.btnCliente.Name = "btnCliente";
            this.btnCliente.Size = new System.Drawing.Size(174, 39);
            this.btnCliente.TabIndex = 1;
            this.btnCliente.Text = "Cliente";
            this.btnCliente.UseVisualStyleBackColor = true;
            // 
            // btnAnimal
            // 
            this.btnAnimal.FlatAppearance.BorderSize = 0;
            this.btnAnimal.FlatStyle = System.Windows.Forms.FlatStyle.Flat;
            this.btnAnimal.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.btnAnimal.ForeColor = System.Drawing.Color.White;
            this.btnAnimal.Location = new System.Drawing.Point(0, 91);
            this.btnAnimal.Name = "btnAnimal";
            this.btnAnimal.Size = new System.Drawing.Size(174, 39);
            this.btnAnimal.TabIndex = 2;
            this.btnAnimal.Text = "Animal";
            this.btnAnimal.UseVisualStyleBackColor = true;
            // 
            // btnServico
            // 
            this.btnServico.FlatAppearance.BorderSize = 0;
            this.btnServico.FlatStyle = System.Windows.Forms.FlatStyle.Flat;
            this.btnServico.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.btnServico.ForeColor = System.Drawing.Color.White;
            this.btnServico.Location = new System.Drawing.Point(0, 136);
            this.btnServico.Name = "btnServico";
            this.btnServico.Size = new System.Drawing.Size(174, 39);
            this.btnServico.TabIndex = 3;
            this.btnServico.Text = "Serviço";
            this.btnServico.UseVisualStyleBackColor = true;
            // 
            // picLogo
            // 
            this.picLogo.BackgroundImage = ((System.Drawing.Image)(resources.GetObject("picLogo.BackgroundImage")));
            this.picLogo.BackgroundImageLayout = System.Windows.Forms.ImageLayout.Zoom;
            this.picLogo.Location = new System.Drawing.Point(8, 4);
            this.picLogo.Name = "picLogo";
            this.picLogo.Size = new System.Drawing.Size(174, 67);
            this.picLogo.TabIndex = 4;
            this.picLogo.TabStop = false;
            // 
            // pnlTopBar
            // 
            this.pnlTopBar.Anchor = ((System.Windows.Forms.AnchorStyles)(((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Left) 
            | System.Windows.Forms.AnchorStyles.Right)));
            this.pnlTopBar.Controls.Add(this.picLogo);
            this.pnlTopBar.Location = new System.Drawing.Point(0, 0);
            this.pnlTopBar.Name = "pnlTopBar";
            this.pnlTopBar.Size = new System.Drawing.Size(786, 78);
            this.pnlTopBar.TabIndex = 5;
            // 
            // picLinha
            // 
            this.picLinha.Anchor = ((System.Windows.Forms.AnchorStyles)(((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Left) 
            | System.Windows.Forms.AnchorStyles.Right)));
            this.picLinha.BackColor = System.Drawing.Color.DarkGray;
            this.picLinha.Location = new System.Drawing.Point(0, 76);
            this.picLinha.Name = "picLinha";
            this.picLinha.Size = new System.Drawing.Size(786, 1);
            this.picLinha.TabIndex = 6;
            this.picLinha.TabStop = false;
            // 
            // TelaInicial
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(784, 412);
            this.Controls.Add(this.picLinha);
            this.Controls.Add(this.pnlTopBar);
            this.Controls.Add(this.painelNavBar);
            this.Name = "TelaInicial";
            this.Text = "TelaInicial";
            this.painelNavBar.ResumeLayout(false);
            ((System.ComponentModel.ISupportInitialize)(this.picLogo)).EndInit();
            this.pnlTopBar.ResumeLayout(false);
            ((System.ComponentModel.ISupportInitialize)(this.picLinha)).EndInit();
            this.ResumeLayout(false);

        }

        #endregion

        private System.Windows.Forms.Panel painelNavBar;
        private System.Windows.Forms.Button btnServico;
        private System.Windows.Forms.Button btnAnimal;
        private System.Windows.Forms.Button btnCliente;
        private System.Windows.Forms.Button btnFuncionario;
        private System.Windows.Forms.PictureBox picLogo;
        private System.Windows.Forms.Panel pnlTopBar;
        private System.Windows.Forms.PictureBox picLinha;
    }
}