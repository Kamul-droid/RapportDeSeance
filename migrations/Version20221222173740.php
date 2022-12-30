<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221222173740 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE quantareport ADD client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE quantareport ADD CONSTRAINT FK_91FDCE2119EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('CREATE INDEX IDX_91FDCE2119EB6921 ON quantareport (client_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE quantareport DROP FOREIGN KEY FK_91FDCE2119EB6921');
        $this->addSql('DROP INDEX IDX_91FDCE2119EB6921 ON quantareport');
        $this->addSql('ALTER TABLE quantareport DROP client_id');
    }
}
