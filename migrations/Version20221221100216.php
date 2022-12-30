<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221221100216 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE quantareport (id INT AUTO_INCREMENT NOT NULL, consult_method VARCHAR(50) NOT NULL, started_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ended_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', soundplay VARCHAR(50) NOT NULL, comment LONGTEXT DEFAULT NULL, rdate DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE global_state ADD quantareport_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE global_state ADD CONSTRAINT FK_E796A8B8C9BB9D17 FOREIGN KEY (quantareport_id) REFERENCES quantareport (id)');
        $this->addSql('CREATE INDEX IDX_E796A8B8C9BB9D17 ON global_state (quantareport_id)');
        $this->addSql('ALTER TABLE health_history ADD quantareport_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE health_history ADD CONSTRAINT FK_BA13ED0CC9BB9D17 FOREIGN KEY (quantareport_id) REFERENCES quantareport (id)');
        $this->addSql('CREATE INDEX IDX_BA13ED0CC9BB9D17 ON health_history (quantareport_id)');
        $this->addSql('ALTER TABLE primary_object ADD quantareport_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE primary_object ADD CONSTRAINT FK_505A135CC9BB9D17 FOREIGN KEY (quantareport_id) REFERENCES quantareport (id)');
        $this->addSql('CREATE INDEX IDX_505A135CC9BB9D17 ON primary_object (quantareport_id)');
        $this->addSql('ALTER TABLE quanfield ADD quantareport_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE quanfield ADD CONSTRAINT FK_6789C7F2C9BB9D17 FOREIGN KEY (quantareport_id) REFERENCES quantareport (id)');
        $this->addSql('CREATE INDEX IDX_6789C7F2C9BB9D17 ON quanfield (quantareport_id)');
        $this->addSql('ALTER TABLE secondary_object ADD quantareport_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE secondary_object ADD CONSTRAINT FK_C60D554C9BB9D17 FOREIGN KEY (quantareport_id) REFERENCES quantareport (id)');
        $this->addSql('CREATE INDEX IDX_C60D554C9BB9D17 ON secondary_object (quantareport_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE global_state DROP FOREIGN KEY FK_E796A8B8C9BB9D17');
        $this->addSql('ALTER TABLE health_history DROP FOREIGN KEY FK_BA13ED0CC9BB9D17');
        $this->addSql('ALTER TABLE primary_object DROP FOREIGN KEY FK_505A135CC9BB9D17');
        $this->addSql('ALTER TABLE quanfield DROP FOREIGN KEY FK_6789C7F2C9BB9D17');
        $this->addSql('ALTER TABLE secondary_object DROP FOREIGN KEY FK_C60D554C9BB9D17');
        $this->addSql('DROP TABLE quantareport');
        $this->addSql('DROP INDEX IDX_E796A8B8C9BB9D17 ON global_state');
        $this->addSql('ALTER TABLE global_state DROP quantareport_id');
        $this->addSql('DROP INDEX IDX_BA13ED0CC9BB9D17 ON health_history');
        $this->addSql('ALTER TABLE health_history DROP quantareport_id');
        $this->addSql('DROP INDEX IDX_505A135CC9BB9D17 ON primary_object');
        $this->addSql('ALTER TABLE primary_object DROP quantareport_id');
        $this->addSql('DROP INDEX IDX_6789C7F2C9BB9D17 ON quanfield');
        $this->addSql('ALTER TABLE quanfield DROP quantareport_id');
        $this->addSql('DROP INDEX IDX_C60D554C9BB9D17 ON secondary_object');
        $this->addSql('ALTER TABLE secondary_object DROP quantareport_id');
    }
}
