<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Task.php";

    $app = new Silex\Application();

    $server = 'mysql:host=localhost;dbname=records';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'
));

    $app->get('/', function() use($app) {
        return $app ['twig']->render('tasks.twig', array('tasks' =>Task::getAll()));
    });


?>
