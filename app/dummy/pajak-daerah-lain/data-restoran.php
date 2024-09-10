<?php

$data = [
    [
        '01-01-2024',
        '350511231312312',
        'JOHN DOE',
        'CV. MAMAT GUNSHOP',
        '350511231312312',
        'MALANG, JAWA TIMUR, INDONESIA',
        'PANDANLANDUNG',
        'WAGIR',
        '01-06-2023',
        '01-06-2024',
        '2.900.000',
        '10%',
        '290.000',
        '10',
        '2023'
    ],
    [
        '01-02-2024',
        '350511231312313',
        'JOHN DOE II',
        'CV. MAMAT GUNSHOP V2',
        '350511231312313',
        'MALANG, JAWA TIMUR, INDONESIA',
        'BANDULAN',
        'BANDULAN',
        '01-06-2023',
        '01-06-2024',
        '2.900.000',
        '10%',
        '290.000',
        '10',
        '2023'
    ],
    [
        '01-03-2024',
        '350511231312314',
        'JOHN DOE III',
        'CV. MAMAT GUNSHOP V3',
        '350511231312314',
        'MALANG, JAWA TIMUR, INDONESIA',
        'MERGAN',
        'SUKUN',
        '01-06-2023',
        '01-06-2024',
        '2.900.000',
        '10%',
        '290.000',
        '10',
        '2023'
    ]
];

header('Content-Type: application/json; charset=utf-8');
echo json_encode($data);