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
$router->addRoute('create_member', 'ControllerMember', 'create');
$router->addRoute('store_member', 'ControllerMember', 'store');
$router->addRoute('search_member', 'ControllerMember', 'search');
$router->addRoute('edit_member', 'ControllerMember', 'edit');
$router->addRoute('update_member', 'ControllerMember', 'update');
$router->addRoute('delete_member', 'ControllerMember', 'delete');

// New Member pages
$router->addRoute('new_members', 'ControllerMember', 'new_members');
$router->addRoute('delete_new_member', 'ControllerMember', 'delete_new_member');
$router->addRoute('search_new_member', 'ControllerMember', 'search_new_member');
$router->addRoute('payment_new_member', 'ControllerMember', 'payment_new_member');

// Renew Member pages
$router->addRoute('renew_members', 'ControllerMember', 'renew_members');
$router->addRoute('search_renew_member', 'ControllerMember', 'search_renew_member');
$router->addRoute('payment_renew_member', 'ControllerMember', 'payment_renew_member');
$router->addRoute('delete_renew_member', 'ControllerMember', 'delete_renew_member');

// Officers
$router->addRoute('officers', 'ControllerOfficer', 'officers');
$router->addRoute('delete_officer', 'ControllerOfficer', 'delete_officer');
$router->addRoute('create_officer', 'ControllerOfficer', 'create_officer');
$router->addRoute('store_officer', 'ControllerOfficer', 'store_officer');
$router->addRoute('filter_officers', 'ControllerOfficer', 'filter_officers');

// Scoreboard
$router->addRoute('score', 'ControllerMember', 'score');

// Presence
$router->addRoute('presences', 'ControllerPresence', 'presences');
$router->addRoute('create_activity', 'ControllerPresence', 'create_activity');
$router->addRoute('store_activity', 'ControllerPresence', 'store_activity');
$router->addRoute('delete_activity', 'ControllerPresence', 'delete_activity');
$router->addRoute('mark_presence', 'ControllerPresence', 'mark_presence');
$router->addRoute('mark_as_present', 'ControllerPresence', 'mark_as_present');
$router->addRoute('remove_present', 'ControllerPresence', 'remove_present');
$router->addRoute('search_presence', 'ControllerPresence', 'search_presence');

return $router;
