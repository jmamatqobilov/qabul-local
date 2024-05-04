<?php
namespace App\Repositories;
use App\Models\Territory;


class TerritoriesRepository extends Repository {

    public function __construct(Territory $territory) {
        $this->model = $territory;
    }
}
