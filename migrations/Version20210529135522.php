<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210529135522 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE festival_otro CHANGE descripcion descripcion MEDIUMTEXT NOT NULL');
        $this->addSql('ALTER TABLE video ADD festival_otro_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE video ADD CONSTRAINT FK_7CC7DA2C2493DD6C FOREIGN KEY (festival_otro_id) REFERENCES festival_otro (id)');
        $this->addSql('CREATE INDEX IDX_7CC7DA2C2493DD6C ON video (festival_otro_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE festival_otro CHANGE descripcion descripcion MEDIUMTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE video DROP FOREIGN KEY FK_7CC7DA2C2493DD6C');
        $this->addSql('DROP INDEX IDX_7CC7DA2C2493DD6C ON video');
        $this->addSql('ALTER TABLE video DROP festival_otro_id');
    }
}
