<?php

// Create Router instance
$router = new Router();

// Home 
$router->get('', 'PagesController@home');

// Explorer
$router->get('explorer', 'PagesController@explorer');

// Connexion de l'utilisateur en get
$router->get('connexion', 'PagesController@connexion');
// Réception des données en post
$router->post('connexion', 'PagesController@connexion');

// pages avec parametre 
$router->get('plateforme/update/{id}', 'PlateformesController@update');

// page 404
$router->set404('PagesController@page404');

// Run the routes
$router->run();