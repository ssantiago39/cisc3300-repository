<?php
//index php file
// 6a
$me = [
   "name" => "Sean Santiago",
   "age" => 20,
   "major" => "Computer Science",
   "sign" => "virgo",
   "university" => "Fordham University"
];


foreach ($me as $key => $value) {
    echo "$key: $value <br>";
}




// 7
function multiplyNumber(int $num, int $multiplier = 2): int {
   return $num * $multiplier;
}


echo "15 multiplied by 11: " . multiplyNumber(15, 11) . "<br>";
echo "17 multiplied by (2): " . multiplyNumber(17) . "<br>";  


// 8


readfile("resources/hw6.html");


?>
