<a href="https://www.tm4b.com"><img src="http://www.tm4b.com/assets/img/logo-white-on-blue.png" width="170px"/></a>
[![Build Status](https://travis-ci.org/tm4b/tm4b-php.svg?branch=master)](https://travis-ci.org/tm4b/tm4b-php)

[Sign up](https://www.tm4b.com/en/register) for a TM4B account and visit our [Developer Api](https://www.tm4b.com/en/sms-api/) for even more content.

# TM4B PHP Client

This is the official PHP library for using the TM4B REST API. This SDK contains methods for easily interacting with the TM4B Messaging API. 
Below are examples to get you started. For additional examples, please see our official 
documentation at https://www.tm4b.com/sms-api/

## Installation

The recommended way to install TM4B PHP is through
[Composer](http://getcomposer.org/).  Require the `tm4b/tm4b-php` package:

    $ composer require tm4b/tm4b-php

## Usage

### Basic usage

You should always use Composer's autoloader in your application to automatically load your dependencies. 
All examples below assumes you've already included this in your file:

```php
require 'vendor/autoload.php';
```

<a name="quick-start"></a>
## Quick Start

Here is a quick example:

`POST /api/rest/v1/sms`

```php
<?php

$msgClient = \Tm4b\Rest\Client::create([
    'apiKey' => 'TM4B_API_KEY'
]);

try {
    $response = $msgClient->messages()->send([
        'destination_address' => '+441234567890',
        'source_address'      => 'master',
        'content'             => 'There is a civil war between the Galactic Empire and a Rebel Alliance.'
    ]);
    print_r($response);
} catch (\Tm4b\Exception\HttpClientException $e) {
    print_r($e->getResponseBody());
}
```

## Examples

### Bulk SMS

Let's send the same SMS to 2 recipients.

```php
$response = $msgClient->messages()->send([
    [
        'destination_address' => '+447711961111',
        'source_address'      => 'GeorgeLucas',
        'content'             => 'There is a civil war between the Galactic Empire and a Rebel Alliance.'
    ],
    [
        'destination_address' => '+97150349030',
        'source_address'      => 'GeorgeLucas',
        'content'             => 'There is a civil war between the Galactic Empire and a Rebel Alliance.'
    ]
]);
```
