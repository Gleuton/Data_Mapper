<?php

namespace Gleuton\DataMapper\Drivers;

use Gleuton\DataMapper\QueryBuilder\QueryBuilderInterface;

interface DriverInterface
{
    public function connect(array $config): void;

    public function close(): void;

    public function setQueryBuilder(QueryBuilderInterface $queryBuilder): void;

    public function execute(): bool;

    public function lastInsertedId(): string;

    public function first(): array;

    public function all(): array;
}
