<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class LineNotifyService
{
    /** @var array */
    const TOKEN = [
        'test' => 'YpNVt5x7PQ8asd88zHoPhpj8RMf1RfdDtE1gOpE5rMW',
        'prd' => '0o7YAGqIg5FFILgp7hsZciuiaGEFaGeBfjoF8vjjyd6Py19f1mZbXqvXTKsenh1ocWCnsa9thKubHNbs3CIw6F9hQlovwvwYAr/Y7q4QtX4m6348j/DL8od/LKqBXxLBbKjDmSgXrFvkE1udzmgGaAdB04t89/1O/w1cDnyilFU=',
    ];

    /** @var string */
    private const URI = 'https://api.line.me/v2/bot/message/push';

    /**
     * @param string $text
     * @param string $tokenType
     * @return bool
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function handle(string $text = "", string $tokenType = 'prd'): bool
    {
        if (! $text) return false;

        $client = new Client();
        $payload = [
            'to' => 'C6edc1214f21a43f538fdb72881a323a4', // Bar 注文メニューグループ
            'messages' => [
                [
                    'type' => 'text',
                    'text' => $text,
                ],
            ],
        ];

        try {
            $response = $client->post(self::URI, [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . self::TOKEN[$tokenType],
                ],
                'json' => $payload,
            ]);

            if ($response->getStatusCode() !== 200) {
                // エラーハンドリング
                throw new \RuntimeException('LINE Messaging APIへのリクエストが失敗しました。');
            }
        } catch (RequestException $e) {
            // エラーハンドリング
            throw new \RuntimeException('LINE Messaging APIへのリクエスト中にエラーが発生しました: ' . $e->getMessage());
        }
        return true;
    }
}
