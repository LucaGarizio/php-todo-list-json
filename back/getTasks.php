<?php
    header("Content-Type: application/json");
    header("Access-Control-Allow-Headers: X-Requested-With");
    header("Access-Control-Allow-Origin: http://localhost:5173");

    
    $jsonTasks = file_get_contents("tasks.json");
    echo $jsonTasks;
?>
