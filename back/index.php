<?php

    header("Content-Type: application/json");
    header("Access-Control-Allow-Headers: X-Requested-With");
    header("Access-Control-Allow-Origin: http://localhost:5174");

    $list = [
        [
            'todo' => 'Fare i compiti'
        ],
        [
            'todo' => 'Fare la spesa'
        ],
        [
            'todo' => 'Fare il bucato'
        ],
        [
            'todo' => 'Fare i compiti'
        ],
        [
            'todo' => 'Fare pulizia di casa'
        ],
        [
            'todo' => 'Fare le commissioni per i clienti'
        ],
        [
            'todo' => 'Fare visita alla nonna'
        ],
    ];

    $list = json_encode($list);
    file_put_contents("students.json", $list);
    echo $list;