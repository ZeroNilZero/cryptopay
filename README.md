# crypto-pay

crypto-pay is a *php* library for **Cryptocurrency Payment** with support of accepting multiple cryptocurrencies.
with this library you can add and support crypto payment to your *sites*, *Apps* and Telegram *bot*.

## Get Start
To use this library, you need to create free Telegram account with [CryptoBot](http://t.me/CryptoBot?start=r-84540) (affiliated link).

## Installation

Use the package manager [composer](http://getcomposer.org) to install crypto-pay.

```bash
composer require sarani/crypto-pay
```

## Usage

```php
// use Sarani\CryptoBot;

# init
$cryptopay = new Sarani\CryptoBot\Client($cryp_payment_token, 'test');

# create invoice
$inv = $crypto->createInvoice();

# get invoice
$inv = $crypto->.getInvoices('ids,ids')

# transfer to user
$res = $crypto->transfer();

```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

##  Disclaimer
This project and its author is not associated with CryptoBot. 
This Library is free for uses, But if you like it, any Supports are Wellcome.
>You can support with [this invoice](http://t.me/CryptoBot?start=IVcdWKiAiL1L) or Join [CryptoBot](http://t.me/CryptoBot?start=r-84540) with [affiliated](http://t.me/CryptoBot?start=r-84540) link .

>Or send directly:
> * TON: `UQC09HtKpaK0prsE1X-V7cnk5JE_NrSy4bgTxVeCU8kfO1A6`
> * BTC: `17sL8eapiCs1eeq2nRVAZozsn6ws9HCToP`
> * BTC, TON, USDT, USDC, BUSD, BNB: Transfer with [CryptoBot](http://t.me/CryptoBot?start=IVcdWKiAiL1L)

## License
[MIT](https://choosealicense.com/licenses/mit/)