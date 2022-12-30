<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221223105851 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE migration (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE global_state ADD descript_id INT NOT NULL, DROP descript');
        $this->addSql('ALTER TABLE global_state ADD CONSTRAINT FK_E796A8B8FB8D979C FOREIGN KEY (descript_id) REFERENCES global_description (id)');
        $this->addSql('CREATE INDEX IDX_E796A8B8FB8D979C ON global_state (descript_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE migration');
        $this->addSql('ALTER TABLE global_state DROP FOREIGN KEY FK_E796A8B8FB8D979C');
        $this->addSql('DROP INDEX IDX_E796A8B8FB8D979C ON global_state');
        $this->addSql('ALTER TABLE global_state ADD descript VARCHAR(255) NOT NULL, DROP descript_id');
    }
}
