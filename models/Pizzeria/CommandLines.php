<?php

namespace Models\Pizzeria;

use Enginr\System\System;
use PDO\Connector;

class CommandLines extends Connector {
    public function __construct($auth) {
        parent::__construct($auth);
    }

    public function put(int $refCde, string $refPizza, int $qte): void {
        // $this->query('INSERT INTO pizzeria.lignescommandes (refCde, refPizza, qte) VALUES (:refCde, :refPizza, :qte)', [
        //     ':refCde' => $refCde,
        //     ':refPizza' => '"' . $refPizza . '"',
        //     ':qte' => $qte
        // ]);

        $this->query('INSERT INTO pizzeria.lignescommandes (refCde, refPizza, qte) VALUES (' . $refCde . ', "' . $refPizza . '", ' . $qte . ')');
    }
}