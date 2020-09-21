<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200808163725 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE music_instrument ADD seller_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE music_instrument ADD CONSTRAINT FK_9DBC30358DE820D9 FOREIGN KEY (seller_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_9DBC30358DE820D9 ON music_instrument (seller_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE music_instrument DROP FOREIGN KEY FK_9DBC30358DE820D9');
        $this->addSql('DROP INDEX IDX_9DBC30358DE820D9 ON music_instrument');
        $this->addSql('ALTER TABLE music_instrument DROP seller_id');
    }
}
