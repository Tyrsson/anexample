<?php

declare(strict_types=1);

use App\Model\MessageInterface;
// Gotta love arrays =)
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
                    'timestamps' => [ // What could the following values possibly tell us? These are all suedo values...
                        'sent'                  => true,
                        'received'              => true,
                        'sender_notified'       => false,
                        'recipient_notfied'     => true,
                        'read_receipt_received' => false,
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
        [
            'sender' => [
                'firstName' => 'Joey',
                'lastName'  => 'Smith',
            ],
            'message' => [
                'subject'   => 'It\'s not broken :) that\'s a feature!!!', // why is the ' preceeded with a \ ?
                'body'      => 'Open a terminal and cd /path/to/parent | sudo rm -r projectFolder \n Problem fixed =)', // do not!!! run these commands :P
                'meta_data' => [
                    'type' => MessageInterface::MESSAGE_TYPE_EMAIL,
                    'addresses'  => [
                        'sender'    => 'jsmith@webinertia.net',
                        'recipient' => 'ana@webinertia.net',
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