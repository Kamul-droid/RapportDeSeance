<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221215133511 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE quan_data ADD quanfield_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE quan_data ADD CONSTRAINT FK_CCAA01D2C0DE18E4 FOREIGN KEY (quanfield_id) REFERENCES quanfield (id)');
        $this->addSql('CREATE INDEX IDX_CCAA01D2C0DE18E4 ON quan_data (quanfield_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE quan_data DROP FOREIGN KEY FK_CCAA01D2C0DE18E4');
        $this->addSql('DROP INDEX IDX_CCAA01D2C0DE18E4 ON quan_data');
        $this->addSql('ALTER TABLE quan_data DROP quanfield_id');
    }
}
