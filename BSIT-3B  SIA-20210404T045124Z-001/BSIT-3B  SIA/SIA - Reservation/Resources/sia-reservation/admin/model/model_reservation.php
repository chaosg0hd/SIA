<?php 

class Data_room {
 
    function __construct(){
        
    }
    
    function get_reservation($con){
        $q = "SELECT * FROM tblreservation 
                LEFT JOIN tblbilling on tblreservation.id = tblbilling.reservationID
                WHERE tblbilling.status='Pending'
                ORDER BY tblreservation.dateFrom ASC;";
        $r = $con->query($q);
        return $r;
    }
    
    function get_status($id,$con){
        $q = "select * from tblbilling where reservationID=$id";
        $r = $con->query($q);
        return $r->fetch_object()->status;
    }
    
    function get_images($id,$con){
        $q = "select * from tblroompicture where roomID=$id";
        $r = $con->query($q);
        return $r;
    }

    function get_room_byID($id, $con){
        $q = "select * from tblroom where id=$id";
        $r = $con->query($q);
        $result = $r->fetch_object()->name;
        return $result;
    }
    
    function get_customer_byID($id,$con){
        $q = "select * from tblcustomer where id=$id";
        $r = $con->query($q)->fetch_object();
        $fullname = $r->fname.' '.$r->lname;
        return $fullname;
    }
    
    function get_room_type($con){
        $q = "select * from tblroomtype order by name asc";
        $r = $con->query($q);
        return $r;
    }
    
    function update_reservation($id,$post,$con){
        
    }

    function delete_multiple($ids,$con){
        $i = count($ids);
        for($c=0; $c < $i; $c++){
            $id = $ids[$c];
            $payment = $con->query("select * from tblbilling where reservationid=$id and status!='Paid'");
            if($payment->num_rows > 0){
                $this->check_room($id,$con);
                $q = "delete from tblreservation where id=$id";
                $con->query($q);
                $q = "delete from tblbilling where reservationid=$id";
                $con->query($q);
            }
            
        }
    }
    
    function confirm_reservation($ids,$con){
        $i = count($ids);
        for($c=0; $c < $i; $c++){
            $id = $ids[$c];
            $q = "update tblbilling set status='Confirmed' where reservationid=$id"; 
            $con->query($q);
            $con->query("insert into tblarrival values(null,$id)");

            $q = "select * from tblreservation where id=$id";   
            $roomID = $con->query($q)->fetch_object()->roomID;
            $q = "select * from tblreservation where roomID=$roomID";
            $r = $con->query($q);
            if($r->num_rows == 1){
                $q = "update tblroom set status=0 where id=$roomID";   
                $con->query($q);
            }
        }
    }
    
    function get_type_name($id,$con){
        $q = "select * from tblroomtype where id=$id";
        $r = $con->query($q);
        $row = $r->fetch_object();
        return $row;
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