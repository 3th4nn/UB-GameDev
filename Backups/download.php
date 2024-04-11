<?php
if (isset($_POST['download'])) {
    if (!empty($_POST['selectedFile'])) {
        $fileName = basename($_POST['selectedFile']);
        $filePath = '/home/sysadmin/Backups/' . $fileName;

        if (file_exists($filePath)) {
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . $fileName . '"');
            header('Content-Length: ' . filesize($filePath));

            readfile($filePath);
            exit;
        } else {
            echo "File not found.";
        }
    } else {
        echo "Please select a file to download.";
    }
}
?>
