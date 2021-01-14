<?php


namespace Gleuton\DataMapper\QueryBuilder;


class Select implements QueryBuilderInterface
{
    private string $sql;
    private array $values;

    public function __construct(string $table, array $conditions = [])
    {
        $this->makeSql($table);
    }

    public function getValues(): array
    {
        return $this->values;
    }

    public function __toString(): string
    {
        return $this->sql;
    }

    private function makeSql(string $table): void
    {
        $this->sql = "SELECT * FROM { $table }";
    }
}