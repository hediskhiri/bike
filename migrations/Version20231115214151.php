<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231115214151 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE maintenance (id INT AUTO_INCREMENT NOT NULL, stations_id INT DEFAULT NULL, start_time DATETIME NOT NULL, end_time DATETIME NOT NULL, INDEX IDX_2F84F8E9B1E3C4B4 (stations_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE maintenance ADD CONSTRAINT FK_2F84F8E9B1E3C4B4 FOREIGN KEY (stations_id) REFERENCES station (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE maintenance DROP FOREIGN KEY FK_2F84F8E9B1E3C4B4');
        $this->addSql('DROP TABLE maintenance');
    }
}
