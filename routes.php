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




//Momo
// déconnexion utilisateur 
$router->get('logout', 'PagesController@logout');

// pages Categorie
$router->get('categorie', 'categorieController@all');
$router->get('categorie/update/{id}', 'categorieController@update');
$router->post('categorie/update/{id}', 'categorieController@update');

// ajout d'une nouvelle categorie
$router->get('categorie/add', 'categorieController@add');
$router->post('categorie/add', 'categorieController@add');

// pages fiche
$router->get('fiche', 'ficheController@all');
$router->get('fiche/update/{id}', '<ficheController@update');
$router->post('fiche/update/{id}', 'ficheController@update');

// ajout d'une nouvelle fiche
$router->get('fiche/add', 'ficheController@add');
$router->post('fiche/add', 'ficheController@add');














// pages avec parametre 
$router->get('plateforme/update/{id}', 'PlateformesController@update');

// page 404
$router->set404('PagesController@page404');

// Run the routes
$router->run();