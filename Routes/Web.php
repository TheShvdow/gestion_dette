<?php

use Src\Core\Routes\Route;
use Src\Core\Sessions\Session;

Session::start();


// Partie connexion
// Route::get('/', ['controller' => 'SecurityController', 'action' => 'showLoginForm']);
// Route::post('/login', ['controller' => 'SecurityController', 'action' => 'login']);
// Route::post('/logout', ['controller' => 'SecurityController', 'action' => 'logout']);


require_once ROOT .'Views/main/header.html.php';

// Routes pour les clients
Route::get('/suivieEtEnregistrer', ['controller' => 'ClientController', 'action' => 'showSuivieEtEnregistrer']);
Route::post('/enregistrer', ['controller' => 'ClientController', 'action' => 'enregistrer']);
Route::post('/recherche', ['controller' => 'ClientController', 'action' => 'rechercherClient']);
Route::post('/', ['controller' => 'ClientController', 'action' => 'test']);

// Route pour afficher les dettes
Route::post('/afficherDettes', ['controller' => 'ClientController', 'action' => 'afficherDettes']);

// Route pour ajouter une nouvelle dette
Route::post('/nouvelleDette', ['controller' => 'ClientController  ', 'action' => 'ajouterDette']);

Route::get('/nouveauPaiement/{id}', ['controller' => 'ClientController', 'action' => 'nouveauPaiement']);
Route::post('/ajouterPaiement', ['controller' => 'ClientController', 'action' => 'ajouterPaiement']);

// Route pour afficher les paiement
Route::get('/detailPaiement/{id}', ['controller' => 'ClientController', 'action' => 'afficherPaiement']);

require_once ROOT .'Views/main/footer.html.php';

// Dispatcher la requête
Route::routePage($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
// use Symfony\Component\Yaml\Yaml;
// $yaml = Yaml::parseFile('/var/www/gestion_dette/config.yaml');

// var_dump(new $yaml['MysqlDatabase']);
// die();

