Ecwid PHP Client [![Build Status](https://travis-ci.org/dSpaceLabs/Ecwid.svg?branch=master)](https://travis-ci.org/dSpaceLabs/Ecwid)
================

[Ecwid](https://www.ecwid.com/) PHP Client used for interacting with Ecwid's
API.

## Requirements

* PHP cURL Extension
* PHP >= 5.4

## Installation

```bash
composer require "dspacelabs/ecwid:~0.1@dev"
```

## Usage

```php
<?php

use Dspacelabs\Component\Ecwid\Client;

$client = new Client($clientId, $clientSecret);
```

## Change Log

See [CHANGELOG.md](https://github.com/dSpaceLabs/Ecwid/blob/master/CHANGELOG.md)

## License

See [LICENSE](https://raw.githubusercontent.com/dSpaceLabs/Ecwid/master/LICENSE)
