<?php

namespace App\Service;

class Webpushr
{
     private $apiKey;
     private $token;

     protected $url;

     public function __construct($apiKey, $token)
     {
         $this->apiKey = $apiKey;
         $this->token = $token;
         $this->url = config('app.url');
     }

     public function send($title, $message)
     {
         $end_point = 'https://api.webpushr.com/v1/notification/send/all';
         $http_header = [
             "Content-Type: Application/Json",
             "webpushrKey: {$this->apiKey}",
             "webpushrAuthToken: {$this->token}",
         ];
         $req_data = [
             'title' 		=> $title, //required
             'message' 		=> $message, //required
             'target_url'	=> $this->url, //required
             'auto_hide'	=> 1,
             'expire_push'	=> '5m',
         ];
         $ch = curl_init();
         curl_setopt($ch, CURLOPT_HTTPHEADER, $http_header);
         curl_setopt($ch, CURLOPT_URL, $end_point );
         curl_setopt($ch, CURLOPT_POST, 1);
         curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($req_data) );
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         $response = curl_exec($ch);
         echo $response;
     }
}
