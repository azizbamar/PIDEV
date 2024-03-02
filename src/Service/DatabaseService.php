<?php
namespace App\Service;
<<<<<<< HEAD
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
=======

>>>>>>> 6420834e7355e2da80ba35953ed94643a74ec016
use Doctrine\DBAL\Connection;

class DatabaseService
{
<<<<<<< HEAD
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
=======
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
>>>>>>> 6420834e7355e2da80ba35953ed94643a74ec016
    }

    public function getAllTables(): array
    {
<<<<<<< HEAD
        $tables = $this->entityManager->getConnection()->getSchemaManager()->listTableNames();

        return $tables;
    }
    public function listTables()
    {
        $allTables = $this->getAllTables();
        $filteredTables = array_filter($allTables, function ($table) {
            return $table !== 'messenger_messages';
        });

        return 
             $filteredTables ;
    
    }
=======
        $tables = $this->connection->getSchemaManager()->listTableNames();

        return $tables;
    }
>>>>>>> 6420834e7355e2da80ba35953ed94643a74ec016
}
?>
