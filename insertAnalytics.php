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
echo "done";
// echo $q;
// echo "in php";
//echo "inserting";
// $str = oci_parse($conn, "INSERT INTO ANALYTICS values('$u','$w','$a','$s')");
// oci_execute($str);
$sql = 'BEGIN insertData(:usr, :wpm, :acc, :score); END;';
$stmt_id = oci_parse($conn, $sql);
oci_bind_by_name($stmt_id, ':usr', $u);
oci_bind_by_name($stmt_id, ':wpm', $w);
oci_bind_by_name($stmt_id, ':acc', $a);
oci_bind_by_name($stmt_id, ':score', $s);
oci_execute($stmt_id);

$sql1 = 'BEGIN updateProfile(:usrName); END;';
$stmt_id1 = oci_parse($conn, $sql1);
oci_bind_by_name($stmt_id1, ':usrName', $u);
oci_execute($stmt_id1);

$sql2 = 'BEGIN updateComparison(:userName); END;';
$stmt_id2 = oci_parse($conn, $sql2);
oci_bind_by_name($stmt_id2, ':userName', $u);
oci_execute($stmt_id2);

$sql3 = 'BEGIN updateLeaderboard(:un); END;';
$stmt_id3 = oci_parse($conn, $sql3);
oci_bind_by_name($stmt_id3, ':un', $u);
oci_execute($stmt_id3);

}

?>