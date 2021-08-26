<?php
function time2string($time)
{
    $d = floor($time / 86400);
    $_d = ($d < 10 ? '0' : '') . $d;

    $h = floor(($time - $d * 86400) / 3600);
    $_h = ($h < 10 ? '0' : '') . $h;

    $m = floor(($time - ($d * 86400 + $h * 3600)) / 60);
    $_m = ($m < 10 ? '0' : '') . $m;

    $s = $time - ($d * 86400 + $h * 3600 + $m * 60);
    $_s = ($s < 10 ? '0' : '') . $s;

    return [
        'day' => $_d,
        'hour' => $_h,
        'minute' => $_m,
        'second' => $_s
    ];
}
