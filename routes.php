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