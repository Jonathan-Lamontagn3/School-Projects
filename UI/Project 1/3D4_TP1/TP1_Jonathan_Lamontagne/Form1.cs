using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Windows.Forms;

namespace TP1_Jonathan_Lamontagne
{
    /**
     * Application servant à rentrer les notes d'étudiant dans des groupes de dix maximum pour faire leur bulletin.
     * Elle peut effacer tousles information à l'écran en utilisant le bouton effacer ou les sauvegarder dans un groupe lorsque le bouton sauvegarder est utilisée.
     * Peut importe l'onglet que l'on utilise on peut utiliser le boutons quitter pour sortir du programme.
     * On peut dans l'onglet afficher les notes de l'étudiant selectionner.
     */
    public partial class Form_TP1 : Form
    {
        Boolean validerNom = false, validerCodePermanent = false, validerNoteMatiere1 = true, validerNoteMatiere2 = true,
                validerNoteMatiere3 = true, validerNoteMatiere4 = true, validerNoteMatiere5 = true;

        TabEtudiant groupe71;
        TabEtudiant groupe72;

        public Form_TP1()
        {
            InitializeComponent();
        }

        // Verification du respect de la validation du code permanent et errorProvider.
        private void textBox_CodePermanent_TextChanged(object sender, EventArgs e)
        {
            foreach(char c in textBox_CodePermanent.Text)
            {
                if (!char.IsDigit(c) || textBox_CodePermanent.TextLength != 10 )
                {
                    validerCodePermanent = false;
                    break;
                }
                else
                {
                    validerCodePermanent = true;
                }
            }

            if (!validerCodePermanent)
            {
                errorProvider_CodePermanent.SetError(textBox_CodePermanent, Constantes.ERREUR_CODE_PERMANENT);
            }
            else
            {
                errorProvider_CodePermanent.Clear();
            }
        }

        // Validation que la note de la première matière est bien entre 0 et 100.
        private void numericUpDown_Note_Matiere1_ValueChanged(object sender, EventArgs e)
        {
            if(numericUpDown_Note_Matiere1.Value >= 0 && numericUpDown_Note_Matiere1.Value <= 100)
            {
                validerNoteMatiere1 = true;
            }
            else
            {
                validerNoteMatiere1 = false;
            }

            if(!validerNoteMatiere1)
            {
                errorProvider_Note.SetError(numericUpDown_Note_Matiere1, Constantes.ERREUR_NOTES);
            }
            else if (validerNoteMatiere1 && validerNoteMatiere2 && validerNoteMatiere3 && validerNoteMatiere4 && validerNoteMatiere5)
            {
                errorProvider_Note.Clear();
            }
        }

        // Validation que la note de la deuxième matière est bien entre 0 et 100.
        private void numericUpDown_Note_Matiere2_ValueChanged(object sender, EventArgs e)
        {
            if (numericUpDown_Note_Matiere2.Value >= 0 && numericUpDown_Note_Matiere2.Value <= 100)
            {
                validerNoteMatiere2 = true;
            }
            else
            {
                validerNoteMatiere2 = false;
            }

            if (!validerNoteMatiere2)
            {
                errorProvider_Note.SetError(numericUpDown_Note_Matiere2, Constantes.ERREUR_NOTES);
            }
            else if(validerNoteMatiere1 && validerNoteMatiere2 && validerNoteMatiere3 && validerNoteMatiere4 && validerNoteMatiere5)
            {
                errorProvider_Note.Clear();
            }
        }

        // Validation que la note de la troisième matière est bien entre 0 et 100.
        private void numericUpDown_Note_Matiere3_ValueChanged(object sender, EventArgs e)
        {
            if (numericUpDown_Note_Matiere3.Value >= 0 && numericUpDown_Note_Matiere3.Value <= 100)
            {
                validerNoteMatiere3 = true;
            }
            else
            {
                validerNoteMatiere3 = false;
            }

            if (!validerNoteMatiere3)
            {
                errorProvider_Note.SetError(numericUpDown_Note_Matiere3, Constantes.ERREUR_NOTES);
            }
            else if(validerNoteMatiere1 && validerNoteMatiere2 && validerNoteMatiere3 && validerNoteMatiere4 && validerNoteMatiere5)
            {
                errorProvider_Note.Clear();
            }
        }

        // Validation que la note de la quatrième matière est bien entre 0 et 100.
        private void numericUpDown_Note_Matiere4_ValueChanged(object sender, EventArgs e)
        {
            if (numericUpDown_Note_Matiere4.Value >= 0 && numericUpDown_Note_Matiere4.Value <= 100)
            {
                validerNoteMatiere4 = true;
            }
            else
            {
                validerNoteMatiere4 = false;
            }

            if (!validerNoteMatiere4)
            {
                errorProvider_Note.SetError(numericUpDown_Note_Matiere4, Constantes.ERREUR_NOTES);
            }
            else if(validerNoteMatiere1 && validerNoteMatiere2 && validerNoteMatiere3 && validerNoteMatiere4 && validerNoteMatiere5)
            {
                errorProvider_Note.Clear();
            }
        }

        // Validation que la note de la dernière matière est bien entre 0 et 100.
        private void numericUpDown_Note_Matiere5_ValueChanged(object sender, EventArgs e)
        {
            if (numericUpDown_Note_Matiere5.Value >= 0 && numericUpDown_Note_Matiere5.Value <= 100)
            {
                validerNoteMatiere5 = true;
            }
            else
            {
                validerNoteMatiere5 = false;
            }

            if (!validerNoteMatiere5)
            {
                errorProvider_Note.SetError(numericUpDown_Note_Matiere5, Constantes.ERREUR_NOTES);
            }
            else if(validerNoteMatiere1 && validerNoteMatiere2 && validerNoteMatiere3 && validerNoteMatiere4 && validerNoteMatiere5)
            {
                errorProvider_Note.Clear();
            }
        }

        // Affichage du bulletin de l'etudiant selectionner.
        private void listBox_Etudiant_SelectedIndexChanged(object sender, EventArgs e)
        {
            Etudiant etudiant;

            if (comboBox_Groupe2.SelectedIndex == 0)
            {
                try
                {
                    etudiant = groupe71.obtenirEtudiant(listBox_Etudiant.SelectedIndex);

                    if(listBox_Etudiant.SelectedIndex != -1)
                    {
                        textBox_Bulletin_Note1.Text = etudiant.obtenirNoteEtudiant(0).ToString();
                        textBox_Bulletin_Note2.Text = etudiant.obtenirNoteEtudiant(1).ToString();
                        textBox_Bulletin_Note3.Text = etudiant.obtenirNoteEtudiant(2).ToString();
                        textBox_Bulletin_Note4.Text = etudiant.obtenirNoteEtudiant(3).ToString();
                        textBox_Bulletin_Note5.Text = etudiant.obtenirNoteEtudiant(4).ToString();

                        textBox_Bulletin_Matiere1.Text = etudiant.obtenirMatiere(0);
                        textBox_Bulletin_Matiere2.Text = etudiant.obtenirMatiere(1);
                        textBox_Bulletin_Matiere3.Text = etudiant.obtenirMatiere(2);
                        textBox_Bulletin_Matiere4.Text = etudiant.obtenirMatiere(3);
                        textBox_Bulletin_Matiere5.Text = etudiant.obtenirMatiere(4);

                        textBox_Bulletin_Moyenne1.Text = groupe71.obtenirMoyenne(0).ToString();
                        textBox_Bulletin_Moyenne2.Text = groupe71.obtenirMoyenne(1).ToString();
                        textBox_Bulletin_Moyenne3.Text = groupe71.obtenirMoyenne(2).ToString();
                        textBox_Bulletin_Moyenne4.Text = groupe71.obtenirMoyenne(3).ToString();
                        textBox_Bulletin_Moyenne5.Text = groupe71.obtenirMoyenne(4).ToString();
                    }
                }
                catch (NullReferenceException)
                {
                    textBox_Bulletin_Note1.Clear();
                    textBox_Bulletin_Note2.Clear();
                    textBox_Bulletin_Note3.Clear();
                    textBox_Bulletin_Note4.Clear();
                    textBox_Bulletin_Note5.Clear();

                    textBox_Bulletin_Matiere1.Clear();
                    textBox_Bulletin_Matiere2.Clear();
                    textBox_Bulletin_Matiere3.Clear();
                    textBox_Bulletin_Matiere4.Clear();
                    textBox_Bulletin_Matiere5.Clear();

                    textBox_Bulletin_Moyenne1.Clear();
                    textBox_Bulletin_Moyenne2.Clear();
                    textBox_Bulletin_Moyenne3.Clear();
                    textBox_Bulletin_Moyenne4.Clear();
                    textBox_Bulletin_Moyenne5.Clear();

                    label_Note_Moyenne_Generale.Text = string.Empty;
                }
     
            } 
            else if(comboBox_Groupe2.SelectedIndex == 1)
            {
                try
                {
                    etudiant = groupe72.obtenirEtudiant(listBox_Etudiant.SelectedIndex);

                    if(listBox_Etudiant.SelectedIndex != -1)
                    {
                        textBox_Bulletin_Note1.Text = etudiant.obtenirNoteEtudiant(0).ToString();
                        textBox_Bulletin_Note2.Text = etudiant.obtenirNoteEtudiant(1).ToString();
                        textBox_Bulletin_Note3.Text = etudiant.obtenirNoteEtudiant(2).ToString();
                        textBox_Bulletin_Note4.Text = etudiant.obtenirNoteEtudiant(3).ToString();
                        textBox_Bulletin_Note5.Text = etudiant.obtenirNoteEtudiant(4).ToString();

                        textBox_Bulletin_Matiere1.Text = etudiant.obtenirMatiere(0);
                        textBox_Bulletin_Matiere2.Text = etudiant.obtenirMatiere(1);
                        textBox_Bulletin_Matiere3.Text = etudiant.obtenirMatiere(2);
                        textBox_Bulletin_Matiere4.Text = etudiant.obtenirMatiere(3);
                        textBox_Bulletin_Matiere5.Text = etudiant.obtenirMatiere(4);

                        textBox_Bulletin_Moyenne1.Text = groupe72.obtenirMoyenne(0).ToString();
                        textBox_Bulletin_Moyenne2.Text = groupe72.obtenirMoyenne(1).ToString();
                        textBox_Bulletin_Moyenne3.Text = groupe72.obtenirMoyenne(2).ToString();
                        textBox_Bulletin_Moyenne4.Text = groupe72.obtenirMoyenne(3).ToString();
                        textBox_Bulletin_Moyenne5.Text = groupe72.obtenirMoyenne(4).ToString();
                    }

                }
                catch (NullReferenceException)
                {
                    textBox_Bulletin_Note1.Clear();
                    textBox_Bulletin_Note2.Clear();
                    textBox_Bulletin_Note3.Clear();
                    textBox_Bulletin_Note4.Clear();
                    textBox_Bulletin_Note5.Clear();

                    textBox_Bulletin_Matiere1.Clear();
                    textBox_Bulletin_Matiere2.Clear();
                    textBox_Bulletin_Matiere3.Clear();
                    textBox_Bulletin_Matiere4.Clear();
                    textBox_Bulletin_Matiere5.Clear();

                    textBox_Bulletin_Moyenne1.Clear();
                    textBox_Bulletin_Moyenne2.Clear();
                    textBox_Bulletin_Moyenne3.Clear();
                    textBox_Bulletin_Moyenne4.Clear();
                    textBox_Bulletin_Moyenne5.Clear();

                    label_Note_Moyenne_Generale.Text = string.Empty; 
                }

            }

            try
            {
                int note1, note2, note3, note4, note5;
                double moyenneGenerale;

                note1 = int.Parse(textBox_Bulletin_Note1.Text);
                note2 = int.Parse(textBox_Bulletin_Note2.Text);
                note3 = int.Parse(textBox_Bulletin_Note3.Text);
                note4 = int.Parse(textBox_Bulletin_Note4.Text);
                note5 = int.Parse(textBox_Bulletin_Note5.Text);

                moyenneGenerale = (double)(note1 + note2 + note3 + note4 + note5) / 5;

                label_Note_Moyenne_Generale.Text = moyenneGenerale.ToString();

                if (moyenneGenerale < 60)
                {
                    label_Note_Moyenne_Generale.ForeColor = Color.Red;
                }
                else
                {
                    label_Note_Moyenne_Generale.ForeColor = Color.Green;
                }
            }
            catch (FormatException)
            {
                label_Note_Moyenne_Generale.Text = string.Empty;
            }

        }

        //Affichage de la liste d'etudiant du groupe selectionner.
        private void comboBox_Groupe2_SelectedIndexChanged(object sender, EventArgs e)
        {
            textBox_Bulletin_Note1.Clear();
            textBox_Bulletin_Note2.Clear();
            textBox_Bulletin_Note3.Clear();
            textBox_Bulletin_Note4.Clear();
            textBox_Bulletin_Note5.Clear();

            textBox_Bulletin_Matiere1.Clear();
            textBox_Bulletin_Matiere2.Clear();
            textBox_Bulletin_Matiere3.Clear();
            textBox_Bulletin_Matiere4.Clear();
            textBox_Bulletin_Matiere5.Clear();

            label_Note_Moyenne_Generale.Text = string.Empty;

            textBox_Bulletin_Moyenne1.Clear();
            textBox_Bulletin_Moyenne2.Clear();
            textBox_Bulletin_Moyenne3.Clear();
            textBox_Bulletin_Moyenne4.Clear();
            textBox_Bulletin_Moyenne5.Clear();

            if (comboBox_Groupe2.SelectedIndex == 0)
            {
                listBox_Etudiant.Items.Clear();

                for (int indice = 0; indice < groupe71.taille(); indice++)
                {
                    listBox_Etudiant.Items.Add(groupe71.obtenirEtudiant(indice).Nom);
                }
            } 
            else if (comboBox_Groupe2.SelectedIndex == 1)
            {
                listBox_Etudiant.Items.Clear();

                for (int indice = 0; indice < groupe72.taille(); indice++)
                {
                    listBox_Etudiant.Items.Add(groupe72.obtenirEtudiant(indice).Nom);
                }
            } 
            else
            {
                listBox_Etudiant.Items.Clear();
            }
            

            
        }

        // Suppresion de l'etudiant selectionner du groupe selectionner et de l'affichage dans la liste.
        private void button_Supprimer_Click(object sender, EventArgs e)
        {
            Etudiant etudiant;

            textBox_Bulletin_Note1.Clear();
            textBox_Bulletin_Note2.Clear();
            textBox_Bulletin_Note3.Clear();
            textBox_Bulletin_Note4.Clear();
            textBox_Bulletin_Note5.Clear();

            textBox_Bulletin_Matiere1.Clear();
            textBox_Bulletin_Matiere2.Clear();
            textBox_Bulletin_Matiere3.Clear();
            textBox_Bulletin_Matiere4.Clear();
            textBox_Bulletin_Matiere5.Clear();

            label_Note_Moyenne_Generale.Text = string.Empty;

            textBox_Bulletin_Moyenne1.Clear();
            textBox_Bulletin_Moyenne2.Clear();
            textBox_Bulletin_Moyenne3.Clear();
            textBox_Bulletin_Moyenne4.Clear();
            textBox_Bulletin_Moyenne5.Clear();

            if (listBox_Etudiant.SelectedIndex != -1)
            {
                if (comboBox_Groupe2.SelectedIndex == 0)
                {
                    DialogResult result = MessageBox.Show("Voulez-vous réellement supprimer l'étudiant " + groupe71.obtenirEtudiant(listBox_Etudiant.SelectedIndex).Nom + " de la liste."
                        , "Suppression d'étudiant dans la liste", MessageBoxButtons.YesNo);

                    if (result == DialogResult.Yes)
                    {
                        etudiant = groupe71.supprimer(listBox_Etudiant.SelectedIndex);

                        if (etudiant != null)
                        {
                            MessageBox.Show("L'étudiant " + etudiant.Nom + " a bien été supprimer.", "Succès de la suppression", MessageBoxButtons.OK);

                            listBox_Etudiant.Items.Clear();

                            for (int indice = 0; indice < groupe71.taille(); indice++)
                            {
                                listBox_Etudiant.Items.Add(groupe71.obtenirEtudiant(indice).Nom);
                            }
                        }

                    }
                }
                else if (comboBox_Groupe2.SelectedIndex == 1)
                {
                    DialogResult result = MessageBox.Show("Voulez-vous réellement supprimer l'étudiant " + groupe72.obtenirEtudiant(listBox_Etudiant.SelectedIndex).Nom + " de la liste."
                        , "Suppression d'étudiant dans la liste", MessageBoxButtons.YesNo);

                    if (result == DialogResult.Yes)
                    {
                        etudiant = groupe72.supprimer(listBox_Etudiant.SelectedIndex);

                        if (etudiant != null)
                        {
                            MessageBox.Show("L'étudiant " + etudiant.Nom + " a bien été supprimer.", "Succès de la suppression", MessageBoxButtons.OK);

                            listBox_Etudiant.Items.Clear();

                            for (int indice = 0; indice < groupe72.taille(); indice++)
                            {
                                listBox_Etudiant.Items.Add(groupe72.obtenirEtudiant(indice).Nom);
                            }
                        }
                    }
                }

            }
        }

        // Initiation des tableau d'etudiant et des textbox pour les matières dans l'onglet information
        private void Form_TP1_Load(object sender, EventArgs e)
        {
            groupe71 = new TabEtudiant(Constantes.NB_MAX_ETUDIANTS);
            groupe72 = new TabEtudiant(Constantes.NB_MAX_ETUDIANTS);

            textBox_Info_Matiere1.Text = Constantes.MATIERE1;
            textBox_Info_Matiere2.Text = Constantes.MATIERE2;
            textBox_Info_Matiere3.Text = Constantes.MATIERE3;
            textBox_Info_Matiere4.Text = Constantes.MATIERE4;
            textBox_Info_Matiere5.Text = Constantes.MATIERE5;
        }

        /*
         * Validation que le nom complet ne contient que des lettres et des espaces.
         * Automatisation de majuscule au début du textbox.
         * Message d'erreur lors du non respect de la validation.
         */
        private void textBox_Nom_TextChanged(object sender, EventArgs e)
        {

            if (textBox_Nom.TextLength != 0 && char.IsLower(Convert.ToChar(textBox_Nom.Text.Substring(0, 1))))
            {
                textBox_Nom.Text = textBox_Nom.Text.Replace(textBox_Nom.Text.Substring(0, 1), textBox_Nom.Text.ToUpper());
                textBox_Nom.SelectionStart = 2;
            }

            
            /*
             * Tentative d'automatisation de la majuscule après un espace.
             * 
            if ( textBox_Nom.TextLength > 1)
            {
                 int lastSpace = textBox_Nom.Text.LastIndexOf(" ") - 1;

                if(lastSpace != -1)
                {
                    char last = textBox_Nom.Text.Last();
                    int lastChar = textBox_Nom.Text.LastIndexOf(last) - 1;

                    int difference = Math.Abs(lastSpace - lastChar);


                    if (lastSpace != - 1 && lastChar != -1 && difference == 1)
                    {
                        Console.WriteLine(lastChar);
                        Console.WriteLine(lastSpace);

                        if (textBox_Nom.TextLength > 0 && char.IsLower(Convert.ToChar(textBox_Nom.Text.Substring(lastSpace, lastChar))))
                        {
                            textBox_Nom.Text = textBox_Nom.Text.Replace(textBox_Nom.Text.Substring(lastSpace, lastChar), textBox_Nom.Text.ToUpper());
                            textBox_Nom.SelectionStart = lastChar + 1;
                        }
                    }
                }

            }
           */ 

            foreach (char c in textBox_Nom.Text)
            {
                if(!char.IsLetter(c) && !char.IsWhiteSpace(c))
                {
                    validerNom = false;
                    break;
                } else
                {
                    validerNom = true;
                }

            }

            if (!validerNom)
            {
                errorProvider_Nom.SetError(textBox_Nom, Constantes.ERREUR_NOM);
            } else
            {
                errorProvider_Nom.Clear();
            }
           
        }

        // Quitter l'application.
        private void button_Quitter_Click(object sender, EventArgs e)
        {
            Application.Exit();
        }

        // Confirmation de notre désire de quitter l'application.
        private void Form_TP1_FormClosing(object sender, FormClosingEventArgs e)
        {
            DialogResult resultat = MessageBox.Show("Voulez-vous vraiment quitter ? ",
                        "Quitter",
                         MessageBoxButtons.OKCancel);

            if (resultat == DialogResult.Cancel)
            {
                e.Cancel = true;
            }
        }

        // Effacer les textbox d'information sur un etudiant dans l'onglet information.
        private void button_Effacer_Click(object sender, EventArgs e)
        {
            DialogResult resultat = MessageBox.Show("Voulez-vous vraiment effacer ces informations ? ",
                                                     "Effacer",
                                                     MessageBoxButtons.YesNo);
            
            if(resultat == DialogResult.Yes)
            {
                textBox_Nom.Clear();
                textBox_CodePermanent.Clear();
                comboBox_Groupe1.ResetText();
                numericUpDown_Note_Matiere1.Value = default;
                numericUpDown_Note_Matiere2.Value = default;
                numericUpDown_Note_Matiere3.Value = default;
                numericUpDown_Note_Matiere4.Value = default;
                numericUpDown_Note_Matiere5.Value = default;
            }

        }

        /*
         * Sauvegarder les informations d'un etudiant dans le groupe selectionner, lorsqu'on a confirmer que tous les information son valide.
         * Divers message d'erreur selon la situation.
         */
        private void button_Sauvegarder_Click(object sender, EventArgs e)
        {
            errorProvider_Sauvegarde.Clear();

            Boolean tousValide = false, bienSauvegarder = false;

            Etudiant etudiant = new Etudiant(textBox_Nom.Text, textBox_CodePermanent.Text,
            (int)numericUpDown_Note_Matiere1.Value,(int)numericUpDown_Note_Matiere2.Value,(int)numericUpDown_Note_Matiere3.Value,(int)numericUpDown_Note_Matiere4.Value,(int)numericUpDown_Note_Matiere5.Value);

            if(validerNom && validerCodePermanent && validerNoteMatiere1 && validerNoteMatiere2 && validerNoteMatiere3 && validerNoteMatiere4 && validerNoteMatiere5)
            {
                tousValide = true;
            }
            else
            {
                tousValide = false;
            }

            if(comboBox_Groupe1.SelectedIndex == 0)
            {
                if (tousValide)
                {
                    bienSauvegarder = groupe71.ajouter(etudiant);
                }

                if (bienSauvegarder)
                {
                    MessageBox.Show("La Sauvegarde de cette étudiant, a bien été effectuée.", "Sauvegarde", MessageBoxButtons.OK);
                }
                else if (tousValide)
                {
                    MessageBox.Show("La Sauvegarde de cette étudiant, n'a pu être effectuée.", "Sauvegarde", MessageBoxButtons.OK);
                    errorProvider_Sauvegarde.SetError(button_Sauvegarder, Constantes.ERREUR_SAUVEGARDE_MAX);
                }
                else
                {
                    MessageBox.Show("La Sauvegarde de cette étudiant, n'a pu être effectuée.", "Sauvegarde", MessageBoxButtons.OK);
                    errorProvider_Sauvegarde.SetError(button_Sauvegarder, Constantes.ERREUR_SAUVEGARDE_PARAMETRES);
                }

            }
            else if(comboBox_Groupe1.SelectedIndex == 1)
            {
                if (tousValide)
                {
                    bienSauvegarder = groupe72.ajouter(etudiant);
                }

                if (bienSauvegarder)
                {
                    MessageBox.Show("La Sauvegarde de cette étudiant, a bien été effectuée.", "Sauvegarde", MessageBoxButtons.OK);
                }
                else if (tousValide)
                {
                    MessageBox.Show("La Sauvegarde de cette étudiant n'a pu être effectuée.", "Sauvegarde", MessageBoxButtons.OK);
                    errorProvider_Sauvegarde.SetError(button_Sauvegarder, Constantes.ERREUR_SAUVEGARDE_MAX);
                }
                else
                {
                    MessageBox.Show("La Sauvegarde de cette étudiant n'a pu être effectuée.", "Sauvegarde", MessageBoxButtons.OK);
                    errorProvider_Sauvegarde.SetError(button_Sauvegarder, Constantes.ERREUR_SAUVEGARDE_PARAMETRES);
                }
            }
            else
            {
                MessageBox.Show("La Sauvegarde de cette étudiant n'a pu être effectuée.", "Sauvegarde", MessageBoxButtons.OK);
                errorProvider_Sauvegarde.SetError(button_Sauvegarder, Constantes.ERREUR_GROUPE);
            }

 
        }
    }
}
