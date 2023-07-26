<html>
<head><title>image upload</title>
<link rel = "stylesheet" type = "text/css" href = "55.css">


</head>
<?php
session_start();



if(isset($_POST['submit'])) {
	
$db = mysqli_connect("localhost","id18827540_vignanletters","Surya@laxmi0056","viglet") or die("unable to connect");
$sql = "select count(id)  AS co from circulars";
$as = mysqli_query($db,$sql);
$result = mysqli_fetch_assoc($as);
$a =  $result['co']+1;
$a = "bv".(string)$a;   
 
/* 
 * Custom function to compress image size and 
 * upload to the server using PHP 
 */ 
function compressImage($source, $destination, $quality) { 
    // Get image info 
    $imgInfo = getimagesize($source); 
    $mime = $imgInfo['mime']; 
     
    // Create a new image from file 
    switch($mime){ 
        case 'image/jpeg': 
            $image = imagecreatefromjpeg($source); 
            break; 
        case 'image/png': 
            $image = imagecreatefrompng($source); 
            break; 
        case 'image/gif': 
            $image = imagecreatefromgif($source); 
            break; 
        default: 
            $image = imagecreatefromjpeg($source); 
    } 
     
    // Save image 
    imagejpeg($image, $destination, $quality); 
     
    // Return compressed image 
    return $destination; 
} 
 
 
// File upload path 
$uploadPath = "images/";

 
// If file upload form is submitted 
$status = $statusMsg = ''; 
if(isset($_POST["submit"])){ 
    $status = 'error'; 
    if(!empty($_FILES["image"]["name"])) { 
        // File info 
        $fileName = basename($_FILES["image"]["name"]); 
		
		
        $imageUploadPath = $uploadPath .$a.$fileName; 
        $fileType = pathinfo($imageUploadPath, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            // Image temp source 
            $imageTemp = $_FILES["image"]["tmp_name"]; 
              $Path = $a.$fileName; 


            // Compress size and upload image 
            $compressedImage = compressImage($imageTemp,$imageUploadPath,5); 
             echo $ii;
            if($compressedImage){ 
                $status = 'success'; 
                $statusMsg = "Image compressed successfully."; 
                

            }else{ 
                $statusMsg = "Image compress failed!"; 
            } 
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.'; 
    } 
} 
 
// Display status message 
echo $statusMsg; 
 


echo $a;
$db = mysqli_connect("localhost","id18827540_vignanletters","Surya@laxmi0056","viglet") or die("unable to connect");
$alk = $_POST['sender'];
$asdk = $_POST['topic'];
$aw = $_SESSION['uname'];
date_default_timezone_set("Asia/kolkata");
$timezone =  date("h:i:sa");
$date =  $timezone.date("d-m-Y");
echo $date;
echo $path;
$sql = "INSERT INTO circulars(sender_id,receiver,location,timestamp,topic) VALUES ('$aw','$alk','$Path','$date','$asdk')";


if(mysqli_query($db,$sql)) {
	//header("location:profile.php");
	echo "success";
} else {
	
	echo "failure";
	
}
}



?>
<h1><span style = "color:green">upload your image</span></h1>

<form method = "POST" action = "" enctype = "multipart/form-data">

 
    <label>Select Image File:</label>
	<input type = "text" name = "sender" placeholder = "enter the receiver">
	<input type = "text" name = "topic" placeholder = "enter the topics">
    <input type="file" name="image">
    <input type="submit" name="submit" value="Upload">
    <p>please be patient while image is loading</p>
</form>








<html>
<head>
