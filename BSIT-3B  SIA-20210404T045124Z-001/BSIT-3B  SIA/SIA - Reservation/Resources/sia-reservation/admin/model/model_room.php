<?php 

class Data_room {
 
     function check_room($id,$con){
         $dateNow = date('Y-m-d');
        $q = "SELECT * FROM tblreservation
WHERE (tblreservation.dateFrom BETWEEN '$dateNow' and '$dateNow') or 
(tblreservation.dateTo BETWEEN '$dateNow' and '$dateNow');";
        $r = $con->query($q);
        if($r->num_rows == 0){
            $q = "update tblroom set status=1 where id=$id";   
            $con->query($q);
        }
    }
    
    function get_room($con){
        $q = "select * from tblroom";
        $r = $con->query($q);
        return $r;
    }
    
    function get_images($id,$con){
        $q = "select * from tblroompicture where roomID=$id";
        $r = $con->query($q);
        return $r;
    }
    
    function add_room($post,$files,$con){
        $name = $post['name'];
        $desc = $post['desc'];
        $type = $post['type'];
        $capacity = $post['capacity'];
        $rate = $post['rate'];
        $status = $post['status'];
        
        $q = "insert into tblroom values(
                null,
                '$name',
                '$desc',
                '$type',
                '$capacity',
                '$rate',
                '$status'
            )";
        $con->query($q);
        $last_id = $con->insert_id;
        $this->upload($files,$last_id,$con);
    }
    
    function upload($files,$id,$con){
        $upload_dir = $_SERVER['DOCUMENT_ROOT'] . "/hotel/admin/images/rooms/";
        $count = count($files['gallery']['name']);
        for($i=0 ; $i < $count ; $i++){
            $tmp = $files['gallery']['name'];
            $file = $tmp[$i];
            $gallery = $file;

            $tmp_name = $files['gallery']['tmp_name'][$i];
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            if($ext == 'JPG' || $ext == 'jpg' || $ext == 'JPEG' || $ext == 'jpeg')
            {
                //create thumb
                $src = $upload_dir.$gallery;
                $dest = $upload_dir.'thumbs/'.$gallery;
                $desired_width = 200;

                //move uploaded file to a directory
                
                move_uploaded_file($tmp_name,$src); 
                $q = "insert into tblroompicture values(
                            null,
                            $id,
                            '$file'
                        )";
                $con->query($q);
                $this->make_thumb($src, $dest, $desired_width);
            }
        }   
                
    }    
    
    function make_thumb($src, $dest, $desired_width) {
        /* read the source image */
        $source_image = imagecreatefromjpeg($src);
        $width = imagesx($source_image);
        $height = imagesy($source_image);

        /* find the "desired height" of this thumbnail, relative to the desired width  */
        $desired_height = floor($height * ($desired_width / $width));

        /* create a new, "virtual" image */
        $virtual_image = imagecreatetruecolor($desired_width, $desired_height);

        /* copy source image at a resized size */
        //imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);

        imagecopyresized($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);

        /* create the physical thumbnail image to its destination */
        imagejpeg($virtual_image, $dest);

    }
    
    function get_room_byID($id, $con){
        $q = "select * from tblroom where id=$id";
        $r = $con->query($q);
        $result = $r->fetch_object();
        return $result;
    }
    
    function get_room_type($con){
        $q = "select * from tblroomtype order by name asc";
        $r = $con->query($q);
        return $r;
    }
    
    function update_room($id,$post,$files,$con){
        $name = $post['name'];
        $desc = $post['desc'];
        $type = $post['type'];
        $capacity = $post['capacity'];
        $rate = $post['rate'];
        $status = $post['status']; 
        
        $q = "update tblroom set
                    name = '$name',
                    description = '$desc',
                    type = '$type',
                    capacity = '$capacity',
                    rate = '$rate',
                    status = '$status'
                where id=$id";
        $con->query($q);
        $this->upload($files,$id,$con);
    }
    
    function delete_room($id,$con){
        $q = "delete from tblroom where id=$id";
        $con->query($q);       
    }
    
    function delete_multiple($ids,$con){
        $i = count($ids);
        for($c=0; $c < $i; $c++){
            $id = $ids[$c];
            $q = "delete from tblroom where id=$id";
            $con->query($q);
        }
    }
    
    function delete_picture($id,$con){
        $q = "delete from tblroompicture where id=$id";
        $con->query($q);
    }
    
    function get_type_name($id,$con){
        $q = "select * from tblroomtype where id=$id";
        $r = $con->query($q);
        $row = $r->fetch_object();
        return $row;
    }
}
?>