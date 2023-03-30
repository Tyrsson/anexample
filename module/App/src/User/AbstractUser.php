<?php

declare(strict_types=1);

namespace App\User;

use App\Model\Message;
use Laminas\Stdlib\ArrayObject;

// class is marked abstract, which means you can not call new User() and create an instance, you must extend it
abstract class AbstractUser extends ArrayObject implements UserInterface
{
    protected ?string $firstName;
    protected ?string $lastName;

    protected ?Message $message;

    /**
     *
     * @param array<array-key, mixed>|object $input
     * @return void
     */
    public function __construct($input = [])
    {
        parent::__construct($input, self::ARRAY_AS_PROPS);
    }
}
