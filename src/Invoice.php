<?php
namespace Sarani\CryptoBot;

class Invoice {
  protected $_data;
  public function __construct($data) {
    $this->_data = $data;
  }
  public function id () {
    return (int) @$this->_data->invoice_id;
  }

  public function status () {
    return (String) @$this->_data->status;
  }

  public function hash () {
    return (String) @$this->_data->hash;
  }
  public function asset () {
    return (String) @$this->_data->asset;
  }
  public function amount () {
    return (String) @$this->_data->amount;
  }
  public function payload () {
    return (String) @$this->_data->payload;
  }
  public function url () {
    return (String) @$this->_data->pay_url;
  }
  public function description () {
    return (String) @$this->_data->description;
  }


  public function createdAt () {
    return (String) @$this->_data->created_at;
  }
  public function expireAt () {
    return (String) @$this->_data->expiration_date;
  }
  public function paidAt () {
    return (String) @$this->_data->paid_at;
  }

  public function allowComments () {
    return (bool) @$this->_data->allow_comments;
  }
  public function comment () {
    return (String) @$this->_data->comment;// ? $this->_data->comment : null;;
  }

  public function allowAnonymous () {
    return (bool) @$this->_data->allow_anonymous;
  }
  public function paidAnonymously () {
    return (bool) @$this->_data->paid_anonymously;
  }
  public function hiddenMessage () {
    return (bool) @$this->_data->hidden_message;
  }

  public function btnName () {
    return (bool) @$this->_data->paid_btn_name;
  }
  public function btnUrl () {
    return (bool) @$this->_data->paid_btn_url;
  }
}