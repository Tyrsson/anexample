<?php

declare(strict_types=1);

use App\Message;
use App\User;
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
     * Since this is occuring in a loop we get a local scope variable that holds an
     * instance of User that represents each user in the array, this could just as easily
     * be the return of a MySQL query, data returned from a remote API etc etc
     *
     * Yes, I realize that all of this code needs vast improvements, thats the whole point :)
     */
    ${$user} = clone($userInstance);
}

Debug::dump($ana);
Debug::dump($joey);



