<?php
session_start();
$conn = oci_connect("system", "system", "localhost/XE");
if (!$conn) {

$m = oci_error();

echo $m['message'], "\n";

exit;

}
else{
$u = $_REQUEST['Username'];
$w = $_REQUEST['wpm'];
$a = $_REQUEST['accuracy'];
$s = $_REQUEST['score'];
// echo "done";
// echo $q;
// echo "in php";
echo "inserting";
$str = oci_parse($conn, "INSERT INTO ANALYTICS values('$u','$w','$a','$s')");
oci_execute($str);
}

?>