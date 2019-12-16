<?php

// Create Router instance
$router = new Router();

// Home 
$router->get('', 'PagesController@home');
// Explorer
$router->get('explorer', 'PagesController@explorer');


// Connexion de l'utilisateur en get
$router->get('connexion', 'userController@connexion');
// Réception des données en post
$router->post('connexion', 'userController@connexion');
// Connexion de l'utilisateur en get
$router->get('login', 'userController@login');
// Connexion de l'utilisateur en get
$router->post('login', 'userController@login');
$router->get('userhome', 'userController@home');
$router->get('logout', 'userController@logOut');


// déconnexion utilisateur 
$router->get('logout', 'PagesController@logout');

// pages Categorie
$router->get('categories', 'categorieController@all');
$router->get('categorie/{id}', 'categorieController@one');
$router->get('categorie/update/{id}', 'categorieController@update');
$router->post('categorie/update/{id}', 'categorieController@update');

// ajout d'une nouvelle categorie
$router->get('categorie/add', 'categorieController@add');
$router->post('categorie/add', 'categorieController@add');

// pages fiche
$router->get('fiche/{id}', 'ficheController@one');
$router->get('fiche/update/{id}','<ficheController@update');
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