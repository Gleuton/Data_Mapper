<?php


namespace Gleuton\DataMapper\Entities;


interface EntityInterface
{
    public function __construct(array $data = []);

    public function setAll(array $data);

    public function getAll(): array;
}