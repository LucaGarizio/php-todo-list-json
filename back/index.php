<?php

    header("Content-Type: application/json");
    header("Access-Control-Allow-Headers: X-Requested-With");
    header("Access-Control-Allow-Origin: http://localhost:5173");

    $task = [
        [
            'todo' => 'Fare i compiti'
        ],
        [
            'todo' => 'Fare la spesa'
        ],
        [
            'todo' => 'Studiare'
        ],
        [
            'todo' => 'Fare i compiti'
        ],
        [
            'todo' => 'Fare palestra'
        ],
        
        [
            'todo' => 'Fare aperitivo'
        ],
    ];

    $task = json_encode($task);
    file_put_contents("task.json", $task);
    echo $task;