namespace FreshSzalonAdmin
{
    partial class TermekSzerkesztoForm
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
            this.txtNev = new System.Windows.Forms.TextBox();
            this.txtLeiras = new System.Windows.Forms.TextBox();
            this.txtAr = new System.Windows.Forms.TextBox();
            this.cmbKategoria = new System.Windows.Forms.ComboBox();
            this.btnMentes = new MaterialSkin.Controls.MaterialButton();
            this.btnMegse = new MaterialSkin.Controls.MaterialButton();
            this.SuspendLayout();
            // 
            // txtNev
            // 
            this.txtNev.Anchor = ((System.Windows.Forms.AnchorStyles)((((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Bottom) 
            | System.Windows.Forms.AnchorStyles.Left) 
            | System.Windows.Forms.AnchorStyles.Right)));
            this.txtNev.Location = new System.Drawing.Point(6, 86);
            this.txtNev.Name = "txtNev";
            this.txtNev.Size = new System.Drawing.Size(283, 20);
            this.txtNev.TabIndex = 1;
            this.txtNev.Text = "Név";
            // 
            // txtLeiras
            // 
            this.txtLeiras.Anchor = ((System.Windows.Forms.AnchorStyles)((((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Bottom) 
            | System.Windows.Forms.AnchorStyles.Left) 
            | System.Windows.Forms.AnchorStyles.Right)));
            this.txtLeiras.Location = new System.Drawing.Point(6, 112);
            this.txtLeiras.Name = "txtLeiras";
            this.txtLeiras.Size = new System.Drawing.Size(283, 20);
            this.txtLeiras.TabIndex = 2;
            this.txtLeiras.Text = "Leírás";
            // 
            // txtAr
            // 
            this.txtAr.Anchor = ((System.Windows.Forms.AnchorStyles)((((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Bottom) 
            | System.Windows.Forms.AnchorStyles.Left) 
            | System.Windows.Forms.AnchorStyles.Right)));
            this.txtAr.Location = new System.Drawing.Point(6, 138);
            this.txtAr.Name = "txtAr";
            this.txtAr.Size = new System.Drawing.Size(283, 20);
            this.txtAr.TabIndex = 3;
            this.txtAr.Text = "Ár";
            // 
            // cmbKategoria
            // 
            this.cmbKategoria.Anchor = ((System.Windows.Forms.AnchorStyles)(((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Left) 
            | System.Windows.Forms.AnchorStyles.Right)));
            this.cmbKategoria.FormattingEnabled = true;
            this.cmbKategoria.Location = new System.Drawing.Point(6, 164);
            this.cmbKategoria.Name = "cmbKategoria";
            this.cmbKategoria.Size = new System.Drawing.Size(283, 21);
            this.cmbKategoria.TabIndex = 4;
            // 
            // btnMentes
            // 
            this.btnMentes.Anchor = ((System.Windows.Forms.AnchorStyles)((((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Bottom) 
            | System.Windows.Forms.AnchorStyles.Left) 
            | System.Windows.Forms.AnchorStyles.Right)));
            this.btnMentes.AutoSizeMode = System.Windows.Forms.AutoSizeMode.GrowAndShrink;
            this.btnMentes.Density = MaterialSkin.Controls.MaterialButton.MaterialButtonDensity.Default;
            this.btnMentes.Depth = 0;
            this.btnMentes.HighEmphasis = true;
            this.btnMentes.Icon = null;
            this.btnMentes.Location = new System.Drawing.Point(7, 212);
            this.btnMentes.Margin = new System.Windows.Forms.Padding(4, 6, 4, 6);
            this.btnMentes.MouseState = MaterialSkin.MouseState.HOVER;
            this.btnMentes.Name = "btnMentes";
            this.btnMentes.NoAccentTextColor = System.Drawing.Color.Empty;
            this.btnMentes.Size = new System.Drawing.Size(79, 36);
            this.btnMentes.TabIndex = 5;
            this.btnMentes.Text = "Mentés";
            this.btnMentes.Type = MaterialSkin.Controls.MaterialButton.MaterialButtonType.Contained;
            this.btnMentes.UseAccentColor = false;
            this.btnMentes.UseVisualStyleBackColor = true;
            this.btnMentes.Click += new System.EventHandler(this.btnMentes_Click);
            // 
            // btnMegse
            // 
            this.btnMegse.Anchor = ((System.Windows.Forms.AnchorStyles)(((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Bottom) 
            | System.Windows.Forms.AnchorStyles.Left)));
            this.btnMegse.AutoSizeMode = System.Windows.Forms.AutoSizeMode.GrowAndShrink;
            this.btnMegse.Density = MaterialSkin.Controls.MaterialButton.MaterialButtonDensity.Default;
            this.btnMegse.Depth = 0;
            this.btnMegse.HighEmphasis = true;
            this.btnMegse.Icon = null;
            this.btnMegse.Location = new System.Drawing.Point(94, 212);
            this.btnMegse.Margin = new System.Windows.Forms.Padding(4, 6, 4, 6);
            this.btnMegse.MouseState = MaterialSkin.MouseState.HOVER;
            this.btnMegse.Name = "btnMegse";
            this.btnMegse.NoAccentTextColor = System.Drawing.Color.Empty;
            this.btnMegse.Size = new System.Drawing.Size(70, 36);
            this.btnMegse.TabIndex = 6;
            this.btnMegse.Text = "Mégse";
            this.btnMegse.Type = MaterialSkin.Controls.MaterialButton.MaterialButtonType.Contained;
            this.btnMegse.UseAccentColor = false;
            this.btnMegse.UseVisualStyleBackColor = true;
            this.btnMegse.Click += new System.EventHandler(this.btnMegse_Click);
            // 
            // TermekSzerkesztoForm
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(395, 253);
            this.Controls.Add(this.btnMegse);
            this.Controls.Add(this.btnMentes);
            this.Controls.Add(this.cmbKategoria);
            this.Controls.Add(this.txtAr);
            this.Controls.Add(this.txtLeiras);
            this.Controls.Add(this.txtNev);
            this.Name = "TermekSzerkesztoForm";
            this.Text = "TermekSzerkesztoForm";
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.TextBox txtNev;
        private System.Windows.Forms.TextBox txtLeiras;
        private System.Windows.Forms.TextBox txtAr;
        private System.Windows.Forms.ComboBox cmbKategoria;
        private MaterialSkin.Controls.MaterialButton btnMentes;
        private MaterialSkin.Controls.MaterialButton btnMegse;
    }
}