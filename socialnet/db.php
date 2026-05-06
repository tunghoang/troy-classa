<?php
function db_conn() {
    $servername = "127.0.0.1";
    $username = "admin";
    $password = "Abc123";
    $dbname = "socialnetA";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    return $conn;
}

function db_execute($insert_sql) {
    $conn = db_conn();
    $conn->query($insert_sql);
    $conn->close();
}

function db_query($sql) {
    $conn = db_conn();
    $result = $conn->query($sql);
    $conn->close();
    return $result;
}
?>
