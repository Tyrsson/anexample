<?php

declare(strict_types=1);

use App\Message;
use App\User\User;
use Webinertia\Utils\Debug;
/**
 * I had to make a couple decisions here. But maybe it will not make the example to complicated
 * You should simply be able to fork this project in Github, then from your Vscode hit cntrl + shift + P and clone it
 * to your local. In your local the doc root of the project will need to be defined to point to the public directory
 * of this project :)
 * Once that is done you should be able to open a terminal window in vscode bottom left of the window (blue bar)
 * -----
 * side question, when you open a project for use in vscode, any time you are working on one of these types of projects
 * you should navigate to, say for this project, the directory that holds public and right click it, then open in code
 * Im sure you most likely already knew that but wanted to make sure. The reason is so that when you open the terminal window
 * you should see the path set to the correct location for you to run composer commands for this project
 * Once that is done, you should simple be able to run composer install and it should pull the few dependecies for this project
 * there will be a few from Laminas becuase they are required by the webinertia/webinertia-utils package but since those are
 * already in the lock file for this project, simply composer install should do if memory serves
 *
 * Why did I opt for composer in this project? Simple answer, because you have to get used to using it, its about as simple as npm
 * plus it allows you to get used to namespaced autoloading in php, its awesome, and as such, 99.9% of projects and
 * frameworks now use the composer autoloader, well, so are we. Yes, its worth it even in something this small because then
 * with a simple command we can use any of our favorite libraries even if we are not using the entire framework. Laminas
 * is a great example. Nearly all of their components are use at will, which means you can use them outside of the MVC framework
 * I figured seeing that might help you get past the hurdle of the MVC kernel :) In the coming days as we work through some of this
 * I will begin to introduce you to how you can use them outside of the MVC. Why you ask? Because why reinvent the wheel? Is that easy to do
 * you ask... Ive already done it in this project as an illustration as to how learning a framework like Laminas can save you countless
 * hours in development time, even in smaller projects. To see how the simplest things can make your life easier, replace one of the below
 * calls to Debug::dump() with var_dump() and check your browser, you will instantly appreciate why I have take the time to start a Utils
 * project that is installable via composer :)
 */
require __DIR__ . '/../vendor/autoload.php';

$userData = include __DIR__ . '/../module/App/src/data/user_data.php';

Debug::dump($userData);

$userInstance = new User();

    /**
     * If you were to make the following assignment using
     * ${$user} = $userInstance;
     * Both Debug::dump() calls would print the same data to the browser since objects are by reference more or less (its complicated)
     * So the main point here is that in php when we run the foreach and use the as $user => $data
     * during iteration it splits an associative array into its key and value. If you open the file that is included, user_data.php
     * you will see what I mean. The file simply returns an multi-dimensional assoc array with our names as keys and our data as the
     * name keys value. I did that since coming from javascript its going to be one of those gotchas, its not exactly the same in js
     * Honestly, its one of those things that is much easier in php.
     */
foreach ($userData as $user => $data) {
    /**
     * @see User::exchangeArray()
     *
     */
    $userInstance->exchangeArray($data); // This method really should not belong to User, It will be moving to an Interface ;)
    /**
     * String manipulation lesson. In php, as of now atleast, you can use ${$user} =
     * So whats happening here... Let me see if I can explain it. We are wanting to dynamically create a variable in the local scope
     * that will result in the form of the array key, in this case one is ana, one is joey. We already have the string, its the array key
     * since we are doing this ${} and it encloses the $user, php uses the exact key string to create the variable which is what allows
     * us to Debug::dump $ana and $joey
     * In other words, php will convert anything inside {} to the string identifier used to identify the variable in the symbol table
     * the symbol table being where php stores the identifiers for all variables, classes etc etc. Its another one of those things
     * that is much easier in php than js
     */
    ${$user} = clone($userInstance);
}

/**
 * lol, writing the original comment is what spurred me to update the dump code so that its not needed :)
 * */
Debug::dump($ana, 'Line #:' . __LINE__);
Debug::dump($joey, 'Dumping $joey', true);

// this was a test to verify that the correct line was found in the stack trace ;)
$joey->readMessage();

$var = ['key' => 'value'];
$anotherVar = ['anotherKey' => 'anotherValue'];
$merged = [];
$merged += $var + $anotherVar;
Debug::dump($merged);
Debug::dump(array_merge($var, $anotherVar));

/**
 * So what would a $user->fetch* method look like for our current User model/service?
 * what is the purpose of this method? Why do we need it? How can we refactor User to take advantage of one to improve
 * encapsulation and to make accessing the user data simpler and allow any type of data structure to used to provide said user data?
 * Currently we have user data supplied by a associative array, but what if it was returned by a MySQL query? Odds are it would still
 * end up at this point as an array of results, usually one array per user, so whats the difference between what we will end up having
 * and what we have now? As long as we plan correctly not a single line of code will have to change outside of the User class
 * So lets take a look at what we will need.
 *
 * */

