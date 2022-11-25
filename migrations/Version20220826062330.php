<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220826062330 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE balance_hormonale_femelle (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE balance_hormonale_male (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chakra (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE choix_bio_specifique (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE choix_de_feedback (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE choix_de_voies (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE choix_solution (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chronologie_des_facteurs (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE conseil_evaluation_pour_auto_evaluation (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE detox_du_corps (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equilibre_harmonique_cerveau_gauche_cerveau_droit (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facteurs_de_stress_conflictuel (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facteurs_de_stress_emotionnel (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facteurs_de_stress_personnel_et_auto_induit (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facteurs_de_stress_relationnel (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pathogenes_et_autres_substances_toxiques (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_bio_feed_back_gemmes (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_cell_com (id INT AUTO_INCREMENT NOT NULL, evaluation_des_chromosomes LONGTEXT NOT NULL, evaluation_des_genes LONGTEXT NOT NULL, auto_feedback_pour_cell_comm LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_cerveau (id INT AUTO_INCREMENT NOT NULL, reglage_ondes_cerebrales VARCHAR(255) NOT NULL, add_ LONGTEXT NOT NULL, dhda LONGTEXT NOT NULL, equilibre_harmonique_cerveau_gauche_cerveau_droit VARCHAR(255) NOT NULL, choix_item LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_circulation_coeur (id INT AUTO_INCREMENT NOT NULL, transfert VARCHAR(255) NOT NULL, valves_arteres LONGTEXT NOT NULL, choix_biospecifique VARCHAR(255) NOT NULL, choix_item LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_cosmetique (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_couleurs_chakras (id INT AUTO_INCREMENT NOT NULL, chakra VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_dentaire (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_detox_et_stress_multiples (id INT AUTO_INCREMENT NOT NULL, toxines_environnementales_et_industrielles VARCHAR(255) NOT NULL, pathogenes_et_autres_substances_toxiques VARCHAR(255) NOT NULL, facteurs_de_stress_personnel_et_auto_induit VARCHAR(255) NOT NULL, detox_du_corps VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_digestifs (id INT AUTO_INCREMENT NOT NULL, transfert VARCHAR(255) NOT NULL, choix_bio_specifique LONGTEXT NOT NULL, choix_items LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_dimensionnel (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_homeopathique (id INT AUTO_INCREMENT NOT NULL, generateur_homeopathique LONGTEXT NOT NULL, commentaire LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_hormonal (id INT AUTO_INCREMENT NOT NULL, balance_hormonale_femelle VARCHAR(255) NOT NULL, balance_hormonale_male VARCHAR(255) NOT NULL, glandes_hormones LONGTEXT NOT NULL, commentaire LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_iridologie (id INT AUTO_INCREMENT NOT NULL, table_a_langer VARCHAR(255) NOT NULL, commentaire LONGTEXT NOT NULL, image LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_lymphatique (id INT AUTO_INCREMENT NOT NULL, transfert VARCHAR(255) NOT NULL, choix_bio_specifique LONGTEXT NOT NULL, choix_items LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_musculaire (id INT AUTO_INCREMENT NOT NULL, transfert VARCHAR(255) NOT NULL, choix_bio_specifique LONGTEXT NOT NULL, choix_items LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_nerfs (id INT AUTO_INCREMENT NOT NULL, transfert VARCHAR(255) NOT NULL, choix_bio_specifique LONGTEXT NOT NULL, choix_items LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_neuro_emotionnel (id INT AUTO_INCREMENT NOT NULL, conseil_evaluation_pour_auto_evaluation VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_oreilles_yeux (id INT AUTO_INCREMENT NOT NULL, transfert VARCHAR(255) NOT NULL, choix_bio_specifique LONGTEXT NOT NULL, choix_items LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_os (id INT AUTO_INCREMENT NOT NULL, transfert VARCHAR(255) NOT NULL, choix_bio_specifique VARCHAR(255) NOT NULL, reduction VARCHAR(255) NOT NULL, nom_os LONGTEXT NOT NULL, liste_items LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_rachidien (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_registre_auto_programme (id INT AUTO_INCREMENT NOT NULL, registre_susceptibilite VARCHAR(255) NOT NULL, transfert VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_respiratoire (id INT AUTO_INCREMENT NOT NULL, transfert VARCHAR(255) NOT NULL, choix_bio_specifique VARCHAR(255) NOT NULL, choix_items LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_rife_simili (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_sinus_gorge (id INT AUTO_INCREMENT NOT NULL, transfert VARCHAR(255) NOT NULL, choix_bio_specifique LONGTEXT NOT NULL, choix_items LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_transformation_emtionnelle_et_chronologique (id INT AUTO_INCREMENT NOT NULL, choix_de_voies VARCHAR(255) NOT NULL, facteurs_de_stress_emotionnel VARCHAR(255) NOT NULL, facteurs_de_stress_conflictuel VARCHAR(255) NOT NULL, choix_de_feedback VARCHAR(255) NOT NULL, choix_solution VARCHAR(255) NOT NULL, facteurs_de_stress_relationnel VARCHAR(255) NOT NULL, chronologie_de_facteurs VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reduction (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reglage_ondes_cerebrales (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE susceptibilite (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE systeme_dorganes (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE table_alanger (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE toxines_environnementales_et_industrielles (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transfert (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE balance_hormonale_femelle');
        $this->addSql('DROP TABLE balance_hormonale_male');
        $this->addSql('DROP TABLE chakra');
        $this->addSql('DROP TABLE choix_bio_specifique');
        $this->addSql('DROP TABLE choix_de_feedback');
        $this->addSql('DROP TABLE choix_de_voies');
        $this->addSql('DROP TABLE choix_solution');
        $this->addSql('DROP TABLE chronologie_des_facteurs');
        $this->addSql('DROP TABLE conseil_evaluation_pour_auto_evaluation');
        $this->addSql('DROP TABLE detox_du_corps');
        $this->addSql('DROP TABLE equilibre_harmonique_cerveau_gauche_cerveau_droit');
        $this->addSql('DROP TABLE facteurs_de_stress_conflictuel');
        $this->addSql('DROP TABLE facteurs_de_stress_emotionnel');
        $this->addSql('DROP TABLE facteurs_de_stress_personnel_et_auto_induit');
        $this->addSql('DROP TABLE facteurs_de_stress_relationnel');
        $this->addSql('DROP TABLE pathogenes_et_autres_substances_toxiques');
        $this->addSql('DROP TABLE profil_bio_feed_back_gemmes');
        $this->addSql('DROP TABLE profil_cell_com');
        $this->addSql('DROP TABLE profil_cerveau');
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
        $this->addSql('DROP TABLE profil_oreilles_yeux');
        $this->addSql('DROP TABLE profil_os');
        $this->addSql('DROP TABLE profil_rachidien');
        $this->addSql('DROP TABLE profil_registre_auto_programme');
        $this->addSql('DROP TABLE profil_respiratoire');
        $this->addSql('DROP TABLE profil_rife_simili');
        $this->addSql('DROP TABLE profil_sinus_gorge');
        $this->addSql('DROP TABLE profil_transformation_emtionnelle_et_chronologique');
        $this->addSql('DROP TABLE reduction');
        $this->addSql('DROP TABLE reglage_ondes_cerebrales');
        $this->addSql('DROP TABLE susceptibilite');
        $this->addSql('DROP TABLE systeme_dorganes');
        $this->addSql('DROP TABLE table_alanger');
        $this->addSql('DROP TABLE toxines_environnementales_et_industrielles');
        $this->addSql('DROP TABLE transfert');
    }
}
