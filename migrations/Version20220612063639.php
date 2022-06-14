<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220612063639 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produits DROP FOREIGN KEY FK_BE2DDF8CA9E5FE47');
        $this->addSql('DROP INDEX UNIQ_BE2DDF8CA9E5FE47 ON produits');
        $this->addSql('ALTER TABLE produits ADD numero INT NOT NULL, DROP reference_id');
        $this->addSql('ALTER TABLE `references` CHANGE numero numero_reference INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produits ADD reference_id INT DEFAULT NULL, DROP numero');
        $this->addSql('ALTER TABLE produits ADD CONSTRAINT FK_BE2DDF8CA9E5FE47 FOREIGN KEY (reference_id) REFERENCES `references` (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BE2DDF8CA9E5FE47 ON produits (reference_id)');
        $this->addSql('ALTER TABLE `references` CHANGE numero_reference numero INT NOT NULL');
    }
}
