using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace TP1_Jonathan_Lamontagne
{
    // Gestionnaire des tableaux d'etudiants.
    class TabEtudiant
    {
        private Etudiant[] tabEtudiant;
        private int nbEtudiant = 0;

        // Constructeur d'un tableau d'etudiant.
        public TabEtudiant(int maxEtudiant)
        {
            this.tabEtudiant = new Etudiant[maxEtudiant];
            this.nbEtudiant = 0;
        }

        // Pour obtenir le nombre d'etudiant dans le tableau.
        public int taille()
        {
            return this.nbEtudiant;
        }

        // Pour savoir quand le tableau est vide.
        public Boolean estVide()
        {
            return (this.nbEtudiant == 0);
        }

        // Pour savoir quand le tableau est plein.
        public Boolean estPlein()
        {
            return (this.nbEtudiant == this.tabEtudiant.Length);
        }

        // Verifie si l'indice indiquer ce situe dans le tableau avant d'envoyer l'objet etudiant demandé.
        public Etudiant obtenirEtudiant( int indice)
        {
            Etudiant etudiant = null;

            if (indice >= 0 && indice < nbEtudiant)
            {
                etudiant = this.tabEtudiant[indice];
            }

            return etudiant;
        }

        // Ajoute l'objet etudiant envoyer dans le tableaux si celui-ci a encore de l'espace tous en le gardant en ordre alphabétique de nom. Renvoie la confirmation de l'ajout.
        public Boolean ajouter( Etudiant etudiant)
        {
            Boolean insertionOk = false;

            if (!this.estPlein())
            {
                int indice = this.nbEtudiant - 1;

                while (indice >= 0 && this.tabEtudiant[indice].Nom.CompareTo(etudiant.Nom) > 0)
                {
                    this.tabEtudiant[indice + 1] = this.tabEtudiant[indice];
                    --indice;
                }

                this.tabEtudiant[indice + 1] = etudiant;
                ++this.nbEtudiant;
                insertionOk = true;
            }

            return insertionOk;
        }

        /* Supprime un objet etudiant du tableau si celui-ci n'est pas vide.
         * Renvoie l'objet etudiant supprimer si l'indice envoyer ce retrouve dans le tableau, sinon renvoi null.
         */
        public Etudiant supprimer( int indice)
        {
            Etudiant etudiantSup = null;

            if(!this.estVide())
            {
                if ( indice >= 0 && indice < this.nbEtudiant)
                {
                    etudiantSup = this.tabEtudiant[indice];
                }

                for ( int ind = indice + 1; ind < this.nbEtudiant; ind++)
                {
                    this.tabEtudiant[ind - 1] = this.tabEtudiant[ind];
                }

                --this.nbEtudiant;
                this.tabEtudiant[this.nbEtudiant] = null;
            }

            return etudiantSup;
        }

        // Renvoie la moyenne de groupe pour la matiere ce retrouvant à l'indice envoyer. Si l'index de matiere recu est inexistante renvoie -1.
        public double obtenirMoyenne(int indiceMatiere)
        {
            int resultatGroupe = 0;
            double moyenneDeGroupe = 0;

            try
            {
                for (int indice = 0; indice < this.taille(); indice++)
                {
                    resultatGroupe += this.obtenirEtudiant(indice).obtenirNoteEtudiant(indiceMatiere);
                }

                moyenneDeGroupe = resultatGroupe / this.taille();
            }
            catch (IndexOutOfRangeException)
            {
                moyenneDeGroupe = -1;
            }
          
           
            return moyenneDeGroupe;
        }
    }
}
