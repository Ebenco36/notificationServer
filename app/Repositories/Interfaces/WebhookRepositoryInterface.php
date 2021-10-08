<?php

namespace App\Repositories\Interfaces;
use App\Http\Requests\SubscribeRequest;
interface WebhookRepositoryInterface{

    public function all();
    public function getSubscribers($topic);
    public function findById($id);
    public function findByUrl($url);
    public function create(SubscribeRequest $request);
    public function update(SubscribeRequest $request, $id);
}