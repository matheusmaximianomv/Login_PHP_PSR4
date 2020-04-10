<?php

namespace App\Config;

use App\Models\BD\ConfigConnectionDB;

function getConnection(): \PDO {
    $connectionBD = ConfigConnectionDB::getInstance(
        "localhost",
        "bd_pdsiii",
        "root",
        ""
    );

    return $connectionBD->getConnection();
}