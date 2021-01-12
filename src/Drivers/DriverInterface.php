<?php

namespace Gleuton\DataMapper\Drivers;

use Gleuton\DataMapper\QueryBuilder\QueryBuilderInterface;

interface DriverInterface
{
    public function connect($config);

    public function close();

    public function setQueryBuilder(QueryBuilderInterface $queryBuilder);
}
