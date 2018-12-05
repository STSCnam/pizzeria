<?php

namespace Models\Pizzeria;

use Enginr\System\System;
use PDO\Connector;

class Clients extends Connector {
    public function __construct($auth) {
        parent::__construct($auth);
    }

    public function getAll(): array {
        $res = $this->query('SELECT * FROM pizzeria.clients');
        
        return count($res) ? $res : NULL;
    }
}