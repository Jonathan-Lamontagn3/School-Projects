using System;
using System.Collections.Generic;
using System.Linq;
using System.Security.Principal;
using System.Text;

namespace TP1_Jonathan_Lamontagne
{
    class Etudiant
    {
        private string nom;
        public string Nom
        {
            get { return this.nom; }
            set { this.nom = value; }
        }
        private string codePermanent;
        public string CodePermanent
        {
            get { return this.codePermanent; }
            set { this.codePermanent = value; }
        }
        private int[] note;
        private string[] matiere;

        // Constructeur sans paramètres.
        public Etudiant()
        {
            this.nom = "";
            this.codePermanent = "";

            this.matiere = new string[5];
           
            matiere[0] = Constantes.MATIERE1;
            matiere[1] = Constantes.MATIERE2;
            matiere[2] = Constantes.MATIERE3;
            matiere[3] = Constantes.MATIERE4;
            matiere[4] = Constantes.MATIERE5;

            this.note = new int[5];

        }

        // Constructeur avec paramètres.
        public Etudiant(string nom, string codePermanent, int noteMatiere1, int noteMatiere2, int noteMatiere3, int noteMatiere4, int noteMatiere5)
        {
            this.nom = nom;
            this.codePermanent = codePermanent;

            this.matiere = new string[5];

            matiere[0] = Constantes.MATIERE1;
            matiere[1] = Constantes.MATIERE2;
            matiere[2] = Constantes.MATIERE3;
            matiere[3] = Constantes.MATIERE4;
            matiere[4] = Constantes.MATIERE5;

            this.note = new int[5];

            note[0] = noteMatiere1;
            note[1] = noteMatiere2;
            note[2] = noteMatiere3;
            note[3] = noteMatiere4;
            note[4] = noteMatiere5;

        }

        // Permet de changer les notes après la création de l'objets. Pas utiliser dans la situation de ce TP.
        public Boolean changerNote(int indiceMatiere, int resultat)
        {
            Boolean changementOk = false;

            if (indiceMatiere >= 0 && indiceMatiere < this.note.Length)
            {
                this.note[indiceMatiere] = resultat;
                changementOk = true;
            }

            return changementOk;
        }

        // Obtien la note si l'indice recu ce retrouve dans le tableau de note de l'objet sinon renvoie -1.
        public int obtenirNoteEtudiant(int indiceMatiere)
        {
            int resultat = -1;

            if (indiceMatiere >= 0 && indiceMatiere < this.note.Length)
            {
                resultat = this.note[indiceMatiere];
            }

            return resultat;
        }

        // Obtien le nom de la matiere si l'indice recu ce retrouve dans le tableau de matiere de l'objet sinon renvoie null
        public string obtenirMatiere(int indiceMatiere)
        {
            string matiere = null;

            if (indiceMatiere >= 0 && indiceMatiere < this.matiere.Length)
            {
                matiere = this.matiere[indiceMatiere];
            }

            return matiere;
        }

    }
}
