<?php
    $id = $_POST['id'];
    include('../conn.php');
    $addon = $con->query("select * from tblothers where id=$id")->fetch_object();
    $rate = $addon->rate;
    $billingID = $addon->billingID;
    $others = $con->query("select * from tblbilling where id=$billingID")->fetch_object()->others;
    $others = $others - $rate;
    $con->query("update tblbilling set others='$others' where id=$billingID");
    $total = calculate($billingID,$con);
    echo number_format($total);
    $con->query("delete from tblothers where id=$id");

function calculate($id,$con){
    $q = "select * from tblbilling where id=$id";
    $r = $con->query($q)->fetch_object();
    $others = $r->others;
    $discount = $r->discount;
    $rate = $r->roomrate;
    $night = $r->num_night;
    $pax = $r->num_pax;
    if($pax==0){
        $pax = 1;   
    }       
    $total = (($rate * $night) * $pax) + $others;
    $less = ($discount / 100);
    $less = $total * $less;
    $total = $total - $less;
    $q = "update tblbilling set total=$total where id=$id";
    $con->query($q);
    return $total;
}
?>