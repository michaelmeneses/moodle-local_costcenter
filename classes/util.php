<?php

namespace local_costcenter;

class util
{
    public static function request($url, $data)
    {
        curl_setopt_array($ch = curl_init(), [
            CURLOPT_URL => $url,
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            ],
            CURLOPT_RETURNTRANSFER => true
        ]);

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }
}
