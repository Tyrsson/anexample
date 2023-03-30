<?php

declare(strict_types=1);

namespace App\Service;

interface RelayInterface
{
    public function send();
    public function receive();
}
