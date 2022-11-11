<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221109152451 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reset_password_request (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, selector VARCHAR(20) NOT NULL, hashed_token VARCHAR(100) NOT NULL, requested_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', expires_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_7CE748AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reset_password_request ADD CONSTRAINT FK_7CE748AA76ED395 FOREIGN KEY (user_id) REFERENCES se_users (id)');
        $this->addSql('CREATE INDEX timestamp_idx ON ac_activities (timestamp)');
        $this->addSql('CREATE INDEX resourceKey_idx ON ac_activities (resourceKey)');
        $this->addSql('CREATE INDEX resourceId_idx ON ac_activities (resourceId)');
        $this->addSql('CREATE INDEX resourceSecurityContext_idx ON ac_activities (resourceSecurityContext)');
        $this->addSql('CREATE INDEX resourceSecurityObjectType_idx ON ac_activities (resourceSecurityObjectType)');
        $this->addSql('CREATE INDEX resourceSecurityObjectId_idx ON ac_activities (resourceSecurityObjectId)');
        $this->addSql('CREATE INDEX idx_resource ON ro_routes (entity_id, entity_class)');
        $this->addSql('CREATE INDEX idx_history ON ro_routes (history)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reset_password_request DROP FOREIGN KEY FK_7CE748AA76ED395');
        $this->addSql('DROP TABLE reset_password_request');
        $this->addSql('DROP INDEX timestamp_idx ON ac_activities');
        $this->addSql('DROP INDEX resourceKey_idx ON ac_activities');
        $this->addSql('DROP INDEX resourceId_idx ON ac_activities');
        $this->addSql('DROP INDEX resourceSecurityContext_idx ON ac_activities');
        $this->addSql('DROP INDEX resourceSecurityObjectType_idx ON ac_activities');
        $this->addSql('DROP INDEX resourceSecurityObjectId_idx ON ac_activities');
        $this->addSql('DROP INDEX idx_resource ON ro_routes');
        $this->addSql('DROP INDEX idx_history ON ro_routes');
    }
}
