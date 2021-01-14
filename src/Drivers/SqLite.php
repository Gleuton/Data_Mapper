<?php


namespace Gleuton\DataMapper\Drivers;


use Gleuton\DataMapper\QueryBuilder\QueryBuilderInterface;

class SqLite implements DriverInterface
{
    private ?\PDO $conn;

    public function connect(array $config): void
    {
        $this->conn = new \PDO('sqlite:' . $config['dns']);
    }

    public function close(): void
    {
        $this->conn = null;
    }

    public function setQueryBuilder(QueryBuilderInterface $queryBuilder)
    {
    }

    public function execute()
    {
    }

    public function lastInsertedId()
    {
    }

    public function first()
    {
    }


    public function all()
    {
        return $this->conn;
    }
}