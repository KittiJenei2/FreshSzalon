using System;
using System.Data;
using System.Windows.Forms;
using MaterialSkin;
using MaterialSkin.Controls;

namespace FreshSzalonAdmin
{
    public partial class TermekSzerkesztoForm : MaterialForm
    {
        DatabaseManager adatbazis = new DatabaseManager();

        int szerkesztettTermekId;

        public TermekSzerkesztoForm(int id, string nev, string leiras, int ar, int kategoriaId)
        {
            InitializeComponent();

            var skinManager = MaterialSkinManager.Instance;
            skinManager.AddFormToManage(this);
            this.Text = "Termék módosítása";

            szerkesztettTermekId = id;

            KategoriakBetoltese();

            txtNev.Text = nev;
            txtLeiras.Text = leiras;
            txtAr.Text = ar.ToString();

            cmbKategoria.SelectedValue = kategoriaId;
        }

        private void KategoriakBetoltese()
        {
            DataTable kategoriak = adatbazis.GetKategoriak();
            cmbKategoria.DataSource = kategoriak;
            cmbKategoria.DisplayMember = "Név";
            cmbKategoria.ValueMember = "Azonosító";
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

            adatbazis.TermekFrissites(szerkesztettTermekId, txtNev.Text, txtLeiras.Text, ar, kategoriaId);

            MessageBox.Show("Sikeresen módosítottad a termék adatait!", "Siker", MessageBoxButtons.OK, MessageBoxIcon.Information);
            this.DialogResult = DialogResult.OK;
            this.Close();
        }

        private void btnMegse_Click(object sender, EventArgs e)
        {
            this.Close();
        }
    }
}