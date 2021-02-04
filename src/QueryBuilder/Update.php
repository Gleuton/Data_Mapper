<?php


namespace Gleuton\DataMapper\QueryBuilder;


use Gleuton\DataMapper\QueryBuilder\Filters\where;

class Update implements QueryBuilderInterface
{
    use where;

    private string $sql;
    protected array $values = [];

    public function __construct(
        string $table,
        array $data,
        array $conditions = []
    ) {
        $this->values = array_values($data);
        $this->makeSql($table, $data, $conditions);
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

    private function makeSql(
        string $table,
        array $data,
        array $conditions
    ): void {
        $this->sql = "UPDATE {$table}";
        $columns = array_keys($data);

        array_walk(
            $columns,
            static function (&$value) {
                $value .= '=?';
            }
        );
        $columns = implode(
            ', ',
            $columns
        );

        $this->sql .= " SET {$columns} " .
            $this->makeWhere($conditions);
    }
}