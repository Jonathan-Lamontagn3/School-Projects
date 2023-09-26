namespace TP2
{
    partial class Principal
    {
        /// <summary>
        /// Variable nécessaire au concepteur.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Nettoyage des ressources utilisées.
        /// </summary>
        /// <param name="disposing">true si les ressources managées doivent être supprimées ; sinon, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Code généré par le Concepteur Windows Form

        /// <summary>
        /// Méthode requise pour la prise en charge du concepteur - ne modifiez pas
        /// le contenu de cette méthode avec l'éditeur de code.
        /// </summary>
        private void InitializeComponent()
        {
            this.pictureBox_Icon_Camping = new System.Windows.Forms.PictureBox();
            this.groupBox_Parc_Camping = new System.Windows.Forms.GroupBox();
            this.radioButton_Saint_Simeon = new System.Windows.Forms.RadioButton();
            this.radioButton_Parc_MontOrford = new System.Windows.Forms.RadioButton();
            this.radioButton_Parc_Mauricie = new System.Windows.Forms.RadioButton();
            this.button_reservation = new System.Windows.Forms.Button();
            this.button_Quitter = new System.Windows.Forms.Button();
            this.pictureBox_Image_Parc = new System.Windows.Forms.PictureBox();
            this.label_Camping_Quebec = new System.Windows.Forms.Label();
            this.label_systeme = new System.Windows.Forms.Label();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBox_Icon_Camping)).BeginInit();
            this.groupBox_Parc_Camping.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBox_Image_Parc)).BeginInit();
            this.SuspendLayout();
            // 
            // pictureBox_Icon_Camping
            // 
            this.pictureBox_Icon_Camping.Image = global::TP2.Properties.Resources.camping_icon;
            this.pictureBox_Icon_Camping.Location = new System.Drawing.Point(57, 27);
            this.pictureBox_Icon_Camping.Name = "pictureBox_Icon_Camping";
            this.pictureBox_Icon_Camping.Size = new System.Drawing.Size(173, 165);
            this.pictureBox_Icon_Camping.SizeMode = System.Windows.Forms.PictureBoxSizeMode.StretchImage;
            this.pictureBox_Icon_Camping.TabIndex = 0;
            this.pictureBox_Icon_Camping.TabStop = false;
            // 
            // groupBox_Parc_Camping
            // 
            this.groupBox_Parc_Camping.Controls.Add(this.radioButton_Saint_Simeon);
            this.groupBox_Parc_Camping.Controls.Add(this.radioButton_Parc_MontOrford);
            this.groupBox_Parc_Camping.Controls.Add(this.radioButton_Parc_Mauricie);
            this.groupBox_Parc_Camping.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.groupBox_Parc_Camping.Location = new System.Drawing.Point(57, 240);
            this.groupBox_Parc_Camping.Name = "groupBox_Parc_Camping";
            this.groupBox_Parc_Camping.Size = new System.Drawing.Size(269, 165);
            this.groupBox_Parc_Camping.TabIndex = 1;
            this.groupBox_Parc_Camping.TabStop = false;
            this.groupBox_Parc_Camping.Text = "Choix des parcs";
            // 
            // radioButton_Saint_Simeon
            // 
            this.radioButton_Saint_Simeon.AutoSize = true;
            this.radioButton_Saint_Simeon.Location = new System.Drawing.Point(23, 122);
            this.radioButton_Saint_Simeon.Name = "radioButton_Saint_Simeon";
            this.radioButton_Saint_Simeon.Size = new System.Drawing.Size(210, 24);
            this.radioButton_Saint_Simeon.TabIndex = 2;
            this.radioButton_Saint_Simeon.Text = "Camping Saint-Siméon";
            this.radioButton_Saint_Simeon.UseVisualStyleBackColor = true;
            this.radioButton_Saint_Simeon.CheckedChanged += new System.EventHandler(this.radioButton_Saint_Simeon_CheckedChanged);
            // 
            // radioButton_Parc_MontOrford
            // 
            this.radioButton_Parc_MontOrford.AutoSize = true;
            this.radioButton_Parc_MontOrford.Location = new System.Drawing.Point(23, 78);
            this.radioButton_Parc_MontOrford.Name = "radioButton_Parc_MontOrford";
            this.radioButton_Parc_MontOrford.Size = new System.Drawing.Size(190, 24);
            this.radioButton_Parc_MontOrford.TabIndex = 1;
            this.radioButton_Parc_MontOrford.Text = "Parc du Mont-Orford";
            this.radioButton_Parc_MontOrford.UseVisualStyleBackColor = true;
            this.radioButton_Parc_MontOrford.CheckedChanged += new System.EventHandler(this.radioButton_Parc_MontOrford_CheckedChanged);
            // 
            // radioButton_Parc_Mauricie
            // 
            this.radioButton_Parc_Mauricie.AutoSize = true;
            this.radioButton_Parc_Mauricie.Location = new System.Drawing.Point(23, 35);
            this.radioButton_Parc_Mauricie.Name = "radioButton_Parc_Mauricie";
            this.radioButton_Parc_Mauricie.Size = new System.Drawing.Size(179, 24);
            this.radioButton_Parc_Mauricie.TabIndex = 0;
            this.radioButton_Parc_Mauricie.Text = "Parc de la Mauricie";
            this.radioButton_Parc_Mauricie.UseVisualStyleBackColor = true;
            this.radioButton_Parc_Mauricie.CheckedChanged += new System.EventHandler(this.radioButton_Parc_Mauricie_CheckedChanged);
            // 
            // button_reservation
            // 
            this.button_reservation.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.button_reservation.Location = new System.Drawing.Point(57, 439);
            this.button_reservation.Name = "button_reservation";
            this.button_reservation.Size = new System.Drawing.Size(173, 46);
            this.button_reservation.TabIndex = 2;
            this.button_reservation.Text = "Réservation";
            this.button_reservation.UseVisualStyleBackColor = true;
            this.button_reservation.Click += new System.EventHandler(this.button_reservation_Click);
            // 
            // button_Quitter
            // 
            this.button_Quitter.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.button_Quitter.Location = new System.Drawing.Point(278, 439);
            this.button_Quitter.Name = "button_Quitter";
            this.button_Quitter.Size = new System.Drawing.Size(173, 46);
            this.button_Quitter.TabIndex = 3;
            this.button_Quitter.Text = "Quitter";
            this.button_Quitter.UseVisualStyleBackColor = true;
            this.button_Quitter.Click += new System.EventHandler(this.button_Quitter_Click);
            // 
            // pictureBox_Image_Parc
            // 
            this.pictureBox_Image_Parc.Location = new System.Drawing.Point(355, 131);
            this.pictureBox_Image_Parc.Name = "pictureBox_Image_Parc";
            this.pictureBox_Image_Parc.Size = new System.Drawing.Size(460, 274);
            this.pictureBox_Image_Parc.SizeMode = System.Windows.Forms.PictureBoxSizeMode.StretchImage;
            this.pictureBox_Image_Parc.TabIndex = 4;
            this.pictureBox_Image_Parc.TabStop = false;
            // 
            // label_Camping_Quebec
            // 
            this.label_Camping_Quebec.AutoSize = true;
            this.label_Camping_Quebec.Font = new System.Drawing.Font("Microsoft Sans Serif", 27.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label_Camping_Quebec.Location = new System.Drawing.Point(278, 27);
            this.label_Camping_Quebec.Name = "label_Camping_Quebec";
            this.label_Camping_Quebec.Size = new System.Drawing.Size(323, 42);
            this.label_Camping_Quebec.TabIndex = 5;
            this.label_Camping_Quebec.Text = "Camping Québec";
            // 
            // label_systeme
            // 
            this.label_systeme.AutoSize = true;
            this.label_systeme.Font = new System.Drawing.Font("Microsoft Sans Serif", 15.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label_systeme.Location = new System.Drawing.Point(280, 79);
            this.label_systeme.Name = "label_systeme";
            this.label_systeme.Size = new System.Drawing.Size(383, 25);
            this.label_systeme.TabIndex = 6;
            this.label_systeme.Text = "Système de réservation - hébergement";
            // 
            // Principal
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(850, 528);
            this.Controls.Add(this.label_systeme);
            this.Controls.Add(this.label_Camping_Quebec);
            this.Controls.Add(this.pictureBox_Image_Parc);
            this.Controls.Add(this.button_Quitter);
            this.Controls.Add(this.button_reservation);
            this.Controls.Add(this.groupBox_Parc_Camping);
            this.Controls.Add(this.pictureBox_Icon_Camping);
            this.Name = "Principal";
            this.Text = "Système de réservation - Camping Québec";
            this.FormClosing += new System.Windows.Forms.FormClosingEventHandler(this.Principal_FormClosing);
            this.Load += new System.EventHandler(this.Principal_Load);
            ((System.ComponentModel.ISupportInitialize)(this.pictureBox_Icon_Camping)).EndInit();
            this.groupBox_Parc_Camping.ResumeLayout(false);
            this.groupBox_Parc_Camping.PerformLayout();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBox_Image_Parc)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.PictureBox pictureBox_Icon_Camping;
        private System.Windows.Forms.GroupBox groupBox_Parc_Camping;
        private System.Windows.Forms.RadioButton radioButton_Saint_Simeon;
        private System.Windows.Forms.RadioButton radioButton_Parc_MontOrford;
        private System.Windows.Forms.RadioButton radioButton_Parc_Mauricie;
        private System.Windows.Forms.Button button_reservation;
        private System.Windows.Forms.Button button_Quitter;
        private System.Windows.Forms.PictureBox pictureBox_Image_Parc;
        private System.Windows.Forms.Label label_Camping_Quebec;
        private System.Windows.Forms.Label label_systeme;
    }
}

