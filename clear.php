<?php
include("config.php");
session_start();

$query = "DELETE FROM tasks";
    if(mysqli_query($db, $query)){
        $result = $db -> query("SELECT id, name,IF(complete, 'true', 'false') complete FROM tasks");
   
        $outp = "";
        while($rsts = $result->fetch_array(MYSQLI_ASSOC)) {
            //starts next line
            if($outp != "") {$outp .= ",";}
            $outp .= '{"task_name":"' . $rsts["name"] . '",';
            $outp .= '"indx":"' . $rsts["id"] . '",';
            $outp .= '"complete":"' . $rsts["complete"] . '"}';
        }
        $outp ='{"tasks": [' . $outp . ']}';
        
   
        
        echo($result);
        echo($outp);
        $db->close();
    }
    else{
        echo(die(mysqli_error($db)));
        $db->close();
    }
?>
