namespace TP2
{
    partial class ReservationClient
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            this.components = new System.ComponentModel.Container();
            this.menuStrip_Reservation = new System.Windows.Forms.MenuStrip();
            this.réservationToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.nouvelleRéservationToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.faireLaRToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.toolStripSeparator1 = new System.Windows.Forms.ToolStripSeparator();
            this.afficherLesRéservationToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.toolStripSeparator2 = new System.Windows.Forms.ToolStripSeparator();
            this.retourAuMenuPrincipalToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.pictureBox_IconCamping = new System.Windows.Forms.PictureBox();
            this.label_CampinngQuebec = new System.Windows.Forms.Label();
            this.label_réserv = new System.Windows.Forms.Label();
            this.label_Titre_Camping = new System.Windows.Forms.Label();
            this.label_Étape1 = new System.Windows.Forms.Label();
            this.label_Etape2 = new System.Windows.Forms.Label();
            this.label_Etape3 = new System.Windows.Forms.Label();
            this.label_Etape4 = new System.Windows.Forms.Label();
            this.pictureBox_Apercu_Camping = new System.Windows.Forms.PictureBox();
            this.label_Arrive = new System.Windows.Forms.Label();
            this.label_Depart = new System.Windows.Forms.Label();
            this.dateTimePicker_DebutCamping = new System.Windows.Forms.DateTimePicker();
            this.dateTimePicker_FinCamping = new System.Windows.Forms.DateTimePicker();
            this.button_Confirmer_Reservation = new System.Windows.Forms.Button();
            this.label_Enfant = new System.Windows.Forms.Label();
            this.label_Adulte = new System.Windows.Forms.Label();
            this.numericUpDown_Nombre_Adulte = new System.Windows.Forms.NumericUpDown();
            this.numericUpDown_Nombre_Enfant = new System.Windows.Forms.NumericUpDown();
            this.label_Herbergement = new System.Windows.Forms.Label();
            this.statusStrip_Reservation = new System.Windows.Forms.StatusStrip();
            this.toolStripStatusLabel_Sauvegarde = new System.Windows.Forms.ToolStripStatusLabel();
            this.listBox_Choix_Hebergement = new System.Windows.Forms.ListBox();
            this.label_PaieMethod = new System.Windows.Forms.Label();
            this.label_Mail = new System.Windows.Forms.Label();
            this.label_Nom = new System.Windows.Forms.Label();
            this.textBox_Name = new System.Windows.Forms.TextBox();
            this.textBox_Email = new System.Windows.Forms.TextBox();
            this.comboBox_MethodePaiement = new System.Windows.Forms.ComboBox();
            this.richTextBox_Facture = new System.Windows.Forms.RichTextBox();
            this.label_Facture = new System.Windows.Forms.Label();
            this.errorProvider_ETAPE1_Date = new System.Windows.Forms.ErrorProvider(this.components);
            this.errorProvider_ETAPE2_Capacite = new System.Windows.Forms.ErrorProvider(this.components);
            this.errorProvider_ETAPE4_Nom = new System.Windows.Forms.ErrorProvider(this.components);
            this.errorProvider_ETAPE4_Email = new System.Windows.Forms.ErrorProvider(this.components);
            this.saveFileDialog_Reservation = new System.Windows.Forms.SaveFileDialog();
            this.menuStrip_Reservation.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBox_IconCamping)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBox_Apercu_Camping)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.numericUpDown_Nombre_Adulte)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.numericUpDown_Nombre_Enfant)).BeginInit();
            this.statusStrip_Reservation.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.errorProvider_ETAPE1_Date)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.errorProvider_ETAPE2_Capacite)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.errorProvider_ETAPE4_Nom)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.errorProvider_ETAPE4_Email)).BeginInit();
            this.SuspendLayout();
            // 
            // menuStrip_Reservation
            // 
            this.menuStrip_Reservation.Items.AddRange(new System.Windows.Forms.ToolStripItem[] {
            this.réservationToolStripMenuItem});
            this.menuStrip_Reservation.Location = new System.Drawing.Point(0, 0);
            this.menuStrip_Reservation.Name = "menuStrip_Reservation";
            this.menuStrip_Reservation.Size = new System.Drawing.Size(1132, 25);
            this.menuStrip_Reservation.TabIndex = 34;
            this.menuStrip_Reservation.Text = "menuStrip1";
            // 
            // réservationToolStripMenuItem
            // 
            this.réservationToolStripMenuItem.DropDownItems.AddRange(new System.Windows.Forms.ToolStripItem[] {
            this.nouvelleRéservationToolStripMenuItem,
            this.faireLaRToolStripMenuItem,
            this.toolStripSeparator1,
            this.afficherLesRéservationToolStripMenuItem,
            this.toolStripSeparator2,
            this.retourAuMenuPrincipalToolStripMenuItem});
            this.réservationToolStripMenuItem.Font = new System.Drawing.Font("Times New Roman", 11.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.réservationToolStripMenuItem.Name = "réservationToolStripMenuItem";
            this.réservationToolStripMenuItem.Size = new System.Drawing.Size(90, 21);
            this.réservationToolStripMenuItem.Text = "Réservation";
            // 
            // nouvelleRéservationToolStripMenuItem
            // 
            this.nouvelleRéservationToolStripMenuItem.Name = "nouvelleRéservationToolStripMenuItem";
            this.nouvelleRéservationToolStripMenuItem.ShortcutKeys = ((System.Windows.Forms.Keys)((System.Windows.Forms.Keys.Control | System.Windows.Forms.Keys.N)));
            this.nouvelleRéservationToolStripMenuItem.Size = new System.Drawing.Size(272, 22);
            this.nouvelleRéservationToolStripMenuItem.Text = "Nouvelle réservation";
            this.nouvelleRéservationToolStripMenuItem.Click += new System.EventHandler(this.nouvelleRéservationToolStripMenuItem_Click);
            // 
            // faireLaRToolStripMenuItem
            // 
            this.faireLaRToolStripMenuItem.Name = "faireLaRToolStripMenuItem";
            this.faireLaRToolStripMenuItem.ShortcutKeys = ((System.Windows.Forms.Keys)((System.Windows.Forms.Keys.Control | System.Windows.Forms.Keys.S)));
            this.faireLaRToolStripMenuItem.Size = new System.Drawing.Size(272, 22);
            this.faireLaRToolStripMenuItem.Text = "Faire la réservation";
            this.faireLaRToolStripMenuItem.Click += new System.EventHandler(this.faireLaRToolStripMenuItem_Click);
            // 
            // toolStripSeparator1
            // 
            this.toolStripSeparator1.Name = "toolStripSeparator1";
            this.toolStripSeparator1.Size = new System.Drawing.Size(269, 6);
            // 
            // afficherLesRéservationToolStripMenuItem
            // 
            this.afficherLesRéservationToolStripMenuItem.Name = "afficherLesRéservationToolStripMenuItem";
            this.afficherLesRéservationToolStripMenuItem.Size = new System.Drawing.Size(272, 22);
            this.afficherLesRéservationToolStripMenuItem.Text = "Afficher les réservation";
            this.afficherLesRéservationToolStripMenuItem.Click += new System.EventHandler(this.afficherLesRéservationToolStripMenuItem_Click);
            // 
            // toolStripSeparator2
            // 
            this.toolStripSeparator2.Name = "toolStripSeparator2";
            this.toolStripSeparator2.Size = new System.Drawing.Size(269, 6);
            // 
            // retourAuMenuPrincipalToolStripMenuItem
            // 
            this.retourAuMenuPrincipalToolStripMenuItem.Name = "retourAuMenuPrincipalToolStripMenuItem";
            this.retourAuMenuPrincipalToolStripMenuItem.ShortcutKeys = ((System.Windows.Forms.Keys)((System.Windows.Forms.Keys.Control | System.Windows.Forms.Keys.Q)));
            this.retourAuMenuPrincipalToolStripMenuItem.Size = new System.Drawing.Size(272, 22);
            this.retourAuMenuPrincipalToolStripMenuItem.Text = "Retour au menu principal";
            this.retourAuMenuPrincipalToolStripMenuItem.Click += new System.EventHandler(this.retourAuMenuPrincipalToolStripMenuItem_Click);
            // 
            // pictureBox_IconCamping
            // 
            this.pictureBox_IconCamping.Image = global::TP2.Properties.Resources.camping_icon;
            this.pictureBox_IconCamping.Location = new System.Drawing.Point(13, 48);
            this.pictureBox_IconCamping.Name = "pictureBox_IconCamping";
            this.pictureBox_IconCamping.Size = new System.Drawing.Size(159, 129);
            this.pictureBox_IconCamping.SizeMode = System.Windows.Forms.PictureBoxSizeMode.StretchImage;
            this.pictureBox_IconCamping.TabIndex = 1;
            this.pictureBox_IconCamping.TabStop = false;
            // 
            // label_CampinngQuebec
            // 
            this.label_CampinngQuebec.AutoSize = true;
            this.label_CampinngQuebec.Font = new System.Drawing.Font("Monotype Corsiva", 36F, ((System.Drawing.FontStyle)((System.Drawing.FontStyle.Bold | System.Drawing.FontStyle.Italic))), System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label_CampinngQuebec.Location = new System.Drawing.Point(187, 61);
            this.label_CampinngQuebec.Name = "label_CampinngQuebec";
            this.label_CampinngQuebec.Size = new System.Drawing.Size(318, 57);
            this.label_CampinngQuebec.TabIndex = 0;
            this.label_CampinngQuebec.Text = "Camping Québec";
            // 
            // label_réserv
            // 
            this.label_réserv.AutoSize = true;
            this.label_réserv.Font = new System.Drawing.Font("Microsoft Sans Serif", 21.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label_réserv.Location = new System.Drawing.Point(191, 118);
            this.label_réserv.Name = "label_réserv";
            this.label_réserv.Size = new System.Drawing.Size(288, 33);
            this.label_réserv.TabIndex = 0;
            this.label_réserv.Text = "Réservation du client";
            // 
            // label_Titre_Camping
            // 
            this.label_Titre_Camping.AutoSize = true;
            this.label_Titre_Camping.Font = new System.Drawing.Font("Microsoft Sans Serif", 27.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label_Titre_Camping.Location = new System.Drawing.Point(12, 180);
            this.label_Titre_Camping.Name = "label_Titre_Camping";
            this.label_Titre_Camping.Size = new System.Drawing.Size(0, 42);
            this.label_Titre_Camping.TabIndex = 0;
            // 
            // label_Étape1
            // 
            this.label_Étape1.AutoSize = true;
            this.label_Étape1.Font = new System.Drawing.Font("Times New Roman", 18F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label_Étape1.Location = new System.Drawing.Point(19, 311);
            this.label_Étape1.Name = "label_Étape1";
            this.label_Étape1.Size = new System.Drawing.Size(98, 26);
            this.label_Étape1.TabIndex = 0;
            this.label_Étape1.Text = "Étape 1:";
            // 
            // label_Etape2
            // 
            this.label_Etape2.AutoSize = true;
            this.label_Etape2.Font = new System.Drawing.Font("Times New Roman", 18F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label_Etape2.Location = new System.Drawing.Point(221, 311);
            this.label_Etape2.Name = "label_Etape2";
            this.label_Etape2.Size = new System.Drawing.Size(98, 26);
            this.label_Etape2.TabIndex = 0;
            this.label_Etape2.Text = "Étape 2:";
            // 
            // label_Etape3
            // 
            this.label_Etape3.AutoSize = true;
            this.label_Etape3.Font = new System.Drawing.Font("Times New Roman", 18F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label_Etape3.Location = new System.Drawing.Point(407, 311);
            this.label_Etape3.Name = "label_Etape3";
            this.label_Etape3.Size = new System.Drawing.Size(98, 26);
            this.label_Etape3.TabIndex = 0;
            this.label_Etape3.Text = "Étape 3:";
            // 
            // label_Etape4
            // 
            this.label_Etape4.AutoSize = true;
            this.label_Etape4.Font = new System.Drawing.Font("Times New Roman", 18F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label_Etape4.Location = new System.Drawing.Point(593, 311);
            this.label_Etape4.Name = "label_Etape4";
            this.label_Etape4.Size = new System.Drawing.Size(98, 26);
            this.label_Etape4.TabIndex = 0;
            this.label_Etape4.Text = "Étape 4:";
            // 
            // pictureBox_Apercu_Camping
            // 
            this.pictureBox_Apercu_Camping.Location = new System.Drawing.Point(576, 48);
            this.pictureBox_Apercu_Camping.Name = "pictureBox_Apercu_Camping";
            this.pictureBox_Apercu_Camping.Size = new System.Drawing.Size(519, 246);
            this.pictureBox_Apercu_Camping.SizeMode = System.Windows.Forms.PictureBoxSizeMode.StretchImage;
            this.pictureBox_Apercu_Camping.TabIndex = 9;
            this.pictureBox_Apercu_Camping.TabStop = false;
            // 
            // label_Arrive
            // 
            this.label_Arrive.AutoSize = true;
            this.label_Arrive.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label_Arrive.Location = new System.Drawing.Point(24, 347);
            this.label_Arrive.Name = "label_Arrive";
            this.label_Arrive.Size = new System.Drawing.Size(107, 20);
            this.label_Arrive.TabIndex = 0;
            this.label_Arrive.Text = "Date d\'arrivée";
            // 
            // label_Depart
            // 
            this.label_Depart.AutoSize = true;
            this.label_Depart.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label_Depart.Location = new System.Drawing.Point(24, 431);
            this.label_Depart.Name = "label_Depart";
            this.label_Depart.Size = new System.Drawing.Size(116, 20);
            this.label_Depart.TabIndex = 0;
            this.label_Depart.Text = "Date de départ";
            // 
            // dateTimePicker_DebutCamping
            // 
            this.dateTimePicker_DebutCamping.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.dateTimePicker_DebutCamping.Format = System.Windows.Forms.DateTimePickerFormat.Short;
            this.dateTimePicker_DebutCamping.Location = new System.Drawing.Point(24, 385);
            this.dateTimePicker_DebutCamping.Name = "dateTimePicker_DebutCamping";
            this.dateTimePicker_DebutCamping.Size = new System.Drawing.Size(148, 26);
            this.dateTimePicker_DebutCamping.TabIndex = 1;
            this.dateTimePicker_DebutCamping.ValueChanged += new System.EventHandler(this.dateTimePicker_DebutCamping_ValueChanged);
            // 
            // dateTimePicker_FinCamping
            // 
            this.dateTimePicker_FinCamping.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.dateTimePicker_FinCamping.Format = System.Windows.Forms.DateTimePickerFormat.Short;
            this.dateTimePicker_FinCamping.Location = new System.Drawing.Point(24, 463);
            this.dateTimePicker_FinCamping.Name = "dateTimePicker_FinCamping";
            this.dateTimePicker_FinCamping.Size = new System.Drawing.Size(148, 26);
            this.dateTimePicker_FinCamping.TabIndex = 4;
            this.dateTimePicker_FinCamping.ValueChanged += new System.EventHandler(this.dateTimePicker_FinCamping_ValueChanged);
            // 
            // button_Confirmer_Reservation
            // 
            this.button_Confirmer_Reservation.Font = new System.Drawing.Font("Times New Roman", 18F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.button_Confirmer_Reservation.Location = new System.Drawing.Point(28, 512);
            this.button_Confirmer_Reservation.Name = "button_Confirmer_Reservation";
            this.button_Confirmer_Reservation.Size = new System.Drawing.Size(1067, 46);
            this.button_Confirmer_Reservation.TabIndex = 30;
            this.button_Confirmer_Reservation.Text = "Faire la réservation";
            this.button_Confirmer_Reservation.UseVisualStyleBackColor = true;
            this.button_Confirmer_Reservation.Click += new System.EventHandler(this.button_Confirmer_Reservation_Click);
            // 
            // label_Enfant
            // 
            this.label_Enfant.AutoSize = true;
            this.label_Enfant.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label_Enfant.Location = new System.Drawing.Point(222, 431);
            this.label_Enfant.Name = "label_Enfant";
            this.label_Enfant.Size = new System.Drawing.Size(145, 20);
            this.label_Enfant.TabIndex = 0;
            this.label_Enfant.Text = "Enfant (0 à 17 ans)";
            // 
            // label_Adulte
            // 
            this.label_Adulte.AutoSize = true;
            this.label_Adulte.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label_Adulte.Location = new System.Drawing.Point(222, 347);
            this.label_Adulte.Name = "label_Adulte";
            this.label_Adulte.Size = new System.Drawing.Size(63, 20);
            this.label_Adulte.TabIndex = 0;
            this.label_Adulte.Text = "Adultes";
            // 
            // numericUpDown_Nombre_Adulte
            // 
            this.numericUpDown_Nombre_Adulte.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.numericUpDown_Nombre_Adulte.Location = new System.Drawing.Point(226, 385);
            this.numericUpDown_Nombre_Adulte.Name = "numericUpDown_Nombre_Adulte";
            this.numericUpDown_Nombre_Adulte.Size = new System.Drawing.Size(141, 26);
            this.numericUpDown_Nombre_Adulte.TabIndex = 7;
            this.numericUpDown_Nombre_Adulte.ValueChanged += new System.EventHandler(this.numericUpDown_Nombre_Adulte_ValueChanged);
            // 
            // numericUpDown_Nombre_Enfant
            // 
            this.numericUpDown_Nombre_Enfant.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.numericUpDown_Nombre_Enfant.Location = new System.Drawing.Point(226, 463);
            this.numericUpDown_Nombre_Enfant.Name = "numericUpDown_Nombre_Enfant";
            this.numericUpDown_Nombre_Enfant.Size = new System.Drawing.Size(141, 26);
            this.numericUpDown_Nombre_Enfant.TabIndex = 10;
            this.numericUpDown_Nombre_Enfant.ValueChanged += new System.EventHandler(this.numericUpDown_Nombre_Enfant_ValueChanged);
            // 
            // label_Herbergement
            // 
            this.label_Herbergement.AutoSize = true;
            this.label_Herbergement.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label_Herbergement.Location = new System.Drawing.Point(408, 347);
            this.label_Herbergement.Name = "label_Herbergement";
            this.label_Herbergement.Size = new System.Drawing.Size(147, 20);
            this.label_Herbergement.TabIndex = 0;
            this.label_Herbergement.Text = "Choix hébergement";
            // 
            // statusStrip_Reservation
            // 
            this.statusStrip_Reservation.Items.AddRange(new System.Windows.Forms.ToolStripItem[] {
            this.toolStripStatusLabel_Sauvegarde});
            this.statusStrip_Reservation.Location = new System.Drawing.Point(0, 580);
            this.statusStrip_Reservation.Name = "statusStrip_Reservation";
            this.statusStrip_Reservation.Size = new System.Drawing.Size(1132, 22);
            this.statusStrip_Reservation.TabIndex = 0;
            this.statusStrip_Reservation.Text = "statusStrip1";
            // 
            // toolStripStatusLabel_Sauvegarde
            // 
            this.toolStripStatusLabel_Sauvegarde.Name = "toolStripStatusLabel_Sauvegarde";
            this.toolStripStatusLabel_Sauvegarde.Size = new System.Drawing.Size(0, 17);
            // 
            // listBox_Choix_Hebergement
            // 
            this.listBox_Choix_Hebergement.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.listBox_Choix_Hebergement.FormattingEnabled = true;
            this.listBox_Choix_Hebergement.ItemHeight = 20;
            this.listBox_Choix_Hebergement.Items.AddRange(new object[] {
            "Terrain rustique",
            "Terrain aménagé",
            "Véhicule récréatif",
            "Prêt-à-Camper"});
            this.listBox_Choix_Hebergement.Location = new System.Drawing.Point(412, 385);
            this.listBox_Choix_Hebergement.Name = "listBox_Choix_Hebergement";
            this.listBox_Choix_Hebergement.Size = new System.Drawing.Size(143, 104);
            this.listBox_Choix_Hebergement.TabIndex = 14;
            this.listBox_Choix_Hebergement.SelectedIndexChanged += new System.EventHandler(this.listBox_Choix_Hebergement_SelectedIndexChanged);
            // 
            // label_PaieMethod
            // 
            this.label_PaieMethod.AutoSize = true;
            this.label_PaieMethod.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label_PaieMethod.Location = new System.Drawing.Point(594, 452);
            this.label_PaieMethod.Name = "label_PaieMethod";
            this.label_PaieMethod.Size = new System.Drawing.Size(141, 20);
            this.label_PaieMethod.TabIndex = 0;
            this.label_PaieMethod.Text = "Mode de paiement";
            // 
            // label_Mail
            // 
            this.label_Mail.AutoSize = true;
            this.label_Mail.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label_Mail.Location = new System.Drawing.Point(594, 401);
            this.label_Mail.Name = "label_Mail";
            this.label_Mail.Size = new System.Drawing.Size(63, 20);
            this.label_Mail.TabIndex = 0;
            this.label_Mail.Text = "Courriel";
            // 
            // label_Nom
            // 
            this.label_Nom.AutoSize = true;
            this.label_Nom.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label_Nom.Location = new System.Drawing.Point(594, 347);
            this.label_Nom.Name = "label_Nom";
            this.label_Nom.Size = new System.Drawing.Size(42, 20);
            this.label_Nom.TabIndex = 0;
            this.label_Nom.Text = "Nom";
            // 
            // textBox_Name
            // 
            this.textBox_Name.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.textBox_Name.Location = new System.Drawing.Point(598, 371);
            this.textBox_Name.Name = "textBox_Name";
            this.textBox_Name.Size = new System.Drawing.Size(196, 26);
            this.textBox_Name.TabIndex = 18;
            this.textBox_Name.TextChanged += new System.EventHandler(this.textBox_Name_TextChanged);
            // 
            // textBox_Email
            // 
            this.textBox_Email.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.textBox_Email.Location = new System.Drawing.Point(598, 423);
            this.textBox_Email.Name = "textBox_Email";
            this.textBox_Email.Size = new System.Drawing.Size(196, 26);
            this.textBox_Email.TabIndex = 22;
            this.textBox_Email.TextChanged += new System.EventHandler(this.textBox_Email_TextChanged);
            // 
            // comboBox_MethodePaiement
            // 
            this.comboBox_MethodePaiement.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.comboBox_MethodePaiement.FormattingEnabled = true;
            this.comboBox_MethodePaiement.Items.AddRange(new object[] {
            "Interac",
            "Crédit-Visa",
            "Crédit-MasterCard",
            "Crédit-Amex"});
            this.comboBox_MethodePaiement.Location = new System.Drawing.Point(598, 476);
            this.comboBox_MethodePaiement.Name = "comboBox_MethodePaiement";
            this.comboBox_MethodePaiement.Size = new System.Drawing.Size(196, 28);
            this.comboBox_MethodePaiement.TabIndex = 26;
            this.comboBox_MethodePaiement.SelectedIndexChanged += new System.EventHandler(this.comboBox_MethodePaiement_SelectedIndexChanged);
            // 
            // richTextBox_Facture
            // 
            this.richTextBox_Facture.Font = new System.Drawing.Font("Times New Roman", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.richTextBox_Facture.Location = new System.Drawing.Point(834, 347);
            this.richTextBox_Facture.Name = "richTextBox_Facture";
            this.richTextBox_Facture.ReadOnly = true;
            this.richTextBox_Facture.Size = new System.Drawing.Size(261, 157);
            this.richTextBox_Facture.TabIndex = 0;
            this.richTextBox_Facture.Text = "";
            // 
            // label_Facture
            // 
            this.label_Facture.AutoSize = true;
            this.label_Facture.Font = new System.Drawing.Font("Times New Roman", 18F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label_Facture.Location = new System.Drawing.Point(994, 311);
            this.label_Facture.Name = "label_Facture";
            this.label_Facture.Size = new System.Drawing.Size(101, 26);
            this.label_Facture.TabIndex = 0;
            this.label_Facture.Text = "Facture:";
            // 
            // errorProvider_ETAPE1_Date
            // 
            this.errorProvider_ETAPE1_Date.ContainerControl = this;
            // 
            // errorProvider_ETAPE2_Capacite
            // 
            this.errorProvider_ETAPE2_Capacite.ContainerControl = this;
            // 
            // errorProvider_ETAPE4_Nom
            // 
            this.errorProvider_ETAPE4_Nom.ContainerControl = this;
            // 
            // errorProvider_ETAPE4_Email
            // 
            this.errorProvider_ETAPE4_Email.ContainerControl = this;
            // 
            // ReservationClient
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(1132, 602);
            this.Controls.Add(this.label_Facture);
            this.Controls.Add(this.richTextBox_Facture);
            this.Controls.Add(this.comboBox_MethodePaiement);
            this.Controls.Add(this.textBox_Email);
            this.Controls.Add(this.textBox_Name);
            this.Controls.Add(this.label_Nom);
            this.Controls.Add(this.label_Mail);
            this.Controls.Add(this.label_PaieMethod);
            this.Controls.Add(this.listBox_Choix_Hebergement);
            this.Controls.Add(this.statusStrip_Reservation);
            this.Controls.Add(this.label_Herbergement);
            this.Controls.Add(this.numericUpDown_Nombre_Enfant);
            this.Controls.Add(this.numericUpDown_Nombre_Adulte);
            this.Controls.Add(this.label_Adulte);
            this.Controls.Add(this.label_Enfant);
            this.Controls.Add(this.button_Confirmer_Reservation);
            this.Controls.Add(this.dateTimePicker_FinCamping);
            this.Controls.Add(this.dateTimePicker_DebutCamping);
            this.Controls.Add(this.label_Depart);
            this.Controls.Add(this.label_Arrive);
            this.Controls.Add(this.pictureBox_Apercu_Camping);
            this.Controls.Add(this.label_Etape4);
            this.Controls.Add(this.label_Etape3);
            this.Controls.Add(this.label_Etape2);
            this.Controls.Add(this.label_Étape1);
            this.Controls.Add(this.label_Titre_Camping);
            this.Controls.Add(this.label_réserv);
            this.Controls.Add(this.label_CampinngQuebec);
            this.Controls.Add(this.pictureBox_IconCamping);
            this.Controls.Add(this.menuStrip_Reservation);
            this.MainMenuStrip = this.menuStrip_Reservation;
            this.Name = "ReservationClient";
            this.Text = "Réservation d\'un client - TP2 - Jonathan Lamontagne";
            this.Load += new System.EventHandler(this.ReservationClient_Load);
            this.menuStrip_Reservation.ResumeLayout(false);
            this.menuStrip_Reservation.PerformLayout();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBox_IconCamping)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBox_Apercu_Camping)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.numericUpDown_Nombre_Adulte)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.numericUpDown_Nombre_Enfant)).EndInit();
            this.statusStrip_Reservation.ResumeLayout(false);
            this.statusStrip_Reservation.PerformLayout();
            ((System.ComponentModel.ISupportInitialize)(this.errorProvider_ETAPE1_Date)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.errorProvider_ETAPE2_Capacite)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.errorProvider_ETAPE4_Nom)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.errorProvider_ETAPE4_Email)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.MenuStrip menuStrip_Reservation;
        private System.Windows.Forms.ToolStripMenuItem réservationToolStripMenuItem;
        private System.Windows.Forms.ToolStripMenuItem nouvelleRéservationToolStripMenuItem;
        private System.Windows.Forms.ToolStripMenuItem faireLaRToolStripMenuItem;
        private System.Windows.Forms.ToolStripSeparator toolStripSeparator1;
        private System.Windows.Forms.ToolStripMenuItem afficherLesRéservationToolStripMenuItem;
        private System.Windows.Forms.ToolStripSeparator toolStripSeparator2;
        private System.Windows.Forms.ToolStripMenuItem retourAuMenuPrincipalToolStripMenuItem;
        private System.Windows.Forms.PictureBox pictureBox_IconCamping;
        private System.Windows.Forms.Label label_CampinngQuebec;
        private System.Windows.Forms.Label label_réserv;
        private System.Windows.Forms.Label label_Titre_Camping;
        private System.Windows.Forms.Label label_Étape1;
        private System.Windows.Forms.Label label_Etape2;
        private System.Windows.Forms.Label label_Etape3;
        private System.Windows.Forms.Label label_Etape4;
        private System.Windows.Forms.PictureBox pictureBox_Apercu_Camping;
        private System.Windows.Forms.Label label_Arrive;
        private System.Windows.Forms.Label label_Depart;
        private System.Windows.Forms.DateTimePicker dateTimePicker_DebutCamping;
        private System.Windows.Forms.DateTimePicker dateTimePicker_FinCamping;
        private System.Windows.Forms.Button button_Confirmer_Reservation;
        private System.Windows.Forms.Label label_Enfant;
        private System.Windows.Forms.Label label_Adulte;
        private System.Windows.Forms.NumericUpDown numericUpDown_Nombre_Adulte;
        private System.Windows.Forms.NumericUpDown numericUpDown_Nombre_Enfant;
        private System.Windows.Forms.Label label_Herbergement;
        private System.Windows.Forms.StatusStrip statusStrip_Reservation;
        private System.Windows.Forms.ToolStripStatusLabel toolStripStatusLabel_Sauvegarde;
        private System.Windows.Forms.ListBox listBox_Choix_Hebergement;
        private System.Windows.Forms.Label label_PaieMethod;
        private System.Windows.Forms.Label label_Mail;
        private System.Windows.Forms.Label label_Nom;
        private System.Windows.Forms.TextBox textBox_Name;
        private System.Windows.Forms.TextBox textBox_Email;
        private System.Windows.Forms.ComboBox comboBox_MethodePaiement;
        private System.Windows.Forms.RichTextBox richTextBox_Facture;
        private System.Windows.Forms.Label label_Facture;
        private System.Windows.Forms.ErrorProvider errorProvider_ETAPE1_Date;
        private System.Windows.Forms.ErrorProvider errorProvider_ETAPE2_Capacite;
        private System.Windows.Forms.ErrorProvider errorProvider_ETAPE4_Nom;
        private System.Windows.Forms.ErrorProvider errorProvider_ETAPE4_Email;
        private System.Windows.Forms.SaveFileDialog saveFileDialog_Reservation;
    }
}