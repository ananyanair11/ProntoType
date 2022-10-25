
<!DOCTYPE html>
<html>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  UserName: <input type="text" name="Username">
  Password: <input type="password" name="Password">
  <input type="submit">
</form>

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
                header("Location: http://localhost/connection/ProntoType/index.html");
            }
            else{
                echo "Wrong username or password";
            }

 }
?>

</body>
</html>