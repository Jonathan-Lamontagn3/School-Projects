using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Media;
using System.Text;
using System.Windows.Forms;

namespace TP2
{
    public partial class Principal : Form
    {
        private string path = Application.StartupPath + "\\";
        private Camping monCamping;

        SoundPlayer ambiance = new SoundPlayer();

        public Principal()
        {
            InitializeComponent();
        }

        private void button_Quitter_Click(object sender, EventArgs e)
        {
            Application.Exit();
        }

        private void radioButton_Parc_Mauricie_CheckedChanged(object sender, EventArgs e)
        {
            pictureBox_Image_Parc.ImageLocation = path + "camping01.jpg";
            monCamping = new Camping(1, Constante.PARC_MAURICIE, pictureBox_Image_Parc.ImageLocation);

            button_reservation.Enabled = true;

            ambiance.SoundLocation = path + "huard.wav";

            if (radioButton_Parc_Mauricie.Checked)
            {
                ambiance.Play();
            }
        }

        private void radioButton_Parc_MontOrford_CheckedChanged(object sender, EventArgs e)
        {
            pictureBox_Image_Parc.ImageLocation = path + "camping02.jpg";
            monCamping = new Camping(2, Constante.MONT_ORFORD, pictureBox_Image_Parc.ImageLocation);

            button_reservation.Enabled = true;

            ambiance.SoundLocation = path + "oiseaux.wav";

            if (radioButton_Parc_MontOrford.Checked)
            {
                ambiance.Play();
            }
        }

        private void radioButton_Saint_Simeon_CheckedChanged(object sender, EventArgs e)
        {
            pictureBox_Image_Parc.ImageLocation = path + "camping03.jpg";
            monCamping = new Camping(3, Constante.SAINT_SIMEON, pictureBox_Image_Parc.ImageLocation);

            button_reservation.Enabled = true;

            ambiance.SoundLocation = path + "mer.wav";

            if (radioButton_Saint_Simeon.Checked)
            {
                ambiance.Play();
            }
        }

        private void Principal_Load(object sender, EventArgs e)
        {
            button_reservation.Enabled = false;
        }

        private void button_reservation_Click(object sender, EventArgs e)
        {
            ReservationClient nouvelleReservation = new ReservationClient(monCamping);
            nouvelleReservation.ShowDialog();
        }

        private void Principal_FormClosing(object sender, FormClosingEventArgs e)
        {
            DialogResult result = MessageBox.Show(Constante.QUITTER, "Quitter", MessageBoxButtons.YesNo);
            
            if (result == DialogResult.No)
            {
                e.Cancel = true;
            }
        }
    }
}
