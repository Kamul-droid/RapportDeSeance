<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221215125844 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE acides_amines (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE animaux_familles (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE balance_hormonale_femelle (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE balance_hormonale_male (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chakra (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE choix_bio_specifique (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE choix_de_feedback (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE choix_de_voies (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE choix_solution (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chronologie_des_facteurs (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, surname VARCHAR(255) NOT NULL, dateofbirth DATETIME NOT NULL, placeofbirth VARCHAR(255) NOT NULL, s_group VARCHAR(10) NOT NULL, hand VARCHAR(25) NOT NULL, work VARCHAR(255) NOT NULL, tel VARCHAR(70) NOT NULL, email VARCHAR(80) NOT NULL, address VARCHAR(255) NOT NULL, postalcode VARCHAR(50) NOT NULL, country VARCHAR(80) NOT NULL, sex VARCHAR(10) NOT NULL, children INT NOT NULL, children_sex VARCHAR(20) NOT NULL, maried VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE conseil_evaluation_pour_auto_evaluation (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE detox_du_corps (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equilibre_harmonique_cerveau_gauche_cerveau_droit (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facteurs_de_stress (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facteurs_de_stress_conflictuel (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facteurs_de_stress_emotionnel (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facteurs_de_stress_personnel_et_auto_induit (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facteurs_de_stress_relationnel (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facteurs_generaux (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facteurs_miasmatiques (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE feedbacksupplementaire (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fiche_client (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE meridien (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE miasmes_et_anti_vieillissement (id INT AUTO_INCREMENT NOT NULL, facteurs_miasmatiques VARCHAR(255) NOT NULL, facteurs_de_stress VARCHAR(255) NOT NULL, reaction_age VARCHAR(255) NOT NULL, facteurs_generaux VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mineraux (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pathogenes_et_autres_substances_toxiques (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_acu_meridien (id INT AUTO_INCREMENT NOT NULL, fiche_client_id INT DEFAULT NULL, meridien VARCHAR(255) NOT NULL, feedback LONGTEXT NOT NULL, commentaire LONGTEXT NOT NULL, INDEX IDX_CB73855B9E85D4C9 (fiche_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_allergie (id INT AUTO_INCREMENT NOT NULL, fiche_client_id INT DEFAULT NULL, commentaire LONGTEXT NOT NULL, nom_item LONGTEXT NOT NULL, feedbacksupplementaire VARCHAR(255) NOT NULL, INDEX IDX_231EBE79E85D4C9 (fiche_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_animaux (id INT AUTO_INCREMENT NOT NULL, fiche_client_id INT DEFAULT NULL, animaux_familles VARCHAR(255) NOT NULL, INDEX IDX_1FAAD61C9E85D4C9 (fiche_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_bio_feed_back_gemmes (id INT AUTO_INCREMENT NOT NULL, fiche_client_id INT DEFAULT NULL, INDEX IDX_AEE539899E85D4C9 (fiche_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_cell_com (id INT AUTO_INCREMENT NOT NULL, fiche_client_id INT DEFAULT NULL, evaluation_des_chromosomes LONGTEXT NOT NULL, evaluation_des_genes LONGTEXT NOT NULL, auto_feedback_pour_cell_comm LONGTEXT NOT NULL, INDEX IDX_D54C3BB39E85D4C9 (fiche_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_cerveau (id INT AUTO_INCREMENT NOT NULL, fiche_client_id INT DEFAULT NULL, reglage_ondes_cerebrales VARCHAR(255) NOT NULL, add_ LONGTEXT NOT NULL, dhda LONGTEXT NOT NULL, equilibre_harmonique_cerveau_gauche_cerveau_droit VARCHAR(255) NOT NULL, choix_item LONGTEXT NOT NULL, INDEX IDX_25CC42CF9E85D4C9 (fiche_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_chromosomes_et_genes (id INT AUTO_INCREMENT NOT NULL, fiche_client_id INT DEFAULT NULL, evaluation_des_chromosomes LONGTEXT NOT NULL, evaluation_des_genes LONGTEXT NOT NULL, auto_feedback_pour_celle_comm LONGTEXT NOT NULL, INDEX IDX_BABC4789E85D4C9 (fiche_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_circulation_coeur (id INT AUTO_INCREMENT NOT NULL, fiche_client_id INT DEFAULT NULL, transfert VARCHAR(255) NOT NULL, valves_arteres LONGTEXT NOT NULL, choix_biospecifique VARCHAR(255) NOT NULL, choix_item LONGTEXT NOT NULL, INDEX IDX_6412901C9E85D4C9 (fiche_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_cosmetique (id INT AUTO_INCREMENT NOT NULL, fiche_client_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_811E03B49E85D4C9 (fiche_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_couleurs_chakras (id INT AUTO_INCREMENT NOT NULL, fiche_client_id INT DEFAULT NULL, chakra VARCHAR(255) NOT NULL, INDEX IDX_7741EA539E85D4C9 (fiche_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_dentaire (id INT AUTO_INCREMENT NOT NULL, fiche_client_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_2E05A1889E85D4C9 (fiche_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_detox_et_stress_multiples (id INT AUTO_INCREMENT NOT NULL, fiche_client_id INT DEFAULT NULL, toxines_environnementales_et_industrielles VARCHAR(255) NOT NULL, pathogenes_et_autres_substances_toxiques VARCHAR(255) NOT NULL, facteurs_de_stress_personnel_et_auto_induit VARCHAR(255) NOT NULL, detox_du_corps VARCHAR(255) NOT NULL, INDEX IDX_FFCAE9EA9E85D4C9 (fiche_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_digestifs (id INT AUTO_INCREMENT NOT NULL, fiche_client_id INT DEFAULT NULL, transfert VARCHAR(255) NOT NULL, choix_bio_specifique LONGTEXT NOT NULL, choix_items LONGTEXT NOT NULL, INDEX IDX_71F314E89E85D4C9 (fiche_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_dimensionnel (id INT AUTO_INCREMENT NOT NULL, fiche_client_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_D6351FBD9E85D4C9 (fiche_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_homeopathique (id INT AUTO_INCREMENT NOT NULL, fiche_client_id INT DEFAULT NULL, generateur_homeopathique LONGTEXT NOT NULL, commentaire LONGTEXT NOT NULL, INDEX IDX_7EE95C5D9E85D4C9 (fiche_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_hormonal (id INT AUTO_INCREMENT NOT NULL, balance_hormonale_femelle VARCHAR(255) NOT NULL, balance_hormonale_male VARCHAR(255) NOT NULL, glandes_hormones LONGTEXT NOT NULL, commentaire LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_iridologie (id INT AUTO_INCREMENT NOT NULL, fiche_client_id INT DEFAULT NULL, table_a_langer VARCHAR(255) NOT NULL, commentaire LONGTEXT NOT NULL, image LONGTEXT NOT NULL, INDEX IDX_99EC7C0D9E85D4C9 (fiche_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_lymphatique (id INT AUTO_INCREMENT NOT NULL, fiche_client_id INT DEFAULT NULL, transfert VARCHAR(255) NOT NULL, choix_bio_specifique LONGTEXT NOT NULL, choix_items LONGTEXT NOT NULL, INDEX IDX_6B79CF9A9E85D4C9 (fiche_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_musculaire (id INT AUTO_INCREMENT NOT NULL, fiche_client_id INT DEFAULT NULL, transfert VARCHAR(255) NOT NULL, choix_bio_specifique LONGTEXT NOT NULL, choix_items LONGTEXT NOT NULL, INDEX IDX_3D80128D9E85D4C9 (fiche_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_nerfs (id INT AUTO_INCREMENT NOT NULL, fiche_client_id INT DEFAULT NULL, transfert VARCHAR(255) NOT NULL, choix_bio_specifique LONGTEXT NOT NULL, choix_items LONGTEXT NOT NULL, INDEX IDX_F0AB2DD9E85D4C9 (fiche_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_neuro_emotionnel (id INT AUTO_INCREMENT NOT NULL, fiche_client_id INT DEFAULT NULL, conseil_evaluation_pour_auto_evaluation VARCHAR(255) NOT NULL, INDEX IDX_E0CFBD189E85D4C9 (fiche_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_nutrition (id INT AUTO_INCREMENT NOT NULL, fiche_client_id INT DEFAULT NULL, mineraux VARCHAR(255) NOT NULL, acides_amines VARCHAR(255) NOT NULL, vitamines VARCHAR(255) NOT NULL, INDEX IDX_1FB856D19E85D4C9 (fiche_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_oreilles_yeux (id INT AUTO_INCREMENT NOT NULL, fiche_client_id INT DEFAULT NULL, transfert VARCHAR(255) NOT NULL, choix_bio_specifique LONGTEXT NOT NULL, choix_items LONGTEXT NOT NULL, INDEX IDX_F130EFAA9E85D4C9 (fiche_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_os (id INT AUTO_INCREMENT NOT NULL, fiche_client_id INT DEFAULT NULL, transfert VARCHAR(255) NOT NULL, choix_bio_specifique VARCHAR(255) NOT NULL, reduction VARCHAR(255) NOT NULL, nom_os LONGTEXT NOT NULL, liste_items LONGTEXT NOT NULL, INDEX IDX_F2D7F2399E85D4C9 (fiche_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_rachidien (id INT AUTO_INCREMENT NOT NULL, fiche_client_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_77FE4CD9E85D4C9 (fiche_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_registre_auto_programme (id INT AUTO_INCREMENT NOT NULL, fiche_client_id INT DEFAULT NULL, registre_susceptibilite VARCHAR(255) NOT NULL, transfert VARCHAR(255) NOT NULL, INDEX IDX_C8A1A1BA9E85D4C9 (fiche_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_registre_susceptibilite (id INT AUTO_INCREMENT NOT NULL, fiche_client_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, registre_de_susceptibilite VARCHAR(255) NOT NULL, transfert VARCHAR(255) NOT NULL, INDEX IDX_C20FE2469E85D4C9 (fiche_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_respiratoire (id INT AUTO_INCREMENT NOT NULL, fiche_client_id INT DEFAULT NULL, transfert VARCHAR(255) NOT NULL, choix_bio_specifique VARCHAR(255) NOT NULL, choix_items LONGTEXT NOT NULL, INDEX IDX_764718829E85D4C9 (fiche_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_rife_simili (id INT AUTO_INCREMENT NOT NULL, fiche_client_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_B212EBFE9E85D4C9 (fiche_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_sinus_gorge (id INT AUTO_INCREMENT NOT NULL, fiche_client_id INT DEFAULT NULL, transfert VARCHAR(255) NOT NULL, choix_bio_specifique LONGTEXT NOT NULL, choix_items LONGTEXT NOT NULL, INDEX IDX_23849E339E85D4C9 (fiche_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_transformation_emtionnelle_et_chronologique (id INT AUTO_INCREMENT NOT NULL, fiche_client_id INT DEFAULT NULL, choix_de_voies VARCHAR(255) NOT NULL, facteurs_de_stress_emotionnel VARCHAR(255) NOT NULL, facteurs_de_stress_conflictuel VARCHAR(255) NOT NULL, choix_de_feedback VARCHAR(255) NOT NULL, choix_solution VARCHAR(255) NOT NULL, facteurs_de_stress_relationnel VARCHAR(255) NOT NULL, chronologie_de_facteurs VARCHAR(255) NOT NULL, INDEX IDX_6438C79C9E85D4C9 (fiche_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reaction_age (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reduction (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE registre_de_susceptibilite (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reglage_ondes_cerebrales (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rife (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE susceptibilite (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE systeme_dorganes (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE table_alanger (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE toxines_environnementales_et_industrielles (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transfert (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vitamines (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE profil_acu_meridien ADD CONSTRAINT FK_CB73855B9E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('ALTER TABLE profil_allergie ADD CONSTRAINT FK_231EBE79E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('ALTER TABLE profil_animaux ADD CONSTRAINT FK_1FAAD61C9E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('ALTER TABLE profil_bio_feed_back_gemmes ADD CONSTRAINT FK_AEE539899E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('ALTER TABLE profil_cell_com ADD CONSTRAINT FK_D54C3BB39E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('ALTER TABLE profil_cerveau ADD CONSTRAINT FK_25CC42CF9E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('ALTER TABLE profil_chromosomes_et_genes ADD CONSTRAINT FK_BABC4789E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('ALTER TABLE profil_circulation_coeur ADD CONSTRAINT FK_6412901C9E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('ALTER TABLE profil_cosmetique ADD CONSTRAINT FK_811E03B49E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('ALTER TABLE profil_couleurs_chakras ADD CONSTRAINT FK_7741EA539E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('ALTER TABLE profil_dentaire ADD CONSTRAINT FK_2E05A1889E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('ALTER TABLE profil_detox_et_stress_multiples ADD CONSTRAINT FK_FFCAE9EA9E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('ALTER TABLE profil_digestifs ADD CONSTRAINT FK_71F314E89E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('ALTER TABLE profil_dimensionnel ADD CONSTRAINT FK_D6351FBD9E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('ALTER TABLE profil_homeopathique ADD CONSTRAINT FK_7EE95C5D9E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('ALTER TABLE profil_iridologie ADD CONSTRAINT FK_99EC7C0D9E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('ALTER TABLE profil_lymphatique ADD CONSTRAINT FK_6B79CF9A9E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('ALTER TABLE profil_musculaire ADD CONSTRAINT FK_3D80128D9E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('ALTER TABLE profil_nerfs ADD CONSTRAINT FK_F0AB2DD9E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('ALTER TABLE profil_neuro_emotionnel ADD CONSTRAINT FK_E0CFBD189E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('ALTER TABLE profil_nutrition ADD CONSTRAINT FK_1FB856D19E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('ALTER TABLE profil_oreilles_yeux ADD CONSTRAINT FK_F130EFAA9E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('ALTER TABLE profil_os ADD CONSTRAINT FK_F2D7F2399E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('ALTER TABLE profil_rachidien ADD CONSTRAINT FK_77FE4CD9E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('ALTER TABLE profil_registre_auto_programme ADD CONSTRAINT FK_C8A1A1BA9E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('ALTER TABLE profil_registre_susceptibilite ADD CONSTRAINT FK_C20FE2469E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('ALTER TABLE profil_respiratoire ADD CONSTRAINT FK_764718829E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('ALTER TABLE profil_rife_simili ADD CONSTRAINT FK_B212EBFE9E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('ALTER TABLE profil_sinus_gorge ADD CONSTRAINT FK_23849E339E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('ALTER TABLE profil_transformation_emtionnelle_et_chronologique ADD CONSTRAINT FK_6438C79C9E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE profil_acu_meridien DROP FOREIGN KEY FK_CB73855B9E85D4C9');
        $this->addSql('ALTER TABLE profil_allergie DROP FOREIGN KEY FK_231EBE79E85D4C9');
        $this->addSql('ALTER TABLE profil_animaux DROP FOREIGN KEY FK_1FAAD61C9E85D4C9');
        $this->addSql('ALTER TABLE profil_bio_feed_back_gemmes DROP FOREIGN KEY FK_AEE539899E85D4C9');
        $this->addSql('ALTER TABLE profil_cell_com DROP FOREIGN KEY FK_D54C3BB39E85D4C9');
        $this->addSql('ALTER TABLE profil_cerveau DROP FOREIGN KEY FK_25CC42CF9E85D4C9');
        $this->addSql('ALTER TABLE profil_chromosomes_et_genes DROP FOREIGN KEY FK_BABC4789E85D4C9');
        $this->addSql('ALTER TABLE profil_circulation_coeur DROP FOREIGN KEY FK_6412901C9E85D4C9');
        $this->addSql('ALTER TABLE profil_cosmetique DROP FOREIGN KEY FK_811E03B49E85D4C9');
        $this->addSql('ALTER TABLE profil_couleurs_chakras DROP FOREIGN KEY FK_7741EA539E85D4C9');
        $this->addSql('ALTER TABLE profil_dentaire DROP FOREIGN KEY FK_2E05A1889E85D4C9');
        $this->addSql('ALTER TABLE profil_detox_et_stress_multiples DROP FOREIGN KEY FK_FFCAE9EA9E85D4C9');
        $this->addSql('ALTER TABLE profil_digestifs DROP FOREIGN KEY FK_71F314E89E85D4C9');
        $this->addSql('ALTER TABLE profil_dimensionnel DROP FOREIGN KEY FK_D6351FBD9E85D4C9');
        $this->addSql('ALTER TABLE profil_homeopathique DROP FOREIGN KEY FK_7EE95C5D9E85D4C9');
        $this->addSql('ALTER TABLE profil_iridologie DROP FOREIGN KEY FK_99EC7C0D9E85D4C9');
        $this->addSql('ALTER TABLE profil_lymphatique DROP FOREIGN KEY FK_6B79CF9A9E85D4C9');
        $this->addSql('ALTER TABLE profil_musculaire DROP FOREIGN KEY FK_3D80128D9E85D4C9');
        $this->addSql('ALTER TABLE profil_nerfs DROP FOREIGN KEY FK_F0AB2DD9E85D4C9');
        $this->addSql('ALTER TABLE profil_neuro_emotionnel DROP FOREIGN KEY FK_E0CFBD189E85D4C9');
        $this->addSql('ALTER TABLE profil_nutrition DROP FOREIGN KEY FK_1FB856D19E85D4C9');
        $this->addSql('ALTER TABLE profil_oreilles_yeux DROP FOREIGN KEY FK_F130EFAA9E85D4C9');
        $this->addSql('ALTER TABLE profil_os DROP FOREIGN KEY FK_F2D7F2399E85D4C9');
        $this->addSql('ALTER TABLE profil_rachidien DROP FOREIGN KEY FK_77FE4CD9E85D4C9');
        $this->addSql('ALTER TABLE profil_registre_auto_programme DROP FOREIGN KEY FK_C8A1A1BA9E85D4C9');
        $this->addSql('ALTER TABLE profil_registre_susceptibilite DROP FOREIGN KEY FK_C20FE2469E85D4C9');
        $this->addSql('ALTER TABLE profil_respiratoire DROP FOREIGN KEY FK_764718829E85D4C9');
        $this->addSql('ALTER TABLE profil_rife_simili DROP FOREIGN KEY FK_B212EBFE9E85D4C9');
        $this->addSql('ALTER TABLE profil_sinus_gorge DROP FOREIGN KEY FK_23849E339E85D4C9');
        $this->addSql('ALTER TABLE profil_transformation_emtionnelle_et_chronologique DROP FOREIGN KEY FK_6438C79C9E85D4C9');
        $this->addSql('DROP TABLE acides_amines');
        $this->addSql('DROP TABLE animaux_familles');
        $this->addSql('DROP TABLE balance_hormonale_femelle');
        $this->addSql('DROP TABLE balance_hormonale_male');
        $this->addSql('DROP TABLE chakra');
        $this->addSql('DROP TABLE choix_bio_specifique');
        $this->addSql('DROP TABLE choix_de_feedback');
        $this->addSql('DROP TABLE choix_de_voies');
        $this->addSql('DROP TABLE choix_solution');
        $this->addSql('DROP TABLE chronologie_des_facteurs');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE conseil_evaluation_pour_auto_evaluation');
        $this->addSql('DROP TABLE detox_du_corps');
        $this->addSql('DROP TABLE equilibre_harmonique_cerveau_gauche_cerveau_droit');
        $this->addSql('DROP TABLE facteurs_de_stress');
        $this->addSql('DROP TABLE facteurs_de_stress_conflictuel');
        $this->addSql('DROP TABLE facteurs_de_stress_emotionnel');
        $this->addSql('DROP TABLE facteurs_de_stress_personnel_et_auto_induit');
        $this->addSql('DROP TABLE facteurs_de_stress_relationnel');
        $this->addSql('DROP TABLE facteurs_generaux');
        $this->addSql('DROP TABLE facteurs_miasmatiques');
        $this->addSql('DROP TABLE feedbacksupplementaire');
        $this->addSql('DROP TABLE fiche_client');
        $this->addSql('DROP TABLE meridien');
        $this->addSql('DROP TABLE miasmes_et_anti_vieillissement');
        $this->addSql('DROP TABLE mineraux');
        $this->addSql('DROP TABLE pathogenes_et_autres_substances_toxiques');
        $this->addSql('DROP TABLE profil_acu_meridien');
        $this->addSql('DROP TABLE profil_allergie');
        $this->addSql('DROP TABLE profil_animaux');
        $this->addSql('DROP TABLE profil_bio_feed_back_gemmes');
        $this->addSql('DROP TABLE profil_cell_com');
        $this->addSql('DROP TABLE profil_cerveau');
        $this->addSql('DROP TABLE profil_chromosomes_et_genes');
        $this->addSql('DROP TABLE profil_circulation_coeur');
        $this->addSql('DROP TABLE profil_cosmetique');
        $this->addSql('DROP TABLE profil_couleurs_chakras');
        $this->addSql('DROP TABLE profil_dentaire');
        $this->addSql('DROP TABLE profil_detox_et_stress_multiples');
        $this->addSql('DROP TABLE profil_digestifs');
        $this->addSql('DROP TABLE profil_dimensionnel');
        $this->addSql('DROP TABLE profil_homeopathique');
        $this->addSql('DROP TABLE profil_hormonal');
        $this->addSql('DROP TABLE profil_iridologie');
        $this->addSql('DROP TABLE profil_lymphatique');
        $this->addSql('DROP TABLE profil_musculaire');
        $this->addSql('DROP TABLE profil_nerfs');
        $this->addSql('DROP TABLE profil_neuro_emotionnel');
        $this->addSql('DROP TABLE profil_nutrition');
        $this->addSql('DROP TABLE profil_oreilles_yeux');
        $this->addSql('DROP TABLE profil_os');
        $this->addSql('DROP TABLE profil_rachidien');
        $this->addSql('DROP TABLE profil_registre_auto_programme');
        $this->addSql('DROP TABLE profil_registre_susceptibilite');
        $this->addSql('DROP TABLE profil_respiratoire');
        $this->addSql('DROP TABLE profil_rife_simili');
        $this->addSql('DROP TABLE profil_sinus_gorge');
        $this->addSql('DROP TABLE profil_transformation_emtionnelle_et_chronologique');
        $this->addSql('DROP TABLE reaction_age');
        $this->addSql('DROP TABLE reduction');
        $this->addSql('DROP TABLE registre_de_susceptibilite');
        $this->addSql('DROP TABLE reglage_ondes_cerebrales');
        $this->addSql('DROP TABLE rife');
        $this->addSql('DROP TABLE susceptibilite');
        $this->addSql('DROP TABLE systeme_dorganes');
        $this->addSql('DROP TABLE table_alanger');
        $this->addSql('DROP TABLE toxines_environnementales_et_industrielles');
        $this->addSql('DROP TABLE transfert');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE vitamines');
    }
}
