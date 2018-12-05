<?php

namespace Models\Pizzeria;

use Enginr\System\System;
use PDO\Connector;

class Pizzas extends Connector {
    public function __construct($auth) {
        parent::__construct($auth);
    }

    public function getAll(): array {
        $res = $this->query('SELECT * FROM pizzeria.pizzas');
        
        return count($res) ? $res : NULL;
    }

    public function getPrice(string $numPiz): int {
        $res = $this->query('SELECT prix FROM pizzeria.pizzas WHERE numPiz = :numPiz', [
            ':numPiz' => '"' . $numPiz . '"'
        ]);

        return count($res) ? $res[0] : NULL;
    }
}