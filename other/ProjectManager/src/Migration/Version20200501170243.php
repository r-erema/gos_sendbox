<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200501170243 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE TABLE networks (id UUID NOT NULL, user_id UUID NOT NULL, name VARCHAR(255) CHECK(name IN (\'google\', \'facebook\')) NOT NULL, identity VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D9B9B42BA76ED395 ON networks (user_id)');
        $this->addSql('COMMENT ON COLUMN networks.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN networks.user_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN networks.name IS \'(DC2Type:network_type)\'');
        $this->addSql('CREATE TABLE users (id UUID NOT NULL, date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, email VARCHAR(254) DEFAULT NULL, password_hash VARCHAR(100) DEFAULT NULL, confirm_token VARCHAR(100) DEFAULT NULL, status VARCHAR(255) CHECK(status IN (\'wait\', \'active\')) NOT NULL, reset_token_token VARCHAR(100) DEFAULT NULL, reset_token_expires TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E9E7927C74 ON users (email)');
        $this->addSql('COMMENT ON COLUMN users.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN users.date IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN users.status IS \'(DC2Type:status_type)\'');
        $this->addSql('COMMENT ON COLUMN users.reset_token_expires IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE networks ADD CONSTRAINT FK_D9B9B42BA76ED395 FOREIGN KEY (user_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE networks DROP CONSTRAINT FK_D9B9B42BA76ED395');
        $this->addSql('DROP TABLE networks');
        $this->addSql('DROP TABLE users');
    }
}
