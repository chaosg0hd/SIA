<?php
    $count = $_POST['count'];
    include('../../conn.php');
    if($count=='reservation'){
        $q = "select * from  tblbilling where status='Pending'";   
        $r = $con->query($q);
        echo $r->num_rows;
    }else if($count=='billing'){
        $q = "select * from  tblbilling where status='Confirmed'";   
        $r = $con->query($q);
        echo $r->num_rows;
    }else if($count=='customer'){
        $q = "select * from  tblcustomer where status=0";   
        $r = $con->query($q);
        echo $r->num_rows;
    }
?>