<?php 
namespace InsertMovie;
            require_once 'connection.php';
use Conn\Connection;

class InsertMovie{
    static public function InsertMovieCon(    $name,$desc,$cid,$logo,$ryear,$moviel,$du,$movier,$tr){

        

        $conn = Connection::conn();
if(isset($_FILES['logo']))
{
if( $_FILES['logo']['name'] != "" )
               {
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
            if(strpos(finfo_file($finfo, $_FILES['logo']['tmp_name']),"image")==0) {    
                    $logo =addslashes (file_get_contents($_FILES['logo']['tmp_name']));
               }
     }
}
         $query="INSERT INTO `item`( `name`, `logo`, `description`, `categoryID` ,`year`,`language`,`duration`, `rating`,`trailer`)  VALUES
         ('".addslashes($name)."','$logo','".addslashes($desc)."','$cid','$ryear','$moviel','$du','$movier','$tr')";
        
if(!mysqli_query($conn,$query)){
    die(mysqli_error($conn)); 
}

else{  

    return true;
}
    }
    
}