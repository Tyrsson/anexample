<?php

declare(strict_types=1);

namespace App;

class Message
{
    protected self|string $message;

    public function __construct(self|string $message)
    {
    }

    /**
     * Lets take a look at whats being done here
     * This is commonly known as a "setter", yep cause it sets a property value
     * pretty much have them in every language but lets look beyond that into how it provides
     * part of the classes API, or interface (many of these terms are used interchangably).
     * The method (function) is public, which means it can be called outside of the class
     * at runtime (userland) very soon we will get to see it in use :)
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    public function getMessage(): null|string
    {
        return $this->message;
    }
}
