<?php

// Create Router instance
$router = new Router();

// example.com
$router->get('', 'PagesController@home');

// example.com/a-propos
$router->get('explorer', 'PagesController@about');
// example.com/contact
$router->get('connexion', 'PagesController@contact');
// reception des données 
$router->post('connexion', 'PagesController@contact');

// pages avec parametre 
$router->get('plateforme/update/{id}', 'PlateformesController@update');

// page 404
$router->set404('PagesController@page404');

// Run the routes
$router->run();