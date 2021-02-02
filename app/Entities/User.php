<?php


namespace App\Entities;


use Gleuton\DataMapper\Entities\Entity;

class User extends Entity
{
    protected string $table =  'tb_user';
    protected string $primary_key =  'id_user';
}