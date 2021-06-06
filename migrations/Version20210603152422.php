<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210603152422 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE favorito ADD fest_otro_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE favorito ADD CONSTRAINT FK_881067C7351443D6 FOREIGN KEY (fest_otro_id) REFERENCES festival_otro (id)');
        $this->addSql('CREATE INDEX IDX_881067C7351443D6 ON favorito (fest_otro_id)');
        $this->addSql('ALTER TABLE festival_otro CHANGE descripcion descripcion MEDIUMTEXT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE favorito DROP FOREIGN KEY FK_881067C7351443D6');
        $this->addSql('DROP INDEX IDX_881067C7351443D6 ON favorito');
        $this->addSql('ALTER TABLE favorito DROP fest_otro_id');
        $this->addSql('ALTER TABLE festival_otro CHANGE descripcion descripcion MEDIUMTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
