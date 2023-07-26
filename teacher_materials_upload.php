<?php 
session_start();
if(isset($_POST['submit'])){
	$unit = $_POST['unit'];
	$branch = $_POST['branch'];
	$subject = $_POST['subject'];
	$topic = $_POST['topic'];
	
	
	$db = mysqli_connect("localhost","id18827540_vignanletters","Surya@laxmi0056","viglet") or die("unable to connect");
$sql = "select count(id)  AS co from materials";
$as = mysqli_query($db,$sql);
$result = mysqli_fetch_assoc($as);
$a =  $result['co']+1;
$a = "bv".(string)$a;  

	
	$img = $_FILES['images']['name'];
	$img_loc = $_FILES['images']['tmp_name'];
	$img_folder = "images/";
	$gh = substr($img,-4,4);
	if(substr($img,-1) == 'x'){
		$path = $a.".".$gh;
	} else {
		$path = $a.$gh;
	
	}
	
	$lecturer_name = $_SESSION['uname'];
	echo $unit;
	echo $branch;
	echo $subject;
	echo $topic;
	echo $lecturer_name;
	if(move_uploaded_file($img_loc,"materials/".$path)){
		echo "success";
		$sqll = "insert into materials (unit_name,topics,location,lecturer_name,branch,subject_name)VALUES ('$unit','$topic','$path','$lecturer_name','$branch','$subject')";
$qwer = mysqli_query($db,$sqll);
if($qwer){
	echo "success";
} else {
	echo "failure";
}
	} else {
		echo "failure";
	}
}
?>
<!--<form method = "post" enctype = "multipart/form-data">
<input type = "file" name = "images">
<input type = "submit" name  = "submit">
</form>-->




<!--

<form method = "POST" action = "" enctype = "multipart/form-data">

 
    <label>Select Image File:</label>
	<input type = "text" name = "unit" placeholder = "enter the unit number">
	<input type = "text" name = "topic" placeholder = "enter the topics">
	<input type = "text" name = "branch" placeholder = "enter the branch">
	<input type = "text" name = "subject" placeholder = "enter the subject name">
	
    <input type="file" name="images">
    <input type="submit" name="submit" value="Upload">
  
</form>

-->









<html>
<head>
<style>
body {
        background-color: #F3EBF6;
        font-family: 'Ubuntu', sans-serif;
    }
    
    .main {
        background-color: #FFFFFF;
        width: 400px;
        height: 400px;
        margin: 7em auto;
        border-radius: 1.5em;
        box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
    }
    
    .sign {
        padding-top: 40px;
        color: #8C55AA;
        font-family: 'Ubuntu', sans-serif;
        font-weight: bold;
        font-size: 23px;
    }
    
    .un {
    width: 76%;
    color: rgb(38, 50, 56);
    font-weight: 700;
    font-size: 14px;
    letter-spacing: 1px;
    background: rgba(136, 126, 126, 0.04);
    padding: 10px 20px;
    border: none;
    border-radius: 20px;
    outline: none;
    box-sizing: border-box;
    border: 2px solid rgba(0, 0, 0, 0.02);
    margin-bottom: 50px;
    margin-left: 46px;
    text-align: center;
    margin-bottom: 27px;
    font-family: 'Ubuntu', sans-serif;
    }
    
    form.form1 {
        padding-top: 10px;
    }
    
    .pass {
            width: 76%;
    color: rgb(38, 50, 56);
    font-weight: 700;
    font-size: 14px;
    letter-spacing: 1px;
    background: rgba(136, 126, 126, 0.04);
    padding: 10px 20px;
    border: none;
    border-radius: 20px;
    outline: none;
    box-sizing: border-box;
    border: 2px solid rgba(0, 0, 0, 0.02);
    margin-bottom: 50px;
    margin-left: 46px;
    text-align: center;
    margin-bottom: 27px;
    font-family: 'Ubuntu', sans-serif;
    }
    
   
    .un:focus, .pass:focus {
        border: 2px solid rgba(0, 0, 0, 0.18) !important;
        
    }
    
    .submit {
      cursor: pointer;
        border-radius: 5em;
        color: #fff;
        background: linear-gradient(to right, #9C27B0, #E040FB);
        border: 0;
        padding-left: 40px;
        padding-right: 40px;
        padding-bottom: 13px;
        padding-top: 13px;
        font-family: 'Ubuntu', sans-serif;
        margin-left: 35%;
        font-size: 17px;
        box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);
    }
    .hello{
        cursor: pointer;
        border-radius: 5em;
        color: #fff;
        background: linear-gradient(to right, #9C27B0, #E040FB);
        border: 0;
        padding-left: 40px;
        padding-right: 40px;
        padding-bottom: 10px;
        padding-top: 10px;
        font-family: 'Ubuntu', sans-serif;
        margin-left: 25%;
        font-size: 14px;
        box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);
    }
    
    .forgot {
        text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
        color: #E1BEE7;
        padding-top: 10px;
    
    }
    
    a {
        text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
        color: #E1BEE7;
        text-decoration: none
    }
 
    @media (max-width: 600px) {
        .main {
            border-radius: 0px;
        }

</style>
</head>
<body>
<html>

<head>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <title>Sign in</title>
</head>

<body>
  <div class="main">
    <p class="sign" align="center">Sign in</p>
    <form class="form1" method = "POST" enctype = "multipart/form-data">
      <input class="un " type="text" align="center" placeholder="Enter the unit number" name = "unit">
      <input class="pass" type="text" align="center" placeholder="topic" name = "topic">
	       <input class="un " type="text" align="center" placeholder="Enter the subject number" name = "subject">
      <input class="pass" type="text" align="center" placeholder="branch" name = "branch">
	  <input type = "file" name = "images" value = "upload" align = "center" class = "pass">


      <input type = "submit" class = "submit" align = "center" name = "submit" value = "Login">
      
            
                
    </div>
     
</body>

</html>
</body>

</html>