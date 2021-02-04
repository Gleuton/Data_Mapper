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

    public function __get($name)
    {
        $method = $this->methodName('get', $name);

        if (method_exists($this, $method)) {
            return $this->$method();
        }
        return $this->data[$name];
    }

    public function __set($name, $value): array
    {
        $method = $this->methodName('set', $name);

        if (method_exists($this, $method)) {
            return $this->$method($value);
        }
        $this->data[$name] = $value;
        return $this->data;
    }

    public function __isset($name): bool
    {
        $getter = 'get' . ucfirst($name);
        if (method_exists($this, $getter)) {
            return !is_null($this->$getter());
        }

        return isset($this->$name);
    }
    private function methodName($prefix, $name): string
    {
        $method = str_replace('_', ' ', $name);
        $method = ucwords($method);
        $method = str_replace(' ', '', $method);

        return $prefix . $method;
    }
}