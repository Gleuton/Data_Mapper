<?php

namespace Gleuton\DataMapper\QueryBuilder;

class Insert implements QueryBuilderInterface
{
    private array $values;
    private string $sql;

    /**
     * Insert constructor.
     *
     * @param string $table
     * @param array  $data
     */
    public function __construct(string $table, array $data)
    {
        $this->makeSql($table, $data);
        $this->values = array_values($data);
    }

    /**
     * @return array
     */
    public function getValues(): array
    {
        return $this->values;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->sql;
    }

    private function makeSql(string $table, array $data): void
    {
        $sql     = "INSERT INTO {$table} ";
        $columns = implode(
            ', ',
            array_keys($data)
        );

        $values = implode(
            ', ',
            array_fill(0, count($data), '?')
        );

        $sql .= " ({$columns}) VALUES ({$values})";

        $this->sql = $sql;
    }
}