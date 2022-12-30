<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221230084039 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE health_history CHANGE descript descript VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE quantareport CHANGE started_at started_at DATETIME NOT NULL, CHANGE ended_at ended_at DATETIME NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE health_history CHANGE descript descript VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE quantareport CHANGE started_at started_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE ended_at ended_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }
}
