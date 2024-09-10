<?php
$data = 
[
    'KELURAHAN 01',
    'KELURAHAN 02',
    'KELURAHAN 03',
    'KELURAHAN 04'
];

header('Content-Type: application/json; charset=utf-8');
echo json_encode($data);