using System;
using System.Data;
using System.Windows.Forms;
using MaterialSkin;
using MaterialSkin.Controls;
using MySqlConnector;


namespace FreshSzalonAdmin
{
    public partial class UjTermekekForm : MaterialForm
    {
        DatabaseManager adatbazis = new DatabaseManager();
        public UjTermekekForm()
        {
            InitializeComponent();

            var skinManager = MaterialSkinManager.Instance;
            skinManager.AddFormToManage(this);

            this.Text = "Új termék hozzáadása";
            KategoriakBetoltese();
        }

        private void KategoriakBetoltese()
        {
            DataTable kategoriak = adatbazis.GetKategoriak();

            cmbKategoria.DataSource = kategoriak;
            cmbKategoria.DisplayMember = "Név";
            cmbKategoria.ValueMember = "Azonosító";
        }

        private void btnMegse_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        private void btnMentes_Click(object sender, EventArgs e)
        {
            if (string.IsNullOrWhiteSpace(txtNev.Text) || cmbKategoria.SelectedValue == null)
            {
                MessageBox.Show("A termék nevének és kategóriájának megadása kötelező!", "Figyelmeztetés", MessageBoxButtons.OK, MessageBoxIcon.Warning);
                return;
            }

            int ar = 0;
            int.TryParse(txtAr.Text, out ar);

            int kategoriaId = Convert.ToInt32(cmbKategoria.SelectedValue);

            bool sikeresMentes = adatbazis.HozzaadUjTermek(txtNev.Text, txtLeiras.Text, ar, kategoriaId);

            if (sikeresMentes)
            {
                MessageBox.Show("Sikeresen felvetted az új terméket!", "Siker", MessageBoxButtons.OK, MessageBoxIcon.Information);
                this.DialogResult = DialogResult.OK;
                this.Close();
            }
            else
            {
                MessageBox.Show("Hiba történt a mentés során! Kérlek ellenőrizd az adatokat.", "Hiba", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }
        }
    }
}

