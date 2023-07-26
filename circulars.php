<html>
<head>

<style>
.logo{
	width:400px;
}

.ima {
	width:400px;
	height:500px;
}


  
</style>
</head>

<body>

<img class = "logo" src = "collegelogo.jpg">


</body
</html>


<?php
session_start();
$db = mysqli_connect("localhost","id18827540_vignanletters","Surya@laxmi0056","viglet") or die("unable to connect");
$all = "all";
$branch = $_SESSION['branch'];

$year = $_SESSION['year'];
$year_regulation = $year.$branch;
$sql = "select * from circulars where receiver = '$all' or receiver = '$branch' or receiver = '$year_regulation' ORDER BY ID DESC";
$ws = mysqli_query($db,$sql);
while($row = mysqli_fetch_array($ws)){

?> <div class = "hell" ><h5><span style = "color:red"><?php echo $row['topic'];?></span></h5>
<?php $rew = "images/".$row['location'];?>

<img class = "ima" src = <?php echo $rew; ?> >
<h5><span style = "color:red" ><?php echo $row['timestamp'];?></span></h5>
</div><hr>
<hr>
<?php

echo "<br>";

}





?>
