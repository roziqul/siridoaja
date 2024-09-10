<?php
$data = 
[
    'SELOPURO',
    'WLINGI',
    'SELOREJO',
    'KANIGORO'
];

header('Content-Type: application/json; charset=utf-8');
echo json_encode($data);