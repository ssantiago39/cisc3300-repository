<?php
require 'inClass14.php';

use SeansIceCream\IceCream;

$iceCream1 = new IceCream("Espresso nugget", 4.50, "Medium");

echo $iceCream1->getFlavor();
echo $iceCream1->getPrice();
echo $iceCream1->getSize();
?>
