<?php

/**
 * Class MasropiTeleBot
 */
class MasropiTeleBot {
    const API_URL = "https://api.telegram.org/bot";
    public $token;
    public $chatId;

    /**
     * MasropiTeleBot constructor.
     * @param $token
     */
    function __construct($token){
        $this->token = $token;
    }

    /**
     * @param $url
     * @return mixed
     */
    public function setWebhook($url) {
        return $this->request('setWebhook', ['url' => $url]);
    }

    /**
     * @param $message
     * @param array $keyboard
     * @return mixed
     */
    public function sendMessage($message, $keyboard = array()) {
        return $this->request("sendMessage",
            [
                'chat_id' => $this->chatId,
                'text' => $message,
                'reply_markup' => [
                    'keyboard' =>
                        $keyboard,
                    'one_time_keyboard' => true,
                    'resize_keyboard' => true
                ]
            ]);
    }

    /**
     * @param $url
     * @param string $message
     * @param array $keyboard
     * @return mixed
     */
    public function sendPhoto($url, $message = "", $keyboard = array()) {
        return $this->request('sendPhoto', [
            'chat_id' => $this->chatId,
            'photo' => $url,
            'caption' => $message,
            'reply_markup' => [
                'keyboard' =>
                    $keyboard,
                'one_time_keyboard' => true,
                'resize_keyboard' => true
            ]
        ]);
    }

    /**
     * @return mixed
     */
    public function getData() {
        $data = json_decode(file_get_contents('php://input'));
        $this->chatId = $data->message->chat->id;
        return $data->message;
    }

    /**
     * @param $method
     * @param $posts
     * @return mixed
     */
    public function request($method, $posts) {
        // Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
        $ch = curl_init();
        $url = self::API_URL . $this->token . '/' . $method;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($posts));

        $headers = array();
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        return $result;
    }
}
