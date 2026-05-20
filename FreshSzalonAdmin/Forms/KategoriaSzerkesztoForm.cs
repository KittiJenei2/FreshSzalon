using MaterialSkin;
using MaterialSkin.Controls;
using System;
using System.Windows.Forms;

namespace FreshSzalonAdmin
{
    public partial class KategoriaSzerkesztoForm : MaterialForm
    {
        DatabaseManager adatbazis = new DatabaseManager();
        int kategoriaId;

        public KategoriaSzerkesztoForm(int id, string nev, string leiras)
        {
            InitializeComponent();
            var skinManager = MaterialSkinManager.Instance;
            skinManager.AddFormToManage(this);
            this.Text = "Kategória módosítása";

            kategoriaId = id;
            txtNev.Text = nev;
            txtLeiras.Text = leiras;
        }

        private void btnMentes_Click_1(object sender, EventArgs e)
        {
            if (string.IsNullOrWhiteSpace(txtNev.Text)) return;

            adatbazis.KategoriaFrissites(kategoriaId, txtNev.Text, txtLeiras.Text);
            MessageBox.Show("Adatok frissítve!", "Siker", MessageBoxButtons.OK, MessageBoxIcon.Information);
            this.DialogResult = DialogResult.OK;
            this.Close();
        }

        private void btnMegse_Click_1(object sender, EventArgs e)
        {
            this.Close();
        }
    }
}