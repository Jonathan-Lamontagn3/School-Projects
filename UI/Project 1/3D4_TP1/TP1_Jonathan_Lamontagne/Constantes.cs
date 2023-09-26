using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace TP1_Jonathan_Lamontagne
{
    // Contient tous les constantes du TP1
    class Constantes
    {
        public const int NB_MAX_ETUDIANTS = 10;
        
        public const string MATIERE1 = "Interface utilisateur";
        public const string MATIERE2 = "Structure de données";
        public const string MATIERE3 = "Base de données SQL";
        public const string MATIERE4 = "Applications multimédias";
        public const string MATIERE5 = "L'être humain";

        public const string ERREUR_NOM = "Le nom fourni ne peut contenir que des lettres et des espaces";
        public const string ERREUR_NOTES = "Les notes entrées doivent être un nombre entre 0 et 100";
        public const string ERREUR_CODE_PERMANENT = "Le code permanent fourni doit être une série de 10 chiffres";
        public const string ERREUR_SAUVEGARDE_PARAMETRES = "La sauvegarde n'a pu être effectuée car un ou plusieurs de vos informations sont invalides";
        public const string ERREUR_SAUVEGARDE_MAX = "La sauvegarde n'a pu être effectuée car le nombre maximum d'étudiant est atteint pour ce groupe";
        public const string ERREUR_GROUPE = "Aucun groupe n'a été sélectionné";

    }
}
