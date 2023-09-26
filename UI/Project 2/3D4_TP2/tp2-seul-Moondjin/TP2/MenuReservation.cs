using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.IO;
using System.Linq;
using System.Text;
using System.Text.RegularExpressions;
using System.Windows.Forms;

namespace TP2
{
    public partial class ReservationClient : Form
    {
        private Camping monCamping;
        TimeSpan nombreDeNuit;
        int nombreDAdulte, nombreDEnfant, prixHebergement;
        double coutTotalCamping;

        private Boolean validation_Etape1_Date = false;
        private Boolean validation_Etape2_Capacite = false;
        private Boolean validation_Etape3_Hebergement = false;
        private Boolean validation_Etape4_Nom = false;
        private Boolean validation_Etape4_Email = false;
        private Boolean validation_Etape4_ModePaiement = false;

        public ReservationClient(Camping camping)
        {
            InitializeComponent();
            monCamping = camping;
        }

        private void ReservationClient_Load(object sender, EventArgs e)
        {
            richTextBox_Facture.TabStop = false;
            pictureBox_Apercu_Camping.ImageLocation = monCamping.ImagePath;
            label_Titre_Camping.Text = monCamping.NomDuCamping;
            button_Confirmer_Reservation.Enabled = false;
            toolStripStatusLabel_Sauvegarde.Text = "";

            saveFileDialog_Reservation.InitialDirectory = Directory.GetCurrentDirectory();
            saveFileDialog_Reservation.Filter = "Fichier texte|*.txt";
            saveFileDialog_Reservation.Title = "Sauvegarde d'un fichier";
        }

        private void dateTimePicker_DebutCamping_ValueChanged(object sender, EventArgs e)
        {
            validation_date();
            verifier_toutValide();
            faire_facture();
        }

        private void dateTimePicker_FinCamping_ValueChanged(object sender, EventArgs e)
        {
            validation_date();
            verifier_toutValide();
            faire_facture();
        }

        private void validation_date()
        {
            if(dateTimePicker_FinCamping.Value > dateTimePicker_DebutCamping.Value)
            {
                validation_Etape1_Date = true;
                errorProvider_ETAPE1_Date.Clear();

                calculer_nombreDeNuit();
            }
            else
            {
                validation_Etape1_Date = false;
                errorProvider_ETAPE1_Date.SetError(dateTimePicker_FinCamping, Constante.ERREUR_ETAPE1_DATE);
            }
        }

        private void numericUpDown_Nombre_Adulte_ValueChanged(object sender, EventArgs e)
        {
            validation_capacite();
            verifier_toutValide();
            faire_facture();
        }

        private void numericUpDown_Nombre_Enfant_ValueChanged(object sender, EventArgs e)
        {
            validation_capacite();
            verifier_toutValide();
            faire_facture();
        }

        private void validation_capacite()
        {
            if(numericUpDown_Nombre_Adulte.Value + numericUpDown_Nombre_Enfant.Value > Constante.CAPACITER_PERSONNE_MIN && 
               numericUpDown_Nombre_Adulte.Value + numericUpDown_Nombre_Enfant.Value <= Constante.CAPACITER_PERSONNE_MAX)
            {
                nombreDAdulte = Convert.ToInt32(numericUpDown_Nombre_Adulte.Value);
                nombreDEnfant = Convert.ToInt32(numericUpDown_Nombre_Enfant.Value);

                validation_Etape2_Capacite = true;
                errorProvider_ETAPE2_Capacite.Clear();
            }
            else
            {
                validation_Etape2_Capacite = false;
                errorProvider_ETAPE2_Capacite.SetError(numericUpDown_Nombre_Adulte, Constante.ERREUR_ETAPE2_CAPACITE);

                if(numericUpDown_Nombre_Adulte.Value == 0)
                {
                    nombreDAdulte = 0;
                }

                if(numericUpDown_Nombre_Enfant.Value == 0)
                {
                    nombreDEnfant = 0;
                }
            }
        }

        private void listBox_Choix_Hebergement_SelectedIndexChanged(object sender, EventArgs e)
        {
            validation_hebergement();
            verifier_toutValide();
            faire_facture();
        }

        private void validation_hebergement()
        {
            if (listBox_Choix_Hebergement.SelectedIndex != -1)
            {
                validation_Etape3_Hebergement = true;
            }
            else
            {
                validation_Etape3_Hebergement = false;
            }
        }

        private void textBox_Name_TextChanged(object sender, EventArgs e)
        {
            validation_nom();
            verifier_toutValide();
        }

        private void validation_nom()
        {
            if(textBox_Name.TextLength > 0)
            {
                foreach(char c in textBox_Name.Text)
                {
                    if (char.IsLetter(c) || char.IsWhiteSpace(c))
                    {
                        validation_Etape4_Nom = true;

                    }
                    else
                    {
                        validation_Etape4_Nom = false;
                        break;
                    }
                }
            }
            else
            {
                validation_Etape4_Nom = false;
            }

            if (!validation_Etape4_Nom)
            {
                errorProvider_ETAPE4_Nom.SetError(textBox_Name, Constante.ERREUR_ETAPE4_NAME);
            }
            else
            {
                errorProvider_ETAPE4_Nom.Clear();
            }
        }

        private void textBox_Email_TextChanged(object sender, EventArgs e)
        {
            validation_email();
            verifier_toutValide();
        }

        private void validation_email()
        {
            Regex regex = new Regex("^[a-z0-9]+(\\.[a-z0-9])*@[a-z]+\\.([a-z]+\\.)*[a-z]{2,3}$");

            if (regex.IsMatch(textBox_Email.Text))
            {
                validation_Etape4_Email = true;
                errorProvider_ETAPE4_Email.Clear();
            }
            else
            {
                validation_Etape4_Email = false;
                errorProvider_ETAPE4_Email.SetError(textBox_Email, Constante.ERREUR_ETAPE4_EMAIL);
            }
        }

        private void comboBox_MethodePaiement_SelectedIndexChanged(object sender, EventArgs e)
        {
            validation_modePaiement();
            verifier_toutValide();
        }

        private void validation_modePaiement()
        {
            if (comboBox_MethodePaiement.SelectedIndex != -1)
            {
                validation_Etape4_ModePaiement = true;
            }
            else
            {
                validation_Etape4_ModePaiement = false;
            }
        }

        private void verifier_toutValide()
        {
            if(validation_Etape1_Date && validation_Etape2_Capacite && validation_Etape3_Hebergement && 
               validation_Etape4_Nom && validation_Etape4_Email && validation_Etape4_ModePaiement)
            {
                button_Confirmer_Reservation.Enabled = true;
            }
            else
            {
                button_Confirmer_Reservation.Enabled = false;
            }

            toolStripStatusLabel_Sauvegarde.Text = "";
        }

        private void calculer_nombreDeNuit()
        {
            DateTime debutCamping = DateTime.Parse(dateTimePicker_DebutCamping.Text);
            DateTime finCamping = DateTime.Parse(dateTimePicker_FinCamping.Text);

            nombreDeNuit = finCamping - debutCamping;
        }

        private void faire_facture()
        {
            string typeHebergement = "";
            Reservation facture;

            switch (monCamping.NomDuCamping)
            {
                case Constante.PARC_MAURICIE: coutTotalCamping = calculer_cout_parc_mauricie(); break;
                case Constante.MONT_ORFORD: coutTotalCamping = calculer_cout_mont_orford(); break;
                case Constante.SAINT_SIMEON: coutTotalCamping = calculer_cout_saint_simeon(); break;
            }

            if (validation_Etape3_Hebergement)
            {
                typeHebergement = listBox_Choix_Hebergement.SelectedItem.ToString();
            }

            facture = new Reservation(typeHebergement, Convert.ToInt32(nombreDeNuit.TotalDays), coutTotalCamping, prixHebergement);
            richTextBox_Facture.Text = facture.AfficherFacture();
        }

        private double calculer_cout_parc_mauricie()
        {
            int coutPersonne = (nombreDAdulte * 25) + (nombreDEnfant * 7);

            if (validation_Etape3_Hebergement)
            {
                switch (listBox_Choix_Hebergement.SelectedIndex)
                {
                    case 0: prixHebergement = 9; break;
                    case 1: prixHebergement = 20; break;
                    case 2: prixHebergement = 15; break;
                    case 3: prixHebergement = 45; break;
                }
            }
            else
            {
                prixHebergement = 0;
            }

            return Convert.ToInt32(nombreDeNuit.TotalDays) * (coutPersonne + prixHebergement);
        }

        private void retourAuMenuPrincipalToolStripMenuItem_Click(object sender, EventArgs e)
        {
            Close();
        }

        private void nouvelleRéservationToolStripMenuItem_Click(object sender, EventArgs e)
        {
            dateTimePicker_DebutCamping.ResetText();
            dateTimePicker_FinCamping.ResetText();

            numericUpDown_Nombre_Adulte.Value = 0;
            numericUpDown_Nombre_Enfant.Value = 0;

            listBox_Choix_Hebergement.SelectedIndex = -1;
            listBox_Choix_Hebergement.ResetText();

            textBox_Name.Clear();
            textBox_Email.Clear();
            comboBox_MethodePaiement.SelectedIndex = -1;
            comboBox_MethodePaiement.ResetText();

            richTextBox_Facture.Clear();

            errorProvider_ETAPE1_Date.Clear();
            errorProvider_ETAPE2_Capacite.Clear();
            errorProvider_ETAPE4_Nom.Clear();
            errorProvider_ETAPE4_Email.Clear();
        }

        private void button_Confirmer_Reservation_Click(object sender, EventArgs e)
        {
            int numeroDeReservation;

            switch (monCamping.NomDuCamping)
            {
                case Constante.PARC_MAURICIE: saveFileDialog_Reservation.FileName = Constante.FICHIER_RESERVATION_PARC_MAURICIE; break;
                case Constante.MONT_ORFORD: saveFileDialog_Reservation.FileName = Constante.FICHIER_RESERVATION_MONT_ORFORD; break;
                case Constante.SAINT_SIMEON: saveFileDialog_Reservation.FileName = Constante.FICHIER_RESERVATION_SAINT_SIMEON; break;
            }

            if(saveFileDialog_Reservation.ShowDialog() == DialogResult.OK)
            {
                try
                {
                    numeroDeReservation = 1;
                    string nombreDeReservationActuelle;
                    TextReader reader = new StreamReader(saveFileDialog_Reservation.FileName);

                    while((nombreDeReservationActuelle = reader.ReadLine()) != null)
                    {
                        numeroDeReservation++;
                    }

                    reader.Close();
                }
                catch (Exception)
                {
                    numeroDeReservation = 1;
                }

                Reservation nouvelleReservation = new Reservation(numeroDeReservation, monCamping.NumeroDuCamping, dateTimePicker_DebutCamping.Value,
                    dateTimePicker_FinCamping.Value, nombreDAdulte, nombreDEnfant, listBox_Choix_Hebergement.SelectedItem.ToString(), textBox_Name.Text,
                    textBox_Email.Text, comboBox_MethodePaiement.Text, coutTotalCamping);

                StreamWriter writer = new StreamWriter(saveFileDialog_Reservation.FileName, true);
                writer.WriteLine(nouvelleReservation.ToString());
                writer.Close();

                toolStripStatusLabel_Sauvegarde.Text = "Réservation sauvegardée dans le fichier.";
            }
        }

        private void faireLaRToolStripMenuItem_Click(object sender, EventArgs e)
        {
            if(button_Confirmer_Reservation.Enabled == true)
            {
                button_Confirmer_Reservation_Click(sender, e);
            }
        }

        private void afficherLesRéservationToolStripMenuItem_Click(object sender, EventArgs e)
        {
            MenuAffichage affichageReservation = new MenuAffichage(monCamping.NomDuCamping);
            affichageReservation.ShowDialog();
        }

        private double calculer_cout_mont_orford()
        {
            int coutPersonne = (nombreDAdulte * 12) + (nombreDEnfant * 8);

            if (validation_Etape3_Hebergement)
            {
                switch (listBox_Choix_Hebergement.SelectedIndex)
                {
                    case 0: prixHebergement = 10; break;
                    case 1: prixHebergement = 25; break;
                    case 2: prixHebergement = 30; break;
                    case 3: prixHebergement = 22; break;
                }
            }
            else
            {
                prixHebergement = 0;
            }

            return Convert.ToInt32(nombreDeNuit.TotalDays) * (coutPersonne + prixHebergement);
        }

        private double calculer_cout_saint_simeon()
        {
            int coutPersonne = nombreDAdulte * 20;

            if (validation_Etape3_Hebergement)
            {
                switch (listBox_Choix_Hebergement.SelectedIndex)
                {
                    case 0: prixHebergement = 5; break;
                    case 1: prixHebergement = 10; break;
                    case 2: prixHebergement = 30; break;
                    case 3: prixHebergement = 40; break;
                }
            }
            else
            {
                prixHebergement = 0;
            }

            return Convert.ToInt32(nombreDeNuit.TotalDays) * (coutPersonne + prixHebergement);
        }
    }
}
