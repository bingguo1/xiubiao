<?php
$myVar = "hello world!";

var_dump($myVar);
print_r($myVar);
echo "this is echo";
//$allVars = get_defined_vars();
//print_r($allVars);
//debug_zval_dump($allVars);

function sayHello($hello) {
    echo $hello;
    debug_print_backtrace();
}

//sayHello($myVar);
?>