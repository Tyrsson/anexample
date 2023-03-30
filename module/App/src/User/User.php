<?php

declare(strict_types=1);

namespace App\User;

// This tells the autoloader we need to use this class and it include/requires it for use by the namespace
use App\Model\Message;
use App\User\AbstractUser;
use Webinertia\Utils\Debug;
/**
 * class is marked as final, which means it can not be extended further
 *
 */
final class User extends AbstractUser
{
    private bool $hasReadMessage = false;

    public function readMessage(): void
    {
        $test = 'This is a test';
        Debug::dump($test);
    }

    protected function sendMessage(): void
    {

    }

    protected function notifyMessageRead(): Message
    {
        /**
         * Dont worry, I will explain how this craziness is possible its just an anonymous class
         * The important thing to note here is that since it extends the message class
         * it satisfies the return typing
         */
        $notification = new class() extends Message {

        };
        return $notification;
        /**
         * this could be rewritten (see notifyMessageSent below)  to save us a symbol in the table
         * you have to consider the amount of memory that you are using, in something small like this example
         * its no big deal, but in enterprise level systems, it can be a very big deal
         */
    }

    protected function notifyMessageSent(): Message
    {
        // see, no local scope variable is needed since we just return the instance
        return new class() extends Message {

        };
    }
}
