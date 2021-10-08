<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Webhook extends Model
{
    use HasFactory, Notifiable;


    protected $fillable = [
        'topic', 
        'url'
    ];

    public function routeNotificationForWebhook()
    {
        return $this->url;
    }

    public function format(){
        return [
            'topic' => $this->topic,
            'url'   => $this->url
        ];
    }
}
