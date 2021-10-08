<?php

namespace App\Exceptions;

use Exception;
use GuzzleHttp\Psr7\Response;
class SendNotificationException extends Exception
{
    private $response;

    /**
     * @param Response $response
     * @param string $message
     * @param int|null $code
     */
    public function __construct(Response $response, string $message, int $code = null)
    {
        $this->response = $response;
        $this->message  = $message;
        $this->code     = $code ?? $response->getStatusCode();

        parent::__construct($message, $code);
    }

    /**
     * @param Response $response
     * @return self
     */
    public static function serviceRespondedWithAnError(Response $response)
    {
        return new self(
            $response, $response->getBody()->getContents()
        );
    }

    /**
     * @return Response
     */
    public function getResponse()
    {
        return $this->response;
    }
}
