<?php

use App\Entities\User;
use Gleuton\DataMapper\Drivers\SqLite;
use Gleuton\DataMapper\Repositories\Repository;

require __DIR__ . '/vendor/autoload.php';

$conn = new SqLite();

$conn->connect(['dns' => __DIR__ . '/data_base/database.sqlite']);

$repository = new Repository($conn);
try {
    $repository->setEntity(User::class);
} catch (ReflectionException $e) {
    echo $e->getMessage();
}

$user = $repository->first();
$user->nome = 'Gleuton Dutra';

$user_del = $repository->update($user);


var_dump($user_del);