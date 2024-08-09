<?php
require_once 'Router.php';

$router = new Router();

// Home pages
$router->addRoute('', 'HomeController', 'index');
$router->addRoute('index', 'HomeController', 'index');
$router->addRoute('about', 'HomeController', 'about');
$router->addRoute('subunits', 'HomeController', 'subunits');
$router->addRoute('committees', 'HomeController', 'committees');
$router->addRoute('awards', 'HomeController', 'awards');
$router->addRoute('events', 'HomeController', 'events');
$router->addRoute('contact', 'HomeController', 'contact');
$router->addRoute('game', 'HomeController', 'game');
$router->addRoute('vtools', 'HomeController', 'vtools');
$router->addRoute('newsletter', 'HomeController', 'newsletter');

// Vtools API
$router->addRoute('update', 'vToolsEventsController', 'update');
$router->addRoute('activities', 'vToolsEventsController', 'activities');

// Join pages 
$router->addRoute('join', 'JoinController', 'join');
$router->addRoute('step1', 'JoinController', 'step1');
$router->addRoute('step2', 'JoinController', 'step2');
$router->addRoute('step3', 'JoinController', 'step3');
$router->addRoute('submit_step1', 'JoinController', 'createNewAccount');
$router->addRoute('submit_step2', 'JoinController', 'verifyPayment');
$router->addRoute('submit_step3', 'JoinController', 'updateIeeeEmailNumber');

// Authentication
$router->addRoute('login', 'AuthController', 'login');
$router->addRoute('logout', 'AuthController', 'logout');

// Members pages
$router->addRoute('members', 'MembersController', 'active');
$router->addRoute('create_member', 'MembersController', 'create');
$router->addRoute('store_member', 'MembersController', 'store');
$router->addRoute('search_member', 'MembersController', 'search');
$router->addRoute('edit_member', 'MembersController', 'edit');
$router->addRoute('update_member', 'MembersController', 'update');
$router->addRoute('delete_member', 'MembersController', 'delete');
$router->addRoute('score', 'MembersController', 'score');

$router->addRoute('new_members', 'MembersController', 'new_members');
$router->addRoute('delete_new_member', 'MembersController', 'delete_new_member');
$router->addRoute('search_new_member', 'MembersController', 'search_new_member');
$router->addRoute('payment_new_member', 'MembersController', 'payment_new_member');

$router->addRoute('renew_members', 'MembersController', 'renew_members');
$router->addRoute('search_renew_member', 'MembersController', 'search_renew_member');
$router->addRoute('payment_renew_member', 'MembersController', 'payment_renew_member');
$router->addRoute('delete_renew_member', 'MembersController', 'delete_renew_member');

// Officers
$router->addRoute('officers', 'OfficersController', 'officers');
$router->addRoute('delete_officer', 'OfficersController', 'delete_officer');
$router->addRoute('create_officer', 'OfficersController', 'create_officer');
$router->addRoute('store_officer', 'OfficersController', 'store_officer');
$router->addRoute('filter_officers', 'OfficersController', 'filter_officers');

// Presences
$router->addRoute('presences', 'PresencesController', 'presences');
$router->addRoute('create_activity', 'PresencesController', 'create_activity');
$router->addRoute('store_activity', 'PresencesController', 'store_activity');
$router->addRoute('delete_activity', 'PresencesController', 'delete_activity');
$router->addRoute('mark_presence', 'PresencesController', 'mark_presence');
$router->addRoute('mark_as_present', 'PresencesController', 'mark_as_present');
$router->addRoute('remove_present', 'PresencesController', 'remove_present');
$router->addRoute('search_presence', 'PresencesController', 'search_presence');

return $router;
