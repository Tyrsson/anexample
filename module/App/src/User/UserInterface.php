<?php

declare(strict_types=1);

namespace App\User;

interface UserInterface
{
    public function fetchUser(string $userName, ?bool $fetchInstance = true): self|array|null; // We allow 3 return types, an instance of self, an array or null in case no user is found
    /**
     * If you have been paying attention you should be wondering how we can return an instance of self
     * if this is an interface since you can not create an instance of an interface, well, in this case
     * self will mean anything implementing this interface. Now, if I were to open the User class right now
     * There would be an error reported by vscode. New developers would be like "how did I break my code I have not even
     * opened that file!!!". Its due to us adding the above method signature. Why? Because we have not implemented it yet of course!!
     */
}
