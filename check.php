<?php
$conn = oci_connect("system", "system", "localhost/XE");
if (!$conn) {

$m = oci_error();

echo $m['message'], "\n";

exit;

}
else{
     $u=$_REQUEST['Username'];
     echo $u;
}
?>

<!-- $sql = 'BEGIN procedureName(:param1, :param2); END;';
$stmt_id = oci_parse($connection, $sql);
oci_bind_by_name($stmt_id, ':param1', $value1);
oci_bind_by_name($stmt_id, ':param2', $value2);
oci_execute($stmt_id); -->