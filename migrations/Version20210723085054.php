<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210723085054 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ligne_de_commande DROP INDEX UNIQ_7982ACE6F347EFB, ADD INDEX IDX_7982ACE6F347EFB (produit_id)');
        $this->addSql('ALTER TABLE ligne_de_commande CHANGE produit_id produit_id INT NOT NULL');
        $this->addSql('ALTER TABLE utilisateur CHANGE numero_de_la_rue numero_de_la_rue VARCHAR(255) NOT NULL, CHANGE nom_de_la_rue nom_de_la_rue INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ligne_de_commande DROP INDEX IDX_7982ACE6F347EFB, ADD UNIQUE INDEX UNIQ_7982ACE6F347EFB (produit_id)');
        $this->addSql('ALTER TABLE ligne_de_commande CHANGE produit_id produit_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateur CHANGE numero_de_la_rue numero_de_la_rue INT NOT NULL, CHANGE nom_de_la_rue nom_de_la_rue VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
