<?php
namespace Sarani\CryptoPay;

use Sarani\CryptoPay\Update;
use Sarani\CryptoPay\Invoice;
use Sarani\CryptoPay\Transfer;
use GuzzleHttp\Client;

class Api {
  protected $_token;
  protected $_client;

  public function __construct($token, $mode = 'test') {
    $this->_token = $token;
    $url = $mode == 'test' ? 'https://testnet-pay.crypt.bot/api/' : 'https://pay.crypt.bot/api/';
    $this->_client = new Client([
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
    return $this->_res($res);
  }
  public function getBalance() {
    $res = $this->_client->request('GET', 'getBalance');
    return $this->_res($res);
  }
  public function getExchangeRates() {
    $res = $this->_client->request('GET', 'getExchangeRates');
    return $this->_res($res);
  }

  public function getCurrencies() {
    $res = $this->_client->request('GET', 'getCurrencies');
    return $this->_res($res);
  }

  public function createInvoice(array $params = []) {
    $res = $this->_client->request('GET', 'createInvoice', [
        'json' => $params
    ]);
    $result = $this->_res($res); 
    $inv = new Invoice($result);
    return $inv;
  }

  public function getInvoices(array $params = []) {
    $res = $this->_client->request('GET', 'getInvoices', [
        'json' => $params
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

  public function transfer(array $params = []) {
    $res = $this->_client->request('GET', 'transfer', [
        'json' => $params
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
  }
}