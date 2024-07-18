<?php
require __DIR__ . '/vendor/autoload.php';


use Dotenv\Dotenv;
use Symfony\Component\Yaml\Yaml;



// Charger les variables d'environnement
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

define('ROOT', rtrim($_ENV['ROOT'], '/') . '/'); // Assurez-vous que ROOT se termine par une barre oblique
define('WEBROOT', rtrim($_ENV['WEBROOT'], '/') . '/');


// Charger la configuration YAML
$config = Yaml::parseFile(ROOT . 'config.yaml');

// Remplacer les références aux variables d'environnement
array_walk_recursive($config, function(&$value) {
    if (is_string($value) && strpos($value, '%env(') === 0) {
        $envVar = trim(substr($value, 5, -2));
        $value = $_ENV[$envVar] ?? null;
    }
});

// Configurations spécifiques supplémentaires
$config['app']['debug'] = filter_var($_ENV['APP_DEBUG'] ?? false, FILTER_VALIDATE_BOOLEAN);
$config['app']['env'] = $_ENV['APP_ENV'] ?? 'production';

// Ajouter ROOT et WEBROOT à la configuration
$config['app']['root'] = ROOT;
$config['app']['webroot'] = WEBROOT;

// Configuration des dossiers de l'application
$config['direction'] = [
    'core' => ROOT . 'src/Core',
    'app' => ROOT . 'src/App',
    'views' => ROOT . 'Views',
    'public' => ROOT . 'public',
];

return $config;
