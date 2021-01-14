<?php

namespace Gleuton\DataMapper\Drivers;

use Gleuton\DataMapper\QueryBuilder\QueryBuilderInterface;

interface DriverInterface
{
    public function connect(array $config): void;

    public function close(): void;

    public function setQueryBuilder(QueryBuilderInterface $queryBuilder);

    public function execute();

    public function lastInsertedId();

    public function first();

    public function all();
}
