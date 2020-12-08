<?php

require_once 'inc/config.php';
$uid = $_GET['uid'];

$sql = "DELETE FROM users WHERE ID=$uid";

if ($conn->query($sql) === TRUE) {
    header('Location: index.php?');
} else {
    header('delete.php');
}

$conn->close();