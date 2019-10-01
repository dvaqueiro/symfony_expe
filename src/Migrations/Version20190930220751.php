<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190930220751 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Create table to persist customers';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf(
            $this->connection->getDatabasePlatform()->getName() !== 'mysql',
            'Migration can only be executed safely on \'mysql\'.'
        );

        $this->addSql('CREATE TABLE customers (
                customer_id VARCHAR(255) NOT NULL,
                name VARCHAR(255) NOT NULL,
                first_surname VARCHAR(255) NOT NULL,
                last_surname VARCHAR(255) DEFAULT NULL,
                street VARCHAR(255) NOT NULL,
                street_number VARCHAR(255) NOT NULL,
                floor VARCHAR(255) NOT NULL,
                postal_code VARCHAR(255) NOT NULL,
                city VARCHAR(255) NOT NULL,
                status VARCHAR(255) NOT NULL,
                PRIMARY KEY(customer_id)
            )
            DEFAULT CHARACTER SET utf8mb4
            COLLATE utf8mb4_unicode_ci
            ENGINE = InnoDB'
        );
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf(
            $this->connection->getDatabasePlatform()->getName() !== 'mysql',
            'Migration can only be executed safely on \'mysql\'.'
        );

        $this->addSql('DROP TABLE customers');
    }
}
