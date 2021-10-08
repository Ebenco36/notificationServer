<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SubscribeRequest;
use App\Http\Requests\PublishRequest;
use App\Models\Webhook;
use Illuminate\Support\Facades\Notification;
use App\Notifications\PublishNotification;
use App\Repositories\Interfaces\WebhookRepositoryInterface;
class NotificationController extends Controller
{
    protected $webhook;
    public function __construct(WebhookRepositoryInterface $webhook){
        $this->webhook = $webhook;
    }

    public function setEndPoint(SubscribeRequest $request, $topic)
    {
        if($request->isJson()){
            $request->json()->add(['topic'=> $topic]);
        }else{
            $request->request->add(['topic'=> $topic]);
        }
        $check = $this->webhook->findByUrl($request->url);
        if(!$check){
            $response = $this->webhook->create($request);
        }else{
            $response = $check->format();
        }
        

        return response()->json($response);
    }

    /**
     * Send Message
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function PublishToWebhook(PublishRequest $request, $topic)
    {
        // Notify all user with the same topic
        if($request->isJson()){
            $request->json()->add(['topic'=> $topic]);
        }else{
            $request->request->add(['topic'=> $topic]);
        }
        $subscribers = $this->webhook->getSubscribers($topic);
        Notification::send($subscribers, (new PublishNotification($request->data))
            ->onConnection('database')
            ->onQueue('high')
            ->delay(1)
        );

        return 'done';

    }
}
