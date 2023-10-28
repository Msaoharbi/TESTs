<?php 
            require_once 'connection.php';
use Conn\Connection;

class ShowAll{
    static public function ShowAllM(){
        $conn = Connection::conn();
        $query1="select * from category";

        if(!$result1=mysqli_query($conn,$query1))
            die(mysqli_error($conn)); 
        while($row1=mysqli_fetch_assoc($result1)){
            echo "<br> <hr><hr>";
            $cname =$row1['name'];
                $cid =$row1['ID'];
                        echo'<h1 class="hed1"> '.$cname.' </h1>';
                                    
                    $query="select * from item Where categoryID='".$cid."'";
                     
            if(!$result=mysqli_query($conn,$query))
            die(mysqli_error($conn)); 
            while($row=mysqli_fetch_assoc($result)){
                $name =$row['name'];
                $desc =$row['description'];
                $logo =$row['logo'];
                $src='data:image/jpg;base64,'.base64_encode( $logo );
                $mid=$row['ID'];
                $ryear =$row['year'];
                $moviel =$row['language'];
                $du = $row['duration'];
                $movier =$row['rating'];
                $tr =$row['trailer'];
                      
                
                    echo'<a href="MovieInfo.php?mid='.$mid.'"> <span style="position: relative; left: 5%;"><img src="'.$src.'" width="300" height="400" alt="Click me to i can move you to the movies page "></span></a>
                    ' ;
            
        }
        }
    }
}