namespace TP2
{
    partial class MenuAffichage
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
            this.pictureBox_Reservation = new System.Windows.Forms.PictureBox();
            this.pictureBox_Icon_Camping = new System.Windows.Forms.PictureBox();
            this.label_Selection = new System.Windows.Forms.Label();
            this.comboBox_numero_reservation = new System.Windows.Forms.ComboBox();
            this.richTextBox_Affichage_Reservation = new System.Windows.Forms.RichTextBox();
            this.button_Quitter = new System.Windows.Forms.Button();
            this.label_NomCamping = new System.Windows.Forms.Label();
            this.openFileDialog_Reservation = new System.Windows.Forms.OpenFileDialog();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBox_Reservation)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBox_Icon_Camping)).BeginInit();
            this.SuspendLayout();
            // 
            // pictureBox_Reservation
            // 
            this.pictureBox_Reservation.Image = global::TP2.Properties.Resources.reservation;
            this.pictureBox_Reservation.Location = new System.Drawing.Point(212, 27);
            this.pictureBox_Reservation.Name = "pictureBox_Reservation";
            this.pictureBox_Reservation.Size = new System.Drawing.Size(540, 122);
            this.pictureBox_Reservation.SizeMode = System.Windows.Forms.PictureBoxSizeMode.StretchImage;
            this.pictureBox_Reservation.TabIndex = 1;
            this.pictureBox_Reservation.TabStop = false;
            // 
            // pictureBox_Icon_Camping
            // 
            this.pictureBox_Icon_Camping.Image = global::TP2.Properties.Resources.camping_icon;
            this.pictureBox_Icon_Camping.Location = new System.Drawing.Point(36, 27);
            this.pictureBox_Icon_Camping.Name = "pictureBox_Icon_Camping";
            this.pictureBox_Icon_Camping.Size = new System.Drawing.Size(129, 122);
            this.pictureBox_Icon_Camping.SizeMode = System.Windows.Forms.PictureBoxSizeMode.StretchImage;
            this.pictureBox_Icon_Camping.TabIndex = 0;
            this.pictureBox_Icon_Camping.TabStop = false;
            // 
            // label_Selection
            // 
            this.label_Selection.AutoSize = true;
            this.label_Selection.Font = new System.Drawing.Font("Times New Roman", 14.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label_Selection.Location = new System.Drawing.Point(32, 179);
            this.label_Selection.Name = "label_Selection";
            this.label_Selection.Size = new System.Drawing.Size(388, 22);
            this.label_Selection.TabIndex = 0;
            this.label_Selection.Text = "Veuillez sélectionner un numéro de réservation";
            // 
            // comboBox_numero_reservation
            // 
            this.comboBox_numero_reservation.DropDownStyle = System.Windows.Forms.ComboBoxStyle.DropDownList;
            this.comboBox_numero_reservation.Font = new System.Drawing.Font("Times New Roman", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.comboBox_numero_reservation.FormattingEnabled = true;
            this.comboBox_numero_reservation.Location = new System.Drawing.Point(36, 204);
            this.comboBox_numero_reservation.Name = "comboBox_numero_reservation";
            this.comboBox_numero_reservation.Size = new System.Drawing.Size(388, 27);
            this.comboBox_numero_reservation.TabIndex = 1;
            this.comboBox_numero_reservation.SelectedIndexChanged += new System.EventHandler(this.comboBox_numero_reservation_SelectedIndexChanged);
            // 
            // richTextBox_Affichage_Reservation
            // 
            this.richTextBox_Affichage_Reservation.Font = new System.Drawing.Font("Times New Roman", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.richTextBox_Affichage_Reservation.Location = new System.Drawing.Point(36, 237);
            this.richTextBox_Affichage_Reservation.Name = "richTextBox_Affichage_Reservation";
            this.richTextBox_Affichage_Reservation.ReadOnly = true;
            this.richTextBox_Affichage_Reservation.Size = new System.Drawing.Size(716, 256);
            this.richTextBox_Affichage_Reservation.TabIndex = 0;
            this.richTextBox_Affichage_Reservation.Text = "";
            // 
            // button_Quitter
            // 
            this.button_Quitter.Font = new System.Drawing.Font("Times New Roman", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.button_Quitter.Location = new System.Drawing.Point(36, 500);
            this.button_Quitter.Name = "button_Quitter";
            this.button_Quitter.Size = new System.Drawing.Size(716, 41);
            this.button_Quitter.TabIndex = 4;
            this.button_Quitter.Text = "Quitter";
            this.button_Quitter.UseVisualStyleBackColor = true;
            this.button_Quitter.Click += new System.EventHandler(this.button_Quitter_Click);
            // 
            // label_NomCamping
            // 
            this.label_NomCamping.AutoSize = true;
            this.label_NomCamping.Font = new System.Drawing.Font("Times New Roman", 15.75F, ((System.Drawing.FontStyle)((System.Drawing.FontStyle.Bold | System.Drawing.FontStyle.Underline))), System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label_NomCamping.Location = new System.Drawing.Point(430, 207);
            this.label_NomCamping.Name = "label_NomCamping";
            this.label_NomCamping.Size = new System.Drawing.Size(0, 24);
            this.label_NomCamping.TabIndex = 0;
            // 
            // MenuAffichage
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(789, 553);
            this.Controls.Add(this.label_NomCamping);
            this.Controls.Add(this.button_Quitter);
            this.Controls.Add(this.richTextBox_Affichage_Reservation);
            this.Controls.Add(this.comboBox_numero_reservation);
            this.Controls.Add(this.label_Selection);
            this.Controls.Add(this.pictureBox_Reservation);
            this.Controls.Add(this.pictureBox_Icon_Camping);
            this.Name = "MenuAffichage";
            this.Text = "MenuAffichage";
            this.Load += new System.EventHandler(this.MenuAffichage_Load);
            ((System.ComponentModel.ISupportInitialize)(this.pictureBox_Reservation)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBox_Icon_Camping)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.PictureBox pictureBox_Icon_Camping;
        private System.Windows.Forms.PictureBox pictureBox_Reservation;
        private System.Windows.Forms.Label label_Selection;
        private System.Windows.Forms.ComboBox comboBox_numero_reservation;
        private System.Windows.Forms.RichTextBox richTextBox_Affichage_Reservation;
        private System.Windows.Forms.Button button_Quitter;
        private System.Windows.Forms.Label label_NomCamping;
        private System.Windows.Forms.OpenFileDialog openFileDialog_Reservation;
    }
}