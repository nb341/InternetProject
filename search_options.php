<?php
  $search = $_POST['Search_Options'];
if( isset( $_POST['Search_Options'] ) ) {
            if(htmlspecialchars($_POST['Search_Options'])=='Time_Frame'){
              unset($_POST['Search_Options']);
               header("Location:search_by_timestamp.php");
            }
            else if(htmlspecialchars($_POST['Search_Options'])=='Location'){
              unset($_POST['Search_Options']);
               header("Location:search_by_locations.php");
            }
            else{
              unset($_POST['Search_Options']);
              header("Location:search_disasters.php");
            }
 }else {
   unset($_POST['Search_Options']);
   header("Location:Notices.php");

 }
?>
