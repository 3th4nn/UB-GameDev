<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Downloader</title>
</head>
<body>
    <h1>Select a file to download:</h1>
    <form action="download.php" method="post">
        <select name="selectedFile">
            <option value="">Select File...</option>
            <?php
            $directory = '/home/sysadmin/Backups';
            $files = scandir($directory);
            $files = array_diff($files, array('.', '..'));
            foreach ($files as $file) {
                echo "<option value=\"$file\">$file</option>";
            }
            ?>
        </select>
        <button type="submit" name="download">Download</button>
    </form>
</body>
</html>
