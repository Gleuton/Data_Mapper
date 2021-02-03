<?php

namespace Gleuton\DataMapper\QueryBuilder;

use Gleuton\DataMapper\QueryBuilder\Filters\where;

class Delete implements QueryBuilderInterface
{
    use where;

    protected array $values = [];
    private string $sql;

    /**
     * Insert constructor.
     *
     * @param string $table
     * @param array  $conditions
     */
    public function __construct(string $table, array $conditions)
    {
        $this->makeSql($table, $conditions);
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

    private function makeSql(string $table, array $conditions): void
    {
        $this->sql = "DELETE FROM {$table} " .
            $this->makeWhere($conditions);
    }
}