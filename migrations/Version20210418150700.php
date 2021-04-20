<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210418150700 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE festival_otro (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) DEFAULT NULL, descripcion MEDIUMTEXT NOT NULL, foto1 VARCHAR(255) NOT NULL, foto2 VARCHAR(255) NOT NULL, genero VARCHAR(255) NOT NULL, frase VARCHAR(10000) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE favorito DROP FOREIGN KEY FK_881067C7DB38439E');
        $this->addSql('ALTER TABLE favorito DROP FOREIGN KEY FK_881067C7DD98EEF2');
        $this->addSql('ALTER TABLE favorito ADD CONSTRAINT FK_881067C7DB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE favorito ADD CONSTRAINT FK_881067C7DD98EEF2 FOREIGN KEY (fest_destacado_id) REFERENCES festival_destacado (id)');
        $this->addSql('ALTER TABLE mensajes CHANGE fecha fecha DATETIME NOT NULL');
        $this->addSql('ALTER TABLE video DROP FOREIGN KEY FK_7CC7DA2C6DD346C5');
        $this->addSql('ALTER TABLE video ADD CONSTRAINT FK_7CC7DA2C6DD346C5 FOREIGN KEY (festival_destacado_id) REFERENCES festival_destacado (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE festival_otro');
        $this->addSql('ALTER TABLE favorito DROP FOREIGN KEY FK_881067C7DB38439E');
        $this->addSql('ALTER TABLE favorito DROP FOREIGN KEY FK_881067C7DD98EEF2');
        $this->addSql('ALTER TABLE favorito ADD CONSTRAINT FK_881067C7DB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE favorito ADD CONSTRAINT FK_881067C7DD98EEF2 FOREIGN KEY (fest_destacado_id) REFERENCES festival_destacado (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mensajes CHANGE fecha fecha DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL');
        $this->addSql('ALTER TABLE video DROP FOREIGN KEY FK_7CC7DA2C6DD346C5');
        $this->addSql('ALTER TABLE video ADD CONSTRAINT FK_7CC7DA2C6DD346C5 FOREIGN KEY (festival_destacado_id) REFERENCES festival_destacado (id) ON UPDATE CASCADE ON DELETE CASCADE');
    }
}
