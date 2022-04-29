# cryptopay

cryptopay is a *php* library for **Cryptocurrency Payment** with support of accepting multiple cryptocurrencies.
with this library you can add and support crypto payment to your *sites*, *Apps* and Telegram *bot*.

## Get Start
To use this library, you need to create free Telegram account with [CryptoBot](http://t.me/CryptoBot?start=r-84540).

## Installation

Use the package manager [composer](http://getcomposer.org) to install `sarani/cryptopay`.

```bash
composer require sarani/cryptopay
```

## Usage and Methods

```php
// use Sarani\CryptoBot;

# init
$cryp_payment_token = 'token';
$mode = 'test'; // empty for real account 
$crypto = new Sarani\CryptoPay\Api($cryp_payment_token, 'test');
```

### getMe 
Use this method to test your app's authentication token. Requires no parameters. On success, returns basic information about an app.

```php
$me = $crypto->getMe();
```
### createInvoice
Use this method to create a new invoice. On success, returns an object of the created invoice.

* **asset** (String) Currency code. Supported assets: “BTC”, “TON”, “ETH” (testnet only), “USDT”, “USDC” and “BUSD”.

* **amount** (String)Amount of the invoice in float. For example: 125.50

* **description** (String) Optional. Description for the invoice. User will see this description when they pay the invoice. Up to 1024 characters.

* **hidden_message** (String) Optional. Text of the message that will be shown to a user after the invoice is paid. Up to 2o48 characters.

* **paid_btn_name** (String) Optional. Name of the button that will be shown to a user after the invoice is paid. Supported names: *viewItem* – “View Item”, *openChannel* – “Open Channel”, *openBot* – “Open Bot”, *callback* – “Return”

* **paid_btn_url** (String) Optional. Required if paid_btn_name is used. URL to be opened when the button is pressed. You can set any success link (for example, a link to your bot). Starts with https or http.

* **payload** (String) Optional. Any data you want to attach to the invoice (for example, user ID, payment ID, ect). Up to 4kb.

* **allow_comments** (Boolean) Optional. Allow a user to add a comment to the payment. Default is true.

* **allow_anonymous** (Boolean) Optional. Allow a user to pay the invoice anonymously. Default is true.

* **expires_in** (Number) Optional. You can set a payment time limit for the invoice in seconds. Values between 1-2678400 are accepted.

```php
# create invoice, return Invoices object 
  $inv = $crypto->createInvoice($params = [
    'asset'   => 'USDT',
    'amount'  => '2.50',
    'payload' =>  '11158', # subscription id
    'allow_comments' => False,
    'allow_anonymous' => True,
    'paid_btn_name' => 'openBot',
    'paid_btn_url' => 'https://t.me/demobot',
    'hidden_message' => 'Thanks for your payment',
    'description' => 'Monthly Subscription'
  ]);
  echo $inv->id();
  echo $inv->url();
```
### getInvoices

* asset (String) Optional. Currency codes separated by comma. Supported assets: “BTC”, “TON”, “ETH” (testnet only), “USDT”, “USDC” and “BUSD”. Defaults to all assets.
* **invoice_ids** (String) Optional. Invoice IDs separated by comma.
* **status** (String) Optional. Status of invoices to be returned. Available statuses: “active” and “paid”. Defaults to all statuses.
* **offset** (Number) Optional. Offset needed to return a specific subset of invoices. Default is 0.
* **count** (Number) Optional. Number of invoices to be returned. Values between 1-1000 are accepted. Defaults to 100.
```php
# get invoice, return array of Invoices object 
$res = $crypto->getInvoices($params = [
  'asset'  =>  'TON', // Crypto symbols
  'invoice_ids'   => '12600,12626,12745', // ids seperated by comma
]);
```

### transfer
Use this method to send coins from your app's balance to a user. On success, returns object of completed transfer.

* **user_id** (Number) Telegram user ID. User must have previously used [CryptoBot](http://t.me/CryptoBot?start=r-84540)(@CryptoTestnetBot for testnet). 
* **asset** (String) Currency code. Supported assets: “BTC”, “TON”, “ETH” (testnet only), “USDT”, “USDC” and “BUSD”.
* **amount** (String) Amount of the transfer in float. The minimum and maximum amounts for each of the support asset roughly correspond to the limit of 0.01-25000 USD. Use getExchangeRates to convert amounts. For example: 125.50
* **spend_id** (String) Unique ID to make your request idempotent and ensure that only one of the transfers with the same spend_id will be accepted by  Crypto Pay API. This parameter is useful when the transfer should be retried (i.e. request timeout, connection reset, 500 HTTP status, etc). It can be some unique withdrawal identifier for example. Up to 64 symbols.
* **comment** (String) Optional. Comment for the transfer. Users will see this comment when they receive a notification about the transfer. Up to 1024 symbols.
* **disable_send_notification** (Boolean) Optional. Pass true if the user should not receive a notification about the transfer. Default is false. 
```php
# transfer to user, return Transfer object 
$transfer = $crypto->transfer($params = [
  'user_id'  =>  '1111111', // telegram user_id
  'asset'   => 'USDT', // Crypto
  'amount'  => '2.50', // amount
  'spend_id' =>  '1001', # reequest uniqe id to avoid double transfer
  'disable_send_notification'  =>  False,
  'comment' =>  'gift transfer'
]);
```

## getBalance
Use this method to get a balance of your app. Returns array of assets.

### getExchangeRates
Use this method to get exchange rates of supported currencies. Returns array of currencies.

### getCurrencies
Use this method to get a list of supported currencies. Returns array of currencies.

### Webhooks getUpdate
Use Webhooks to get updates for your app. Webhook request may be sent at least one time.

To make sure that the Webhook request was sent by Crypto Pay API, use a secret path in the URL, e.g. https://www.example.com/<token>. Since nobody else knows your app's token, you can be pretty sure it's [CryptoBot](http://t.me/CryptoBot?start=r-84540).

**How to enable Webhooks?**
Open [CryptoBot](http://t.me/CryptoBot?start=r-84540) (@CryptoTestnetBot for testnet), go to Crypto Pay → My Apps, choose an app, open ‘Webhooks’ and tap ‘Enable Webhooks’. Then send HTTPS url used to receive updates.

```php
# webhook, return Webhook object with Update and Invoice 
$hook = new Sarani\CryptoPay\Webhook();
$update = $hook->getUpdate(); // Update object
$nvoice =   $update->getPayload(); // Invoice Object
echo( $nvoice->status()); 

```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

##  Disclaimer
This project and its author is not associated with CryptoBot. 

## Financial Support
This Library is free for uses, But if you like it, any Supports are Wellcome.
>You can support with [this invoice](http://t.me/CryptoBot?start=IVcdWKiAiL1L) or Join [CryptoBot](http://t.me/CryptoBot?start=r-84540) with [affiliated](http://t.me/CryptoBot?start=r-84540) link .

>Or send directly:
> * TON: `UQC09HtKpaK0prsE1X-V7cnk5JE_NrSy4bgTxVeCU8kfO1A6`
> * BTC: `17sL8eapiCs1eeq2nRVAZozsn6ws9HCToP`
> * BTC, TON, USDT, USDC, BUSD, BNB: Transfer with [CryptoBot](http://t.me/CryptoBot?start=IVcdWKiAiL1L)

## License
This project is released under the [BSD 3-Clause](https://github.com/ZeroNilZero/crypto-pay/blob/master/LICENSE.txt) License.
