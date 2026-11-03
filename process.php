<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if (isset($_FILES['dataset']) && $_FILES['dataset']['error'] === 0) {
        
        $file_name = $_FILES['dataset']['name'];
        $file_tmp = $_FILES['dataset']['tmp_name'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        if ($file_ext === 'csv') {
            
            
            $upload_dir = "uploads/";
            $destination = $upload_dir . basename($file_name);

            if (move_uploaded_file($file_tmp, $destination)) {
                echo "<h2 style='color: green; text-align: center;'>File Uploaded & Analyzing...</h2>";
                
                
                $python_script = "analyze.py";
                $command = escapeshellcmd("python " . $python_script . " " . $destination);
                $output = shell_exec($command);
                
          
                echo "<div style='width: 70%; margin: 20px auto; background: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);'>";
                echo $output;
                echo "</div>";
                
                echo "<br><div style='text-align: center;'><a href='index.php' style='text-decoration: none; background: #0d6efd; color: white; padding: 10px 20px; border-radius: 5px;'>Upload Another File</a></div>";

            } else {
                echo "<p style='color: red; text-align: center;'>Error: File ko save karne mein kuch dikkat aayi.</p>";
            }

        } else {
            echo "<p style='color: red; text-align: center;'>Error: Kripya sirf valid .csv file hi upload karein.</p>";
        }

    } else {
        echo "<p style='color: red; text-align: center;'>Error: Koi file select nahi ki gayi.</p>";
    }

} else {
    header("Location: index.php");
    exit();
}
?>