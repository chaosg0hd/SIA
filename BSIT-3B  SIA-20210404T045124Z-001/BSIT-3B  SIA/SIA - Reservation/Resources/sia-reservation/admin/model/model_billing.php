<?php 

class Data_room {
 
    function __construct(){
        
    }
    
    function get_billing($con){
        $q = "select * from tblbilling where status='Confirmed'";
        $r = $con->query($q);
        return $r;
    }
    function get_paid($con){
        $q = "select * from tblbilling where status='Paid'";
        $r = $con->query($q);
        return $r;
    }

    function get_room_byID($id, $con){
        $q = "select * from tblroom where id=$id";
        $r = $con->query($q);
        $result = $r->fetch_object()->name;
        return $result;
    }
    
    function get_reservation($id,$con){
        $q = "select * from tblreservation where id=$id";
        $r = $con->query($q)->fetch_object();
        $room = $this->get_room_byID($r->roomID,$con);
        $name = $this->get_customer_byID($r->customerID,$con);
        $dateFrom = date('M d, Y',strtotime($r->dateFrom));
        $dateTo = date('M d, Y',strtotime($r->dateTo));
        $result = 'Room: '.$room.'<br>Customer: '.$name.'<br>'.$dateFrom.'-'.$dateTo;
        return $result;
    }
    
    function get_customer_byID($id,$con){
        $q = "select * from tblcustomer where id=$id";
        $r = $con->query($q)->fetch_object();
        $fullname = $r->fname.' '.$r->lname;
        return $fullname;
    }

    function delete_multiple($ids,$con){
        $i = count($ids);
        for($c=0; $c < $i; $c++){
            $id = $ids[$c];
            $this->check_room($id,$con);
            $q = "delete from tblreservation where id=$id";
            $con->query($q);
            $q = "delete from tblbilling where reservationid=$id";
            $con->query($q);
            
        }
    }
    function update($post,$con){
        $reservationID = $post['reservationID'];
        $dateFrom = $post['dateFrom'];
        $roomID = $post['roomID']!=0 ? $post['roomID']:$post['roomTMP'];
        $dateTo = $post['dateTo'];
        $num_pax = $post['num_pax'];
        $billingID = $post['billingID'];
        $discount = $post['discount'];

        $tmp = strtotime($dateFrom);
        $dateF = date('Y-m-d',$tmp);
        $dateFrom = date_create($dateF);

        $tmp = strtotime($dateTo);
        $dateT = date('Y-m-d',$tmp);
        $dateTo = date_create($dateT);
        $num_night = date_diff($dateFrom,$dateTo);    
        $night = $num_night->format('%d'); 
        $roomrate = $con->query("select * from tblroom where id=$roomID")->fetch_object()->rate;   
        
        $q = "update tblreservation set 
                roomID = $roomID,
                dateTo = '$dateT'
            where id=$reservationID";
        $con->query($q);
        $q = "update tblbilling set
                roomrate = $roomrate,
                num_night = $night,
                num_pax = '$num_pax',
                discount = $discount
            where reservationID = $reservationID";
        $con->query($q);
        if($post['roomID']!=0){
            $roomTMP = $post['roomTMP'];
            $con->query("update tblroom set status=1 where id=$roomTMP");
            $con->query("update tblroom set status=3 where id=$roomID");
        }
        $id = $post['billingID'];
        $this->calculate($id,$con);
        
    }
    
    function update_addon($post,$con){
        $id = $post['billingID'];  
        $name = $post['name'];  
        $rate = $post['rate'];  
        $con->query("insert into tblothers values(null,$id,'$name','$rate')");
        $others = $con->query("select * from tblbilling where id=$id")->fetch_object()->others;
        $others = $others + $rate;
        $con->query("update tblbilling set others='$others' where id=$id");
        $this->calculate($id,$con);
    }
    
    function get_addon($id,$con){
        return $con->query("select * from tblothers where billingID=$id");   
    }
    function update_discount($post,$con){
        $discount = $post['discount'];
        $id = $post['billingID'];
        $q = "update tblbilling set discount=$discount where id=$id";
        $con->query($q);
        $this->calculate($id,$con);   
    }

    function update_checkout($post,$con){
        $id = $post['billingID'];
        $q = "update tblreservation set dateFrom = '0000-00-00', dateTo = '0000-00-00' where id=$id";
        $con->query($q);
        $this->calculate($id,$con);   
    }
    
    function update_payment($post,$con){
        $id = $post['billingID'];
        $q = "update tblbilling set status='Paid' where id=$id";
        $con->query($q);    
        $q = "SELECT tblroom.id FROM tblbilling LEFT JOIN tblreservation on tblbilling.reservationID=tblreservation.id left JOIN tblroom on tblreservation.roomID=tblroom.id WHERE tblbilling.id=$id";
    }
    
    function update_night($post,$con){
        $id = $post['billingID'];
        $num_night = $post['num_night'];
        $q = "update tblbilling set num_night=$num_night where id=$id";
        $con->query($q);
        $this->calculate($id,$con);
    }
    
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
    }
    
    function check_room($id,$con){
        $q = "select * from tblreservation where id=$id";   
        $roomID = $con->query($q)->fetch_object()->roomID;
        $q = "select * from tblreservation where roomID=$roomID";
        $r = $con->query($q);
        if($r->num_rows == 1){
            $q = "update tblroom set status=1 where id=$roomID";   
            $con->query($q);
        }
    }
    
}
?>