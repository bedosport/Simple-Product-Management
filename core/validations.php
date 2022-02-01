<?php

/**
 * Check if the value is not null or empty
 *
 * @param   $val  ( The value to be checked )
 * 
 * @return bool true if the value is not null or empty , false otherwise.
 */ 
function requiredVal($val)
{
    return isset($val) && !empty($val);
}

/**
 * Check if the string length less than the min length
 *
 * @param   $val  ( The value to be checked )
 * @param int   $length  ( The min length )
 * 
 * @return bool true if the string length not less than the min length , false otherwise.
 */ 
function minVal($val, $length)
{
    return strlen($val) >= $length;
}

/**
 * Check if the string length excede the max length
 *
 * @param   $val  ( The value to be checked )
 * @param int   $length  ( The max length )
 *
 * 
 * @return bool true if the string length not excede the max length , false otherwise.
 */ 
function maxVal($val, $length)
{
    return strlen($val) <= $length;
}

/**
 * Finds whether a variable is a valid email
 *
 * @param   $val  ( The value to be checked )
 * 
 * @return bool  true if var is a valid email , false otherwise.
 */ 
function emailVal($val)
{
    if (!filter_var($val, FILTER_VALIDATE_EMAIL))
        return false;
    return true;
}

/**
 * Finds whether a variable is a number or a numeric string
 *
 * @param   $val  ( The value to be checked )
 * 
 * @return bool  true if var is a number or a numeric string, false otherwise.
 */ 
function numVal($val)
{
    return is_numeric($val);
}

/**
 * Find whether the type of a variable is string
 *
 * @param   $val  ( The value to be checked )
 * 
 * @return bool true if var is of type string, false otherwise.
 */ 
function stringVal($val)
{
    return is_string($val);
}

/**
 * Remove all HTML tags from a string
 *
 * @param   $val  ( The value to be sanitized )
 * 
 * @return mixed the filtered data, or FALSE if the filter fails.
 */ 
function strSan($val)
{
    return filter_var($val, FILTER_SANITIZE_STRING);
}

/**
 * Remove all HTML tags from a number int
 *
 * @param   $val  ( The value to be sanitized )
 * 
 * @return mixed the filtered data, or FALSE if the filter fails.
 */ 
function intSan($val)
{
    return filter_var($val, FILTER_SANITIZE_NUMBER_INT);
}

/**
 * Remove all HTML tags from a number float
 *
 * @param   $val  ( The value to be sanitized )
 * 
 * @return mixed the filtered data, or FALSE if the filter fails.
 */ 
function floatSan($val)
{
    return filter_var($val, FILTER_SANITIZE_NUMBER_FLOAT);
}

/**
 * Remove all HTML tags from an email
 *
 * @param   $val  ( The value to be sanitized )
 * 
 * @return mixed the filtered data, or FALSE if the filter fails.
 */
function emailSan($val)
{
    return filter_var($val, FILTER_SANITIZE_EMAIL);
}

/**
 * Creates a password hash.
 *
 * @param   $val  ( The value to be sanitized )
 * 
 * @return string|false Returns the hashed password, or FALSE on failure
 */
function hashVal($val)
{
    return password_hash($val, PASSWORD_DEFAULT);
}

/**
 * Find whether the type of a variable is bool
 *
 * @param   $val  ( The value to be checked )
 * 
 * @return bool true if var is of type bool, false otherwise.
 */ 
function bool_Val($val)
{
    return is_bool($val);
}

/**
 * Find whether the type of a variable is float
 *
 * @param   $val  ( The value to be checked )
 * 
 * @return bool true if var is of type float, false otherwise.
 */ 
function float_Val($val)
{
    return is_float($val);
}

/**
 * Find whether the type of a variable is int
 *
 * @param   $val  ( The value to be checked )
 * 
 * @return bool true if var is of type int, false otherwise.
 */ 
function int_Val($val)
{
    return is_int($val);
}

/**
 * Check that the file sent with the request or not ( check the supper global $_FILES )
 *
 * @param   $filename  ( The name of the file to be checked )
 * 
 * @return bool true if the file sent, false otherwise.
 */ 
function checkUploadFile($filename)
{
    return isset($_FILES[$filename]);
}