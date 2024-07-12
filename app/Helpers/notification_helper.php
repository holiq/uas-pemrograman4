<?php

function sendTelegramNotification(string $text): void
{
    $token = getenv(name: 'TELEGRAM_BOT_TOKEN');

    $message = [
        'chat_id' => getenv(name: 'TELEGRAM_CHAT_ID'),
        'text'    => $text,
    ];

    if ($token) {
        $url = "https://api.telegram.org/bot{$token}/sendMessage";

        $ch = curl_init(url: $url);

        curl_setopt(handle: $ch, option: CURLOPT_POST, value: true);
        curl_setopt(handle: $ch, option: CURLOPT_POSTFIELDS, value: http_build_query($message));
        curl_setopt(handle: $ch, option: CURLOPT_RETURNTRANSFER, value: true);

        curl_exec(handle: $ch);
        curl_close(handle: $ch);
    }
}