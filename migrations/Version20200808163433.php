<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200808163433 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE family (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE music_instrument ADD family_id INT NOT NULL');
        $this->addSql('ALTER TABLE music_instrument ADD CONSTRAINT FK_9DBC3035C35E566A FOREIGN KEY (family_id) REFERENCES family (id)');
        $this->addSql('CREATE INDEX IDX_9DBC3035C35E566A ON music_instrument (family_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE music_instrument DROP FOREIGN KEY FK_9DBC3035C35E566A');
        $this->addSql('DROP TABLE family');
        $this->addSql('DROP INDEX IDX_9DBC3035C35E566A ON music_instrument');
        $this->addSql('ALTER TABLE music_instrument DROP family_id');
    }
}
