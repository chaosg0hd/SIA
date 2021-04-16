<?php 

class Data_customer {
 
    function __construct(){
        
    }
    
    function get_customers($con){
        $q = "select * from tblcustomer";
        $r = $con->query($q);
        return $r;
    }
 
    function get_customer_byfilter($filter,$con){
        $q = "select * from tblcustomer where status=$filter";
        $r = $con->query($q);
        return $r;
    }
    
    function activate_customer($id,$con){
        $q = "update tblcustomer set
                status=1
            where id=$id";
        $con->query($q);
    }
    
    function deactivate_customer($id,$con){
        $q = "update tblcustomer set
                status=0
            where id=$id";
        $con->query($q);
    }
    
    function get_customer_byID($id, $con){
        $q = "select * from tblcustomer where id=$id";
        $r = $con->query($q);
        $result = $r->fetch_object();
        return $result;
    }
    
    
    function update_customer($id,$post,$con){
        $fname = $post['fname'];
        $mname = $post['mname'];
        $lname = $post['lname'];
        $address = $post['address'];
        $contact = $post['contact'];
        $email = $post['email'];
        $company = $post['company'];
        $designation = $post['designation'];
        $dob = $post['dob'];
        $username = $post['username'];
        $password = $post['password'];
        $q = "update tblcustomer set
                fname = '$fname',
                mname = '$mname',
                lname = '$lname',
                address = '$address',
                contact = '$contact',
                email = '$email',
                company = '$company',
                designation = '$designation',
                dob = '$dob',
                username = '$username '
            where id=$id";
        $con->query($q);
        if($password!=null){
            $new = sha1($password);
            $con->query("update tblcustomer set password='$new' where id=$id");   
        }
    }
    
    
    
    function delete_multiple($ids,$con){
        $i = count($ids);
        for($c=0; $c < $i; $c++){
            $id = $ids[$c];
            $q = "delete from tblcustomer where id=$id";
            $con->query($q);
        }
    }
    
}
?>