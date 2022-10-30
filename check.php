<?php
$conn = oci_connect("system", "system", "localhost/XE");
if (!$conn) {

$m = oci_error();

echo $m['message'], "\n";

exit;

}
else{
     $u='kmayur16';
     $w=54;
     $a=97;
     $sc=75.5;
     $sql = 'BEGIN insertData(:usr, :wpm, :acc, :score); END;';
    // //$s = oci_parse($conn, "exec insertData(77)");
     $stmt_id = oci_parse($conn, $sql);
     oci_bind_by_name($stmt_id, ':usr', $u);
     oci_bind_by_name($stmt_id, ':wpm', $w);
     oci_bind_by_name($stmt_id, ':acc', $a);
     oci_bind_by_name($stmt_id, ':score', $sc);
    // //oci_execute($s);
     oci_execute($stmt_id);
}
?>

<!-- $sql = 'BEGIN procedureName(:param1, :param2); END;';
$stmt_id = oci_parse($connection, $sql);
oci_bind_by_name($stmt_id, ':param1', $value1);
oci_bind_by_name($stmt_id, ':param2', $value2);
oci_execute($stmt_id); -->