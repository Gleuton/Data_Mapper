<?php


namespace Gleuton\DataMapper\Entities;


abstract class Entity implements EntityInterface
{
    protected array $data;
    protected string $table;
    protected string $primary_key = 'id';

    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    public function setAll(array $data): void
    {
        $this->data = $data;
    }

    public function getAll(): array
    {
        return $this->data;
    }

    public function getTable(): string
    {
        return $this->table;
    }
    public function getPrimaryKey(): string
    {
        return $this->primary_key;
    }
}