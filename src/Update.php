<?php
namespace Sarani\CryptoBot;

class Update {
  protected $_data;
  public function __construct($data) {
    $this->_data = $data;
  }
  public function id () {
    return (int) @$this->_data->update_id;
  }
  public function type () {
    return (String) @$this->_data->update_type;
  }
  public function date () {
    return (String) @$this->_data->request_date;
  }

  public function getPayload () {
    $da = @$this->_data->payload;
    return new Invoice($da);
  }
}