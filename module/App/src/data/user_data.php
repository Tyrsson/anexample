<?php

declare(strict_types=1);

return [
    'ana'      => [
        'firstName' => 'Ana',
        'lastName'  => 'Geldiashvili',
    ],
    'joey'     => [
        'firstName' => 'Joey',
        'lastName'  => 'Smith',
    ],
    'testUser' => [
        'firstName' => 'Test',
        'lastName'  => 'User',
        'mi'        => 'A',
        'street'    => '123 Echo drive',
        'city'      => 'Dataville',
        'zip'       => \dechex(35025), // notice the \ is because we do not have a use function statement at the top of the file
        'country'   => 'NAN',
        'planet'    => 'Cybertron',
        'galaxy'    => 'One far away',

    ],
];