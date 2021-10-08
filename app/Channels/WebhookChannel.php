<?php

namespace App\Channels;

use GuzzleHttp\Client;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Arr;
use App\Repositories\Interfaces\LogRepositoryInterface;
use App\Exceptions\SendNotificationException;

class WebhookChannel
{
    /** @var Client */
    protected $client;

    /**
     * @param Client $client
     */
    protected $logs;
    public function __construct(Client $client, LogRepositoryInterface $log)
    {
        $this->client   = $client;
        $this->log      = $log;
    }

    /**
     * Send the given notification.
     *
     * @param mixed $notifiable
     * @param \Illuminate\Notifications\Notification $notification
     *
     * @return \GuzzleHttp\Psr7\Response
     *
     * @throws \App\Exceptions\SendNotificationException
     */
    public function send($notifiable, Notification $notification)
    {   
        try{
           
            if (! $url = $notifiable->routeNotificationFor('webhook')) {
                return;
            }

            $webhookData = $notification->toWebhook($notifiable)->toArray();
            $response   = $this->client->post($url, [
                'headers' => ['Content-Type' => 'application/json'],
                'body'      => json_encode(Arr::get($webhookData, 'data'))
            ]);
            if ($response->getStatusCode() >= 300 || $response->getStatusCode() < 200) {
                throw SendNotificationException::serviceRespondedWithAnError($response);
            }
            return $response;
        
        }
        catch(\GuzzleHttp\Exception\ClientException $e){
            $resp = [
                'webhook_id' => $notifiable->id,
                'status_code'=> $e->getResponse()->getStatusCode()
            ];
            $this->log->create($resp);
            // throw SendNotificationException::serviceRespondedWithAnError($e->getResponse());
        }
        catch(Exception $e){
            $resp = [
                'webhook_id' => $notifiable->id,
                'status_code'=> $e->getResponse()->getStatusCode()
            ];
            $this->log->create($resp);
        }
    }
}