<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220415082329 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE director (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE matiere (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE note_matiere_student (id INT AUTO_INCREMENT NOT NULL, student_id INT DEFAULT NULL, matiere_id INT DEFAULT NULL, note NUMERIC(4, 2) DEFAULT NULL, INDEX IDX_11D458BFCB944F1A (student_id), INDEX IDX_11D458BFF46CD258 (matiere_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE professor (id INT NOT NULL, studyplace_id INT DEFAULT NULL, age NUMERIC(2, 0) NOT NULL, salary NUMERIC(7, 2) NOT NULL, work_age NUMERIC(2, 0) DEFAULT NULL, UNIQUE INDEX UNIQ_790DD7E34CFBBE06 (studyplace_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE refresh_tokens (id INT AUTO_INCREMENT NOT NULL, refresh_token VARCHAR(128) NOT NULL, username VARCHAR(255) NOT NULL, valid DATETIME NOT NULL, UNIQUE INDEX UNIQ_9BACE7E1C74F2195 (refresh_token), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student (id INT NOT NULL, studyplace_id INT DEFAULT NULL, sexe VARCHAR(255) NOT NULL, global_note NUMERIC(4, 2) DEFAULT NULL, mail_parent VARCHAR(255) NOT NULL, INDEX IDX_B723AF334CFBBE06 (studyplace_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE study (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE study_matiere (study_id INT NOT NULL, matiere_id INT NOT NULL, INDEX IDX_A501AA28E7B003E9 (study_id), INDEX IDX_A501AA28F46CD258 (matiere_id), PRIMARY KEY(study_id, matiere_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE director ADD CONSTRAINT FK_1E90D3F0BF396750 FOREIGN KEY (id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE note_matiere_student ADD CONSTRAINT FK_11D458BFCB944F1A FOREIGN KEY (student_id) REFERENCES student (id)');
        $this->addSql('ALTER TABLE note_matiere_student ADD CONSTRAINT FK_11D458BFF46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id)');
        $this->addSql('ALTER TABLE professor ADD CONSTRAINT FK_790DD7E34CFBBE06 FOREIGN KEY (studyplace_id) REFERENCES study (id)');
        $this->addSql('ALTER TABLE professor ADD CONSTRAINT FK_790DD7E3BF396750 FOREIGN KEY (id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF334CFBBE06 FOREIGN KEY (studyplace_id) REFERENCES study (id)');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF33BF396750 FOREIGN KEY (id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE study_matiere ADD CONSTRAINT FK_A501AA28E7B003E9 FOREIGN KEY (study_id) REFERENCES study (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE study_matiere ADD CONSTRAINT FK_A501AA28F46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE note_matiere_student DROP FOREIGN KEY FK_11D458BFF46CD258');
        $this->addSql('ALTER TABLE study_matiere DROP FOREIGN KEY FK_A501AA28F46CD258');
        $this->addSql('ALTER TABLE note_matiere_student DROP FOREIGN KEY FK_11D458BFCB944F1A');
        $this->addSql('ALTER TABLE professor DROP FOREIGN KEY FK_790DD7E34CFBBE06');
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF334CFBBE06');
        $this->addSql('ALTER TABLE study_matiere DROP FOREIGN KEY FK_A501AA28E7B003E9');
        $this->addSql('ALTER TABLE director DROP FOREIGN KEY FK_1E90D3F0BF396750');
        $this->addSql('ALTER TABLE professor DROP FOREIGN KEY FK_790DD7E3BF396750');
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF33BF396750');
        $this->addSql('DROP TABLE director');
        $this->addSql('DROP TABLE matiere');
        $this->addSql('DROP TABLE note_matiere_student');
        $this->addSql('DROP TABLE professor');
        $this->addSql('DROP TABLE refresh_tokens');
        $this->addSql('DROP TABLE student');
        $this->addSql('DROP TABLE study');
        $this->addSql('DROP TABLE study_matiere');
        $this->addSql('DROP TABLE `user`');
    }
}
