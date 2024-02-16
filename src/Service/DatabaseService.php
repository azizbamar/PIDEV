<?php
namespace App\Service;

use Doctrine\DBAL\Connection;

class DatabaseService
{
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function getAllTables(): array
    {
        $tables = $this->connection->getSchemaManager()->listTableNames();

        return $tables;
    }
}
?>
