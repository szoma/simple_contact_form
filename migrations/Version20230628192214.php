<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230628192214 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'marks not-so long description message';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE `contact` (`id` int(11) NOT NULL,`name` varchar(30) NOT NULL,`mail` varchar(30) NOT NULL,`body` text NOT NULL,`amd_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;');

    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE `contact`');

    }
}
