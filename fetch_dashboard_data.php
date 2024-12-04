<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dagyaw_donation";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql_users = "SELECT COUNT(id) AS total_users FROM donations";
$sql_money = "SELECT SUM(amount_donated) AS total_money FROM donations";

$sql_users_AngatBuhay = "SELECT COUNT(id) AS total_users_AngatBuhay FROM donations WHERE category = 'Angat Buhay'";
$sql_money_AngatBuhay = "SELECT SUM(amount_donated) AS total_money_AngatBuhay FROM donations WHERE category = 'Angat Buhay'";

$sql_users_DSWD = "SELECT COUNT(id) AS total_users_DSWD FROM donations WHERE category = 'DSWD'";
$sql_money_DSWD = "SELECT SUM(amount_donated) AS total_money_DSWD FROM donations WHERE category = 'DSWD'";

$sql_users_Kanlungan = "SELECT COUNT(id) AS total_users_Kanlungan FROM donations WHERE category = 'Kanlungan ni Maria'";
$sql_money_Kanlungan = "SELECT SUM(amount_donated) AS total_money_Kanlungan FROM donations WHERE category = 'Kanlungan ni Maria'";

$sql_users_UNICEF = "SELECT COUNT(id) AS total_users_UNICEF FROM donations WHERE category = 'UNICEF Philippines'";
$sql_money_UNICEF = "SELECT SUM(amount_donated) AS total_money_UNICEF FROM donations WHERE category = 'UNICEF Philippines'";

$result_users = $conn->query($sql_users);
$result_money = $conn->query($sql_money);
$result_users_AngatBuhay = $conn->query($sql_users_AngatBuhay);
$result_money_AngatBuhay = $conn->query($sql_money_AngatBuhay);
$result_users_DSWD = $conn->query($sql_users_DSWD);
$result_money_DSWD = $conn->query($sql_money_DSWD);
$result_users_Kanlungan = $conn->query($sql_users_Kanlungan);
$result_money_Kanlungan = $conn->query($sql_money_Kanlungan);
$result_users_UNICEF = $conn->query($sql_users_UNICEF);
$result_money_UNICEF = $conn->query($sql_money_UNICEF);

$response = array();

if ($result_users->num_rows > 0) {
    $row_users = $result_users->fetch_assoc();
    $response['total_users'] = $row_users['total_users'];
} else {
    $response['total_users'] = 0;
}

if ($result_money->num_rows > 0) {
    $row_money = $result_money->fetch_assoc();
    $response['total_money'] = $row_money['total_money'];
} else {
    $response['total_money'] = 0;
}

if ($result_users_AngatBuhay->num_rows > 0) {
    $row_users_AngatBuhay = $result_users_AngatBuhay->fetch_assoc();
    $response['total_users_AngatBuhay'] = $row_users_AngatBuhay['total_users_AngatBuhay'];
} else {
    $response['total_users_AngatBuhay'] = 0;
}

if ($result_money_AngatBuhay->num_rows > 0) {
    $row_money_AngatBuhay = $result_money_AngatBuhay->fetch_assoc();
    $response['total_money_AngatBuhay'] = $row_money_AngatBuhay['total_money_AngatBuhay'];
} else {
    $response['total_money_AngatBuhay'] = 0;
}

if ($result_users_DSWD->num_rows > 0) {
    $row_users_DSWD = $result_users_DSWD->fetch_assoc();
    $response['total_users_DSWD'] = $row_users_DSWD['total_users_DSWD'];
} else {
    $response['total_users_DSWD'] = 0;
}

if ($result_money_DSWD->num_rows > 0) {
    $row_money_DSWD = $result_money_DSWD->fetch_assoc();
    $response['total_money_DSWD'] = $row_money_DSWD['total_money_DSWD'];
} else {
    $response['total_money_DSWD'] = 0;
}

if ($result_users_Kanlungan->num_rows > 0) {
    $row_users_Kanlungan = $result_users_Kanlungan->fetch_assoc();
    $response['total_users_Kanlungan'] = $row_users_Kanlungan['total_users_Kanlungan'];
} else {
    $response['total_users_Kanlungan'] = 0;
}

if ($result_money_Kanlungan->num_rows > 0) {
    $row_money_Kanlungan = $result_money_Kanlungan->fetch_assoc();
    $response['total_money_Kanlungan'] = $row_money_Kanlungan['total_money_Kanlungan'];
} else {
    $response['total_money_Kanlungan'] = 0;
}

if ($result_users_UNICEF->num_rows > 0) {
    $row_users_UNICEF = $result_users_UNICEF->fetch_assoc();
    $response['total_users_UNICEF'] = $row_users_UNICEF['total_users_UNICEF'];
} else {
    $response['total_users_UNICEF'] = 0;
}

if ($result_money_UNICEF->num_rows > 0) {
    $row_money_UNICEF = $result_money_UNICEF->fetch_assoc();
    $response['total_money_UNICEF'] = $row_money_UNICEF['total_money_UNICEF'];
} else {
    $response['total_money_UNICEF'] = 0;
}

$conn->close();

echo json_encode($response);
?>
