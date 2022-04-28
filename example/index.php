<?php


$crypto = new CryptoPay($cryp_payment_token, 'test');

// $res = $crypto->getMe();

// $response = $res->getBody();
// $me =json_decode($response); 

// echo $me->ok;
// echo '<br><br><br>';

// echo '<pre>';
// var_dump($me);
// echo '</pre>';

try {

  $inv = $crypto->createInvoice($params = [
    // 'invoice_id'  =>  '12098'
    'asset'   => 'USDT',
    'amount'  => '2.50',
    'payload' =>  '11158', # subscription id
    'allow_comments'  =>  False,
    'allow_anonymous' =>  False,
    'paid_btn_name' =>  'openBot',
    'paid_btn_url'  =>  'https://t.me/demobot',
    'hidden_message'  =>  'We processing your payment',
    'description' =>  'Monthly Subscription'
  ]);
  echo '<pre>';
  echo $inv->id();
  echo '<br>';
  echo $inv->url();
  echo '</pre>';
} catch (Exception $e) {
  echo 'Caught exception: ',  $e->getMessage(), "\n";
}

die('');

$res = $crypto->transfer($params = [
  'user_id'  =>  '431424057',
  'asset'   => 'USDT',
  'amount'  => '2.50',
  'spend_id' =>  '1115', # reequest uniqe id
  'disable_send_notification'  =>  False,
  'comment' =>  'Monthly Subscription transfer'
]);

// echo $res->id().'<br>';
// echo $res->status().'<br>';

die('');

$res = $crypto->getInvoices($params = [
  'asset'  =>  'TON',
  'invoice_ids'   => '12600,12626,12745',
]);
// echo '<pre>';

// foreach($res as $inv) {
//   echo $inv->id().'<br>';
//   echo $inv->userId().'<br>';
//   echo $inv->comment().'<br>';
//   echo $inv->status().'<br>';
//   echo '<br>';

// }

// var_dump($res->result);
// foreach($res->result as $data) {
//   // var_dump($data);
//   foreach($data as $da) {

//     $inv = new Invoice($da);
//     // var_dump($invoice[0]->invoice_id);//['invoice_id']
//     echo $inv->id();
//     echo $inv->status();
//   }
// }
echo '</pre>';
