<?php

namespace App\Models\BD;

use function App\Config\getConnection;

abstract class Dao {
    protected $pdo;

    public function __construct() {
        $this->pdo = getConnection();
    }

    public abstract function findAll($emailUser);
    public abstract function findById($id);
    public abstract function create($user);
    public abstract function update($id, $data);
    public abstract function destroy($id);
}