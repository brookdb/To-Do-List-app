<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

   include("config.php");
   session_start();
   //simple query to fetch tasks
   $result = $db -> query("SELECT id, name,IF(complete, 'true', 'false') complete FROM tasks");
   
   $outp = "";
   while($rsts = $result->fetch_array(MYSQLI_ASSOC)) {
    //starts next line
    if($outp != "") {$outp .= ",";}
    $outp .= '{"task_name":"' . $rsts["name"] . '",';
    $outp .= '"indx":"' . $rsts["id"] . '",';
    $outp .= '"complete":"' . $rsts["complete"] . '"}';
    
   }
   $outp ='{"tasks": [' . $outp . ']}';;
   
   $db->close();
   echo($outp);
?>