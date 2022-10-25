<!DOCTYPE html>
<html>
	
<head>
	<title>
		LOGIN
	</title>
    <link rel="stylesheet" href="style.css">
</head>

<body style="text-align:center;">
	
	<h1>
		PLEASE LOGIN
	</h1>
	
	<!-- <h4>
		How to call PHP function
		on the click of a Button ?
	</h4> -->
    <div class="form-floating">
     <label for="floatingInput">Username</label>
     <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"> <input type="text" name="Username" > </form>
    </div>
    <div class="form-floating">
    <label for="floatingPassword">Password</label>  
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"> <input type="password" name="Password"> </form>
    
    </div>
    <form method="post"> <button name="submitBtn" value=NULL> Sign in</button> </form>
</head>
	
	<?php
         // Create connection to Oracle
    $conn = oci_connect("system", "system", "localhost/XE");
    if (!$conn) {
  
    $m = oci_error();
  
    echo $m['message'], "\n";
 
    exit;

    }
    else{
        // $userName = $_POST['Username'];
        // $passWord = $_POST['Password'];
        
		if(isset($_POST['submitBtn'])) {
          
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if (isset($_POST['Username']))
            {
                $userName = $_POST['Username'];
            } 
            else 
            {
            $userName = NULL;
            }
            if (isset($_POST['Password']))
            {
                $passWord = $_POST['Password'];
            } 
            else 
            {
            $passWord = NULL;
            }
        }
        button1($conn, $userName, $passWord);
            
          }
    }
          function button1($conn, $userName, $passWord) {
            $s = oci_parse($conn, "SELECT username FROM CREDENTIALS where username='$userName' and password='$passWord'");
            $res= oci_execute($s);
            $row = oci_fetch_all($s, $res);
            echo $row;
            echo $userName;
            if($row){
                header("Location: http://localhost/connection/ProntoType/index.html");
            }
            else{
                echo "Wrong username or password";
                echo $userName;
                echo $passWord;
            }
          }
          oci_close($conn);
	?>


</html>
