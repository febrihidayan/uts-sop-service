<?php

require_once 'connect.php';

$query = $conn->prepare("SELECT * FROM akun WHERE username_055 = '{$_GET['username']}'");

$query->execute();

$user = $query->fetch(PDO::FETCH_OBJ);

$response = ($user && password_verify($_GET['password'], $user->password_055))
    ? 'TRUE' : 'FALSE';

$name = $user->namap_055 ?? '';
$username = $user->username_055 ?? '';
$level = $user->levelakses_055 ?? '';

header('Content-Type: text/xml');

echo "<?xml version='1.0'?>";

echo "<data>";

echo "<name>$name</name>";
echo "<username>$username</username>";
echo "<level>$level</level>";
echo "<response>$response</response>";

echo "</data>";