<?php

namespace Gleuton\DataMapper\Repositories;

use Gleuton\DataMapper\Drivers\DriverInterface;
use Gleuton\DataMapper\Entities\EntityInterface;
use Gleuton\DataMapper\QueryBuilder\Select;

class Repository
{
    protected DriverInterface $driver;
    protected string $entity;

    public function __construct(DriverInterface $driver)
    {
        $this->driver = $driver;
    }

    /**
     * @param string $entity
     *
     * @throws \ReflectionException
     */
    public function setEntity(string $entity): void
    {
        $reflection = new \ReflectionClass($entity);
        if (!$reflection->implementsInterface(EntityInterface::class)) {
            throw new \InvalidArgumentException(
                "{$entity} not implements interface " .
                EntityInterface::class
            );
        }
        $this->entity = $entity;
    }

    public function getEntity(array $data = []): EntityInterface
    {
        return new $this->entity($data);
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
        $this->driver->setQueryBuilder(new Select('tb_user'));
        $this->driver->execute();

        $data = $this->driver->first();
        return $this->getEntity($data);
    }

    public function all(array $condition = []): array
    {
        $table = $this->getEntity()->getTable();
        $this->driver->setQueryBuilder(new Select($table));
        $this->driver->execute();
        $data     = $this->driver->all();
        $entities = [];

        foreach ($data as $row) {
            $entities[] = $this->getEntity($row);
        }
        return $entities;
    }
}
