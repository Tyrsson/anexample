<?php

declare(strict_types=1);

namespace App\Model;

use Laminas\Stdlib\Message as BaseMessage;

abstract class AbstractMessage extends BaseMessage implements MessageInterface
{
    abstract protected function readMessage();

    abstract protected function sendMessage();

    abstract protected function notifyMessageRead();

    abstract protected function notifyMessageSent();
}
