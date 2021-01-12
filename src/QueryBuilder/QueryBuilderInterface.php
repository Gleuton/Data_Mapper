<?php


namespace Gleuton\DataMapper\QueryBuilder;


interface QueryBuilderInterface
{
    public function getValues(): array;

    public function __toString();
}