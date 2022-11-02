<?php

    //header('Content-Type: application/json');

    $conn = oci_connect("system", "system", "localhost/XE");

    if (!$conn) {

        $m = oci_error();
        
        echo $m['message'], "\n";
        
        exit;
        
        }
        else{
            $sql = 'select count(*) as no, username from analytics group by username';
$stmt_id = oci_parse($conn, $sql);
oci_execute($stmt_id);

    $data=array();

    while($row1 = oci_fetch_array($stmt_id)){

    $data[]=$row1;
    }

     print json_encode($data);

        }

    // $graph=sprintf("SELECT count(pm.packagename) as quantity,pm.packagename

    //     FROM packagemenu pm

    //     INNER JOIN orderdetail od ON od.packageid=pm.packageid

    //     inner join orders o on o.orderid = od.orderid

    //     group by pm.packagename");

    //  $parse=oci_parse($conn,$graph);

    // oci_execute($parse);

    // $data=array();

    // while($row1 = oci_fetch_array($parse)){

    // $data[]=$row1;



    // }

    //  print json_encode($data);



    ?>