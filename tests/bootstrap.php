<?php
/**
 * TM4B SMS Client for PHP
 *
 * @copyright Copyright (c) 2018 TM4B Ltd. (https://tm4b.com)
 * @license   https://github.com/tm4b/tm4b-php/blob/master/LICENSE MIT License
 */

$loader = require(__DIR__.'/../vendor/autoload.php');
$loader->addPsr4('Tm4bTest\\', __DIR__);

$dotenv = new Dotenv\Dotenv(__DIR__.'/..');
$dotenv->load();