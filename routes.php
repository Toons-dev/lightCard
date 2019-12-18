<?php

// Create Router instance
$router = new Router();

                                            // PAGES-CONTROLLER
// Home, slogan de présentation
$router->get('', 'PagesController@home');
// Explorer, présentation de plusieurs cards de manière random
$router->get('explorer', 'PagesController@explorer');


                                            // SEARCH-CONTROLLER
// Home, slogan de présentation
$router->get('search', 'searchController@search');

                                            // USER-CONTROLLER-CREATION
// Création d'un utilisateur en get
$router->get('connexion', 'userController@connexion');
// Réception des données en post
$router->post('connexion', 'userController@connexion');

                                            // USER-CONTROLLER-CONNEXION
// Connexion de l'utilisateur en get
$router->get('login', 'userController@login');
// Réception des données en post
$router->post('login', 'userController@login');
// Page home d'un utilisateur connecté
$router->get('userhome', 'userController@home');
// Réception des données du créateur de fiches en post
$router->post('userhome', 'userController@home');
// Déconnexion dé l'utilisateur 
$router->get('logout', 'userController@logOut');


                                            // CATEGORIE-CONTROLLER
// Affichage de toutes les catégories
$router->get('categories', 'categorieController@all');
// Affichage d'un seule catégorie par id
$router->get('categorie/{id}', 'categorieController@one');


// FICHE-CONTROLLER
// Affichage des fiches d'un utilisateur
$router->get('fiche/usr/{id}', 'ficheController@usrFiche');
$router->get('fiche/delete/{id}', 'ficheController@deleteFiche');
$router->get('fiche/dislike/{id}', 'ficheController@dislikeFiche');

// Affichage d'une seule fiche
$router->get('fiche/{id}', 'ficheController@one');

                                             // LIKE-CONTROLLER
// page 404
$router->get('like/{id}', 'JaimeController@Jaime');

                                            // OTHER-CONTROLLER
// page 404
$router->set404('PagesController@page404');
// Run the routes
$router->run();

