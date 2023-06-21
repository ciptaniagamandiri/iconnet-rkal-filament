<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Watzap
{
    public function __construct()
    {
        $this->url = env('WAT_URL');
        $this->token = env('WAT_TOKEN');
        $this->key = env('WAT_NUMBER_KEY');
    }

    public function status()
    {
        $response = $response = Http::withHeaders([
            'Content-Type' => 'application/json'
        ])->post(sprintf('%s/checking_key', $this->url), [
            "api_key" => $this->token
        ]);

        return $response;
    }

    public function sendMessage($phone, $message)
    {
        $response = $response = Http::withHeaders([
            'Content-Type' => 'application/json'
        ])->post(sprintf('%s/send_message', $this->url), [
            "api_key" => $this->token,
            'number_key' => $this->key,
            'phone_no' =>$phone,
            'message' => $message
        ]);

        return $response;
    }
}
