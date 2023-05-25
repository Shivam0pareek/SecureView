

<?php
   // Check if the form was submitted
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      if(isset($_FILES["file"])) {
         // Set file name and path
         $target_dir = "uploads/";
         $target_file = $target_dir . basename($_FILES["file"]["name"]);
         
         // Check if file already exists
         if(file_exists($target_file)) {
            echo "Sorry, file already exists.";
            exit();
         }
         
         // Check file size
         if($_FILES["file"]["size"] > 500000000) {
            echo "Sorry, your file is too large.";
            exit();
         }
         
         // Allow certain file formats
         $allowed_types = array("jpg", "jpeg", "png", "gif", "mp4", "avi", "mov", "wmv");
         $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
         if(!in_array($file_type, $allowed_types)) {
            echo "Sorry, only JPG, JPEG, PNG, GIF, MP4, AVI, MOV, and WMV files are allowed.";
            exit();
         }
         
           // Upload file
             if(move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            // echo "The file " . basename($_FILES["file"]["name"]) . " has been uploaded.";
             header("Location: display1.php");
            
            } 
              else {
              echo "Sorry, there was an error uploading your file.";
             }
 
           

         
         // Save file path and type to database
         $conn = new mysqli('localhost', 'shivam112', 'm0mandp4p4', 'mydbnew');
         $stmt = $conn->prepare("INSERT INTO files (filepath, filename, filetype, title, description) VALUES (?, ?, ?, ?, ?)");
      
         if(!$stmt) {
            echo "Error: " . mysqli_error($conn);
            exit();
         }
      
         $title = $_POST["title"];
         $description = $_POST["description"];
         $stmt->bind_param("sssss", $target_dir, basename($_FILES["file"]["name"]), $file_type, $title, $description);
         $stmt->execute();
         $stmt->close();
         $conn->close();
      }
      
}     
      
      
   



  