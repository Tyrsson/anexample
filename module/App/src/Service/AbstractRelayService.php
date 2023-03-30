<?php

declare(strict_types=1);

namespace App\Service;

use App\User\UserInterface;

abstract class AbstractRelayService implements RelayInterface
{
    /**
     * This abstraction begins to introduce polymorphism.
     * What happens if this system ends up having more than a single kind of user?
     * With this approach as long as the User object implements the UserInterface
     * the code will not need to be refactored (edited) to allow user to notified
     * that the Relay service has sent their message
     * @param UserInterface $user
     * @return mixed
     */
    abstract protected function notifySent(UserInterface $user);

    abstract protected function notifyPending(UserInterface $user);
}
