<?php

use craft\elements\Entry;
use craft\helpers\UrlHelper;

include('element-api/shop.php');

$array = [
	'api/shop/<slug:{slug}>.json' => shop
];

return [
	'endpoints' => $array
];