<?php
require_once 'lorem_ipsum.php';

main($argv);

function main($args) {
    if (!isset($args[2]) || strtolower($args[2]) == 'p') {
        if (is_numeric($args[1]) && $args[1] > 0) {
            if ($args[1] > 30) {
                echo "This program yeilds no more than 30 paragraphs" . PHP_EOL;
                exit();
            }
            echo getLoremParagraphs($args[1]).PHP_EOL;
        } else {
            echo help($args[0]);
        }
    }
    else if (strtolower($args[2]) == 's') {
        if (is_numeric($args[1]) && $args[1] > 0) {
            echo getLoremSentences($args[1]).PHP_EOL;
        } else {
            echo help($args[0]);
        }
    } else if (strtolower($args[2]) == 'w') {
        if (is_numeric($args[1]) && $args[1] > 0) {
            echo getLoremWords($args[1]).PHP_EOL;
        } else {
            echo help($args[0]);
        }
    } else if (strtolower($args[2]) == 'c') {
        if (is_numeric($args[1]) && $args[1] > 0) {
            echo getLoremChars($args[1]).PHP_EOL;
        } else {
            echo help($args[0]);
        }
    } else {
        echo help($args[0]);
    }
}

function help($filename)
{
    $h = "Error. usage: $filename NUMBER " . " ELEMENT" . PHP_EOL;
    $h .= "where ELEMENT can be ".PHP_EOL;
    $h .= "- 'p' for paragraps,".PHP_EOL;
    $h .= "- 's' for sentences,".PHP_EOL;
    $h .= "- 'w' for words,".PHP_EOL;
    $h .= "- 'c' for characters,".PHP_EOL;
    $h .= "and NUMBER is the number of elements you need".PHP_EOL;
    return $h;
}

function getLoremParagraphs($num)
{
    $lorem = array_slice(lorem(),0,$num);
    return implode(PHP_EOL,$lorem);
}

function getLoremSentences($num, $separator = '.')
{
    $lorem = implode(PHP_EOL,lorem()).PHP_EOL;
    $dots = substr_count($lorem, $separator);
    $max = strlen($lorem);
    $n = 0;
    for ($i=0; $i<$max; $i++) {
        if ($lorem[$i] == $separator) {
            $n++;
            if ($n >= $num) {
                break;
            }
        }
    }
    return substr($lorem, 0, $i+1);
}

function getLoremWords($num)
{
    return getLoremSentences($num, ' ');
}

function getLoremChars($num)
{
    $lorem = implode(PHP_EOL,lorem()).PHP_EOL;
    return substr($lorem, 0, $i);
}

