<?php
namespace Sarani\CryptoBot;

class Client {
  protected $_token;
  protected $_client;

  public function __construct($token, $mode = 'test') {
    $this->_token = $token;
    $url = $mode == 'test' ? 'https://testnet-pay.crypt.bot/api/' : 'https://pay.crypt.bot/api/';
    $this->_client = new GuzzleHttp\Client([
      'base_uri' => $url, 
      'verify' => true,
      'headers' => [
        // 'User-Agent' => 'testing/1.0',
        // 'Accept'     => 'application/json',
        'Crypto-Pay-API-Token' => $this->_token
      ]
    ]);

  }
  public function getMe() {
    $res = $this->_client->request('GET', 'getMe');
    // $response->getStatusCode();
    $response = $res->getBody();
    $response =json_decode($response); 
    return $response;
  }
  public function getBalance() {
    $res = $this->_client->request('GET', 'getBalance');
    $response = $res->getBody();
    $response =json_decode($response); 
    return $response;
  }
  public function getExchangeRates() {
    $res = $this->_client->request('GET', 'getExchangeRates');
    $response = $res->getBody();
    $response =json_decode($response); 
    return $response;
  }

  public function getCurrencies() {
    $res = $this->_client->request('GET', 'getCurrencies');
    // $response = $res->getBody();
    // $response =json_decode($response); 
    // return $response;
    return $this->_res($res);
  }

  public function createInvoice() {
    $res = $this->_client->request('GET', 'createInvoice', [
        'json' => [
          // 'invoice_id'  =>  '12098'
          'asset'   => 'TON',
          'amount'  => '2.50',
          'payload' =>  '1115', # subscription id
          'allow_comments'  =>  False,
          'allow_anonymous' =>  False,
          'paid_btn_name' =>  'openBot',
          'paid_btn_url'  =>  'https://t.me/atrafabot',
          'hidden_message'  =>  'We processing your payment',
          'description' =>  'Monthly Subscription'
        ]
    ]);
    $result = $this->_res($res); 
    $inv = new Invoice($result);
    return $inv;
  }

  public function getInvoices() {
    $res = $this->_client->request('GET', 'getInvoices', [
        'json' => [
          'asset'  =>  'TON',
          'invoice_ids'   => '12600,12626,12745',
        ]
    ]);
    $result = $this->_res($res); 
    $list = [];
    foreach($result as $data) {
      foreach($data as $da) {
        $inv = new Invoice($da);
        $list[] = $inv;
      }
    }
    return $list;
  }

  public function transfer() {
    $res = $this->_client->request('GET', 'transfer', [
        'json' => [
          'user_id'  =>  '431424057',
          'asset'   => 'USDT',
          'amount'  => '2.50',
          'spend_id' =>  '1115', # reequest uniqe id
          'disable_send_notification'  =>  False,
          'comment' =>  'Monthly Subscription transfer'
        ]
    ]);
    $result = $this->_res($res); 
    $transfer = new Transfer($result);
    return $transfer;
  }

  private function _res($res) {
    $response = $res->getBody();
    $response =json_decode($response);
    if ($response->ok) {
      return $response->result;
    } else {
      throw new Exception($response->error);
    }
    // return $response;
  }
}