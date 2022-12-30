<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221215132831 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE breath_quan (id INT AUTO_INCREMENT NOT NULL, picto VARCHAR(255) NOT NULL, disease VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quan_data (id INT AUTO_INCREMENT NOT NULL, picto VARCHAR(255) NOT NULL, disease VARCHAR(255) NOT NULL, micro_bact VARCHAR(255) DEFAULT NULL, emotion_conflit VARCHAR(255) DEFAULT NULL, mt VARCHAR(255) DEFAULT NULL, inc_dec VARCHAR(255) DEFAULT NULL, vgt VARCHAR(255) DEFAULT NULL, observation LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE breath_quan');
        $this->addSql('DROP TABLE quan_data');
    }
}
