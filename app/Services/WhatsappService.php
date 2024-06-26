<?php

namespace App\Services;

class WhatsappService
{
    private $client;
    private $url;

    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client();
        $this->url = config('whatsapp.WA_POST_ENDPOINT');
    }

    public function sendForgotPasswordLink(string $phoneNumber, string $link)
    {
        $headers = [
            'Api-key' => config('whatsapp.WA_API_KEY'),
            'Content-Type' => 'application/json',
        ];

        $postData = [
            "contact" => [
                [
                    "number" => $phoneNumber,
                    "message" => $link,
                ]
            ],
        ];

        $response = $this->client->post($this->url, [
            'headers' => $headers,
            'body' => json_encode($postData),
            'timeout' => 10,
            'version' => 1.1,
        ]);

        $statusCode = $response->getStatusCode();

        if ($statusCode !== 201) {
            throw new \Exception('Failed to send forgot password link to ' . $phoneNumber);
        }

        return true;
    }
}
