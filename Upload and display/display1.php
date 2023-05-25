<!DOCTYPE html>
<html>
<head>
    <title>Content Display</title>
    
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script src="function.js"></script>
</head>
<body>
    <h1>Content Display</h1>
    <div class="grid">
    
    <?php 
        // connect to the database
        $servername = "localhost";
        $username = "shivam112";
        $password = "m0mandp4p4";
        $dbname = "mydbnew";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // select all files from the database
        $sql = "SELECT * FROM files";
        $result = $conn->query($sql);

        // display the files
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="post">';
                echo '<div class="title">' . $row["title"] . '</div>';
                echo '<div class="description">' . $row["description"] . '</div>';
                
                if ($row["filetype"] == "jpg" || $row["filetype"] == "jpeg" || $row["filetype"] == "png" || $row["filetype"] == "gif") {
                    echo '<div class="image-container">';
                    echo '<img src="' . $row["filepath"] . '/' . $row["filename"] . '" alt="' . $row["filename"] . '">';
                    echo '</div>';
                } elseif ($row["filetype"] == "mp4" || $row["filetype"] == "avi" || $row["filetype"] == "mov" || $row["filetype"] == "wmv") {
                    echo '<div class="video-container">';
                    echo '<video controls>
                        <source src="' . $row["filepath"] . '/' . $row["filename"] . '" type="video/' . $row["filetype"] . '">
                        Your browser does not support the video tag.
                    </video>';
                    echo '</div>';
                } else {
                    echo '<p>Unsupported file type: ' . $row["filename"] . '</p>';
                }
                
                echo '<hr>';
                echo '</div>';
            }
        } else {
            echo '<p class="no-files">No files found.</p>';
        }

        // close the database connection
        $conn->close();
    ?>
</div>
</body>
</html>
