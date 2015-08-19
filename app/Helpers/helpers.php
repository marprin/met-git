<?php
function encode($string)
{
    $key = Config::get('constants.encode_key');
    $key = sha1($key);
    $strLen = strlen($string);
    $keyLen = strlen($key);
    $j = 0;
    $hash = '';
    for ($i = 0; $i < $strLen; $i++) {
        $ordStr = ord(substr($string, $i, 1));
        if ($j == $keyLen) {
            $j = 0;
        }
        $ordKey = ord(substr($key, $j, 1));
        $j++;
        $hash .= strrev(base_convert(dechex($ordStr + $ordKey), 16, 36));
    }
    return $hash;
}

function decode($string)
{
    $key = Config::get('constants.encode_key');
    $key = sha1($key);
    $strLen = strlen($string);
    $keyLen = strlen($key);
    $j = 0;
    $hash = '';
    for ($i = 0; $i < $strLen; $i+=2) {
        $ordStr = hexdec(base_convert(strrev(substr($string, $i, 2)), 36, 16));
        if ($j == $keyLen) {
            $j = 0;
        }
        $ordKey = ord(substr($key, $j, 1));
        $j++;
        $hash .= chr($ordStr - $ordKey);
    }
    return $hash;
}
?>