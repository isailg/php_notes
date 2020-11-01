<?php

ini_set('display_errors',1);
ini_set('display_starup_error',1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

password_hash('superSecurePaswd', PASSWORD_DEFAULT);

use Illuminate\Database\Capsule\Manager as Capsule;
use Aura\Router\RouterContainer;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'php2',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);
// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

// $route = $_GET['route'] ?? '/';
//
// if ($route =='/'){
//   require '../index.php';
// } elseif ($route == 'addJob'){
//   require '../addJob.php';
// }

$request = Zend\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);


$routerContainer = new RouterContainer();
$map = $routerContainer->getMap();
$map->get('index', '/php_2/', [
  'controller' => 'App\Controllers\IndexController',
  'action' => 'indexAction'
]);
$map->get('addJobs', '/php_2/jobs/add',[
  'controller' => 'App\Controllers\JobsController',
  'action' => 'getAddJobAction'
]);
$map->post('saveJobs', '/php_2/jobs/add',[
  'controller' => 'App\Controllers\JobsController',
  'action' => 'getAddJobAction'
]);
//Sign up
$map->get('addUser', '/php_2/signup',[
  'controller' => 'App\Controllers\UsersController',
  'action' => 'getAddUserAction'
]);
$map->post('saveUser', '/php_2/signup',[
  'controller' => 'App\Controllers\UsersController',
  'action' => 'getAddUserAction'
]);
//Login
$map->get('loginForm', '/php_2/login',[
  'controller' => 'App\Controllers\AuthController',
  'action' => 'getLogin'
]);
$map->post('auth', '/php_2/auth',[
  'controller' => 'App\Controllers\AuthController',
  'action' => 'postLogin'
]);

$map->get('admin', '/php_2/admin',[
  'controller' => 'App\Controllers\AdminController',
  'action' => 'getAdmin'
]);

$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);

function printElement( $job){
  // if ($job->visible == false){
  //   return;
  // }
  echo '<li class="work-position">';
  echo '<h5>' . $job->title . '</h5>';
  echo '<p>' . $job->description . ' </p>';
  echo '<p>' . $job->getDurationAsString() . ' </p>';
  echo '<strong>Achievements:</strong>';
  echo '<ul>';
  echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
  echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
  echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
  echo '</ul>';
  echo '</li>';
}


if (!$route) {
    echo 'No route';
}else{

  $handlerData = $route->handler;
  $controllerName = $handlerData['controller'];
  $actionName = $handlerData['action'];

  $controller = new $controllerName;
  $response = $controller->$actionName($request);

  foreach ($response->getHeaders() as $name => $value) {
    foreach ($value as $value) {
      header(sprintf('%s: %s', $name, $value), false);
    }
  }
  http_response_code($response->getStatusCode());
  echo $response -> getBody();
}
