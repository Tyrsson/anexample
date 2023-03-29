<?php

declare(strict_types=1);

namespace App\User;

use App\Message;
use Laminas\Stdlib\ArrayObject;

// class is marked abstract, which means you can not call new User() and create an instance, you must extend it
abstract class AbstractUser extends ArrayObject
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

    abstract protected function readMessage();

    abstract protected function sendMessage();

    abstract protected function notifyMessageRead();

    abstract protected function notifyMessageSent();
}
