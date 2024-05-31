<?php

return [
    // Dashboard
    '/' => ['Dashboard', 'index'],

    // SPP
    '/spp' => ['Spp', 'index'],
    '/spp/tambah' => ['Spp', 'tambah'],
    '/spp/ubah/{id}' => ['Spp', 'ubah'],
    '/spp/hapus/{id}' => ['Spp', 'hapus'],

    // Jurusan
    '/jurusan' => ['Jurusan', 'index'],
    '/jurusan/tambah' => ['Jurusan', 'tambah'],
    '/jurusan/ubah/{id}' => ['Jurusan', 'ubah'],
    '/jurusan/hapus/{id}' => ['Jurusan', 'hapus'],

    // Kelas
    '/kelas' => ['Kelas', 'index'],
    '/kelas/tambah' => ['Kelas', 'tambah'],
    '/kelas/ubah/{id}' => ['Kelas', 'ubah'],
    '/kelas/hapus/{id}' => ['Kelas', 'hapus'],

    // auth
    '/auth/login' => ['Auth',  'login'],
    '/auth/ubah-password' => ['Auth',  'ubahPassword'],
];
