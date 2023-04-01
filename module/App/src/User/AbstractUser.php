<?php

declare(strict_types=1);

namespace App\User;

use App\Message;
use Laminas\Stdlib\ArrayObject;

// class is marked abstract, which means you can not call new User() and create an instance, you must extend it
abstract class AbstractUser extends ArrayObject implements UserInterface
{
    private const DATA_PATH = __DIR__ . '/../data/user_data.php';

    protected ?string $firstName;
    protected ?string $lastName;

    protected ?Message $message;

    /**
     * @param array<array-key, mixed>|object $input
     * @return void
     */
    public function __construct($input = [])
    {
        if ($input === []) { // if and only if the $input we provide at $class = new User([]) is empty will this code run
            $input = include self::DATA_PATH; // we just loaded our data from the file. Now it gets passed to the parent
        }
        parent::__construct($input, self::ARRAY_AS_PROPS);
    }

    /**
     * Now how could we possibly enforce future developers to use our fetchUser
     * instead of them going off and introducing bugs etc by overriding our fetchUsers with their own in a class
     * that extends our abstract class? Well, that is another reason I chose to extend Laminas\Stdlib\ArrayObject
     * Lets take a look at how to accomplish this.
     */
    final public function fetchUser(string $userName, ?bool $fetchInstance = true): UserInterface|array|null
    {
        // These methods are defined in the parent Laminas ArrayObject class
        if ($this->offsetExists($userName)) {
            // if we are inside this if, then the requested user has been found in the array
            if ($fetchInstance) { // this is true, we create a new instance and seed it with the section of the array for requested user and return it
                return new $this($this->offsetGet($userName));
                /**
                 * Notes on the above call. How can this work?
                 * One, as I stated, if you notice in the definition the siganture reads self|array|null, but here UserInterface is self there
                 * Since we are return new $this how can this work? we can not use self because it would cause an error
                 * saying you can not create an instance of AbstractUser, but you have to consider, this method will NEVER be called
                 * on an instance of AbstractUser, will be called on instances of the extending class, in our case User, so its allowed
                 */
            }
            // Only if the flag is false can we get here and even if you do not pass a value it will be true or false
            // because we set a default in the signature, so since they do not want an instance, we send them the aray
            return $this->offsetGet($userName);
        }
        // if none of the above is true and possible, then no user was found so we return null to indicate to the calling line, no user
        return null;
    }
}
