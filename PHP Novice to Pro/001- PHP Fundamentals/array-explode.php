<?php // phpcs:ignoreFile

$stringTest = "hello how are you";

// explode(separator, string, limit);

$arrayTest = explode(' ',$stringTest);
echo "<pre>";
print_r($arrayTest);

// find longest word in arrayTest.

usort($arrayTest, function($a,$b){
    return strlen($b) - strlen($a);
});
echo "Longest word is $arrayTest[0]";

// one line function using reduce

$longestWord = array_reduce(explode(' ',$stringTest), function($carry,$item){
    return strlen($item) > strlen($carry) ? $item :$carry;
});

echo "<br /> Longest Word is $longestWord";