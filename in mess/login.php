<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>login</title>
</head>

<body>
<?php
$name=$_POST['name'];
   $pass=$_POST['password'];
  

 include "config.php";


$result = mysqli_query($conn,"SELECT * FROM user
WHERE username='$name' and password='$pass'");



$row = mysqli_fetch_array($result);

if($row==""){
	
	
	  echo "   <script>
					        
                            setTimeout(function(){window.location.href='index.php';},0);
							alert ('Wrong account or password！');
							
							
                    </script>";
					
					
	  
	}
  else{
	 
	  
	  session_start();
// store session data
$_SESSION['name']=$row['username'];
	  
	   echo "   <script>
					        
                            setTimeout(function(){window.location.href='Week.php';},0);
                    </script>";
	  
	  
	  
	  
	  
	  }
  





















?>
</body>
</html>