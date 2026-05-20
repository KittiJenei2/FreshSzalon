namespace FreshSzalonAdmin
{
    partial class KategoriaSzerkesztoForm
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
            this.txtNev = new MaterialSkin.Controls.MaterialTextBox();
            this.txtLeiras = new MaterialSkin.Controls.MaterialTextBox();
            this.btnMentes = new MaterialSkin.Controls.MaterialButton();
            this.btnMegse = new MaterialSkin.Controls.MaterialButton();
            this.SuspendLayout();
            // 
            // txtNev
            // 
            this.txtNev.Anchor = ((System.Windows.Forms.AnchorStyles)((((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Bottom) 
            | System.Windows.Forms.AnchorStyles.Left) 
            | System.Windows.Forms.AnchorStyles.Right)));
            this.txtNev.AnimateReadOnly = false;
            this.txtNev.BorderStyle = System.Windows.Forms.BorderStyle.None;
            this.txtNev.Depth = 0;
            this.txtNev.Font = new System.Drawing.Font("Roboto", 16F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Pixel);
            this.txtNev.Hint = "Kategória neve";
            this.txtNev.LeadingIcon = null;
            this.txtNev.Location = new System.Drawing.Point(6, 80);
            this.txtNev.MaxLength = 50;
            this.txtNev.MouseState = MaterialSkin.MouseState.OUT;
            this.txtNev.Multiline = false;
            this.txtNev.Name = "txtNev";
            this.txtNev.Size = new System.Drawing.Size(379, 50);
            this.txtNev.TabIndex = 1;
            this.txtNev.Text = "";
            this.txtNev.TrailingIcon = null;
            // 
            // txtLeiras
            // 
            this.txtLeiras.Anchor = ((System.Windows.Forms.AnchorStyles)(((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Left) 
            | System.Windows.Forms.AnchorStyles.Right)));
            this.txtLeiras.AnimateReadOnly = false;
            this.txtLeiras.BorderStyle = System.Windows.Forms.BorderStyle.None;
            this.txtLeiras.Depth = 0;
            this.txtLeiras.Font = new System.Drawing.Font("Roboto", 16F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Pixel);
            this.txtLeiras.Hint = "Leírás";
            this.txtLeiras.LeadingIcon = null;
            this.txtLeiras.Location = new System.Drawing.Point(6, 136);
            this.txtLeiras.MaxLength = 50;
            this.txtLeiras.MouseState = MaterialSkin.MouseState.OUT;
            this.txtLeiras.Multiline = false;
            this.txtLeiras.Name = "txtLeiras";
            this.txtLeiras.Size = new System.Drawing.Size(379, 50);
            this.txtLeiras.TabIndex = 2;
            this.txtLeiras.Text = "";
            this.txtLeiras.TrailingIcon = null;
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
            this.btnMentes.Location = new System.Drawing.Point(6, 195);
            this.btnMentes.Margin = new System.Windows.Forms.Padding(4, 6, 4, 6);
            this.btnMentes.MouseState = MaterialSkin.MouseState.HOVER;
            this.btnMentes.Name = "btnMentes";
            this.btnMentes.NoAccentTextColor = System.Drawing.Color.Empty;
            this.btnMentes.Size = new System.Drawing.Size(79, 36);
            this.btnMentes.TabIndex = 3;
            this.btnMentes.Text = "Mentés";
            this.btnMentes.Type = MaterialSkin.Controls.MaterialButton.MaterialButtonType.Contained;
            this.btnMentes.UseAccentColor = false;
            this.btnMentes.UseVisualStyleBackColor = true;
            this.btnMentes.Click += new System.EventHandler(this.btnMentes_Click_1);
            // 
            // btnMegse
            // 
            this.btnMegse.Anchor = ((System.Windows.Forms.AnchorStyles)((((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Bottom) 
            | System.Windows.Forms.AnchorStyles.Left) 
            | System.Windows.Forms.AnchorStyles.Right)));
            this.btnMegse.AutoSizeMode = System.Windows.Forms.AutoSizeMode.GrowAndShrink;
            this.btnMegse.Density = MaterialSkin.Controls.MaterialButton.MaterialButtonDensity.Default;
            this.btnMegse.Depth = 0;
            this.btnMegse.HighEmphasis = true;
            this.btnMegse.Icon = null;
            this.btnMegse.Location = new System.Drawing.Point(93, 195);
            this.btnMegse.Margin = new System.Windows.Forms.Padding(4, 6, 4, 6);
            this.btnMegse.MouseState = MaterialSkin.MouseState.HOVER;
            this.btnMegse.Name = "btnMegse";
            this.btnMegse.NoAccentTextColor = System.Drawing.Color.Empty;
            this.btnMegse.Size = new System.Drawing.Size(70, 36);
            this.btnMegse.TabIndex = 4;
            this.btnMegse.Text = "Mégse";
            this.btnMegse.Type = MaterialSkin.Controls.MaterialButton.MaterialButtonType.Contained;
            this.btnMegse.UseAccentColor = false;
            this.btnMegse.UseVisualStyleBackColor = true;
            this.btnMegse.Click += new System.EventHandler(this.btnMegse_Click_1);
            // 
            // KategoriaSzerkesztoForm
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(392, 244);
            this.Controls.Add(this.btnMegse);
            this.Controls.Add(this.btnMentes);
            this.Controls.Add(this.txtLeiras);
            this.Controls.Add(this.txtNev);
            this.Name = "KategoriaSzerkesztoForm";
            this.Text = "KategoriaSzerkesztoForm";
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private MaterialSkin.Controls.MaterialTextBox txtNev;
        private MaterialSkin.Controls.MaterialTextBox txtLeiras;
        private MaterialSkin.Controls.MaterialButton btnMentes;
        private MaterialSkin.Controls.MaterialButton btnMegse;
    }
}