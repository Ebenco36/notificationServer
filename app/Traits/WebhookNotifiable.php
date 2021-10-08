<?php

namespace App\Traits;

trait WebhookNotifiable
{
    /**
     * @return string
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * @return string
     */
    public function getWebhookUrl()
    {
        return $this->webhook_url;
    }
}