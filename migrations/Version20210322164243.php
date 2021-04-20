<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210322164243 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE festival_destacado (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) DEFAULT NULL, descripcion VARCHAR(255) DEFAULT NULL, frase VARCHAR(255) DEFAULT NULL, foto VARCHAR(255) DEFAULT NULL, lugar VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE mensajes DROP FOREIGN KEY FK_6C929C80DB38439E');
        $this->addSql('ALTER TABLE mensajes ADD CONSTRAINT FK_6C929C80DB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE respuesta DROP FOREIGN KEY FK_6C6EC5EE4481E9A2');
        $this->addSql('ALTER TABLE respuesta DROP FOREIGN KEY FK_6C6EC5EEDB38439E');
        $this->addSql('ALTER TABLE respuesta ADD CONSTRAINT FK_6C6EC5EE4481E9A2 FOREIGN KEY (mensajes_id) REFERENCES mensajes (id)');
        $this->addSql('ALTER TABLE respuesta ADD CONSTRAINT FK_6C6EC5EEDB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE usuario CHANGE email email VARCHAR(180) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE festival_destacado');
        $this->addSql('ALTER TABLE mensajes DROP FOREIGN KEY FK_6C929C80DB38439E');
        $this->addSql('ALTER TABLE mensajes ADD CONSTRAINT FK_6C929C80DB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE respuesta DROP FOREIGN KEY FK_6C6EC5EEDB38439E');
        $this->addSql('ALTER TABLE respuesta DROP FOREIGN KEY FK_6C6EC5EE4481E9A2');
        $this->addSql('ALTER TABLE respuesta ADD CONSTRAINT FK_6C6EC5EEDB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE respuesta ADD CONSTRAINT FK_6C6EC5EE4481E9A2 FOREIGN KEY (mensajes_id) REFERENCES mensajes (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE usuario CHANGE email email VARCHAR(180) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
