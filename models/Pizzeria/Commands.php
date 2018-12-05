<?php

namespace Models\Pizzeria;

use Enginr\System\System;
use PDO\Connector;

class Commands extends Connector {
    public function __construct($auth) {
        parent::__construct($auth);
    }

    public function getLatestCommand(): object {
        $res = $this->query('SELECT * FROM pizzeria.commandes ORDER BY numCde DESC LIMIT 1');
        
        return $res ? $res[0] : NULL;
    }

    public function put(int $numCde, int $numCli, int $numLiv): void {
        // $this->query('INSERT INTO pizzeria.commandes (numCde, numCli, numLiv) VALUES (:numCde, :numCli, :numLiv)', [
        //     ':numCde' => $numCde,
        //     ':numCli' => $numCli,
        //     ':numLiv' => $numLiv
        // ]);

        $this->query('INSERT INTO pizzeria.commandes (numCde, numCli, numLiv) VALUES (' . $numCde . ', ' . $numCli . ', ' . $numLiv . ')');
    }
}