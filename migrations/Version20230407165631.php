<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230407165631 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE details (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, idcard VARCHAR(255) NOT NULL, age INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE details_products (details_id INT NOT NULL, products_id INT NOT NULL, INDEX IDX_D9EC29D1BB1A0722 (details_id), INDEX IDX_D9EC29D16C8A81A9 (products_id), PRIMARY KEY(details_id, products_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE products (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE details_products ADD CONSTRAINT FK_D9EC29D1BB1A0722 FOREIGN KEY (details_id) REFERENCES details (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE details_products ADD CONSTRAINT FK_D9EC29D16C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE details_products DROP FOREIGN KEY FK_D9EC29D1BB1A0722');
        $this->addSql('ALTER TABLE details_products DROP FOREIGN KEY FK_D9EC29D16C8A81A9');
        $this->addSql('DROP TABLE details');
        $this->addSql('DROP TABLE details_products');
        $this->addSql('DROP TABLE products');
    }
}
