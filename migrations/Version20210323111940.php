<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210323111940 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE favorito (id INT AUTO_INCREMENT NOT NULL, usuario_id INT DEFAULT NULL, fest_destacado_id INT DEFAULT NULL, INDEX IDX_881067C7DB38439E (usuario_id), INDEX IDX_881067C7DD98EEF2 (fest_destacado_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE favorito ADD CONSTRAINT FK_881067C7DB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE favorito ADD CONSTRAINT FK_881067C7DD98EEF2 FOREIGN KEY (fest_destacado_id) REFERENCES festival_destacado (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE favorito');
    }
}
