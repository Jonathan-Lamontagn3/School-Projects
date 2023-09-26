using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace TP2
{
    public class Camping
    {
        private int numeroDuCamping;

        public int NumeroDuCamping
        {
            get { return this.numeroDuCamping; }
            set { this.numeroDuCamping = value; }
        }

        private string nomDuCamping;

        public string NomDuCamping
        {
            get { return this.nomDuCamping; }
            set { this.nomDuCamping = value; }
        }

        private string imagePath;

        public string ImagePath
        {
            get { return this.imagePath; }
            set { this.imagePath = value; }
        }

        public Camping(int numeroDuCamping, string nomDuCamping, string imagePath)
        {
            this.numeroDuCamping = numeroDuCamping;
            this.nomDuCamping = nomDuCamping;
            this.imagePath = imagePath;
        }
    }
}
