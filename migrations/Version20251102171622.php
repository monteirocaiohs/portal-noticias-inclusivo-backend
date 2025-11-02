<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251102171622 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categoria (id SERIAL NOT NULL, nome VARCHAR(200) NOT NULL, descricao VARCHAR(500) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE media_object (id SERIAL NOT NULL, file_path VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE noticia (id SERIAL NOT NULL, titulo VARCHAR(500) NOT NULL, conteudo TEXT NOT NULL, data_publicacao TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, destaque VARCHAR(1000) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE noticia_categoria (noticia_id INT NOT NULL, categoria_id INT NOT NULL, PRIMARY KEY(noticia_id, categoria_id))');
        $this->addSql('CREATE INDEX IDX_95B0098999926010 ON noticia_categoria (noticia_id)');
        $this->addSql('CREATE INDEX IDX_95B009893397707A ON noticia_categoria (categoria_id)');
        $this->addSql('ALTER TABLE noticia_categoria ADD CONSTRAINT FK_95B0098999926010 FOREIGN KEY (noticia_id) REFERENCES noticia (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE noticia_categoria ADD CONSTRAINT FK_95B009893397707A FOREIGN KEY (categoria_id) REFERENCES categoria (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE noticia_categoria DROP CONSTRAINT FK_95B0098999926010');
        $this->addSql('ALTER TABLE noticia_categoria DROP CONSTRAINT FK_95B009893397707A');
        $this->addSql('DROP TABLE categoria');
        $this->addSql('DROP TABLE media_object');
        $this->addSql('DROP TABLE noticia');
        $this->addSql('DROP TABLE noticia_categoria');
    }
}
