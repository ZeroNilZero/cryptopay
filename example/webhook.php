<?php
require '../vendor/autoload.php';
require '../src/Webhook.php';
require '../src/Invoice.php';
require '../src/Update.php';

try {
  $hookdata = '{"update_id":4618,"update_type":"invoice_paid","request_date":"2022-04-28T15:38:10.021Z","payload":{"invoice_id":12774,"status":"paid","hash":"IVMQL2h9Attx","asset":"USDT","amount":"2.5","pay_url":"https:\/\/t.me\/CryptoTestnetBot?start=IVMQL2h9Attx","description":"Monthly Subscription","created_at":"2022-04-28T15:37:53.346Z","allow_comments":false,"allow_anonymous":false,"paid_at":"2022-04-28T15:38:09.373Z","paid_anonymously":false,"hidden_message":"We processing your payment","payload":"1115","paid_btn_name":"openBot","paid_btn_url":"https:\/\/t.me\/atrafabot"}}';
  
  $hook = new Webhook($data = $hookdata);
  
  
  $update = $hook->getUpdate();
  echo '<pre>';
  var_dump( $update->getPayload()->status());
  echo '</pre>';
  
  
  } catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
  }