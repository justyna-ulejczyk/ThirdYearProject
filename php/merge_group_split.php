<?php
require_once "connect_db.php";
$groupid = $_POST["groupid"];
$groupname = $_POST["groupname"];

$folderPathA = "../groups/" . $groupid; 
$folderPathB = "../splits/" . $groupid;

$merge = $_POST["merge"];

function deleteFolder($folderPath) {
    if (!is_dir($folderPath)) {
        // If $folderPath is not a directory, return false
        return false;
    }

    $files = array_diff(scandir($folderPath), array('.', '..'));

    foreach ($files as $file) {
        // If $file is a directory, recursively delete it
        if (is_dir("$folderPath/$file")) {
            deleteFolder("$folderPath/$file");
        } else {
            // If $file is a file, delete it
            unlink("$folderPath/$file");
        }
    }

    // After deleting all files and sub-folders, delete the main folder
    return rmdir($folderPath);
}


if($merge == "A"){
if (deleteFolder($folderPathB)) {
    pg_prepare($conn, "delete_split", "DELETE FROM splitfiles WHERE groupid=$1");
    pg_execute($conn, "delete_split", array($groupid));
        
} else {
}
} else{
    if (deleteFolder($folderPathA)) {
        rename($folderPathB, $folderPathA);
        pg_query($conn, "DELETE FROM files WHERE groupid=$groupid");
        pg_prepare(
            $conn,
            "replace_split",
            "WITH moved_rows AS (
            DELETE FROM splitfiles a
            WHERE groupid=$1
            RETURNING a.*
        )
        INSERT INTO files
        SELECT DISTINCT * FROM moved_rows;"
        );
        pg_execute($conn, "replace_split", array($groupid));
            
    } else {
    }
}

pg_query($conn, "UPDATE groups SET hassplit = 0 WHERE groupid=$groupid");

header("location: " . "../html/group-page-file.php");