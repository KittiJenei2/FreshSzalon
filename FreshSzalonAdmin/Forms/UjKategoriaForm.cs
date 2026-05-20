using System;
using System.Windows.Forms;
using MaterialSkin;
using MaterialSkin.Controls;
using MySqlConnector;

namespace FreshSzalonAdmin
{
    public partial class UjKategoriaForm : MaterialForm
    {
        DatabaseManager adatbazis = new DatabaseManager();
        public UjKategoriaForm()
        {
            InitializeComponent();
            var skinManager = MaterialSkinManager.Instance;
            skinManager.AddFormToManage(this);
            this.Text = "Új kategória hozzáadása";
        }

        private void btnMentes_Click(object sender, EventArgs e)
        {
            if (string.IsNullOrWhiteSpace(txtNev.Text))
            {
                MessageBox.Show("A név megadása kötelező!", "Figyelem", MessageBoxButtons.OK, MessageBoxIcon.Warning);
                return;
            }

            if (adatbazis.HozzaadUjKategoria(txtNev.Text, txtLeiras.Text))
            {
                MessageBox.Show("Sikeres mentés!", "Siker", MessageBoxButtons.OK, MessageBoxIcon.Information);
                this.DialogResult = DialogResult.OK;
                this.Close();
            }
        }

        private void btnMegse_Click(object sender, EventArgs e)
        {
            this.Close();
        }
    }
}
