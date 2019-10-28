<?php
include("dbconfig.php");

if(isset($_POST['submit']))
{
   $name = mysqli_real_escape_string($db,$_POST['name']);
   $description=mysqli_real_escape_string($db,$_POST['description']);
   $chapter_name = mysqli_real_escape_string($db,$_POST['chapter_name']);
   $temp = $_FILES['file']['tmp_name'];


   move_uploaded_file($temp, "vdo/uploaded/".$name);

   $url="C:/wamp64/www/vdo/upload/$name";
   mysqli_query($db,"INSERT INTO 'upload' VALUES ('','$name','$description','$chapter_name','$url')");

}
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Upload</title>
    </head>
    <body >
        
                    <h2>Upload</h2> 
                    
                    <form role="form" action="index.php" method="post" id="reused_form" enctype="maltipart/form-da">
                    	<input type="text" name="name">
                    	<input type="text" name="description">
                    	<input type="text" name="chapter_name">
                        <input type="file" name="file">
                        <input type="submit" name="submit" value="Upload">
                    </form>
                    <?php
                        if(isset($_POST['submit']))
                        {
                            echo "File Name <br />".$name."Uploaded Successfully";
                        }
                        ?>
                    
              
    </body>
</html>