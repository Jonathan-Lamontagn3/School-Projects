using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace TP2
{
    class Constante
    {
        public const string PARC_MAURICIE = "Camping Parc de la Mauricie";
        public const string MONT_ORFORD = "Camping Parc du Mont-Orford";
        public const string SAINT_SIMEON = "Camping Saint-Siméon";

        public const string QUITTER = "Voulez-vous vraiment quitter?";

        public const string ERREUR_ETAPE1_DATE = "Votre date de départ doit être supérieur à votre date d'arrivée.";
        public const string ERREUR_ETAPE2_CAPACITE = "La capacité maximale pour une réservation est de 8 personnes";
        public const string ERREUR_ETAPE4_EMAIL = "La syntaxe de votre courriel est invalide";
        public const string ERREUR_ETAPE4_NAME = "Le champs nom ne peut pas contenir d'autre type de caractère que des lettres et des espaces";

        public const int CAPACITER_PERSONNE_MIN = 0;
        public const int CAPACITER_PERSONNE_MAX = 8;

        public const string FICHIER_RESERVATION_PARC_MAURICIE = "RESERV_MAURICIE";
        public const string FICHIER_RESERVATION_MONT_ORFORD = "RESERV_ORFORD";
        public const string FICHIER_RESERVATION_SAINT_SIMEON = "RESERV_SIMEON";

        public const string AUCUNE_RESERVATION = "Il n'y a aucune réservation pour ce camping";

    }
}
