<?php

return [
    // Dashboard
    '/' => ['Dashboard', 'index'],

    // Siswa
    '/siswa' => ['Siswa', 'index'],
    '/siswa/tambah' => ['Siswa', 'tambah'],
    '/siswa/ubah/{nis}' => ['Siswa', 'ubah'],
    '/siswa/hapus/{nis}' => ['Siswa', 'hapus'],

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

    // pembayaran
    '/laporan-pembayaran' => ['Pembayaran', 'index'],

    // auth
    '/auth/login' => ['Auth',  'login'],
    '/auth/logout' => ['Auth', 'logout'],
    '/auth/ubah-password' => ['Auth',  'ubahPassword'],
];
