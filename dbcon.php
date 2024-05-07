<?php 
require __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\Factory;

$factory = (new Factory)
    ->withServiceAccount('project-rose-rw8-firebase-adminsdk-enjf5-9446e2529f')
    ->withDatabaseUri('https://project-rose-rw8-default-rtdb.asia-southeast1.firebasedatabase.app');

$database = $factory->createDatabase();
?>