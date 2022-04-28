<?php
namespace Sarani\CryptoBot;

use Sarani\CryptoBot\Update;

Class Webhook {
  protected $_update;
  public function __construct($data = '') {
    $input = file_get_contents("php://input");
    $data = $data != '' ? $data : $input;
    $this->_update = json_decode($data);
  }
  public function getUpdate() {
    return new Update($this->_update);
  }
}