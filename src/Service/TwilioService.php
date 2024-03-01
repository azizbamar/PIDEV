<?php

namespace App\Service;

use Twilio\Rest\Client;
use Twilio\Exceptions\ConfigurationException;
use Twilio\Exceptions\TwilioException;

class TwilioService
{
    private $client;

    public function __construct()
    {
        try {
            $sid = $_ENV['TWILIO_ACCOUNT_SID'];
            $token = $_ENV['TWILIO_AUTH_TOKEN'];
            $this->client = new Client($sid, $token);
        } catch (ConfigurationException $e) {
            // Handle configuration exceptions, for example:
            error_log('Twilio Configuration Error: ' . $e->getMessage());
            // Depending on your application's needs, you might want to throw the exception, return, or handle it differently
        }
    }

    public function sendSms($to, $body): ?string
    {
        try {
            $from = $_ENV['TWILIO_PHONE_NUMBER'];
            $message = $this->client->messages->create($to, [
                'from' => $from,
                'body' => $body
            ]);
    
            return $message->sid;
        } catch (TwilioException $e) {
            error_log('Twilio Error: ' . $e->getMessage());
            return null;
        }
    }
}