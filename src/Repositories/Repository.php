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
}
