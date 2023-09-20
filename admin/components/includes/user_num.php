<?php
// include('connection.php');

$query = "SELECT email FROM users WHERE usertype = 'user'";
$result = $mysql_connection->query($query);

if ($result) {
    $totalUsers = $result->num_rows; // Get the total number of rows returned
} else {
    echo "Error executing the query: " . $mysql_connection->error;
}

$query = "SELECT email FROM users WHERE usertype = 'agent'";
$result_agent = $mysql_connection->query($query);

if ($result) {
    $totalAgent = $result_agent->num_rows; // Get the total number of rows returned
} else {
    echo "Error executing the query: " . $mysql_connection->error;
}

$query = "SELECT email FROM users WHERE usertype = 'agent'";
$result_company = $mysql_connection->query($query);

if ($result) {
    $totalCompany = $result_company->num_rows; // Get the total number of rows returned
} else {
    echo "Error executing the query: " . $mysql_connection->error;
}
