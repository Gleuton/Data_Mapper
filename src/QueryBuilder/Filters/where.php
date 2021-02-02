<?php


namespace Gleuton\DataMapper\QueryBuilder\Filters;

trait where
{
    protected function makeWhere(array $conditions): string
    {
        $where  = [];
        $values = [];

        foreach ($conditions as [$field, $operator, $value]) {
            if (is_null($value)) {
                $value    = $operator;
                $operator = null;
            }
            $operator = $operator ?? '=';
            $where[]  = $field . $operator . '?';
            $values[] = $value;
        }

        $this->values = array_merge($this->values, $values);
        if (empty($conditions)) {
            return '';
        }
        return 'WHERE ' . implode(' AND ', $where);
    }
}