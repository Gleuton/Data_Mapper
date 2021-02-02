<?php


namespace Gleuton\DataMapper\QueryBuilder;


use Gleuton\DataMapper\QueryBuilder\Filters\where;

class Select implements QueryBuilderInterface
{
    use where;

    private string $sql;
    protected array $values = [];
    private array $conditions;

    public function __construct(string $table, array $conditions = [])
    {
        $this->makeSql($table, $conditions);
    }

    public function getValues(): array
    {
        return $this->values;
    }

    public function __toString(): string
    {
        return $this->sql;
    }

    private function makeSql(string $table, array $conditions): void
    {
        $this->sql = "SELECT * FROM {$table} " .
                    $this->makeWhere($conditions);
    }
}