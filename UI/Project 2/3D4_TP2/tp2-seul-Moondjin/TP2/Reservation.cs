using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace TP2
{
    class Reservation
    {
        private int numeroDeReservation;
        public int NumeroDeReservation
        {
            get { return this.numeroDeReservation; }
        }

        private int numeroDuCamping;
        public int NumeroDuCamping
        {
            get { return this.numeroDuCamping; }
            set { this.numeroDuCamping = value; }
        }

        private string nomDuClient;
        public string NomDuClient
        {
            get { return this.nomDuClient; }
            set { this.nomDuClient = value; }
        }

        private string courrielDuClient;
        public string CourrielDuClient
        {
            get { return this.courrielDuClient; }
            set { this.courrielDuClient = value; }
        }

        private string modeDePaiement;
        public string ModeDePaiement
        {
            get { return this.modeDePaiement; }
            set { this.modeDePaiement = value; }
        }

        private DateTime dateDebutCamping;
        public DateTime DateDebutCamping
        {
            get { return this.dateDebutCamping; }
            set { this.dateDebutCamping = value; }
        }

        private DateTime dateFinCamping;
        public DateTime DateFinCamping
        {
            get { return this.dateFinCamping; }
            set { this.dateFinCamping = value; }
        }

        private string hebergement;
        public string Hebergement
        {
            get { return this.hebergement; }
            set { this.hebergement = value; }
        }

        private double coutDHebergement;
        public double CoutDHebergement
        {
            get { return this.coutDHebergement; }
            set { this.coutDHebergement = value; }
        }

        private int nombreDAdultes;
        public int NombreDAdultes
        {
            get { return this.nombreDAdultes; }
            set { this.nombreDAdultes = value; }
        }

        private int nombreDEnfants;
        public int NombreDEnfants
        {
            get { return this.nombreDEnfants; }
            set { this.nombreDEnfants = value; }
        }

        private double coutTotalCamping;
        public double CoutTotalCamping
        {
            get { return this.coutTotalCamping; }
            set { this.coutTotalCamping = value; }
        }

        private int nombreDeNuit;
        private int prixHebergement;

        public Reservation(int numeroDeReservation, int numeroDuCamping, DateTime dateDebutCamping, DateTime dateFinCamping,
            int nombreDAdultes, int nombreDEnfants, string hebergement, string nomDuClient, string courrielDuClient,
            string modeDePaiement, double coutTotalCamping)
        {
            this.numeroDeReservation = numeroDeReservation;
            this.numeroDuCamping = numeroDuCamping;
            this.dateDebutCamping = dateDebutCamping;
            this.dateFinCamping = dateFinCamping;
            this.nombreDAdultes = nombreDAdultes;
            this.nombreDEnfants = nombreDEnfants;
            this.hebergement = hebergement;
            this.nomDuClient = nomDuClient;
            this.courrielDuClient = courrielDuClient;
            this.modeDePaiement = modeDePaiement;
            this.coutTotalCamping = coutTotalCamping;
        }

        // Constructeur pour une facture
        public Reservation(string hebergement, int nombreDeNuit, double coutTotalCamping, int prixHebergement)
        {
            this.hebergement = hebergement;
            this.nombreDeNuit = nombreDeNuit;
            this.coutTotalCamping = coutTotalCamping;
            this.prixHebergement = prixHebergement;
        }

        public string AfficherFacture()
        {
            return "Hébergement: " + this.hebergement + "(" + this.prixHebergement + "$)"
                   + "\r\nNombre de nuits: " + this.nombreDeNuit
                   + "\r\nCoût total: " + this.coutTotalCamping + '$';
        }

        public override string ToString()
        {
            return numeroDeReservation + ";" + numeroDuCamping + ";" + dateDebutCamping + ";" + dateFinCamping
                + ";" + nombreDAdultes + ";" + nombreDEnfants + ";" + hebergement + ";" + nomDuClient
                + ";" + courrielDuClient + ";" + modeDePaiement + ";" + coutTotalCamping;
        }

    }
}
