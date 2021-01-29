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

    public function setEntity(string $entity): void
    {
        $this->entity = $entity;
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
        $this->driver->setQueryBuilder(new Select('tb_user'));
        $this->driver->execute();

        $data = $this->driver->first();
        return new $this->entity($data);
    }

    public function all(array $condition = []): array
    {
        $table = (new $this->entity())->getTable();
        $this->driver->setQueryBuilder(new Select($table));
        $this->driver->execute();
        $data = $this->driver->first();
        $entities = [];

        foreach ($data as $row){
            $entities[] = new $this->entity($row);
        }
        return $entities;
    }
}
