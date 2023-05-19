<?php

namespace App\Services;

use App\Models\Menu;
use GuzzleHttp\Client;

class LineNotifyService
{
    /** @var array */
    const TOKEN = [
        'test' => 'YpNVt5x7PQ8asd88zHoPhpj8RMf1RfdDtE1gOpE5rMW',
        'prd' => '99z3GKWjqHlQTWACa77vCpZTR2ctvMgsF28nP4HuSl6',
    ];

    /** @var string */
    const URI = 'https://notify-api.line.me/api/notify';

    /**
     * @param string $text
     * @param string $tokenType
     * @return bool
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function handle(string $text = "", string $tokenType = 'prd'): bool
    {
        if (! $text) return false;

        $uri = self::URI;
        $client = new Client();
        $client->post($uri, [
            'headers' => [
                'Content-Type'  => 'application/x-www-form-urlencoded',
                'Authorization' => 'Bearer '. optional(self::TOKEN)[$tokenType],
            ],
            'form_params' => [
                'message' => $text
            ]
        ]);
        return true;
    }
}
