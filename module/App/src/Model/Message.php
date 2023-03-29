<?php

declare(strict_types=1);

namespace App\Message;

use App\Message\MessageInterface;
use Laminas\Stdlib\Message as BaseMessage;

class Message extends BaseMessage implements MessageInterface
{
}
