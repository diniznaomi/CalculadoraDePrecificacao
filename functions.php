<?php

function divide($totalamount, $totalcost)
{
    $result = $totalcost / $totalamount;
    return $result;
}

function multiply($result, $amount)
{
    $costprice = $result * $amount;
    return $costprice;
}

function readstring($description)
{
    print_r($description);
    return stream_get_line(STDIN, 1024, PHP_EOL);
}

function readFloat($instructions)
{
    $floatTyped = null;
    $checkIsFloat = false;
    while ($floatTyped == null) {
        print_r($instructions);
        $floatTyped = stream_get_line(STDIN, 1024, PHP_EOL);
        $checkIsFloat = filter_var($floatTyped, FILTER_VALIDATE_FLOAT);
        if ($checkIsFloat == false) {
            print_r('O valor digitado deve ser um numero decimal!' . PHP_EOL);
            $floatTyped = null;
        }
    }
    return $floatTyped;
}

function readInteger($instructions)
{
    $integertyped = null;
    $checkisInteger = false;
    while ($integertyped == null) {
        print_r($instructions);
        $integertyped = stream_get_line(STDIN, 1024, PHP_EOL);
        $checkisInteger = intval($integertyped);
        if ($integertyped == false) {
            print_r('O valor digitado deve ser um numero inteiro!');
            $integertyped = null;
        }
    }
    return $integertyped;
}
