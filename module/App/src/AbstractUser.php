<?php

declare(strict_types=1);

namespace App;

// class is marked abstract, which means you can not call new User() and create an instance, you must extend it
abstract class AbstractUser
{
    /**
     * Proper object design tells us that we should use encapsulation
     * public, protected, private is known a visibilty, if a class property is public it can be changed
     * directly outside of the class (we rarely want that). Any visibilty more restrictive than public can not be set outside of the
     * class (userland) nor can it be called from on the object instance in userland examples will follow
     */
    protected ?string $firstName;
    protected ?string $lastName;
    /**
     * Now, Believe it or not, we have a lot going on here
     * 1) If you attempt to assign any value other than an instance of Message (see class below) into
     * $this->message it will cause a Type error, which is fatal and will end script execution
     * I include this in the example as its critically important. Php is becoming more and more strictly
     * typed, as in what type of value is being assigned / passed / returned. It is GOOD practice, if you are not
     * considering it in every line of code, start doing so now and do it always. Its the very reason TypeScript
     * came into existence in the JS world.
     *
     * 2) Even though we can not assign a value other than an instance of Message into $this->message what happens if in userland
     * or an extending class someone attempts to call $anna->getMessage() before a message is set?
     * Well, you got it, it would cause an error if we did not have getMessage() correctly return typed by using
     * null|Message
     *
     * @var Message $message
     */
    protected ?Message $message;

    // notice we do not have a __construct() method

    public function setMessage($message): void
    {
        $this->message = $message;
    }

    public function getMessage(): null|Message
    {
        return $this->message;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getFirstName(): null|string
    {
        return $this->firstName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getLastName(): null|string
    {
        return $this->lastName;
    }

    /**
     * notice how neither of these function have bodies
     * this is because we are telling other developers that
     * the "concrete" implementation of this abstraction should
     * deal with reading and sending messages
     * This could also be defined in an Interface blah blah blah
     * again, im trying to keep it simple and only deal with classes
     * as a side note, notice these methods are protected. If they were defined in an Interface they would have
     * to be public, its something to keep in mind when planning the overall implementation
     */
    abstract protected function readMessage();

    abstract protected function sendMessage();

    abstract protected function notifyMessageRead();

    abstract protected function notifyMessageSent();
}
