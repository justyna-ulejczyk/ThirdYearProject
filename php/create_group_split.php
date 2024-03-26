<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "connect_db.php";
session_start();
$groupid = $_SESSION["groupid"];

$folderPathA = "../groups/" . $groupid; 
$folderPathB = "../splits/" . $groupid; 
    
if (!file_exists($folderPathB)) {
    if (!mkdir($folderPathB, 0777, true)) {
        die('Failed to create folders...');
    }
}

$insert_filesSTMT = pg_prepare($conn, "insert_files", "INSERT INTO splitfiles (groupid, filename, filetype) VALUES ($1, $2,$3)");
pg_query($conn, "UPDATE groups SET hassplit = 1 WHERE groupid=$groupid");

function copyFolder($source, $destination, $conn) {
    $groupid = $_SESSION["groupid"];
    if (!is_dir($source)) {
        return false;
    }

    if (!is_dir($destination)) {
        mkdir($destination, 0777, true);
    }

    $files = array_diff(scandir($source), array('.', '..'));

    foreach ($files as $file) {
        $sourcePath = "$source/$file";
        $destinationPath = "$destination/$file";

        if (is_dir($sourcePath)) {
            // If $file is a directory, recursively copy its contents
            copyFolder($sourcePath, $destinationPath, $conn);
        } else {
            // If $file is a file, copy it to the destination folder
            copy($sourcePath, $destinationPath);
            pg_execute($conn, "insert_files", array($groupid, $file, ".rtf"));
        }
    }

    return true;
}

if (copyFolder($folderPathA, $folderPathB, $conn)) {
    // Debugging: Echo a message to see if this block is executed
    echo "Files copied successfully.";
    
    // Make sure there are no outputs before the header call
    header("Location: ../html/group-page-file.php?split=0");
    exit; // Ensure no further code execution after redirection
} else {
    echo "Failed to copy files."; // Debugging: Echo a message to see if this block is executed
}
?>
