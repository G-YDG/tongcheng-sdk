# tongcheng-sdk
let php developer easier to access tongcheng cps api

Install the latest version with

```bash
$ composer require ydg/tongcheng-sdk
```

## Basic Usage

```php
<?php

use Ydg\TCSdk\TC;

(new TC())->activityOrder->list([
    'appId' => 'your appId',
    'begin_date' => date('Y-m-d H:i:s', time() - 3600),
    'end_date' => date('Y-m-d H:i:s'),
    'update' => 1,
    'page_index' => 0,
    'page_size' => 10,
]);
```