<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponseLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'webhook_id', 
        'status_code'
    ];

    public function format(){
        return [
            'webhook_id'    => $this->webhook_id,
            'status_code'   => $this->status_code,
            'created'       => $this->created_at
        ];
    }
}
