<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191018041712 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, rate_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, price INT NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_D34A04ADBC999F9F (rate_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ratings (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE variations (id INT AUTO_INCREMENT NOT NULL, product_id_id INT DEFAULT NULL, color VARCHAR(255) NOT NULL, size VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_5BB35F5EDE18E50B (product_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADBC999F9F FOREIGN KEY (rate_id) REFERENCES ratings (id)');
        $this->addSql('ALTER TABLE variations ADD CONSTRAINT FK_5BB35F5EDE18E50B FOREIGN KEY (product_id_id) REFERENCES product (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE variations DROP FOREIGN KEY FK_5BB35F5EDE18E50B');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADBC999F9F');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE ratings');
        $this->addSql('DROP TABLE variations');
    }
}
