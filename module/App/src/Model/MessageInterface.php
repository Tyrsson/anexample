<?php

declare(strict_types=1);

namespace App\Model;

use Laminas\Stdlib\MessageInterface as BaseInterface;

interface MessageInterface extends BaseInterface
{
    /**
     * As an example of usage, these constants could be used to
     * provide to the RelayService
     */
    public const MESSAGE_TYPE_EMAIL       = 'email';
    public const MESSAGE_TYPE_INSTANT     = 'instant';
    public const MESSAGE_TYPE_TEXT        = 'sms';
    public const MESSAGE_TYPE_NOTIFCATION = 'notification';
    public const MESSAGE_STATUS_RECEIVED  = 'received';
    public const MESSAGE_STATUS_READ      = 'read';
    public const MESSAGE_STATUS_SENT      = 'sent';
    public const NOTIFICATION_TYPE_SMS    = 'sms';
    public const NOTIFICATION_TYPE_PUSH   = 'push';

}
