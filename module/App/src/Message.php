<?php

declare(strict_types=1);

namespace App;

use App\Model\AbstractMessage;

final class Message extends AbstractMessage
{
    /** This fixes the error */
    protected function readMessage() { }

    protected function sendMessage() { }

    protected function notifyMessageRead() { }

    protected function notifyMessageSent() { }

}
