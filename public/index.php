<?php

declare(strict_types=1);

use App\Message;
use App\User\User;
use Webinertia\Utils\Debug;

require __DIR__ . '/../vendor/autoload.php';

/**
 * So what would a $user->fetch* method look like for our current User model/service?
 * what is the purpose of this method? Why do we need it? How can we refactor User to take advantage of one to improve
 * encapsulation and to make accessing the user data simpler and allow any type of data structure to used to provide said user data?
 * Currently we have user data supplied by a associative array, but what if it was returned by a MySQL query? Odds are it would still
 * end up at this point as an array of results, usually one array per user, so whats the difference between what we will end up having
 * and what we have now? As long as we plan correctly not a single line of code will have to change outside of the User class
 * So lets take a look at what we will need.
 * - To refactor the User class to load the data, instead of having to load it manually.
 * - Provide an accessor (getter) to fetch the information
 * */
$userInstance = new User();

/**
 * I will use your dump data to introduce a new concept
 * If you look in the dump data you will see this:
 * ["firstName":protected] => uninitialized(?string)
 * what does this mean? It means that there is a class property $firstName that has not been initialize, or assigned a value basically
 * so if that is true then how can I make the noted call below and get your firstName? This is a bonus point question :)
 * You said you wanted to learn more than the basics, so here we go, I mean its not super advanced and I will give you a hint
 * it has to do with overriding php's "magic" methods.
 */
$ana = $userInstance->fetchUser('ana');
Debug::dump($ana);

// how does this work if the property has not been assigned a value?
Debug::dump($ana->firstName, 'This is the one that shouldnt work'); // see how I tagged that dump from here ;)
//

$joey = $userInstance->fetchUser('joey', false);
Debug::dump($joey);

$steve = $userInstance->fetchUser('steve');
Debug::dump($steve);

// That concludes todays changes.
// Another bonus question. I never told you why coding fetchUser the way I did prevents someone from replacing it later in the inheritance chain
// so how does it work?

