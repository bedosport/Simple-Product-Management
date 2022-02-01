<?php


// The $data must be "Associative Array"
function insertDb($table, array $data)
{

    global $conn;

    // get the columns names (keys of $data associative array), then implode it in one string separeted with comma
    $fields = implode(',', array_keys($data));

    /**
     * get the values (values of $data associative array), then implode it in one string separeted with comma
     * using array_map to validate the data which will be entered to the database on each value
     * using a different form in callback to set the first parameter in array_map() function
     */
    $values = implode(',', array_map("handleValue", array_values($data)));

    // build the insert query
    $query = 'INSERT INTO ' . $table . ' (' . $fields . ') ' . ' VALUES (' . $values . ')';

    // Exceute the query
    $result = mysqli_query($conn, $query);

    // return number of rows which inserted by this query
    return affectedRowsDb($conn);
}

function updateDb($table, array $data, $where = '')
{

    global $conn;

    // Array to hold the set part of update query
    $set = array();

    foreach ($data as $field => $value) {

        // Build the set part
        $set[] = $field . '=' . handleValue($value);
    }

    // implode $set array into one string separates by comma
    $set = implode(',', $set);

    // replace comma with (space comma space) to avoid SQL failures
    $set = str_replace(',', " , ", $set);

    // Build the final UPDATE query
    $query = 'UPDATE ' . $table . ' SET ' . $set . (($where) ? ' WHERE ' . $where : '');

    // Execute the query
    $result = mysqli_query($conn, $query);

    // return number of rows which updated by this query
    return affectedRowsDb($conn);
}

function readDb($table, $where = '', $fields = '*', $order = '', $limit = null, $offset = null)
{

    global $conn;

    // Start building the SELECT query
    $query = 'SELECT ' . $fields . ' FROM ' . $table
        . (($where) ? ' WHERE ' . $where : '')
        . (($limit) ? ' LIMIT ' . $limit : '')
        . (($offset) ? ' OFFSET ' . $offset : '')
        . (($order ? ' ORDER BY ' . $order : ''));

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Number of rows
    $rowCount = mysqli_num_rows($result);

    // Handle return statement
    if ($rowCount > 0) {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    return [];
}

function readWithQueryDb($query)
{

    global $conn;

    $result = mysqli_query($conn, $query);
    if (affectedRowsDb($conn) > 0)
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    else
        return false;
}

function deleteDb($table, $where = '')
{

    global $conn;

    // Build DELETE query
    $query = 'DELETE FROM ' . $table
        . (($where) ? ' WHERE ' . $where : '');

    // Execute the query
    $result = mysqli_query($conn, $query);

    // return number of rows which deleted by this query
    return affectedRowsDb($conn);
}

// Check if there's a returned result or not
function getRowDb($result)
{

    if (mysqli_num_rows($result) > 0) {
        return true;
    }
    return false;
}

// Do a select statement and check if there's a returned result or not
function checkDb($table, $colName, $id)
{

    global $conn;
    $query = "SELECT * FROM `$table` WHERE `$colName` = $id ";
    $result = mysqli_query($conn, $query);

    if (getRowDb($result)) {
        return true;
    }
    return false;
}

// return a number of affected rows, or an error
function affectedRowsDb($conn)
{

    if (mysqli_affected_rows($conn) >= 0) {
        return mysqli_affected_rows($conn);
    } else {
        die("There's an error : " . mysqli_error($conn));
    }
}

// return true if the query executed or false if not
function resolveDb($conn, $query)
{

    $result = mysqli_query($conn, $query);
    if ($result) {
        return true;
    }
    return false;
}

// return the result of the sent Query
function queryDb($query)
{

    global $conn;

    $result = mysqli_query($conn, $query);
    return $result;
}

// return the value with quote an ignoring to special chars to save in DB safely
function handleValue($value)
{

    // mysqli_real_escape_string() doesn't work without connection to DB
    global $conn;

    if ($value === null)
        $value = 'NULL';

    else if (!is_numeric($value)) {
        $value = "'" . mysqli_real_escape_string($conn, $value) . "'";
    }
    return $value;
}
