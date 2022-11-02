<?php
 $conn = oci_connect("system", "system", "localhost/XE");
 if (!$conn) {

 $m = oci_error();

 echo $m['message'], "\n";

 exit;

 }
 else{
    $u=$_REQUEST['Username'];
    $sql = "SELECT highest_percentile as highp, average_percentile as avgp from comparison where username='$u'";
    $stmt_id = oci_parse($conn, $sql);
    oci_execute($stmt_id);

    $data=array();

    while($row1 = oci_fetch_array($stmt_id)){
            $data[]=$row1;
        }

     print json_encode($data);

    }
?>