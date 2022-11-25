<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221020114005 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE fiche_client (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE profil_acu_meridien ADD fiche_client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE profil_acu_meridien ADD CONSTRAINT FK_CB73855B9E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('CREATE INDEX IDX_CB73855B9E85D4C9 ON profil_acu_meridien (fiche_client_id)');
        $this->addSql('ALTER TABLE profil_allergie ADD fiche_client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE profil_allergie ADD CONSTRAINT FK_231EBE79E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('CREATE INDEX IDX_231EBE79E85D4C9 ON profil_allergie (fiche_client_id)');
        $this->addSql('ALTER TABLE profil_animaux ADD fiche_client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE profil_animaux ADD CONSTRAINT FK_1FAAD61C9E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('CREATE INDEX IDX_1FAAD61C9E85D4C9 ON profil_animaux (fiche_client_id)');
        $this->addSql('ALTER TABLE profil_bio_feed_back_gemmes ADD fiche_client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE profil_bio_feed_back_gemmes ADD CONSTRAINT FK_AEE539899E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('CREATE INDEX IDX_AEE539899E85D4C9 ON profil_bio_feed_back_gemmes (fiche_client_id)');
        $this->addSql('ALTER TABLE profil_cell_com ADD fiche_client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE profil_cell_com ADD CONSTRAINT FK_D54C3BB39E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('CREATE INDEX IDX_D54C3BB39E85D4C9 ON profil_cell_com (fiche_client_id)');
        $this->addSql('ALTER TABLE profil_cerveau ADD fiche_client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE profil_cerveau ADD CONSTRAINT FK_25CC42CF9E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('CREATE INDEX IDX_25CC42CF9E85D4C9 ON profil_cerveau (fiche_client_id)');
        $this->addSql('ALTER TABLE profil_chromosomes_et_genes ADD fiche_client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE profil_chromosomes_et_genes ADD CONSTRAINT FK_BABC4789E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('CREATE INDEX IDX_BABC4789E85D4C9 ON profil_chromosomes_et_genes (fiche_client_id)');
        $this->addSql('ALTER TABLE profil_circulation_coeur ADD fiche_client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE profil_circulation_coeur ADD CONSTRAINT FK_6412901C9E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('CREATE INDEX IDX_6412901C9E85D4C9 ON profil_circulation_coeur (fiche_client_id)');
        $this->addSql('ALTER TABLE profil_cosmetique ADD fiche_client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE profil_cosmetique ADD CONSTRAINT FK_811E03B49E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('CREATE INDEX IDX_811E03B49E85D4C9 ON profil_cosmetique (fiche_client_id)');
        $this->addSql('ALTER TABLE profil_couleurs_chakras ADD fiche_client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE profil_couleurs_chakras ADD CONSTRAINT FK_7741EA539E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('CREATE INDEX IDX_7741EA539E85D4C9 ON profil_couleurs_chakras (fiche_client_id)');
        $this->addSql('ALTER TABLE profil_dentaire ADD fiche_client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE profil_dentaire ADD CONSTRAINT FK_2E05A1889E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('CREATE INDEX IDX_2E05A1889E85D4C9 ON profil_dentaire (fiche_client_id)');
        $this->addSql('ALTER TABLE profil_detox_et_stress_multiples ADD fiche_client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE profil_detox_et_stress_multiples ADD CONSTRAINT FK_FFCAE9EA9E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('CREATE INDEX IDX_FFCAE9EA9E85D4C9 ON profil_detox_et_stress_multiples (fiche_client_id)');
        $this->addSql('ALTER TABLE profil_digestifs ADD fiche_client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE profil_digestifs ADD CONSTRAINT FK_71F314E89E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('CREATE INDEX IDX_71F314E89E85D4C9 ON profil_digestifs (fiche_client_id)');
        $this->addSql('ALTER TABLE profil_dimensionnel ADD fiche_client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE profil_dimensionnel ADD CONSTRAINT FK_D6351FBD9E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('CREATE INDEX IDX_D6351FBD9E85D4C9 ON profil_dimensionnel (fiche_client_id)');
        $this->addSql('ALTER TABLE profil_homeopathique ADD fiche_client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE profil_homeopathique ADD CONSTRAINT FK_7EE95C5D9E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('CREATE INDEX IDX_7EE95C5D9E85D4C9 ON profil_homeopathique (fiche_client_id)');
        $this->addSql('ALTER TABLE profil_iridologie ADD fiche_client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE profil_iridologie ADD CONSTRAINT FK_99EC7C0D9E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('CREATE INDEX IDX_99EC7C0D9E85D4C9 ON profil_iridologie (fiche_client_id)');
        $this->addSql('ALTER TABLE profil_lymphatique ADD fiche_client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE profil_lymphatique ADD CONSTRAINT FK_6B79CF9A9E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('CREATE INDEX IDX_6B79CF9A9E85D4C9 ON profil_lymphatique (fiche_client_id)');
        $this->addSql('ALTER TABLE profil_musculaire ADD fiche_client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE profil_musculaire ADD CONSTRAINT FK_3D80128D9E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('CREATE INDEX IDX_3D80128D9E85D4C9 ON profil_musculaire (fiche_client_id)');
        $this->addSql('ALTER TABLE profil_nerfs ADD fiche_client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE profil_nerfs ADD CONSTRAINT FK_F0AB2DD9E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('CREATE INDEX IDX_F0AB2DD9E85D4C9 ON profil_nerfs (fiche_client_id)');
        $this->addSql('ALTER TABLE profil_neuro_emotionnel ADD fiche_client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE profil_neuro_emotionnel ADD CONSTRAINT FK_E0CFBD189E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('CREATE INDEX IDX_E0CFBD189E85D4C9 ON profil_neuro_emotionnel (fiche_client_id)');
        $this->addSql('ALTER TABLE profil_nutrition ADD fiche_client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE profil_nutrition ADD CONSTRAINT FK_1FB856D19E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('CREATE INDEX IDX_1FB856D19E85D4C9 ON profil_nutrition (fiche_client_id)');
        $this->addSql('ALTER TABLE profil_oreilles_yeux ADD fiche_client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE profil_oreilles_yeux ADD CONSTRAINT FK_F130EFAA9E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('CREATE INDEX IDX_F130EFAA9E85D4C9 ON profil_oreilles_yeux (fiche_client_id)');
        $this->addSql('ALTER TABLE profil_os ADD fiche_client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE profil_os ADD CONSTRAINT FK_F2D7F2399E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('CREATE INDEX IDX_F2D7F2399E85D4C9 ON profil_os (fiche_client_id)');
        $this->addSql('ALTER TABLE profil_rachidien ADD fiche_client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE profil_rachidien ADD CONSTRAINT FK_77FE4CD9E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('CREATE INDEX IDX_77FE4CD9E85D4C9 ON profil_rachidien (fiche_client_id)');
        $this->addSql('ALTER TABLE profil_registre_auto_programme ADD fiche_client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE profil_registre_auto_programme ADD CONSTRAINT FK_C8A1A1BA9E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('CREATE INDEX IDX_C8A1A1BA9E85D4C9 ON profil_registre_auto_programme (fiche_client_id)');
        $this->addSql('ALTER TABLE profil_registre_susceptibilite ADD fiche_client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE profil_registre_susceptibilite ADD CONSTRAINT FK_C20FE2469E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('CREATE INDEX IDX_C20FE2469E85D4C9 ON profil_registre_susceptibilite (fiche_client_id)');
        $this->addSql('ALTER TABLE profil_respiratoire ADD fiche_client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE profil_respiratoire ADD CONSTRAINT FK_764718829E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('CREATE INDEX IDX_764718829E85D4C9 ON profil_respiratoire (fiche_client_id)');
        $this->addSql('ALTER TABLE profil_rife_simili ADD fiche_client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE profil_rife_simili ADD CONSTRAINT FK_B212EBFE9E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('CREATE INDEX IDX_B212EBFE9E85D4C9 ON profil_rife_simili (fiche_client_id)');
        $this->addSql('ALTER TABLE profil_sinus_gorge ADD fiche_client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE profil_sinus_gorge ADD CONSTRAINT FK_23849E339E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('CREATE INDEX IDX_23849E339E85D4C9 ON profil_sinus_gorge (fiche_client_id)');
        $this->addSql('ALTER TABLE profil_transformation_emtionnelle_et_chronologique ADD fiche_client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE profil_transformation_emtionnelle_et_chronologique ADD CONSTRAINT FK_6438C79C9E85D4C9 FOREIGN KEY (fiche_client_id) REFERENCES fiche_client (id)');
        $this->addSql('CREATE INDEX IDX_6438C79C9E85D4C9 ON profil_transformation_emtionnelle_et_chronologique (fiche_client_id)');
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
        $this->addSql('DROP TABLE fiche_client');
        $this->addSql('DROP INDEX IDX_CB73855B9E85D4C9 ON profil_acu_meridien');
        $this->addSql('ALTER TABLE profil_acu_meridien DROP fiche_client_id');
        $this->addSql('DROP INDEX IDX_231EBE79E85D4C9 ON profil_allergie');
        $this->addSql('ALTER TABLE profil_allergie DROP fiche_client_id');
        $this->addSql('DROP INDEX IDX_1FAAD61C9E85D4C9 ON profil_animaux');
        $this->addSql('ALTER TABLE profil_animaux DROP fiche_client_id');
        $this->addSql('DROP INDEX IDX_AEE539899E85D4C9 ON profil_bio_feed_back_gemmes');
        $this->addSql('ALTER TABLE profil_bio_feed_back_gemmes DROP fiche_client_id');
        $this->addSql('DROP INDEX IDX_D54C3BB39E85D4C9 ON profil_cell_com');
        $this->addSql('ALTER TABLE profil_cell_com DROP fiche_client_id');
        $this->addSql('DROP INDEX IDX_25CC42CF9E85D4C9 ON profil_cerveau');
        $this->addSql('ALTER TABLE profil_cerveau DROP fiche_client_id');
        $this->addSql('DROP INDEX IDX_BABC4789E85D4C9 ON profil_chromosomes_et_genes');
        $this->addSql('ALTER TABLE profil_chromosomes_et_genes DROP fiche_client_id');
        $this->addSql('DROP INDEX IDX_6412901C9E85D4C9 ON profil_circulation_coeur');
        $this->addSql('ALTER TABLE profil_circulation_coeur DROP fiche_client_id');
        $this->addSql('DROP INDEX IDX_811E03B49E85D4C9 ON profil_cosmetique');
        $this->addSql('ALTER TABLE profil_cosmetique DROP fiche_client_id');
        $this->addSql('DROP INDEX IDX_7741EA539E85D4C9 ON profil_couleurs_chakras');
        $this->addSql('ALTER TABLE profil_couleurs_chakras DROP fiche_client_id');
        $this->addSql('DROP INDEX IDX_2E05A1889E85D4C9 ON profil_dentaire');
        $this->addSql('ALTER TABLE profil_dentaire DROP fiche_client_id');
        $this->addSql('DROP INDEX IDX_FFCAE9EA9E85D4C9 ON profil_detox_et_stress_multiples');
        $this->addSql('ALTER TABLE profil_detox_et_stress_multiples DROP fiche_client_id');
        $this->addSql('DROP INDEX IDX_71F314E89E85D4C9 ON profil_digestifs');
        $this->addSql('ALTER TABLE profil_digestifs DROP fiche_client_id');
        $this->addSql('DROP INDEX IDX_D6351FBD9E85D4C9 ON profil_dimensionnel');
        $this->addSql('ALTER TABLE profil_dimensionnel DROP fiche_client_id');
        $this->addSql('DROP INDEX IDX_7EE95C5D9E85D4C9 ON profil_homeopathique');
        $this->addSql('ALTER TABLE profil_homeopathique DROP fiche_client_id');
        $this->addSql('DROP INDEX IDX_99EC7C0D9E85D4C9 ON profil_iridologie');
        $this->addSql('ALTER TABLE profil_iridologie DROP fiche_client_id');
        $this->addSql('DROP INDEX IDX_6B79CF9A9E85D4C9 ON profil_lymphatique');
        $this->addSql('ALTER TABLE profil_lymphatique DROP fiche_client_id');
        $this->addSql('DROP INDEX IDX_3D80128D9E85D4C9 ON profil_musculaire');
        $this->addSql('ALTER TABLE profil_musculaire DROP fiche_client_id');
        $this->addSql('DROP INDEX IDX_F0AB2DD9E85D4C9 ON profil_nerfs');
        $this->addSql('ALTER TABLE profil_nerfs DROP fiche_client_id');
        $this->addSql('DROP INDEX IDX_E0CFBD189E85D4C9 ON profil_neuro_emotionnel');
        $this->addSql('ALTER TABLE profil_neuro_emotionnel DROP fiche_client_id');
        $this->addSql('DROP INDEX IDX_1FB856D19E85D4C9 ON profil_nutrition');
        $this->addSql('ALTER TABLE profil_nutrition DROP fiche_client_id');
        $this->addSql('DROP INDEX IDX_F130EFAA9E85D4C9 ON profil_oreilles_yeux');
        $this->addSql('ALTER TABLE profil_oreilles_yeux DROP fiche_client_id');
        $this->addSql('DROP INDEX IDX_F2D7F2399E85D4C9 ON profil_os');
        $this->addSql('ALTER TABLE profil_os DROP fiche_client_id');
        $this->addSql('DROP INDEX IDX_77FE4CD9E85D4C9 ON profil_rachidien');
        $this->addSql('ALTER TABLE profil_rachidien DROP fiche_client_id');
        $this->addSql('DROP INDEX IDX_C8A1A1BA9E85D4C9 ON profil_registre_auto_programme');
        $this->addSql('ALTER TABLE profil_registre_auto_programme DROP fiche_client_id');
        $this->addSql('DROP INDEX IDX_C20FE2469E85D4C9 ON profil_registre_susceptibilite');
        $this->addSql('ALTER TABLE profil_registre_susceptibilite DROP fiche_client_id');
        $this->addSql('DROP INDEX IDX_764718829E85D4C9 ON profil_respiratoire');
        $this->addSql('ALTER TABLE profil_respiratoire DROP fiche_client_id');
        $this->addSql('DROP INDEX IDX_B212EBFE9E85D4C9 ON profil_rife_simili');
        $this->addSql('ALTER TABLE profil_rife_simili DROP fiche_client_id');
        $this->addSql('DROP INDEX IDX_23849E339E85D4C9 ON profil_sinus_gorge');
        $this->addSql('ALTER TABLE profil_sinus_gorge DROP fiche_client_id');
        $this->addSql('DROP INDEX IDX_6438C79C9E85D4C9 ON profil_transformation_emtionnelle_et_chronologique');
        $this->addSql('ALTER TABLE profil_transformation_emtionnelle_et_chronologique DROP fiche_client_id');
    }
}
