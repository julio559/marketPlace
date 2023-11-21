<?php  
if (!isset($_SESSION)) {
session_start();


}
if ( session_destroy() === true){
    header("location: ../../argon-dashboard-master/pages/sign-in.php");
}

?>



