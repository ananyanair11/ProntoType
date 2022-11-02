
<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
    <link rel="stylesheet" href="login2.css">
  </head>
<body>
    <h1 id="verybig">PRONTOTYPE</h1>
    <div id="example">
    <h3 id="notsobig">Please Sign in</h3>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
 <p id="whitey"> Username:<input type="text" name="Username"></p>
  <p id="whitey">Password: <input type="password" name="Password"></p><br>
  <input type="submit">
</form>
</div>

<?php
 $conn = oci_connect("system", "system", "localhost/XE");
 if (!$conn) {

 $m = oci_error();

 echo $m['message'], "\n";

 exit;

 }
 else{
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $name = $_POST['Username'];
    $_SESSION['usr']=$name;
    $pass = $_POST['Password'];
    if (empty($name)) {
        echo "username is empty";
    }
    else if (empty($pass)) {
        echo "password is empty";
    }
    else {
      button1($conn, $name, $pass);
    }
  }
 }
 function button1($conn, $name, $pass){
  $s = oci_parse($conn, "SELECT username FROM CREDENTIALS where username='$name' and password='$pass'");
            oci_execute($s);
            $row = oci_fetch_all($s, $res);
            if($row){
              header("Location: http://localhost/connection/ProntoType/index.html?Username=$name");
            }
            else{
                echo "Wrong username or password";
            }

 }
?>
</body>
</html>