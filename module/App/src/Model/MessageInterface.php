<?php

declare(strict_types=1);

namespace App\Model;

use Laminas\Stdlib\MessageInterface as BaseInterface;

interface MessageInterface extends BaseInterface
{
    public const MESSAGE_TYPE_EMAIL       = 'email';
    public const MESSAGE_TYPE_INSTANT     = 'instant';
    public const MESSAGE_TYPE_TEXT        = 'sms';
    public const MESSAGE_TYPE_NOTIFCATION = 'notification';
    public const MESSAGE_STATUS_RECEIVED  = 'received';
    public const MESSAGE_STATUS_READ      = 'read';
    public const MESSAGE_STATUS_SENT      = 'sent';
}
