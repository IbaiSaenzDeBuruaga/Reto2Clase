<?php

require 'vendor/autoload.php';

use Egibide\Shop\Model\Customer;
use Egibide\Shop\Model\Product;

$customer = new Customer('Bob');
echo $customer->getName();

$product = new Product('Colacao');
echo $product->getName();

?>