<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

header("Access-Control-Allow-Origin: *");

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => ''], function () use ($router){
    $router->post('', ['uses' => 'UserController@isLoggedIn']);
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('user', ['uses' => 'UserController@showAllUsers']);
    $router->get('user/{id}', ['uses' => 'UserController@showOneUser']);
    $router->get('personen', ['uses' => 'PersonController@showAllPersons']);
    $router->get('tests', ['uses' => 'PersonController@tests']);
    $router->get('trainers', ['uses' => 'PersonController@showTrainer']);
    $router->get('council', ['uses' => 'PersonController@showCouncil']);
    $router->get('personen/{id}', ['uses' => 'PersonController@showOnePerson']);
    $router->get('trainer', ['uses' => 'TrainerController@showAllTrainers']);
    $router->get('trainer/{id}', ['uses' => 'TrainerController@showOneTrainer']);
    $router->get('presence', ['uses' => 'PresenceController@showAllPresence']);
    $router->get('presence/{id}', ['uses' => 'PresenceController@showOnePresence']);
    $router->get('contact', ['uses' => 'ContactController@showAllContacts']);
    $router->get('contact/{id}', ['uses' => 'ContactController@showOneContact']);
    $router->get('documents', ['uses' => 'DocumentController@showAllDocuments']);
    $router->get('document/{id}', ['uses' => 'DocumentController@showOneDocument']);
    $router->get('news', ['uses' => 'DocumentController@showAllNews']);
    $router->get('formulare', ['uses' => 'DocumentController@showAllFormulare']);
    $router->get('archive', ['uses' => 'DocumentController@showArchive']);
    $router->get('training', ['uses' => 'TrainingController@showTraining']);
    $router->get('trainings', ['uses' => 'TrainingController@training']);
});

$router->group(['prefix' => 'api'], function () use ($router){
    $router->post('register', ['uses' => 'UserController@register']);
    $router->post('login', ['uses' => 'UserController@login']);
    $router->post('logout', ['uses' => 'UserController@logout']);
    $router->post('docs', ['uses' => 'ExtraDocumentController@showExtraDocs']);
    $router->post('send', ['uses' => 'MailController@sendMail']);
});
