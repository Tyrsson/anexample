<?php

declare(strict_types=1);

use App\Model\MessageInterface;

return [
    MessageInterface::MESSAGE_TYPE_EMAIL => [
        [
            'sender' => [
                'firstName' => 'Ana',
                'lastName'  => 'Geldiashvili',
            ],
            'message' => [
                'subject'   => 'Help!! I broke it :)',
                'body'      => 'I clicked the wrong thing, it exploded. How do I fix it?!?!?!',
                'meta_data' => [
                    'type' => MessageInterface::MESSAGE_TYPE_EMAIL,
                    'addresses'  => [
                        'sender'    => 'ana@webinertia.net',
                        'recipient' => 'jsmith@webinertia.net',
                    ],
                    'timestamps' => [
                        'sent'              => null,
                        'received'          => null,
                        'sender_notified'   => null,
                        'recipient_notfied' => null,
                    ],
                    MessageInterface::MESSAGE_TYPE_NOTIFCATION => [
                        [
                            'type'     => MessageInterface::NOTIFICATION_TYPE_SMS,
                            'priority' => 1,
                        ],
                        [
                            'type'     => MessageInterface::NOTIFICATION_TYPE_PUSH,
                            'priority' => 2,
                        ],
                    ],
                ],
            ],
        ],
    ],
];