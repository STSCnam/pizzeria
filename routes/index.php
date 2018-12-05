<?php

use Enginr\Router;
use Enginr\System\System;

use Models\Pizzeria\{
    Commands,
    CommandLines,
    Deliverers,
    Clients,
    Pizzas
};

$env = json_decode(file_get_contents(__DIR__ . '/../env.json'));

$router = new Router();

$router->get('/', function($req, $res) use ($env) {
    $commands   = new Commands($env->db);
    $deliverers = new Deliverers($env->db);
    $clients    = new Clients($env->db);
    $pizzas     = new Pizzas($env->db);

    $res->render('home', [
        'nextCommand' => $commands->getLatestCommand()->numCde + 1,
        'deliverers'  => $deliverers->getAll(),
        'clients'     => $clients->getAll(),
        'pizzas'      => $pizzas->getAll()
    ]);
});

$router->post('/post/command', function($req, $res) use ($env) {
    $commands = new Commands($env->db);
    $commandLines = new CommandLines($env->db);
    $success = FALSE;
    $numCde = $commands->getLatestCommand()->numCde + 1;

    foreach ($req->body as $key => $val) {
        if (!in_array($key, ['client', 'deliverer'])) {
            if ($val) {
                System::log($numCde . ' : ' . $key . ' : ' . (int)$val);
                $success = TRUE;
                $commandLines->put($numCde, $key, (int)$val);
            }
        }
    }

    if ($success) {
        System::log($numCde . ' : ' . $req->body->client . ' : ' . $req->body->deliverer);
        $commands->put($numCde, $req->body->client, $req->body->deliverer);
    }

    $res->redirect('/');
});

return $router;