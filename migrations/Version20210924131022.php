<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210924131022 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE vet_specialty (vet_id INT NOT NULL, specialty_id INT NOT NULL, INDEX IDX_A51FB03540369CAB (vet_id), INDEX IDX_A51FB0359A353316 (specialty_id), PRIMARY KEY(vet_id, specialty_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE vet_specialty ADD CONSTRAINT FK_A51FB03540369CAB FOREIGN KEY (vet_id) REFERENCES vet (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vet_specialty ADD CONSTRAINT FK_A51FB0359A353316 FOREIGN KEY (specialty_id) REFERENCES specialty (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE specialty_vet');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE specialty_vet (specialty_id INT NOT NULL, vet_id INT NOT NULL, INDEX IDX_7F450FC640369CAB (vet_id), INDEX IDX_7F450FC69A353316 (specialty_id), PRIMARY KEY(specialty_id, vet_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE specialty_vet ADD CONSTRAINT FK_7F450FC640369CAB FOREIGN KEY (vet_id) REFERENCES vet (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE specialty_vet ADD CONSTRAINT FK_7F450FC69A353316 FOREIGN KEY (specialty_id) REFERENCES specialty (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('DROP TABLE vet_specialty');
    }
}
