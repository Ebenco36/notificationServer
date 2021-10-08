<?php

namespace App\Repositories\Interfaces;
interface LogRepositoryInterface{

    public function all();

    public function findById($id);

    public function create(array $data);
}