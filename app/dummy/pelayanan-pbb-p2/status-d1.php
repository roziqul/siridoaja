<?php

$data = [
    'pemohon' => [
        'nama' => 'ISTIKHOMAH',
        'alamat' => 'BENCE-GARUM',
        'alamat_obj' => 'DARUNGAN-KADEMANGAN',
        'kel' => 'DARUNGAN',
        'kec' => 'KADEMANGAN',
        'keperluan' => 'SK NJOP (082330237909 MBAK IIS)',
        'kategori' => 'SALINAN SPPT/SKP'
    ],
    'pelayanan' => [
        'no_surat' => '021',
        'tgl' => '4 Januari 2024',
        'berkas_masuk' => '4 Januari 2024',
        'no_sp_kantor' => '-',
        'tgl_sp_kantor' => '-',
        'no_sp_lap' => '-',
        'tgl_sp_lap' => '-',
        'no_lhp' => '-',
        'tgl_lhp' => '-',
        'no_sk' => '-',
        'tgl_sk' => '-',
    ]
];

header('Content-Type: application/json; charset=utf-8');
echo json_encode($data);