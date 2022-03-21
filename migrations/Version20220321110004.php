<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220321110004 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agents ADD CONSTRAINT FK_9596AB6ED44F05E5 FOREIGN KEY (images_id) REFERENCES images (id)');
        $this->addSql('CREATE INDEX IDX_9596AB6ED44F05E5 ON agents (images_id)');
        $this->addSql('ALTER TABLE images ADD photo VARCHAR(255) NOT NULL, CHANGE products_id products_id INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agents DROP FOREIGN KEY FK_9596AB6ED44F05E5');
        $this->addSql('DROP INDEX IDX_9596AB6ED44F05E5 ON agents');
        $this->addSql('ALTER TABLE images DROP photo, CHANGE products_id products_id INT NOT NULL');
    }
}
