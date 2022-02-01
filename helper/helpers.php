<?php

/**
 * Get the URL with extension
 *
 * @param string $url the name of the file
 * 
 * @return string the url with extnsion
 */
function url($url = '')
{
    return URL . $url . ".php";
}

/**
 * Get the URL without extension
 *
 * @param string $url the name of the file
 * 
 * @return string the url without extnsion
 */
function full_url($url = '')
{
    return URL . $url;
}

/**
 * Die and Dump (echo the data with good view )
 *
 * @param mixed  $data the data to be shown
 * 
 * @return null
 */
function dd($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    die();
    exit();
}

/**
 * Require the file path into helper file
 *
 * @param mixed  $path the path of the file to be required
 * 
 * @return null
 */
function getFile($path){
    require_once $path .".php";
}

