<?php

session_start();
require_once '../functions.php';
$contacts = getContacts();
echo $uid = $contacts[$_GET['row']]['id'];
PDOexec("DELETE FROM contact WHERE id='$uid' ");
$uri = $_SESSION['referer'];
header('Location:../../html/admin.php?Contacts');
exit();