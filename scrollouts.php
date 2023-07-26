<?php
session_start();
$db = mysqli_connect("localhost","id18827540_vignanletters","Surya@laxmi0056","viglet") or die("unable to connect");
if(isset($_POST['submit'])) {
	$user = $_POST['username'];
	$password = $_POST['password'];
	if(!empty($user) && !empty($password)){
	if(strlen($user)>9){
	 $lo = substr($user,0,2);
    $lp = substr($user,6,2);
	} else {
		$lo= "20";
		$lp = "78";
	}
	
    if($lp == '01'){
        $branch = "civil";
    } else if($lp == '02'){
        $branch = "eee";
    } else if($lp == '03'){
        $branch = "mech";
    } else if($lp == '04'){
        $branch = "ece";
    } else if($lp == '05'){
        $branch = "cse";
    } 
    else {
        $branch = "it";
    }
    $abcd = "r".$lo."_".$branch."_student_details";
	$query = "SELECT * FROM $abcd  where username = '$user' and password = '$password'";
	$result = mysqli_query($db,$query);
	$count = mysqli_num_rows($result);
	if ($count > 0) { 
        $_SESSION['branch'] = $branch;
        $_SESSION['year'] = $lo;
	
	echo $user;
    echo $password;
echo "correct";

	header("location:main_student.php");
	 
	} else {
		//echo "<h7><span style = color:red>bad creditals";
        $que = "SELECT * FROM  lecturers where username = '$user' and password = '$password'";
        $abc = mysqli_query($db,$que);
        $co = mysqli_num_rows($abc);
        if($co > 0){
			$_SESSION['uname'] = $user;
            header("location:teacher_panel.php");
			echo "success teachers";
        } else {
            echo "<h7><span style = color:red>bad creditals";
        } 
		
	}

} else {
echo "all fields are required";
}	
}






?>
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
        padding-top: 40px;
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
    <form class="form1" method = "POST">
      <input class="un " type="text" align="center" placeholder="Enter your Username" name = "username">
      <input class="pass" type="password" align="center" placeholder="Password" name = "password">


      <input type = "submit" class = "submit" align = "center" name = "submit" value = "Login">
      
            
                
    </div>
     
</body>

</html>
</body>

</html>