using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.IO;
using System.Linq;
using System.Text;
using System.Windows.Forms;

namespace TP2
{
    public partial class MenuAffichage : Form
    {
        string nomDuCamping;
        Reservation[] mesReservation = null;
        Reservation reservation;

        public MenuAffichage(string nomDuCamping)
        {
            InitializeComponent();
            this.nomDuCamping = nomDuCamping;
        }

        private void button_Quitter_Click(object sender, EventArgs e)
        {
            Close();
        }

        private void MenuAffichage_Load(object sender, EventArgs e)
        {
            label_NomCamping.Text = nomDuCamping;
            richTextBox_Affichage_Reservation.TabStop = false;

            openFileDialog_Reservation.InitialDirectory = Directory.GetCurrentDirectory();

            switch (nomDuCamping)
            {
                case Constante.PARC_MAURICIE: openFileDialog_Reservation.FileName = Constante.FICHIER_RESERVATION_PARC_MAURICIE + ".txt"; break;
                case Constante.MONT_ORFORD: openFileDialog_Reservation.FileName = Constante.FICHIER_RESERVATION_MONT_ORFORD + ".txt"; break;
                case Constante.SAINT_SIMEON: openFileDialog_Reservation.FileName = Constante.FICHIER_RESERVATION_SAINT_SIMEON + ".txt"; break;
            }

            try
            {
                int taille = 0;
                int indice = 0;

                StreamReader lectureTaille = new StreamReader(openFileDialog_Reservation.FileName);
                StreamReader lectureInfo = new StreamReader(openFileDialog_Reservation.FileName);

                if(lectureTaille.Peek() != -1)
                {
                    string nbLigne;

                    while((nbLigne = lectureTaille.ReadLine()) != null)
                    {
                        taille++;
                    }

                    mesReservation = new Reservation[taille];
                    lectureTaille.Close();

                    do
                    {
                        string[] ligne = lectureInfo.ReadLine().Split(';');
                        reservation = new Reservation(Convert.ToInt32(ligne[0]), Convert.ToInt32(ligne[1]), DateTime.Parse(ligne[2]),
                            DateTime.Parse(ligne[3]), Convert.ToInt32(ligne[4]), Convert.ToInt32(ligne[5]),
                            ligne[6], ligne[7], ligne[8], ligne[9], Double.Parse(ligne[10]));

                        mesReservation[indice] = reservation;
                        
                        indice++;

                    } while (!lectureInfo.EndOfStream);
                }
                lectureInfo.Close();

                if(mesReservation != null)
                {
                    for(int i = 0; i < taille; i++)
                    {
                        comboBox_numero_reservation.Items.Add(mesReservation[i].NumeroDeReservation);
                    }
                }
                else
                {
                    richTextBox_Affichage_Reservation.Text = Constante.AUCUNE_RESERVATION;
                }
            }
            catch (Exception)
            {
                richTextBox_Affichage_Reservation.Text = Constante.AUCUNE_RESERVATION;
            }
        }

        private void comboBox_numero_reservation_SelectedIndexChanged(object sender, EventArgs e)
        {
            if(mesReservation != null)
            {
                int prixHebergement = 0;
                int nbPersonne = 0;
                TimeSpan nbNuit = new TimeSpan();

                if (comboBox_numero_reservation.SelectedIndex != -1)
                {
                    reservation = mesReservation[comboBox_numero_reservation.SelectedIndex];
                    nbPersonne = reservation.NombreDAdultes + reservation.NombreDEnfants;
                    nbNuit = reservation.DateFinCamping - reservation.DateDebutCamping;
                }

                if (nomDuCamping == Constante.PARC_MAURICIE)
                {
                    switch (reservation.Hebergement)
                    {
                        case "Terrain rustique": prixHebergement = 9; break;
                        case "Terrain aménagé": prixHebergement = 20; break;
                        case "Véhicule récréatif": prixHebergement = 15; break;
                        case "Prêt-à-Camper": prixHebergement = 45; break;
                    }
                }
                else if (nomDuCamping == Constante.MONT_ORFORD)
                {
                    switch (reservation.Hebergement)
                    {
                        case "Terrain rustique": prixHebergement = 10; break;
                        case "Terrain aménagé": prixHebergement = 25; break;
                        case "Véhicule récréatif": prixHebergement = 30; break;
                        case "Prêt-à-Camper": prixHebergement = 22; break;
                    }
                }
                else
                {
                    switch (reservation.Hebergement)
                    {
                        case "Terrain rustique": prixHebergement = 5; break;
                        case "Terrain aménagé": prixHebergement = 10; break;
                        case "Véhicule récréatif": prixHebergement = 30; break;
                        case "Prêt-à-Camper": prixHebergement = 40; break;
                    }
                }

                richTextBox_Affichage_Reservation.Text = "Camping choisi: " + nomDuCamping
                                                         + "\r\n\r\nRéservé au nom: " + reservation.NomDuClient
                                                         + "\r\n\r\nCourriel de facturation: " + reservation.CourrielDuClient
                                                         + "\r\n\r\nNombre de personnes: " + nbPersonne
                                                         + "\r\n\r\nHébergement choisi et le prix: " + reservation.Hebergement + "(" + prixHebergement + "$)"
                                                         + "\r\n\r\nNombre de nuits: " + nbNuit.TotalDays
                                                         + "\r\n\r\nType de paiement: " + reservation.ModeDePaiement
                                                         + "\r\n\r\nCoût total: " + reservation.CoutTotalCamping + '$'; ;
            }
        }
    }
}
