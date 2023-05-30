<?php
namespace App\Services;
use Illuminate\Support\Facades\Http;

class whatsapp
{
    public $url = "";

    public function group($id, $message)
    {
        try {
            $response = Http::post(sprintf('%s/send-group-message', $this->url), [
                'id' => $id,
                'message' => $message
            ]);
            return $response;
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function sendMessage($number, $message)
    {
        try {
            $response = Http::post(sprintf('%s/send-message', $this->url), [
                'number' => $number,
                'message' => $message
            ]);
            return $response;
        } catch (\Throwable $th) {
            return $th;
        }
    }
}