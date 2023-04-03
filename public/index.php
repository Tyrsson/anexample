<?php

declare(strict_types=1);

use App\User;
use Webinertia\Utils\Debug;

require __DIR__ . '/../vendor/autoload.php';

/**
 * Implementation change. As you can see I moved two classes, the only real reason for this change is so that you have example
 * of first level namespacing present. The reason I felt this was important is because I first learn to code before namespacing
 * was possible in Php lol. So I always try to cover every aspect of it and there will be several lessons dealing only with it.
 * But, the truth of it is, im more focused on getting you started writing code, useful code, you can learn the nuts and bolts of
 * that shortly when you have your feet under you. for the moment, as long as you can load the code, which basically means follow
 * the naming conventions and file locations that are being used, it doesnt matter.
 */

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
Debug::dump($ana, 'You are returned as an object instance');

// how does this work if the property has not been assigned a value?
Debug::dump($ana->firstName, 'This is the one that shouldnt work'); // see how I tagged that dump from here ;)
//

$joey = $userInstance->fetchUser('joey', false);
Debug::dump($joey, 'I am returned as an array');

$steve = $userInstance->fetchUser('steve');
Debug::dump($steve, 'Steve was not found, apparently we do not know him :P');

// That concludes todays changes.
// Another bonus question. I never told you why coding fetchUser the way I did prevents someone from replacing it later in the inheritance chain
// so how does it work?

// and we have a test user
Debug::dump($userInstance->fetchUser('testUser'), 'Yes you can dump the return of method calls, if they return a value');

/**
 * My next lesson might be to show you how to use Laminas\Config to store that data back to a array using a Laminas\Config\Writer instance
 * Is this configuration? No, but its just a php array, so why couldnt we? We absolutely can. I can literally install the Laminas\Config package
 * modify the classes and have the rewriting of the user arrays working in probably.... 10-20 minutes. It will take me two hours to write the
 * dialog explaning how to do it =)
 */

