<?php


namespace Gleuton\DataMapper\Drivers;


use Gleuton\DataMapper\QueryBuilder\QueryBuilderInterface;

class SqLite implements DriverInterface
{
    /**
     * @var \PDO|null
     */
    private ?\PDO $conn;
    /**
     * @var QueryBuilderInterface
     */
    private QueryBuilderInterface $query;
    /**
     * @var false|\PDOStatement
     */
    private $statement;

    public function connect(array $config): void
    {
        $this->conn = new \PDO('sqlite:' . $config['dns']);
        $this->conn->setAttribute(
            \PDO::ATTR_ERRMODE,
            \PDO::ERRMODE_EXCEPTION
        );
    }

    public function close(): void
    {
        $this->conn = null;
    }

    public function setQueryBuilder(QueryBuilderInterface $queryBuilder): void
    {
        $this->query = $queryBuilder;
    }

    public function execute(): bool
    {
        $this->statement = $this->conn->prepare($this->query);
        return $this->statement->execute();
    }

    public function lastInsertedId(): string
    {
        return $this->conn->lastInsertId();
    }

    public function first(): array
    {
        return $this->statement->fetch(\PDO::FETCH_ASSOC) ?: [];
    }


    public function all(): array
    {
        return $this->statement->fetchAll(\PDO::FETCH_ASSOC) ?: [];
    }
}