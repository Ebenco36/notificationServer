<?php

namespace App\Repositories\ConcreteClasses;
use App\Repositories\Interfaces\WebhookRepositoryInterface;
use App\Models\Webhook;
use App\Http\Requests\SubscribeRequest;
use Illuminate\Http\Request;
class WebhookRepository implements WebhookRepositoryInterface{

    
    public function all(){
        $data = Webhook::all()
            ->map->format();
        return $data;
    }

    public function getSubscribers($topic){
        return Webhook::where('topic', $topic)->get();
    }

    public function findById($id){
        return Webhook::where('id', $id)->first()->format();
    }

    public function findByUrl($url){
        return Webhook::whereUrl($url)->first();
    }



    public function update(Request $request, $id){
        return Webhook::where('id', $id)->update($request->only(['topic', 'url']));
    }

    public function create(SubscribeRequest $request){
        return Webhook::create($request->only(['topic', 'url']))->format();
    }


}