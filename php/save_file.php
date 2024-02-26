<?php

require_once "connect_db.php";

$filename = $_POST['filename'];
$content = $_POST['content'];
$groupid = $_POST['groupid'];

$get_groupnameSTMT = pg_prepare($conn, "get_groupname", "SELECT groupname FROM groups where groupid=$1");
$get_groupnameRESULT = pg_execute($conn, "get_groupname", array($groupid));
$row = pg_fetch_assoc($get_groupnameRESULT);
$groupname = $row["groupname"];

file_put_contents("../groups/$groupname/" . $filename . ".rtf", $content);
$get_filesSTMT = pg_prepare($conn, "get_files", "INSERT INTO files (groupid, filename, filetype) VALUES ($1, $2,$3)");
$get_filesRESULT = pg_execute($conn, "get_files", array($groupid, ($filename . ".rtf"), ".rtf"));
