Ecwid PHP Client [![Build Status](https://travis-ci.org/dSpaceLabs/ecwid-client.svg?branch=master)](https://travis-ci.org/dSpaceLabs/ecwid-client)
================

[Ecwid](https://www.ecwid.com/) PHP Client used for interacting with Ecwid's
API.

## Requirements

* PHP cURL Extension
* PHP >= 5.6
* [dspacelabs/http-client](https://github.com/dSpaceLabs/http-client)
* [dspacelabs/http-message](https://github.com/dSpaceLabs/http-message)
  * Or any other PSR-7 compliant library

## Installation

```bash
composer require "dspacelabs/ecwid-client:~0.1@dev"
```

## Usage

```php
<?php

use Dspacelabs\Component\Ecwid\Client;

$client = new Client($clientId, $clientSecret);
```

## Examples
### Getting Access Token

Reference: https://developers.ecwid.com/api-documentation/external-applications

```php
use Dspacelabs\Component\Http\Message\Uri;

$redirectUri = new Uri('https://www.example.com/myapp');

// @var array $response
$response = $client->getAccessToken('temp_code', $redirectUri);
$accessToken = $response['access_token'];
```

## Change Log

See [CHANGELOG.md](https://github.com/dSpaceLabs/Ecwid/blob/master/CHANGELOG.md)

## License

See [LICENSE](https://raw.githubusercontent.com/dSpaceLabs/Ecwid/master/LICENSE)
