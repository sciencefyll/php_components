<?php

/**
 * JUST FOR TESTING WHILE IM CREATING THE COMPONENTS!
 */


require 'php_components_essentials/bootstrap.php';

require 'php_components/Authenticate/Authenticate.php';
require 'php_components/Response/Response.php';

echo '<pre>';
$asd = 'kglhug43g54';

$time   = microtime(true);
$mem    = memory_get_usage();

$s = "";

$i = 0;
while (++$i <= 100000)
    echo 'lksdjflsdjfds ', $asd, PHP_EOL;

print_r(array(
    'memory' => (memory_get_usage() - $mem) / (1024 * 1024),
    'seconds' => microtime(TRUE) - $time
));




$user = [];
$auth = new \php_components\Authenticate($user);
$response = new \php_components\Response();


$errorResponse = function ($message) use ($response)
{
    $response->json($message);
};
$successResponse = function ($message) use ($response)
{
    $response->json($message);
};
/**
 * Events must be set before using public methods for them to be called!!
 * 
 * If you only want to listen to one event, and do the same for the rest use *.
 * 
 * However, there must always be a listener!! *, match, success, whatever it might be.
 * completed is always a standard, but there might be others for readability.
 */
/*
$auth->_onEvent('emptyField',   $errorResponse);
$auth->_onEvent('error',        $errorResponse);

$auth->_onEvent('noMatches',    $successResponse);
$auth->_onEvent('match',        $successResponse);
*/
/*
$auth->_onEvent('*',        $errorResponse);
$auth->_onEvent('match',    $successResponse);
*/
$auth->_onEvent('login_completed', $successResponse);

$auth->login(function ($credentials, $callback) {
    /**
     * Database lookup, return the result to the method.
     */

    //...
    $arr = [
        'password' => 'p4ionf3'
    ];

    $callback(null, $arr); //event fired: "completed"
});




echo
'
<pre>
<form method="post">
<input name="email" placeholder="email" value="rft43">
<input name="password" placeholder="password" value="p4ionf3">
<button type="submit">test</button>
</form>
';
