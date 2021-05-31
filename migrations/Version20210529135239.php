<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210529135239 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE favorito DROP FOREIGN KEY FK_881067C7DB38439E');
        $this->addSql('ALTER TABLE favorito DROP FOREIGN KEY FK_881067C7DD98EEF2');
        $this->addSql('ALTER TABLE favorito ADD CONSTRAINT FK_881067C7DB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE favorito ADD CONSTRAINT FK_881067C7DD98EEF2 FOREIGN KEY (fest_destacado_id) REFERENCES festival_destacado (id)');
        $this->addSql('ALTER TABLE festival_otro ADD fecha VARCHAR(1000) NOT NULL, ADD video VARCHAR(255) NOT NULL, CHANGE descripcion descripcion MEDIUMTEXT NOT NULL');
        $this->addSql('ALTER TABLE mensajes DROP FOREIGN KEY FK_6C929C80DB38439E');
        $this->addSql('ALTER TABLE mensajes CHANGE fecha fecha DATETIME NOT NULL');
        $this->addSql('ALTER TABLE mensajes ADD CONSTRAINT FK_6C929C80DB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE respuesta DROP FOREIGN KEY FK_6C6EC5EE4481E9A2');
        $this->addSql('ALTER TABLE respuesta DROP FOREIGN KEY FK_6C6EC5EEDB38439E');
        $this->addSql('ALTER TABLE respuesta ADD CONSTRAINT FK_6C6EC5EE4481E9A2 FOREIGN KEY (mensajes_id) REFERENCES mensajes (id)');
        $this->addSql('ALTER TABLE respuesta ADD CONSTRAINT FK_6C6EC5EEDB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE favorito DROP FOREIGN KEY FK_881067C7DB38439E');
        $this->addSql('ALTER TABLE favorito DROP FOREIGN KEY FK_881067C7DD98EEF2');
        $this->addSql('ALTER TABLE favorito ADD CONSTRAINT FK_881067C7DB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE favorito ADD CONSTRAINT FK_881067C7DD98EEF2 FOREIGN KEY (fest_destacado_id) REFERENCES festival_destacado (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE festival_otro DROP fecha, DROP video, CHANGE descripcion descripcion MEDIUMTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE mensajes DROP FOREIGN KEY FK_6C929C80DB38439E');
        $this->addSql('ALTER TABLE mensajes CHANGE fecha fecha DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL');
        $this->addSql('ALTER TABLE mensajes ADD CONSTRAINT FK_6C929C80DB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE respuesta DROP FOREIGN KEY FK_6C6EC5EEDB38439E');
        $this->addSql('ALTER TABLE respuesta DROP FOREIGN KEY FK_6C6EC5EE4481E9A2');
        $this->addSql('ALTER TABLE respuesta ADD CONSTRAINT FK_6C6EC5EEDB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE respuesta ADD CONSTRAINT FK_6C6EC5EE4481E9A2 FOREIGN KEY (mensajes_id) REFERENCES mensajes (id) ON UPDATE CASCADE ON DELETE CASCADE');
    }
}
