<?php

/**
 * Redirect to another url
 *
 * @param mixed  $url  ( The filename that want to reach )
 * 
 * @return null
 */ 
function redirect($url)
{
    header("location:" . url($url));
    exit();
}

/**
 * Redirect to another url after a period of time
 *
 * @param   $url  ( The filename that want to reach )
 * @param   $period  ( The time that want to reach the url after it )
 * 
 * @return null
 */ 
function redirectAfter($url,$period)
{
    header("refresh:".$period.";url=" . url($url));
    exit();
}