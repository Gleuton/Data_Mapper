<?php

namespace Gleuton\DataMapper\Repositories;

use Gleuton\DataMapper\Drivers\DriverInterface;
use Gleuton\DataMapper\Entities\EntityInterface;

class Repository
{
    protected DriverInterface $driver;

    public function __construct(DriverInterface $driver)
    {
        $this->driver = $driver;
    }

    public function setEntity(string $entity)
    {
        //todo
    }

    public function getEntity(): EntityInterface
    {
        //todo
    }

    public function insert(EntityInterface $entity): EntityInterface
    {
        //todo
    }

    public function update(EntityInterface $entity): EntityInterface
    {
        //todo
    }

    public function delete(EntityInterface $entity): EntityInterface
    {
        //todo
    }

    public function first($id = null): ?EntityInterface
    {
        //todo
    }

    public function all(array $condition = []): EntityInterface
    {
        //todo
    }
}
