<?php
require_once "connect_db.php";
$groupname = $_POST["groupname"];

$folderPathA = "../groups/" . $groupname; 
$folderPathB = "../splits/" . $groupname; 
    
if (!file_exists($folderPathB)) {
    if (!mkdir($folderPathB, 0777, true)) {
        die('Failed to create folders...');
    }
    echo "Folder created successfully!";
} else {
    echo "Folder already exists!";
}

$insert_filesSTMT = pg_prepare($conn, "insert_files", "INSERT INTO splitfiles (groupid, filename, filetype) VALUES ($1, $2,$3)");
function copyFolder($source, $destination, $conn) {
    $groupid = $_POST["groupid"];
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
    echo "Contents of '$folderPathA' copied to '$folderPathB' successfully.";
} else {
    echo "Failed to copy contents of '$folderPathA' to '$folderPathB'.";
}