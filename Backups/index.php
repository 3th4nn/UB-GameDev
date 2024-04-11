<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Installer</title>
    <style>
        body {
            font-family: 'Press Start 2P', cursive;
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px;
            margin: 0;
        }
        header {
            padding: 20px 0;
        }
        h1 {
            font-size: 48px;
            margin-bottom: 20px;
        }
        nav {
            margin-top: 20px;
        }
        nav a {
            font-size: 24px;
            background-color: #5599cc;
            color: #000;
            padding: 10px 20px;
            margin: 0 10px;
            border-radius: 10px;
            text-decoration: none;
            transition: all 0.3s ease-in-out;
        }
        nav a:hover {
            background-color: #77bbdd;
            transform: scale(1.1);
        }
        .content {
            margin-top: 50px;
        }
        img {
            width: 400px;
            height: auto;
            margin-bottom: 20px;
            border-radius: 20px;
        }
    </style>
</head>
<body>
    <h1>File Installer</h1>
    <p>Select the file you want to install:</p>
    <form id="fileForm" method="post">
        <select id="fileSelect" name="selectedFile">
            <option value="">Select File...</option>
            <option value="backupabout.html">About</option>
            <option value="backupcontact.html">Contact</option>
            <option value="bacukupgames.html">Games</option>
            <option value="backupindex.html">Index</option>
            <option value="Backups.zip">All (Zip)</option>
        </select>
        <button type="submit" name="install">Install</button>
    </form>

    <?php
    if (isset($_POST['install'])) {
        $selectedFile = $_POST['selectedFile'];
        if (!empty($selectedFile)) {
            $source = $selectedFile;
            $destination = "~/Downloads/" . basename($selectedFile);

            if (copy($source, $destination)) {
                echo "<p>File installed successfully.</p>";
            } else {
                echo "<p>Failed to install the file.</p>";
            }
        } else {
            echo "<p>Please select a file to install.</p>";
        }
    }
    ?>
</body>
</html>
