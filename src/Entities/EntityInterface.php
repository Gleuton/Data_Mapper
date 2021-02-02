<?php


namespace Gleuton\DataMapper\Entities;


interface EntityInterface
{
    public function __construct(array $data = []);

    public function setAll(array $data): void;

    public function getAll(): array;

    public function getTable(): string;

    public function getPrimaryKey(): string;
}