<?php

$data = [
    'subyek' => [
        'nama_wp' => 'MR. AA MARAMIS',
        'alamat_wp' => 'DEN HAAG',
        'blok_wp' => '-',
        'rt_wp' => '03',
        'rw_wp' => '04',
        'kel_wp' => 'DEN HAAG DIST',
        'kota_wp' => 'BELANDA',
    ],
    'obyek' => [
        'alamat_op' => 'WLINGI',
        'persil_op' => '000077',
        'rt_op' => '03',
        'rw_op' => '04',
        'kel_op' => 'PANDEAN',
        'kec_op' => 'WLINGI',
        'bumi_op' => '320000',
        'bang_op' => '1200'
    ]
];

header('Content-Type: application/json; charset=utf-8');
echo json_encode($data);