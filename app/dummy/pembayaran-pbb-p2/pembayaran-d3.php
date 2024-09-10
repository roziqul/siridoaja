<?php

$data = [
    [
        'SELOPURO',
        '2024',
        '900.000',
    ],
    [
        'WLINGI',
        '2023',
        '1.500.000',
    ],
    [
        'WLINGI',
        '2023',
        '600.000',
    ],
];

header('Content-Type: application/json; charset=utf-8');
echo json_encode($data);