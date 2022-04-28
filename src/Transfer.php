<?php
namespace Sarani\CryptoBot;

class Transfer {
  protected $_data;
  public function __construct($data) {
    $this->_data = $data;
  }
  public function id () {
    return (int) @$this->_data->transfer_id;
  }
  public function userId () {
    return (String) @$this->_data->user_id;
  }
  public function asset () {
    return (String) @$this->_data->asset;
  }
  public function amount () {
    return (String) @$this->_data->amount;
  }
  public function status () {
    return (String) @$this->_data->status;
  }
  public function completedAt () {
    return (String) @$this->_data->completed_at;
  }
  public function comment () {
    return (String) @$this->_data->comment;
  }
}