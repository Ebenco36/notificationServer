<?php

namespace App\Repositories\ConcreteClasses;
use App\Repositories\Interfaces\LogRepositoryInterface;
use App\Models\ResponseLog;
class LogRepository implements LogRepositoryInterface{

    
    public function all(){
        $data = ResponseLog::all()
            ->map->format();
        return $data;
    }

    public function findById($id){
        return ResponseLog::where('id', $id)->first();
    }

    public function create(array $data){
        return ResponseLog::create($data);
    }


}