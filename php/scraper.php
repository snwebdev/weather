<?php

$city = $_GET['city'];

$city = str_replace(" ", "", $city);

$contents = file_get_contents("http://www.weather-forecast.com/locations/" . $city . "/forecasts/latest");


$stringBeforeForecast = '3 Day Weather Forecast Summary:</b><span class="read-more-small"><span class="read-more-content"> <span class="phrase">';
$stringAfterForecast = "</span>";

echo getPartBetween($contents, $stringBeforeForecast, $stringAfterForecast);

function getIndexOfSubstring($string, $subString) {
    $index = strpos($string, $subString);
    return($index);
}

function getIndexAfterSubstring($string, $substring) {
    $index = strpos($string, $substring) + strlen($substring);
    return($index);
}

function stripStringBeforeIndex($string, $start) {
    $indexStartOfStart = getIndexOfSubstring($string, $start);
    $indexEndOfStart = $indexStartOfStart + strlen($start) - 1;
    $indexStartOfPart = $indexEndOfStart + 1;
    $lengthOfPart = strlen($string) - $indexEndOfStart;
    $part = substr($string, $indexStartOfPart, $lengthOfPart);
    return($part);
}

function getPartBeforeSubstring($string, $substring) {
    $indexStartOfSubstring = getIndexOfSubstring($string, $substring);
    $lengthOfPart = $indexStartOfSubstring;
    $part = substr($string, 0, $lengthOfPart);
    return($part);
}

function getPartBetween($string, $start, $end) {
    $string = stripStringBeforeIndex($string, $start);
    $part = getPartBeforeSubstring($string, $end);
    return($part);
}

function stripToEndOfSubstring($string, $substring) {
    $indexPart = getIndexAfterSubstring($string, $substring);
    $part = stripStringBeforeIndex($string, $indexPart);
    return($part);
}

function getPartAfterSubstring($string, $substring) {
    $indexOfPart = strpos($string, $substring) + strlen($substring);
    $lengthOfSubstring = strlen($substring);
    $lengthOfPart = strlen($string) - $indexOfPart;
    $part = substr($string, $indexOfPart, $lengthOfPart);
    return($part);
}
?>

