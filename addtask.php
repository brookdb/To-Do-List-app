<?php
include("config.php");
session_start();

$data = json_decode(file_get_contents("php://input"));
if(count($data) > 0)
{
    $task_name = mysqli_real_escape_string($db, $data->task_name);
    $complete = ($data->complete);
    $query = "INSERT INTO tasks(name, complete) VALUES ('$task_name', '$complete')";
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
        $outp ='{"tasks": [' . $outp . ']}';;
   
        $db->close();
        echo($outp);
    }
    else{
        echo(die(mysqli_error($db)));
        $db->close();
    }
    
}
?>