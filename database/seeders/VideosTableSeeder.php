<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VideosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('videos')->delete();
        
        \DB::table('videos')->insert(array (
            0 => 
            array (
                'id' => 1020,
                'judul' => 'Wujudkan Nusantara Land of Harmony Songsong Indonesia Feed the World 2045',
                'slug' => 'wujudkan-nusantara-land-of-harmony-songsong-indonesia-feed-the-world-2045',
                'id_youtube' => 'YMAw4LpB_oo',
                'cover' => 'OFiDYghsAsmwynEPDWRbrquSRU7p0mAQBsQ1yEw2.png',
                'created_at' => '2023-10-16 01:22:24',
                'updated_at' => '2023-10-16 01:27:20',
            ),
            1 => 
            array (
                'id' => 1021,
                'judul' => 'Tingkatkan Produktivitas dengan Bioteknologi',
                'slug' => 'tingkatkan-produktivitas-dengan-bioteknologi',
                'id_youtube' => '_v8BuEMLYSc',
                'cover' => '5rZNuwUvje3KM79JhE2UIzHk3TN2a7HUJjODxL8C.png',
                'created_at' => '2023-10-16 01:25:43',
                'updated_at' => '2023-10-16 01:26:32',
            ),
            2 => 
            array (
                'id' => 1022,
                'judul' => 'Mentan Tinjau Food Estate di Sumba Tengah',
                'slug' => 'mentan-tinjau-food-estate-di-sumba-tengah',
                'id_youtube' => 'FSGYGyK0MYI',
                'cover' => '0QlLm69uWGwmMkSXMz8BtfmvHd5PCMy5ywxXe2aD.jpg',
                'created_at' => '2023-11-15 11:11:22',
                'updated_at' => '2023-11-15 11:11:22',
            ),
            3 => 
            array (
                'id' => 1023,
                'judul' => 'Food Estate Sumba Tengah',
                'slug' => 'food-estate-sumba-tengah',
                'id_youtube' => 'ZTWN-YBXf9g',
                'cover' => 'GqxFCy0PjBybHwodMVM7xrTiZvBE81LxEJeYZWFf.jpg',
                'created_at' => '2023-11-15 11:12:47',
                'updated_at' => '2023-11-15 11:12:47',
            ),
            4 => 
            array (
                'id' => 1024,
                'judul' => 'Presiden Joko Widodo Tinjau Food Estate Sumba Tengah',
                'slug' => 'presiden-joko-widodo-tinjau-food-estate-sumba-tengah',
                'id_youtube' => '_eI3zzuDjYA',
                'cover' => 'nm9Nlrui4WeC4jx2kP9eqiweFtyMhGD6CTa2uOQr.jpg',
                'created_at' => '2023-11-15 11:14:27',
                'updated_at' => '2023-11-15 11:14:27',
            ),
            5 => 
            array (
                'id' => 1025,
                'judul' => 'Progress Food Estate Sumba Tengah',
                'slug' => 'progress-food-estate-sumba-tengah',
                'id_youtube' => 'nF3F_sylVQY',
                'cover' => 'AitwyQvRaU6zqXdBCJJjDSRxI9iEIPSqzPv3wusf.jpg',
                'created_at' => '2023-11-15 11:15:44',
                'updated_at' => '2023-11-15 11:15:44',
            ),
            6 => 
            array (
                'id' => 1026,
                'judul' => 'Integrated Farming di Kabupaten Karanganyar   Jawa Tengah',
                'slug' => 'integrated-farming-di-kabupaten-karanganyar-jawa-tengah',
                'id_youtube' => 'xJL1ThXJcJY',
                'cover' => 'TDXvmiGjRtSH2r6gs4j10eVEwllo3E00jMa5xDjb.jpg',
                'created_at' => '2023-11-15 11:18:10',
                'updated_at' => '2023-11-15 11:18:10',
            ),
            7 => 
            array (
                'id' => 1027,
                'judul' => 'Boyolali Siap Mengembangkan Integrated Farming',
                'slug' => 'boyolali-siap-mengembangkan-integrated-farming',
                'id_youtube' => '9VFBQL1VLoM',
                'cover' => 'sebSfD0GCedfd6o7XTlFmzDGdkuS8HVS3YZqZR1o.jpg',
                'created_at' => '2023-11-15 11:23:41',
                'updated_at' => '2023-11-15 11:23:41',
            ),
            8 => 
            array (
                'id' => 1028,
                'judul' => 'OPIP/IP400 di Kabupaten Brebes Jawa Tengah',
                'slug' => 'opipip400-di-kabupaten-brebes-jawa-tengah',
                'id_youtube' => 'PakBSze3gws',
                'cover' => 'osp4IOi0Q04mTq9dWpBmHOddA5h9gS5J3cpEmlQQ.jpg',
                'created_at' => '2023-11-15 11:25:12',
                'updated_at' => '2023-11-15 11:25:12',
            ),
            9 => 
            array (
                'id' => 1029,
                'judul' => 'Korporasi Petani Jagung Hibrida',
                'slug' => 'korporasi-petani-jagung-hibrida',
                'id_youtube' => '4sZ-OQOYHcs',
                'cover' => 'ESdiTOxInvLmjacQIewO8qfX1KxKMUxXAnXN4XQr.jpg',
                'created_at' => '2023-11-15 11:28:27',
                'updated_at' => '2023-11-15 11:28:27',
            ),
            10 => 
            array (
                'id' => 1030,
                'judul' => 'Budidaya Porang, Teknik Menanam Porang yang Berkualitas dan Berkelanjutan',
                'slug' => 'budidaya-porang-teknik-menanam-porang-yang-berkualitas-dan-berkelanjutan',
                'id_youtube' => 'os8XDBjP-Vk',
                'cover' => 'jUP0BX2JUaQJE6x4akv9DCbX0WsdYo5zmG6QM2zX.jpg',
                'created_at' => '2023-11-15 11:29:55',
                'updated_at' => '2023-11-15 11:29:55',
            ),
            11 => 
            array (
                'id' => 1031,
                'judul' => 'Budidaya Porang, Teknik Menanam Porang yang Berkualitas dan Berkelanjutan #ProPakTani #Part2',
                'slug' => 'budidaya-porang-teknik-menanam-porang-yang-berkualitas-dan-berkelanjutan-propaktani-part2',
                'id_youtube' => 'VML-sbMqofE',
                'cover' => '2gL9rRCCvzxQAYAZ8zUpU6zlgEFIiLPqE0zxy8PC.jpg',
                'created_at' => '2023-11-15 11:31:55',
                'updated_at' => '2023-11-15 11:31:55',
            ),
            12 => 
            array (
                'id' => 1032,
                'judul' => 'Koloni Belalang Kembara Terbang Gelombang Ke-2 Masuk Ke Food Estate Sumba Tengah',
                'slug' => 'koloni-belalang-kembara-terbang-gelombang-ke-2-masuk-ke-food-estate-sumba-tengah',
                'id_youtube' => 'ognJC3cpWOU',
                'cover' => 'XxeIjo44c6xUZt1ikCLSXfUMKCNujvDFM5n3zhnA.jpg',
                'created_at' => '2023-11-15 11:33:05',
                'updated_at' => '2023-11-15 11:33:05',
            ),
            13 => 
            array (
                'id' => 1033,
                'judul' => 'Pengendalian OPT dan Penanganan DPI',
                'slug' => 'pengendalian-opt-dan-penanganan-dpi',
                'id_youtube' => 'XzvZILiETNI',
                'cover' => 'dA8nmlhIXCebLCLeNfEDwaeqvMdOQFwSQmcshhvQ.jpg',
                'created_at' => '2023-11-15 11:34:11',
                'updated_at' => '2023-11-15 11:34:11',
            ),
            14 => 
            array (
                'id' => 1034,
                'judul' => 'Petani Tetap di Sawah, Kalian di Rumah Saja',
                'slug' => 'petani-tetap-di-sawah-kalian-di-rumah-saja',
                'id_youtube' => 'vXo6yA9n4QI',
                'cover' => 'xDW8yN4GFgLVgBqHNuXCgGcnphtvkXuaz4CalPNX.jpg',
                'created_at' => '2023-11-15 11:35:34',
                'updated_at' => '2023-11-15 11:35:34',
            ),
            15 => 
            array (
                'id' => 1035,
                'judul' => 'Pengembangan Komoditas Kedelai',
                'slug' => 'pengembangan-komoditas-kedelai',
                'id_youtube' => 'PDM1RptJDYE',
                'cover' => 'AuaGYhurW2k1uPdPM4URKAQbJT6gZEui4Avb2y3x.jpg',
                'created_at' => '2023-11-15 11:54:53',
                'updated_at' => '2023-11-15 11:54:53',
            ),
            16 => 
            array (
                'id' => 1036,
                'judul' => 'Pengembangan Komoditas Singkong',
                'slug' => 'pengembangan-komoditas-singkong',
                'id_youtube' => 'ZYgTbnO12vU',
                'cover' => '6WO2iUILayzXbMpTOQxwEx4JQxSlYDtIMOOjj6DN.jpg',
                'created_at' => '2023-11-15 11:56:16',
                'updated_at' => '2023-11-15 11:56:16',
            ),
            17 => 
            array (
                'id' => 1037,
                'judul' => 'Apa Itu Kostraling?',
                'slug' => 'apa-itu-kostraling',
                'id_youtube' => 'https://youtu.be/rd7AzlRhBG8',
                'cover' => 'YowEeJcBh4gQX2IapqKflpX5Mi7oUsGAfX7SDipt.jpg',
                'created_at' => '2023-11-15 11:57:37',
                'updated_at' => '2023-11-15 11:57:37',
            ),
            18 => 
            array (
                'id' => 1038,
                'judul' => 'Webinar Propaktani Ditjen Tanaman Pangan',
                'slug' => 'webinar-propaktani-ditjen-tanaman-pangan',
                'id_youtube' => 'c7w5V83g2Is',
                'cover' => 'ptnsCT0CEQXLJNvj9VTg6rEL3XfQGqEPPVtABpec.jpg',
                'created_at' => '2023-11-15 11:59:00',
                'updated_at' => '2023-11-15 11:59:00',
            ),
            19 => 
            array (
                'id' => 1039,
                'judul' => 'Selamat Tahun Baru Islam 1443 Hijriah',
                'slug' => 'selamat-tahun-baru-islam-1443-hijriah',
                'id_youtube' => 'VHn7n36szp0',
                'cover' => 'RjOLmWd9qC2yid9HoNqIqmiAvYY907EKOxlipNEa.jpg',
                'created_at' => '2023-11-15 12:01:48',
                'updated_at' => '2023-11-15 12:01:48',
            ),
            20 => 
            array (
                'id' => 1040,
                'judul' => 'Dirgahayu Republik Indonesia!',
                'slug' => 'dirgahayu-republik-indonesia',
                'id_youtube' => 'rNRKjKGjtfQ',
                'cover' => 'B3qoJkS0aEpu8Sv2O0YK50lhX2KYJOUWqHPY5M22.jpg',
                'created_at' => '2023-11-15 12:03:03',
                'updated_at' => '2023-11-15 12:03:03',
            ),
            21 => 
            array (
                'id' => 1041,
                'judul' => 'Dirgahayu Republik Indonesia, Salam dari Kami Propaktani',
                'slug' => 'dirgahayu-republik-indonesia-salam-dari-kami-propaktani',
                'id_youtube' => '1QgWiQeIkI0',
                'cover' => 'VYR2ewVta66lR7yqCHosYyCIZ8eJZtarzUHb1Fek.jpg',
                'created_at' => '2023-11-15 12:04:41',
                'updated_at' => '2023-11-15 12:04:41',
            ),
            22 => 
            array (
                'id' => 1042,
                'judul' => 'Di Balik Layar Webinar Propaktani',
                'slug' => 'di-balik-layar-webinar-propaktani',
                'id_youtube' => '_2_Z3KZ1qOI',
                'cover' => 'GUb17b78Id19NC63aTUzVXdDzEHKCggnQ6jvUWuH.jpg',
                'created_at' => '2023-11-15 12:06:13',
                'updated_at' => '2023-11-15 12:06:13',
            ),
            23 => 
            array (
                'id' => 1043,
                'judul' => 'Surat Cinta dari Kami Tim Propaktani',
                'slug' => 'surat-cinta-dari-kami-tim-propaktani',
                'id_youtube' => 'mRD_fjxZnPs',
                'cover' => 'OBUWEQKMJANkZr5ictwHrmnoSy3iCo3pewWZ2B9M.jpg',
                'created_at' => '2023-11-15 12:08:15',
                'updated_at' => '2023-11-15 12:08:15',
            ),
            24 => 
            array (
                'id' => 1044,
                'judul' => 'Pertanian Modern BBPOPT Jatisari',
                'slug' => 'pertanian-modern-bbpopt-jatisari',
                'id_youtube' => '_RlBQ5QyMtc',
                'cover' => 'Ey5Euml3zwXvBTRTzzLpzA8KKTPi7k18SuddmsCH.jpg',
                'created_at' => '2023-11-15 12:09:32',
                'updated_at' => '2023-11-15 12:09:32',
            ),
            25 => 
            array (
                'id' => 1045,
                'judul' => '100 Episode Propaktani',
                'slug' => '100-episode-propaktani',
                'id_youtube' => 'uvivrBWIjlc',
                'cover' => 'zYoahW4eQ7CpRONaNyuGbIYf4eMHJEgLCkKSbyYc.jpg',
                'created_at' => '2023-11-15 12:10:54',
                'updated_at' => '2023-11-15 12:10:54',
            ),
            26 => 
            array (
                'id' => 1046,
                'judul' => 'Ekspor Ubi Jalar Sumedang',
                'slug' => 'ekspor-ubi-jalar-sumedang',
                'id_youtube' => 'L0HugPqvdns',
                'cover' => 'TkvAjg2jwOOVdC9va3fAEfjOZK2B4jW9RQgMklPI.jpg',
                'created_at' => '2023-11-15 12:12:15',
                'updated_at' => '2023-11-15 12:12:15',
            ),
            27 => 
            array (
                'id' => 1047,
                'judul' => 'Fiesta Singkong',
                'slug' => 'fiesta-singkong',
                'id_youtube' => '7CzgWWfeQ0g',
                'cover' => '39MVFadsw0nYmLgTf1CSx2pe2GGxtQsxc35JHAuP.jpg',
                'created_at' => '2023-11-15 12:13:48',
                'updated_at' => '2023-11-15 12:13:48',
            ),
            28 => 
            array (
                'id' => 1048,
                'judul' => 'Fiesta Singkong 2021 - PROPAKTANI x MSI',
                'slug' => 'fiesta-singkong-2021-propaktani-x-msi',
                'id_youtube' => 'vQhftAQ5GX8',
                'cover' => 'WsCnNZghx7QajRF9KWs5GQ7CWn6YdL9NOnfsTawh.jpg',
                'created_at' => '2023-11-15 12:15:00',
                'updated_at' => '2023-11-15 12:15:00',
            ),
            29 => 
            array (
                'id' => 1049,
                'judul' => 'Simpatik Sistem Pemantauan Berbasis Elektronik',
                'slug' => 'simpatik-sistem-pemantauan-berbasis-elektronik',
                'id_youtube' => 'rlaKr6mCjLk',
                'cover' => 'Jp70QwgckRSFDKMwxxfX6OmDWdzplhAdscdrwEZi.jpg',
                'created_at' => '2023-11-15 12:16:21',
                'updated_at' => '2023-11-15 12:16:21',
            ),
            30 => 
            array (
                'id' => 1050,
                'judul' => 'Lukisan Pasir Hilirisasi Ekpor Pangan Lokal, Surabaya 4 November 2021',
                'slug' => 'lukisan-pasir-hilirisasi-ekpor-pangan-lokal-surabaya-4-november-2021',
                'id_youtube' => '48MIX8dUuBo',
                'cover' => 'RaMQ0TezIYOmDnExAMQQ8QY1zqP7S6ybV021Hzux.jpg',
                'created_at' => '2023-11-15 12:17:44',
                'updated_at' => '2023-11-15 12:17:44',
            ),
            31 => 
            array (
                'id' => 1051,
                'judul' => 'Pengembangan Pangan Lokal dalam Perspektif Budaya, Pariwisata, dan Pengembangan UMKM',
                'slug' => 'pengembangan-pangan-lokal-dalam-perspektif-budaya-pariwisata-dan-pengembangan-umkm',
                'id_youtube' => 'BdPw9ea2BOE',
                'cover' => 'z6QzUw9fIOMjpL1hviM068xFxVzgIQfMRCR0EEcE.jpg',
                'created_at' => '2023-11-15 12:19:00',
                'updated_at' => '2023-11-15 12:19:00',
            ),
            32 => 
            array (
                'id' => 1052,
                'judul' => 'Hilirisasi Ekpor Pangan Lokal',
                'slug' => 'hilirisasi-ekpor-pangan-lokal',
                'id_youtube' => 'ZEFnGcJD0cc',
                'cover' => 'ch1LevtwEVbty6XYLZT4rJq3yp1qFXlWkwTfER4Z.jpg',
                'created_at' => '2023-11-15 12:20:12',
                'updated_at' => '2023-11-15 12:20:12',
            ),
            33 => 
            array (
                'id' => 1053,
                'judul' => 'Menengok Sentra Singkong di Pati',
                'slug' => 'menengok-sentra-singkong-di-pati',
                'id_youtube' => '38j_Sza7h7Y',
                'cover' => 'C8tuKVYtOUQNliu1AOsGN5dYbrwK5WRfo78REFjH.jpg',
                'created_at' => '2023-11-15 12:48:05',
                'updated_at' => '2023-11-15 12:48:05',
            ),
            34 => 
            array (
                'id' => 1054,
                'judul' => 'Propaktani Valorisasi Singkong Meningkatkan Nilai Tambah Luar Biasa',
                'slug' => 'propaktani-valorisasi-singkong-meningkatkan-nilai-tambah-luar-biasa',
                'id_youtube' => 'rSQC1W_dwjI',
                'cover' => '4YfqziI2cvvmgXYf7Lq0jQphLAEQL0BdoTGBkAeD.jpg',
                'created_at' => '2023-11-15 12:50:48',
                'updated_at' => '2023-11-15 12:50:48',
            ),
            35 => 
            array (
                'id' => 1055,
                'judul' => 'Propaktani Benih Sumber Kehidupan, Bagaimana Menghasilkan Sumber Benih Bermutu',
                'slug' => 'propaktani-benih-sumber-kehidupan-bagaimana-menghasilkan-sumber-benih-bermutu',
                'id_youtube' => 'GtEwpQi8-XQ',
                'cover' => '81Uj9KixlvS4gIWcO89yextsl6SKhgv7SDPekPPE.jpg',
                'created_at' => '2023-11-15 12:59:04',
                'updated_at' => '2023-11-15 12:59:04',
            ),
            36 => 
            array (
                'id' => 1056,
                'judul' => 'Ayo Mengenal dan Menanam Gandum - BTS Episode 285',
                'slug' => 'ayo-mengenal-dan-menanam-gandum-bts-episode-285',
                'id_youtube' => 'tHu5cL9GR0g',
                'cover' => '64iQrqMRuwv51sb3rLB2QiMJccTBcuLAzl6hH5bh.jpg',
                'created_at' => '2023-11-15 13:00:17',
                'updated_at' => '2023-11-15 13:00:17',
            ),
            37 => 
            array (
                'id' => 1057,
                'judul' => 'Gencarkan Singkong Melalui Teknologi Olahan & Aneka Produk yang Variatif dan Inovatif',
                'slug' => 'gencarkan-singkong-melalui-teknologi-olahan-aneka-produk-yang-variatif-dan-inovatif',
                'id_youtube' => 'ewob-dDFnQk',
                'cover' => 'q5uscIWcQxvGLiM4I4GAZcBIUM6PDiFBLySvzdFb.jpg',
                'created_at' => '2023-11-15 13:01:36',
                'updated_at' => '2023-11-15 13:01:36',
            ),
            38 => 
            array (
                'id' => 1058,
                'judul' => 'Propaktani: Panen Agro Edu Wisata Organik Mulyaharja Bogor',
                'slug' => 'propaktani-panen-agro-edu-wisata-organik-mulyaharja-bogor',
                'id_youtube' => 'yKjGmlEuk1s',
                'cover' => 'KsPdfeARiOsmWRxej5jsqniEFNP4KsIWMWeQJWjM.jpg',
                'created_at' => '2023-11-15 13:05:15',
                'updated_at' => '2023-11-15 13:05:15',
            ),
            39 => 
            array (
                'id' => 1059,
                'judul' => 'Berburu Ubi Cilembu di Desa Cilembu',
                'slug' => 'berburu-ubi-cilembu-di-desa-cilembu',
                'id_youtube' => '7LMj5fgzuDw',
                'cover' => 'caufopWWtOpr97O32koECd9VHw9Y6bov9PnbgVCM.jpg',
                'created_at' => '2023-11-15 13:06:33',
                'updated_at' => '2023-11-15 13:06:33',
            ),
            40 => 
            array (
                'id' => 1060,
                'judul' => 'Agenda Minggu Ketiga Bulan Januari 2022 Bimbingan Teknis Sosialisasi Propaktani',
                'slug' => 'agenda-minggu-ketiga-bulan-januari-2022-bimbingan-teknis-sosialisasi-propaktani',
                'id_youtube' => '3mPOwduIxOQ',
                'cover' => 'C26z23GbnzNRssNUvbfvCJZRhKhcBOCJ5KlLgSdK.jpg',
                'created_at' => '2023-11-15 13:07:45',
                'updated_at' => '2023-11-15 13:07:45',
            ),
            41 => 
            array (
                'id' => 1061,
            'judul' => 'Pentingnya PHT Untuk Pertanian Berkelanjutan - (Dr. Ir. Gatot Mudjiono, M.Sc)',
                'slug' => 'pentingnya-pht-untuk-pertanian-berkelanjutan-dr-ir-gatot-mudjiono-msc',
                'id_youtube' => 'Ftnq8tADRZo',
                'cover' => 'UwvzjsalL5u4YE58cagsQl3JqAtrTNRiiXmzhudv.jpg',
                'created_at' => '2023-11-15 13:09:13',
                'updated_at' => '2023-11-15 13:09:13',
            ),
            42 => 
            array (
                'id' => 1062,
                'judul' => 'Pentingnya PHT Untuk Pertanian Berkelanjutan Sesi Paparan Dir. Perlindungan',
                'slug' => 'pentingnya-pht-untuk-pertanian-berkelanjutan-sesi-paparan-dir-perlindungan',
                'id_youtube' => 'beoyH5-3NZ0',
                'cover' => 'wnK2kWP3hwAfoflmOVmjpxoqlD8b5cZjoTGDef3M.jpg',
                'created_at' => '2023-11-15 13:11:27',
                'updated_at' => '2023-11-15 13:11:27',
            ),
            43 => 
            array (
                'id' => 1063,
                'judul' => 'Pentingnya PHT Untuk Pertanian Berkelanjutan Sesi Paparan Prof. Trisyono',
                'slug' => 'pentingnya-pht-untuk-pertanian-berkelanjutan-sesi-paparan-prof-trisyono',
                'id_youtube' => 'U2dirF-Cv7M',
                'cover' => '7a50cpk5x4x490L0nJc6XfgbGlVqRPBtn08PbuFs.jpg',
                'created_at' => '2023-11-15 13:13:05',
                'updated_at' => '2023-11-15 13:13:05',
            ),
            44 => 
            array (
                'id' => 1064,
                'judul' => 'Pentingnya PHT Untuk Pertanian Berkelanjutan Sesi Sambutan Dirjen Tanaman Pangan',
                'slug' => 'pentingnya-pht-untuk-pertanian-berkelanjutan-sesi-sambutan-dirjen-tanaman-pangan',
                'id_youtube' => '_JBxZ-BdiIE',
                'cover' => '6JTFamNckujWBuar5rQCHCB3ml5Eb5weWqMupsqI.jpg',
                'created_at' => '2023-11-15 13:16:53',
                'updated_at' => '2023-11-15 13:16:53',
            ),
            45 => 
            array (
                'id' => 1065,
                'judul' => 'Agenda BTS PROPAKTANI Minggu Ke 4 Januari 2022',
                'slug' => 'agenda-bts-propaktani-minggu-ke-4-januari-2022',
                'id_youtube' => 'xlAUMfOasng',
                'cover' => '4FoFp04SUVo1lUUgp9WRn1J6iGZNWL8uW6i9iKBN.jpg',
                'created_at' => '2023-11-15 13:18:58',
                'updated_at' => '2023-11-15 13:18:58',
            ),
            46 => 
            array (
                'id' => 1066,
                'judul' => 'Jagung Cibugel Sumedang, dari Lahan Perbukitan yang Menguntungkan',
                'slug' => 'jagung-cibugel-sumedang-dari-lahan-perbukitan-yang-menguntungkan',
                'id_youtube' => 'ZZv2QOqQOCk',
                'cover' => 'eQNO0rncHFxPvO4ObbRGfy1YPAkYqW3aDqlNohkz.jpg',
                'created_at' => '2023-11-15 13:20:58',
                'updated_at' => '2023-11-15 13:20:58',
            ),
            47 => 
            array (
                'id' => 1067,
                'judul' => 'IP400 belajar dari Sukoharjo, bisa tanam 4 kali setahun',
                'slug' => 'ip400-belajar-dari-sukoharjo-bisa-tanam-4-kali-setahun',
                'id_youtube' => '8y0OXOzcVCQ',
                'cover' => 'oCt6kVfpxAuy7v3qIprIVsHoqSNokHwil0Wxrm4e.jpg',
                'created_at' => '2023-11-15 13:22:30',
                'updated_at' => '2023-11-15 13:22:30',
            ),
            48 => 
            array (
                'id' => 1068,
                'judul' => 'Tips Sukses Menjadi Pengusaha Benih ala Sandiaga Uno',
                'slug' => 'tips-sukses-menjadi-pengusaha-benih-ala-sandiaga-uno',
                'id_youtube' => 'cOHtd8Ni9_Q',
                'cover' => 'AI6PclgYOT82TCIkHwfwjfoEs3K0chsSVuOaUeU2.jpg',
                'created_at' => '2023-11-15 13:23:47',
                'updated_at' => '2023-11-15 13:23:47',
            ),
            49 => 
            array (
                'id' => 1069,
                'judul' => 'Tanam Padi Gogo di Lahan Perhutani',
                'slug' => 'tanam-padi-gogo-di-lahan-perhutani',
                'id_youtube' => 'Pj9Uy6pnInc',
                'cover' => 'gK1jRwtt4M1oUwHVORl6V5IBZJRRqoqj9PaaUp97.jpg',
                'created_at' => '2023-11-15 13:26:36',
                'updated_at' => '2023-11-15 13:26:36',
            ),
            50 => 
            array (
                'id' => 1070,
                'judul' => 'Komitmen Pengembangan IP 400 di Kota Bandung',
                'slug' => 'komitmen-pengembangan-ip-400-di-kota-bandung',
                'id_youtube' => '6VTErRh3hhE',
                'cover' => 'PIITCvq1OPUV74lyIPql9p6n2moWMJkfiEtzJrjX.jpg',
                'created_at' => '2023-11-15 13:28:18',
                'updated_at' => '2023-11-15 13:28:18',
            ),
            51 => 
            array (
                'id' => 1071,
                'judul' => 'MARS PROPAKTANI',
                'slug' => 'mars-propaktani',
                'id_youtube' => 'Wn9vQMdpBKI',
                'cover' => 'WbNfSZAXTCZHKKP0OQTyEQUxS57E1EH8HQAbQGvo.jpg',
                'created_at' => '2023-11-15 13:29:48',
                'updated_at' => '2023-11-15 13:29:48',
            ),
            52 => 
            array (
                'id' => 1072,
                'judul' => 'MARS PROPAKTANI II',
                'slug' => 'mars-propaktani-ii',
                'id_youtube' => 'mBpngpt-6sQ',
                'cover' => 'rYY5JCNU6KiaeG9SRfBMSlbIGQYnbwPJInoBJ9nj.jpg',
                'created_at' => '2023-11-15 13:31:32',
                'updated_at' => '2023-11-15 13:31:32',
            ),
            53 => 
            array (
                'id' => 1073,
                'judul' => 'MARS PROPAKTANI',
                'slug' => 'mars-propaktani',
                'id_youtube' => '8vOOqnaZIZk',
                'cover' => 'AEt11sOaJn3Raql7SxQczLar9FiPTG0dXagH5SP5.jpg',
                'created_at' => '2023-11-15 13:32:47',
                'updated_at' => '2023-11-15 13:32:47',
            ),
            54 => 
            array (
                'id' => 1074,
                'judul' => 'Praktek Pembuatan Kompos dan Penanggulangan OPT - BTS Episode 321',
                'slug' => 'praktek-pembuatan-kompos-dan-penanggulangan-opt-bts-episode-321',
                'id_youtube' => 'a8h7geyCw8s',
                'cover' => 'Q6K86p4BPp0Ip00bcUMjkgYJV7VRBFasoEzMsWku.jpg',
                'created_at' => '2023-11-15 13:35:58',
                'updated_at' => '2023-11-15 13:35:58',
            ),
            55 => 
            array (
                'id' => 1075,
                'judul' => 'BTS Propaktani Minggu Ke 2 Februari 2022 Episode 321 - 330',
                'slug' => 'bts-propaktani-minggu-ke-2-februari-2022-episode-321-330',
                'id_youtube' => 'tBvYwW0v36Y',
                'cover' => 'DOwwtN8mOqHMn9uqXtUFSb1kYmslydnK0Zg9f76I.jpg',
                'created_at' => '2023-11-15 13:37:15',
                'updated_at' => '2023-11-15 13:37:15',
            ),
            56 => 
            array (
                'id' => 1076,
                'judul' => 'Mengenal Perilaku Hama Tikus dan Pengendaliannya',
                'slug' => 'mengenal-perilaku-hama-tikus-dan-pengendaliannya',
                'id_youtube' => 'uqttWfO_1Ow',
                'cover' => 'c4l3rFaNyn5tVu35nErESe83IWbcEI0X77QpMCGG.jpg',
                'created_at' => '2023-11-15 13:40:30',
                'updated_at' => '2023-11-15 13:40:30',
            ),
            57 => 
            array (
                'id' => 1077,
                'judul' => 'Kiat Sukses Sadikun Wirausahawan Batola Membuat Pupuk Organik',
                'slug' => 'kiat-sukses-sadikun-wirausahawan-batola-membuat-pupuk-organik',
                'id_youtube' => 'Prbt3Rdjojo',
                'cover' => 'wRLB8QpKX1MvKNdOXKikBVwCy6orScVTinP5bXrb.jpg',
                'created_at' => '2023-11-15 13:42:11',
                'updated_at' => '2023-11-15 13:42:11',
            ),
            58 => 
            array (
                'id' => 1078,
                'judul' => 'Obrolan PIL KB Tikus & Mitos Raja Tikus',
                'slug' => 'obrolan-pil-kb-tikus-mitos-raja-tikus',
                'id_youtube' => 'Wv1Bcw_pRl0',
                'cover' => 'Sd8FRpB0b78BQt5f9qJTqlSMXAjfZGEunfAfamBC.jpg',
                'created_at' => '2023-11-15 15:27:14',
                'updated_at' => '2023-11-15 15:27:14',
            ),
            59 => 
            array (
                'id' => 1079,
                'judul' => 'ROCK PROPAKTANI',
                'slug' => 'rock-propaktani',
                'id_youtube' => 'Cs6RFulhX_s',
                'cover' => '162SQDYmPCpS1r3s0fK2cgbmI0leW8GixWtQYm8d.jpg',
                'created_at' => '2023-11-15 15:28:28',
                'updated_at' => '2023-11-15 15:28:28',
            ),
            60 => 
            array (
                'id' => 1080,
                'judul' => 'ROCK PROPAKTANI',
                'slug' => 'rock-propaktani',
                'id_youtube' => 'Noda4PZmbcc',
                'cover' => 'Dn7YBha12eRYK7BQTmbfq5PwHuIqmPn1x8CSkNU9.jpg',
                'created_at' => '2023-11-15 15:30:12',
                'updated_at' => '2023-11-15 15:30:12',
            ),
            61 => 
            array (
                'id' => 1081,
                'judul' => 'Agenda BTS PROPAKTANI Minggu Ketiga Februari 2022 Episode 331-340',
                'slug' => 'agenda-bts-propaktani-minggu-ketiga-februari-2022-episode-331-340',
                'id_youtube' => 'LKCWXk1bUEA',
                'cover' => 'QniFp6FjmR0QGrt3r8opHpqImTxw93pM4svxzA4R.jpg',
                'created_at' => '2023-11-15 15:31:24',
                'updated_at' => '2023-11-15 15:31:24',
            ),
            62 => 
            array (
                'id' => 1082,
                'judul' => 'Culik? Ini dia Teknik Semai Culik Untuk Memperpendek Umur Padi Guna Mendukung IP400',
                'slug' => 'culik-ini-dia-teknik-semai-culik-untuk-memperpendek-umur-padi-guna-mendukung-ip400',
                'id_youtube' => 'HsMxkpt-nSM',
                'cover' => 'LLzUTziehKxi9i4XmQd4T02JZwiatGtWUMxIBBdU.jpg',
                'created_at' => '2023-11-15 15:32:40',
                'updated_at' => '2023-11-15 15:32:40',
            ),
            63 => 
            array (
                'id' => 1083,
                'judul' => 'Begini Cara Membuat Pengendalian Hama Penyakit yang Ramah Lingkungan!',
                'slug' => 'begini-cara-membuat-pengendalian-hama-penyakit-yang-ramah-lingkungan',
                'id_youtube' => 'rojuhXVizfs',
                'cover' => 'DeFmNvllUbs9Lo0TjyzqJiXyrRAe1SkTFXgg38jq.jpg',
                'created_at' => '2023-11-15 15:33:54',
                'updated_at' => '2023-11-15 15:33:54',
            ),
            64 => 
            array (
                'id' => 1084,
                'judul' => 'Inilah Cara Mengendalikan Hama Penyakit yang Ramli alias Ramah Lingkungan',
                'slug' => 'inilah-cara-mengendalikan-hama-penyakit-yang-ramli-alias-ramah-lingkungan',
                'id_youtube' => 'bdv0JZhvOn4',
                'cover' => 'WA2DWmwQjZL43NMVxMvNnyHFJpOdWRSWPYzSZOTE.jpg',
                'created_at' => '2023-11-15 15:34:59',
                'updated_at' => '2023-11-15 15:34:59',
            ),
            65 => 
            array (
                'id' => 1085,
                'judul' => 'Culik? Ini dia Teknik Semai Culik Untuk Memperpendek Umur Padi Guna Mendukung IP400',
                'slug' => 'culik-ini-dia-teknik-semai-culik-untuk-memperpendek-umur-padi-guna-mendukung-ip400',
                'id_youtube' => 'Vpzz0t__rZU',
                'cover' => 'muRufjv5J9GsrxtXIpKNFT2pGyoU8hgPX1jfUVwK.jpg',
                'created_at' => '2023-11-15 15:36:01',
                'updated_at' => '2023-11-15 15:36:01',
            ),
            66 => 
            array (
                'id' => 1086,
                'judul' => 'Begini Cara Membuat Pengendalian Hama Penyakit yang Ramah Lingkungan!',
                'slug' => 'begini-cara-membuat-pengendalian-hama-penyakit-yang-ramah-lingkungan',
                'id_youtube' => '24YWfJzM5mo',
                'cover' => 'eyiwrR4TD4Oq4HOP1UgrhEpWhMFpHVusxWQizuwK.jpg',
                'created_at' => '2023-11-15 15:37:06',
                'updated_at' => '2023-11-15 15:37:06',
            ),
            67 => 
            array (
                'id' => 1087,
                'judul' => 'Inilah Cara Mengendalikan Hama Penyakit yang Ramli alias Ramah Lingkungan',
                'slug' => 'inilah-cara-mengendalikan-hama-penyakit-yang-ramli-alias-ramah-lingkungan',
                'id_youtube' => 'L1zyy9vXgQs',
                'cover' => 'dbBn1Vs53HDc44ts6eJP6iHHhECpgFwn8zf5hhkv.jpg',
                'created_at' => '2023-11-15 15:38:21',
                'updated_at' => '2023-11-15 15:38:21',
            ),
            68 => 
            array (
                'id' => 1088,
                'judul' => 'BTS Propaktani Minggu keempat Februari 2022 Episode 341-350',
                'slug' => 'bts-propaktani-minggu-keempat-februari-2022-episode-341-350',
                'id_youtube' => 'gz4ydieleOs',
                'cover' => 'zk2bBebpP3xEjfrjBNma5vlAefr0VU8jtxupHwom.jpg',
                'created_at' => '2023-11-15 15:39:42',
                'updated_at' => '2023-11-15 15:39:42',
            ),
            69 => 
            array (
                'id' => 1089,
                'judul' => 'Mesin Pengiris Singkong, Mempermudah Produksi Singkong',
                'slug' => 'mesin-pengiris-singkong-mempermudah-produksi-singkong',
                'id_youtube' => 'gDPS4IJSeN8',
                'cover' => 'f4RvHS9nz1Qpd7udBachlj54Li6GGaL01hcKL0iy.jpg',
                'created_at' => '2023-11-15 15:54:14',
                'updated_at' => '2023-11-15 15:54:14',
            ),
            70 => 
            array (
                'id' => 1090,
                'judul' => 'Bagaimana jagung bisa lebih 2 tongkol? Ini tipsnya',
                'slug' => 'bagaimana-jagung-bisa-lebih-2-tongkol-ini-tipsnya',
                'id_youtube' => 'hgHi0J-P-Ig',
                'cover' => '9I0e1WhTOsGk35291m815vRgWKxH3j8SOKCkZZub.jpg',
                'created_at' => '2023-11-15 15:55:33',
                'updated_at' => '2023-11-15 15:55:33',
            ),
            71 => 
            array (
                'id' => 1091,
                'judul' => 'Kiat Sukses UMKM Pangan Mendukung Sektor Pariwisata',
                'slug' => 'kiat-sukses-umkm-pangan-mendukung-sektor-pariwisata',
                'id_youtube' => 'lUX7Z0bZorA',
                'cover' => 'KYHbfniaUSLLLDucobBUrv1KrXOUV1TqUWYwUZGT.jpg',
                'created_at' => '2023-11-15 15:56:49',
                'updated_at' => '2023-11-15 15:56:49',
            ),
            72 => 
            array (
                'id' => 1092,
                'judul' => 'Panen Tanam IP400 di Kabupaten Bima',
                'slug' => 'panen-tanam-ip400-di-kabupaten-bima',
                'id_youtube' => 'V7kwt-X9eWg',
                'cover' => 'tZIdL9JyCcr5IAkBg9EeGgldDPLgAfLt3xJ8PGoA.jpg',
                'created_at' => '2023-11-15 16:01:40',
                'updated_at' => '2023-11-15 16:01:40',
            ),
            73 => 
            array (
                'id' => 1093,
                'judul' => 'Dari Bima Jagung Menggeliat',
                'slug' => 'dari-bima-jagung-menggeliat',
                'id_youtube' => 'gTuBt_rJmvM',
                'cover' => 'qUFmSeah57M7FTYW6m1O94b2jksiIL5x9MjP69oX.jpg',
                'created_at' => '2023-11-15 16:09:43',
                'updated_at' => '2023-11-15 16:09:43',
            ),
            74 => 
            array (
                'id' => 1094,
                'judul' => 'Dari Bima Jagung Menggeliat 2',
                'slug' => 'dari-bima-jagung-menggeliat-2',
                'id_youtube' => '3UGdSY-bTYI',
                'cover' => 'd2pbMJEtGTJA4j7WRkhJ903iF6T9jAUhWr5yPC1C.jpg',
                'created_at' => '2023-11-15 16:11:07',
                'updated_at' => '2023-11-15 16:11:07',
            ),
            75 => 
            array (
                'id' => 1095,
            'judul' => 'Jadwal BTS ( Bimbingan Teknis & Sosisalisasi ) Episode 368-380 Minggu Ke 3 Maret 2022',
                'slug' => 'jadwal-bts-bimbingan-teknis-sosisalisasi-episode-368-380-minggu-ke-3-maret-2022',
                'id_youtube' => 'qiCQOcUjvEY',
                'cover' => 'zTk0zFWUTG4w7FsBB1Dvy4xT1aCCUvvFppSmG0KR.jpg',
                'created_at' => '2023-11-15 16:12:25',
                'updated_at' => '2023-11-15 16:12:25',
            ),
            76 => 
            array (
                'id' => 1096,
            'judul' => 'Apa Kata Sandiaga Uno tentang Agroeduwisata (Kolaborasi Kementan-Kemenparekraf)',
                'slug' => 'apa-kata-sandiaga-uno-tentang-agroeduwisata-kolaborasi-kementan-kemenparekraf',
                'id_youtube' => 'ckshsgg44Ns',
                'cover' => '76odVoPJsArVNnoZtvEZ7CS6aWHgDBWn0HadbX6k.jpg',
                'created_at' => '2023-11-15 16:14:25',
                'updated_at' => '2023-11-15 16:14:25',
            ),
            77 => 
            array (
                'id' => 1097,
                'judul' => 'Bincang-Bincang Pertanian Bersama Bang Narji di Propaktani',
                'slug' => 'bincang-bincang-pertanian-bersama-bang-narji-di-propaktani',
                'id_youtube' => 'ZrGL8--Jveo',
                'cover' => '8DKwrw30AsongGieiSLIjMsDG7gNn6uzYPhoGvc9.jpg',
                'created_at' => '2023-11-15 16:15:35',
                'updated_at' => '2023-11-15 16:15:35',
            ),
            78 => 
            array (
                'id' => 1098,
                'judul' => 'Tata Kelola Pangan Menurut Musdhalifah di BTS Propaktani',
                'slug' => 'tata-kelola-pangan-menurut-musdhalifah-di-bts-propaktani',
                'id_youtube' => 'N6IAqmfX-Ig',
                'cover' => 'F4x9KPH3SL2xT2u2CmHjxZrjK0oLqjkm3cRm1NEq.jpg',
                'created_at' => '2023-11-15 16:16:46',
                'updated_at' => '2023-11-15 16:16:46',
            ),
            79 => 
            array (
                'id' => 1099,
                'judul' => 'Perlunya Revitalisasi Penggilingan Kecil Menurut Pak Sutarto',
                'slug' => 'perlunya-revitalisasi-penggilingan-kecil-menurut-pak-sutarto',
                'id_youtube' => 'tHcBGNfSk5s',
                'cover' => 'UgUV6dYO2A7gnirEBihAR6g6IYpOlURH1VUTiWXG.jpg',
                'created_at' => '2023-11-15 16:17:49',
                'updated_at' => '2023-11-15 16:17:49',
            ),
            80 => 
            array (
                'id' => 1100,
                'judul' => 'Bimbingan Teknis dan Sosialisasi Propaktani Minggu ketiga April 2022',
                'slug' => 'bimbingan-teknis-dan-sosialisasi-propaktani-minggu-ketiga-april-2022',
                'id_youtube' => 'GDPnwZ2BujE',
                'cover' => 'sYEAqAOCIwg3FK57X6DzkKrK2qU3j87uE3JMwcrm.jpg',
                'created_at' => '2023-11-15 16:19:16',
                'updated_at' => '2023-11-15 16:19:16',
            ),
            81 => 
            array (
                'id' => 1101,
                'judul' => 'Sidak ke Pasar di Kabupaten Semarang',
                'slug' => 'sidak-ke-pasar-di-kabupaten-semarang',
                'id_youtube' => 'zGAW3oQEmfk',
                'cover' => 'M88VSzEmGp0EcsBdRXSiZZvXH2VAz2u0mywHeJRx.jpg',
                'created_at' => '2023-11-15 16:20:32',
                'updated_at' => '2023-11-15 16:20:32',
            ),
            82 => 
            array (
                'id' => 1102,
                'judul' => 'Korporasi Tanaman Pangan Yes!',
                'slug' => 'korporasi-tanaman-pangan-yes',
                'id_youtube' => 'nqKp_op9fus',
                'cover' => 'vI3Enxews2grPxxTwWIsllcxljvB7zNRzGAOnF8c.jpg',
                'created_at' => '2023-11-15 16:27:21',
                'updated_at' => '2023-11-15 16:27:21',
            ),
            83 => 
            array (
                'id' => 1103,
                'judul' => 'Kearifan Lokal dan Ketahanan Pangan',
                'slug' => 'kearifan-lokal-dan-ketahanan-pangan',
                'id_youtube' => 's1ot52iBlYw',
                'cover' => 'mrD7B5NoqwULHTLBFneKDc2De36pAunFk2uKFwi0.jpg',
                'created_at' => '2023-11-20 17:58:45',
                'updated_at' => '2023-11-20 17:58:45',
            ),
            84 => 
            array (
                'id' => 1104,
                'judul' => 'PROPAKTANI!',
                'slug' => 'propaktani',
                'id_youtube' => 'RU_iW49QP5g',
                'cover' => 'lO9QvjAQr2hEb3ocLOZuXqzaSqn1KIX77UYfedRl.jpg',
                'created_at' => '2023-11-20 17:59:57',
                'updated_at' => '2023-11-20 17:59:57',
            ),
            85 => 
            array (
                'id' => 1105,
                'judul' => 'Luapan Kegembiraan Hasil Panen Food Estate Sumba Tengah',
                'slug' => 'luapan-kegembiraan-hasil-panen-food-estate-sumba-tengah',
                'id_youtube' => 'mULTxkf-0SY',
                'cover' => 'UFI585q2dmTcGrNdPQyaT8EdwYBBhJGGfyrnOQya.jpg',
                'created_at' => '2023-11-20 18:01:00',
                'updated_at' => '2023-11-20 18:01:00',
            ),
            86 => 
            array (
                'id' => 1106,
                'judul' => 'Inovasi dari Sragen, Petani Millenial Hadirkan ZPT Murah Meriah',
                'slug' => 'inovasi-dari-sragen-petani-millenial-hadirkan-zpt-murah-meriah',
                'id_youtube' => 'QKhgdXRSrSY',
                'cover' => 'gphPuGvFVnUM8nHGTOGcz8EHGbS6lGWjnmRDuh9E.jpg',
                'created_at' => '2023-11-20 18:02:10',
                'updated_at' => '2023-11-20 18:02:10',
            ),
            87 => 
            array (
                'id' => 1107,
                'judul' => 'Bincang Seru Pak Dirjen, Sidak Ramuan Ajaib Padi Tanpa Pupuk di Blitar',
                'slug' => 'bincang-seru-pak-dirjen-sidak-ramuan-ajaib-padi-tanpa-pupuk-di-blitar',
                'id_youtube' => '5t6iXi9IxHY',
                'cover' => 'YKOP1yUWMnKDZeS9uYYMXxl4jMEu5CPYucLOp1xr.jpg',
                'created_at' => '2023-11-20 18:04:31',
                'updated_at' => '2023-11-20 18:04:31',
            ),
            88 => 
            array (
                'id' => 1108,
                'judul' => 'Sukses Produksi Naik Berkat Nutrisi Buatan Sendiri',
                'slug' => 'sukses-produksi-naik-berkat-nutrisi-buatan-sendiri',
                'id_youtube' => 'Ii18hy3aHps',
                'cover' => 'VUw79G0FbHe5ivpukrjwmH0ZBIcTkpAu5KwFiTTR.jpg',
                'created_at' => '2023-11-20 18:05:39',
                'updated_at' => '2023-11-20 18:05:39',
            ),
            89 => 
            array (
                'id' => 1109,
                'judul' => 'Jadwal BTS Propaktani Minggu Ke-2 Mei 2022',
                'slug' => 'jadwal-bts-propaktani-minggu-ke-2-mei-2022',
                'id_youtube' => 'awqRHOUzkDU',
                'cover' => 'noKkS8J15tc989cwta6eff6ysm9eT48EklsAutFk.jpg',
                'created_at' => '2023-11-20 18:06:44',
                'updated_at' => '2023-11-20 18:06:44',
            ),
            90 => 
            array (
                'id' => 1110,
                'judul' => 'Panen Padi Food Estate Sumba Tengah Zona 1 Umbu Pabal Sumba Tengah',
                'slug' => 'panen-padi-food-estate-sumba-tengah-zona-1-umbu-pabal-sumba-tengah',
                'id_youtube' => 'oX3Xhq6FdMk',
                'cover' => 'OFEPZDlgNgDJIu67zdSyKtEnn5QqTq1Bv30LogZ3.jpg',
                'created_at' => '2023-11-20 18:07:49',
                'updated_at' => '2023-11-20 18:07:49',
            ),
            91 => 
            array (
                'id' => 1111,
                'judul' => 'Inovasi Bio SAKA Dikonfirmasi Ilmiah',
                'slug' => 'inovasi-bio-saka-dikonfirmasi-ilmiah',
                'id_youtube' => 'tAZl9ODhLco',
                'cover' => 'kNEePiUmypAtrhF7yFt2JpSXLQ0Fry3HqqDZN9J7.jpg',
                'created_at' => '2023-11-20 18:08:58',
                'updated_at' => '2023-11-20 18:08:58',
            ),
            92 => 
            array (
                'id' => 1112,
                'judul' => 'Membuat Pupuk Organik Sendiri dengan Teknik Jadam Microorganisme',
                'slug' => 'membuat-pupuk-organik-sendiri-dengan-teknik-jadam-microorganisme',
                'id_youtube' => 'an2SUG6Z2jw',
                'cover' => '3nLSsmM0yyFnzj6LDt1otXLQ7Rr5n5dqlcNCqQGl.jpg',
                'created_at' => '2023-11-20 18:10:05',
                'updated_at' => '2023-11-20 18:10:05',
            ),
            93 => 
            array (
                'id' => 1113,
                'judul' => 'Survei Cadangan Beras Nasional 2022',
                'slug' => 'survei-cadangan-beras-nasional-2022',
                'id_youtube' => 'LZUvkKgS0Bg',
                'cover' => 'KuVLlT0FsEeHO8QUrVrEYjm63K8aT887Mhu8w5IO.jpg',
                'created_at' => '2023-11-20 18:29:00',
                'updated_at' => '2023-11-20 18:29:00',
            ),
            94 => 
            array (
                'id' => 1114,
                'judul' => 'Mudahnya Membuat Pupuk Organik Sendiri Bersama Jimmy Hantu',
                'slug' => 'mudahnya-membuat-pupuk-organik-sendiri-bersama-jimmy-hantu',
                'id_youtube' => 'jTBfCz9G0JU',
                'cover' => 'F6ZpBikn6HqgiPxovH2BCAEoIlmLhZcPAqURPngs.jpg',
                'created_at' => '2023-11-20 18:30:17',
                'updated_at' => '2023-11-20 18:30:17',
            ),
            95 => 
            array (
                'id' => 1115,
                'judul' => 'Mudah dan Murah Buat Pupuk Sendiri Ala Jimmy Hantu Bersama Propaktani',
                'slug' => 'mudah-dan-murah-buat-pupuk-sendiri-ala-jimmy-hantu-bersama-propaktani',
                'id_youtube' => 'PjS-qE0jd98',
                'cover' => 'H5hY4btAgT0l7riFkyLzWckadT5G8lIFXKk2vHER.jpg',
                'created_at' => '2023-11-20 18:31:37',
                'updated_at' => '2023-11-20 18:31:37',
            ),
            96 => 
            array (
                'id' => 1116,
                'judul' => 'Bikin Pupuk Organik Mudah Murah Hasil Melimpah',
                'slug' => 'bikin-pupuk-organik-mudah-murah-hasil-melimpah',
                'id_youtube' => 'mp0oxTv1m6Y',
                'cover' => 'VWM2SLYrRvz6xBtIjtZGjtdM8OQgGXHse0FF9nAM.jpg',
                'created_at' => '2023-11-20 18:32:44',
                'updated_at' => '2023-11-20 18:32:44',
            ),
            97 => 
            array (
                'id' => 1117,
                'judul' => 'Hasil Biosaka Pada Jagung di Gunung Kapur',
                'slug' => 'hasil-biosaka-pada-jagung-di-gunung-kapur',
                'id_youtube' => '9rYNvH6nHTI',
                'cover' => 'VcxVFG54BpVpEgefjZaLUbBrooMrD5Igslavumw8.jpg',
                'created_at' => '2023-11-20 18:33:51',
                'updated_at' => '2023-11-20 18:33:51',
            ),
            98 => 
            array (
                'id' => 1118,
                'judul' => 'Kupas Tuntas Khasiat Biosaka Bersama Anshar, dan Bagaimana Komentar Ahli?',
                'slug' => 'kupas-tuntas-khasiat-biosaka-bersama-anshar-dan-bagaimana-komentar-ahli',
                'id_youtube' => 'no96-oqRjBU',
                'cover' => 'QILl8DoCR2UuByuRaxg70m8CGb2dOtsQLZNjmPBW.jpg',
                'created_at' => '2023-11-20 18:34:54',
                'updated_at' => '2023-11-20 18:34:54',
            ),
            99 => 
            array (
                'id' => 1119,
                'judul' => 'IP 400 DI KABUPATEN SUKOHARJO',
                'slug' => 'ip-400-di-kabupaten-sukoharjo',
                'id_youtube' => 'EYAjza3h1r8',
                'cover' => 'lAlLtzQlOM4zftVeVEdFjwgXUkkcSh4wWtLdhOOo.jpg',
                'created_at' => '2023-11-20 18:36:18',
                'updated_at' => '2023-11-20 18:36:18',
            ),
            100 => 
            array (
                'id' => 1120,
                'judul' => 'Satu Tahun Propaktani Raih Muri',
                'slug' => 'satu-tahun-propaktani-raih-muri',
                'id_youtube' => 'yf_gWtcltXI',
                'cover' => 'c4Pbs9HfTThd24aZIPRBSBwXtZdnmOxMPg9ou3lF.jpg',
                'created_at' => '2023-11-20 18:37:42',
                'updated_at' => '2023-11-20 18:37:42',
            ),
            101 => 
            array (
                'id' => 1121,
                'judul' => 'Gerakan Tanam Sorghum',
                'slug' => 'gerakan-tanam-sorghum',
                'id_youtube' => 'ENJDxVejlag',
                'cover' => 'prYmLkfWVI6fDFjJpNUGCAyJgrL71VhgYUAoMmJ9.jpg',
                'created_at' => '2023-11-20 18:38:47',
                'updated_at' => '2023-11-20 18:38:47',
            ),
            102 => 
            array (
                'id' => 1122,
                'judul' => 'Gerakan Tanam Sorghum',
                'slug' => 'gerakan-tanam-sorghum',
                'id_youtube' => '4vQBnDkcxQ8',
                'cover' => 'TzogOMZvq1wG8q7ILk1agU9a7eoZlXHFiQYmZ7X6.jpg',
                'created_at' => '2023-11-20 18:39:52',
                'updated_at' => '2023-11-20 18:39:52',
            ),
            103 => 
            array (
                'id' => 1123,
                'judul' => 'Jadwal BTS Minggu Ke 2 Juli 2022',
                'slug' => 'jadwal-bts-minggu-ke-2-juli-2022',
                'id_youtube' => 'hMHiJ3O7xr8',
                'cover' => 'tGE3BlFJK3IGpBsNSg3MirE5wHJ2YuvOMIYDdode.jpg',
                'created_at' => '2023-11-20 18:41:14',
                'updated_at' => '2023-11-20 18:41:14',
            ),
            104 => 
            array (
                'id' => 1124,
                'judul' => 'BTS Minggu Ke4 Juli 2022',
                'slug' => 'bts-minggu-ke4-juli-2022',
                'id_youtube' => 'tfcqH07CLWY',
                'cover' => '6yE3idKMwRpRHBow41Vknqtnb40yORzEJ24r0FJd.jpg',
                'created_at' => '2023-11-20 18:42:25',
                'updated_at' => '2023-11-20 18:42:25',
            ),
            105 => 
            array (
                'id' => 1125,
                'judul' => 'SCBN22 Stok Beras 2022',
                'slug' => 'scbn22-stok-beras-2022',
                'id_youtube' => 'j6t9lKXzRvo',
                'cover' => '80J0ZvTjjwjEJsJh6xvT1Mx1OHgEMa8wvDFa39UK.jpg',
                'created_at' => '2023-11-20 18:43:36',
                'updated_at' => '2023-11-20 18:43:36',
            ),
            106 => 
            array (
                'id' => 1126,
                'judul' => 'Stock Beras Aman Hasil SCBN 2022',
                'slug' => 'stock-beras-aman-hasil-scbn-2022',
                'id_youtube' => 'V6dQ0utXopE',
                'cover' => 'C6kxO5l47nOH6ufzUlwI3OGUiNkU47TZy4er8oY3.jpg',
                'created_at' => '2023-11-20 18:45:01',
                'updated_at' => '2023-11-20 18:45:01',
            ),
            107 => 
            array (
                'id' => 1127,
                'judul' => 'BTS Propaktani Minggu Ketiga Agustus 2022',
                'slug' => 'bts-propaktani-minggu-ketiga-agustus-2022',
                'id_youtube' => 'c7Bce7W_CPk',
                'cover' => 'H5iSJYa62Awf0E682ApM9y3eOqvFvSnSJPPpiUbh.jpg',
                'created_at' => '2023-11-20 18:46:38',
                'updated_at' => '2023-11-20 18:46:38',
            ),
            108 => 
            array (
                'id' => 1128,
                'judul' => 'PROPAKTANI Untuk Negeri',
                'slug' => 'propaktani-untuk-negeri',
                'id_youtube' => '9wU0PadUEUM',
                'cover' => 'NRjAtHZ9ltDyugE2Kb5MxcpY6ksHVv26IjV9ediS.jpg',
                'created_at' => '2023-11-20 18:47:49',
                'updated_at' => '2023-11-20 18:47:49',
            ),
            109 => 
            array (
                'id' => 1129,
                'judul' => 'HUT RI 77 PROPAKTANI',
                'slug' => 'hut-ri-77-propaktani',
                'id_youtube' => 'RqNTa3qd3rE',
                'cover' => 'xtfbnMDgA6ZhZRbWVjXCUZ4ANSDQnaPRcV5dTdtx.jpg',
                'created_at' => '2023-11-20 18:49:30',
                'updated_at' => '2023-11-20 18:49:30',
            ),
            110 => 
            array (
                'id' => 1130,
                'judul' => 'Panen Demplot Padi Biosaka BBPOPT jatisari',
                'slug' => 'panen-demplot-padi-biosaka-bbpopt-jatisari',
                'id_youtube' => 'Vjdg43Z_WLo',
                'cover' => 'cUVnrFhMRJeEQRQDzqpkanrC26x4ucUskH8HABBx.jpg',
                'created_at' => '2023-11-20 18:50:33',
                'updated_at' => '2023-11-20 18:50:33',
            ),
            111 => 
            array (
                'id' => 1131,
                'judul' => 'Kinerja Kementerian Pertanian 2022',
                'slug' => 'kinerja-kementerian-pertanian-2022',
                'id_youtube' => 'RCr5vhLuR90',
                'cover' => 'qLKgbtWLB7zks2wiYxsPpx8Jpn5FUvc5NluDMxfu.jpg',
                'created_at' => '2023-11-20 18:51:36',
                'updated_at' => '2023-11-20 18:51:36',
            ),
            112 => 
            array (
                'id' => 1132,
                'judul' => 'Mentan Panen Sorgum di Lamongan',
                'slug' => 'mentan-panen-sorgum-di-lamongan',
                'id_youtube' => 'mAsqn1-jbas',
                'cover' => 'uZgtfBH5n75Ozvjg2l4C34sILfwutjwVeNmVyprq.jpg',
                'created_at' => '2023-11-20 18:52:48',
                'updated_at' => '2023-11-20 18:52:48',
            ),
            113 => 
            array (
                'id' => 1133,
                'judul' => 'Propaktani pelatihan Jimmy Hantu',
                'slug' => 'propaktani-pelatihan-jimmy-hantu',
                'id_youtube' => 'vUL8uZeSAVQ',
                'cover' => 'UxT0fDtBSKj67nzg91wCQvU1IH0rc8CVbJ7MqYfZ.jpg',
                'created_at' => '2023-11-20 18:53:49',
                'updated_at' => '2023-11-20 18:53:49',
            ),
            114 => 
            array (
                'id' => 1134,
                'judul' => 'BTS Propaktani Episode Minggu Pertama September 2022',
                'slug' => 'bts-propaktani-episode-minggu-pertama-september-2022',
                'id_youtube' => '-IjcaNM_LHY',
                'cover' => 'zMUD4bZAE7rAxYFVfWFivnKzdbgC14WY5yOfKtjt.jpg',
                'created_at' => '2023-11-20 18:54:50',
                'updated_at' => '2023-11-20 18:54:50',
            ),
            115 => 
            array (
                'id' => 1135,
                'judul' => 'BTS Propaktani Episode 620-629',
                'slug' => 'bts-propaktani-episode-620-629',
                'id_youtube' => 'sMkPAkZSnI8',
                'cover' => 'aw6I68PEMdl05mFVGb95v5kCXL3rEQ3I19CFSVaO.jpg',
                'created_at' => '2023-11-20 18:55:59',
                'updated_at' => '2023-11-20 18:55:59',
            ),
            116 => 
            array (
                'id' => 1136,
                'judul' => 'Mengapa Harus Benih Bersertifikat?',
                'slug' => 'mengapa-harus-benih-bersertifikat',
                'id_youtube' => 'oQJQAW0kaX0',
                'cover' => '3Qttmp5eOplnN9ucTr6YBGeg03w0vkNmehPN5LSd.jpg',
                'created_at' => '2023-11-20 18:57:18',
                'updated_at' => '2023-11-20 18:57:18',
            ),
            117 => 
            array (
                'id' => 1137,
                'judul' => 'Ayo Makan Sorgum !',
                'slug' => 'ayo-makan-sorgum',
                'id_youtube' => 'EzpdOaPDjYo',
                'cover' => 'Ovu6ANRz8Mxbytpi7P0wjgn38CIuR6n1QP1B2i35.jpg',
                'created_at' => '2023-11-20 18:58:31',
                'updated_at' => '2023-11-20 18:58:31',
            ),
            118 => 
            array (
                'id' => 1138,
                'judul' => 'Raup Untung Tanam Kedelai YT',
                'slug' => 'raup-untung-tanam-kedelai-yt',
                'id_youtube' => 'QM-Px3s6DGI',
                'cover' => 'GMQYeRMEwed3OAA8dOLWUtC5wMaQBi5adKhmcsbr.jpg',
                'created_at' => '2023-11-20 18:59:35',
                'updated_at' => '2023-11-20 18:59:35',
            ),
            119 => 
            array (
                'id' => 1139,
                'judul' => 'Raup Untung Kerjasama Suplai Jagung',
                'slug' => 'raup-untung-kerjasama-suplai-jagung',
                'id_youtube' => 'GflDR1Ev82o',
                'cover' => 'GlaWt4Bw8OefhYa1id7Jx8Jouu5X1dihMRqXTz87.jpg',
                'created_at' => '2023-11-20 19:06:18',
                'updated_at' => '2023-11-20 19:06:18',
            ),
            120 => 
            array (
                'id' => 1140,
                'judul' => 'Bangkit Pemuda, Pertanian Jaya',
                'slug' => 'bangkit-pemuda-pertanian-jaya',
                'id_youtube' => '0fqp-t75CDo',
                'cover' => 'u6fmOb6SeovSLWeZvhruLvTN7rKXRnD6bJiNBJt5.jpg',
                'created_at' => '2023-11-20 19:07:36',
                'updated_at' => '2023-11-20 19:07:36',
            ),
            121 => 
            array (
                'id' => 1141,
                'judul' => 'Tanpa Ragu Budidaya Ubi Jalar',
                'slug' => 'tanpa-ragu-budidaya-ubi-jalar',
                'id_youtube' => 'GWj5Pxq-czY',
                'cover' => 'WefnANW1ENZbxRYrR5jgqMmLd3eEPw9QEYgVBUN0.jpg',
                'created_at' => '2023-11-20 19:09:03',
                'updated_at' => '2023-11-20 19:09:03',
            ),
            122 => 
            array (
                'id' => 1142,
                'judul' => 'Mengenal Kembali Umbi Garut',
                'slug' => 'mengenal-kembali-umbi-garut',
                'id_youtube' => 'vEGSKmJZlvg',
                'cover' => 'rpXSaXXi4eVJEcS1io2Oe40bVNV5h0rJNpHi31qe.jpg',
                'created_at' => '2023-11-20 19:10:18',
                'updated_at' => '2023-11-20 19:10:18',
            ),
            123 => 
            array (
                'id' => 1143,
                'judul' => 'Singkong Komoditas Ekspor',
                'slug' => 'singkong-komoditas-ekspor',
                'id_youtube' => 'wqgPn0BPTcU',
                'cover' => 'JPNBFUnGhFIXwLtRSmJCjsofPeXyRzP0h52g5pAL.jpg',
                'created_at' => '2023-11-20 19:11:36',
                'updated_at' => '2023-11-20 19:11:36',
            ),
            124 => 
            array (
                'id' => 1144,
                'judul' => 'Agenda BTS Propaktani episode 677 - 689',
                'slug' => 'agenda-bts-propaktani-episode-677-689',
                'id_youtube' => 'fqYELFED6o4',
                'cover' => '3W2fpsArGXJgqqbE9K0SaHuk8zYnAY9aiTQi7GsM.jpg',
                'created_at' => '2023-11-20 19:12:43',
                'updated_at' => '2023-11-20 19:12:43',
            ),
            125 => 
            array (
                'id' => 1145,
                'judul' => 'Ramuan Ajaib Si Biosaka',
                'slug' => 'ramuan-ajaib-si-biosaka',
                'id_youtube' => 'hXQC7w-DMn0',
                'cover' => 'bMYksrdQxvQgUznYe9qtB97UnAIo1BXAPyIbSRGK.jpg',
                'created_at' => '2023-11-20 19:14:16',
                'updated_at' => '2023-11-20 19:14:16',
            ),
            126 => 
            array (
                'id' => 1146,
                'judul' => 'Asyiknya Budidaya Jagung',
                'slug' => 'asyiknya-budidaya-jagung',
                'id_youtube' => 'TR46QMPdrsU',
                'cover' => 'IV93ygWdgW27DXjAxCYfBFBDMli5bk9RfB5dNEWF.jpg',
                'created_at' => '2023-11-20 19:15:32',
                'updated_at' => '2023-11-20 19:15:32',
            ),
            127 => 
            array (
                'id' => 1147,
                'judul' => 'Bertani Metode Purba, BTS Propaktani Eps. 685 X Deden Lesmana & Universitas Swadaya Gunung Jati',
                'slug' => 'bertani-metode-purba-bts-propaktani-eps-685-x-deden-lesmana-universitas-swadaya-gunung-jati',
                'id_youtube' => 'EVYDsPNMRXY',
                'cover' => 'ZZy1tQADhXbo8pcoc9YMl0lb9R4fupL6oluJMOkP.jpg',
                'created_at' => '2023-11-20 19:16:39',
                'updated_at' => '2023-11-20 19:16:39',
            ),
            128 => 
            array (
                'id' => 1148,
                'judul' => 'Ayo Manfaatkan KUR Pertanian!',
                'slug' => 'ayo-manfaatkan-kur-pertanian',
                'id_youtube' => '0JRXuIzg1n4',
                'cover' => 'rgTi3aEFU2TazzAIGnYyWlhRnayae4RjpQppxWxl.jpg',
                'created_at' => '2023-11-20 19:17:46',
                'updated_at' => '2023-11-20 19:17:46',
            ),
            129 => 
            array (
                'id' => 1149,
                'judul' => 'Hilirisasi Kunci Sukses Agribisnis',
                'slug' => 'hilirisasi-kunci-sukses-agribisnis',
                'id_youtube' => 'qsJN5bt1_ws',
                'cover' => '602rrdlJsGmyxQgypCyqrMxVwFvN2SFIqLN9cqJ7.jpg',
                'created_at' => '2023-11-20 19:18:52',
                'updated_at' => '2023-11-20 19:18:52',
            ),
            130 => 
            array (
                'id' => 1150,
                'judul' => 'Peluang Untung Padi Organik',
                'slug' => 'peluang-untung-padi-organik',
                'id_youtube' => 'DyALCYYUPl8',
                'cover' => 'FsH3En8hy5mCi4hqapiJXblHW1Yo2p1DKCD6r2hW.jpg',
                'created_at' => '2023-11-20 19:20:02',
                'updated_at' => '2023-11-20 19:20:02',
            ),
            131 => 
            array (
                'id' => 1151,
                'judul' => 'Pangan Lokal Solusi Krisis Pangan Masa Depan: Sorgum',
                'slug' => 'pangan-lokal-solusi-krisis-pangan-masa-depan-sorgum',
                'id_youtube' => 'UFwJP2EOmLU',
                'cover' => 'TLdFu0S0gzF1L7y76rAe8mwoabW0n2t5FGGHsm0M.jpg',
                'created_at' => '2023-11-20 19:21:12',
                'updated_at' => '2023-11-20 19:21:12',
            ),
            132 => 
            array (
                'id' => 1152,
                'judul' => 'Ayo Tingkangkat Produksi Kacang Hijau',
                'slug' => 'ayo-tingkangkat-produksi-kacang-hijau',
                'id_youtube' => '84_NHbl6Ix4',
                'cover' => 'Ch1W3lD3DnJC6DkoyRDPmL6hFe90paN9Uqqt1E5h.jpg',
                'created_at' => '2023-11-20 19:22:26',
                'updated_at' => '2023-11-20 19:22:26',
            ),
            133 => 
            array (
                'id' => 1153,
                'judul' => 'Agenda BTS Propaktani episode 702 - 712',
                'slug' => 'agenda-bts-propaktani-episode-702-712',
                'id_youtube' => 'XQv3tuZ7pm8',
                'cover' => 'nPJmGdNuygVZrauEOOFRRl0tnCl2cmMsE8LkxrW1.jpg',
                'created_at' => '2023-11-20 19:23:30',
                'updated_at' => '2023-11-20 19:23:30',
            ),
            134 => 
            array (
                'id' => 1154,
                'judul' => 'Kunci Sukses Hadapi Krisis Pangan Global: Maksimalkan Produksi, Minimalkan Input',
                'slug' => 'kunci-sukses-hadapi-krisis-pangan-global-maksimalkan-produksi-minimalkan-input',
                'id_youtube' => 'HOcudi6BxOM',
                'cover' => 'LsXQuCouB6h8GJB9X3DwJZ6pmFMLUhvJnjyraBvj.jpg',
                'created_at' => '2023-11-20 19:24:31',
                'updated_at' => '2023-11-20 19:24:31',
            ),
            135 => 
            array (
                'id' => 1155,
                'judul' => 'Saatnya Pemuda Bergerak & Bangun Pertanian',
                'slug' => 'saatnya-pemuda-bergerak-bangun-pertanian',
                'id_youtube' => 'nEP7j77U55I',
                'cover' => 'zw7umKznVOEahsD76KejiiJRXOQeI3vLo1RxG2gk.jpg',
                'created_at' => '2023-11-20 19:25:33',
                'updated_at' => '2023-11-20 19:25:33',
            ),
            136 => 
            array (
                'id' => 1156,
                'judul' => 'Indonesia Feed The World 2045',
                'slug' => 'indonesia-feed-the-world-2045',
                'id_youtube' => 'ef5CuIoPdp8',
                'cover' => 'k6PJxT88OQ55XPBhukLIuOMHKcWwxvre5wUluEDN.jpg',
                'created_at' => '2023-11-20 19:26:40',
                'updated_at' => '2023-11-20 19:26:40',
            ),
            137 => 
            array (
                'id' => 1157,
                'judul' => 'Ayo Bersinergi Jaga Ketahanan Pangan Kita',
                'slug' => 'ayo-bersinergi-jaga-ketahanan-pangan-kita',
                'id_youtube' => 'mDAFPhs6Rj8',
                'cover' => 'EoWYZIHsEbYpEjxTWschxtr64EUXXE8M29NkzIHI.jpg',
                'created_at' => '2023-11-20 19:27:47',
                'updated_at' => '2023-11-20 19:27:47',
            ),
            138 => 
            array (
                'id' => 1158,
                'judul' => 'Teknologi Maju Produktivitas Meningkat',
                'slug' => 'teknologi-maju-produktivitas-meningkat',
                'id_youtube' => 'SIRjm9BMgCo',
                'cover' => 'b1C62wQ6WzTvUEUGCf7GTdfDl1wnxVtuua9F0oIP.jpg',
                'created_at' => '2023-11-20 19:28:53',
                'updated_at' => '2023-11-20 19:28:53',
            ),
            139 => 
            array (
                'id' => 1159,
                'judul' => 'Bergerak Bersama Pertahankan Swasembada',
                'slug' => 'bergerak-bersama-pertahankan-swasembada',
                'id_youtube' => 'Zi-n8QZQw8s',
                'cover' => 'EMRQySTyAAZnn6R2XoOpYiBBZXLBM9XT2aGEY7dd.jpg',
                'created_at' => '2023-11-20 19:29:57',
                'updated_at' => '2023-11-20 19:29:57',
            ),
            140 => 
            array (
                'id' => 1160,
                'judul' => 'Peluang Diversifikasi Pangan : Gandum',
                'slug' => 'peluang-diversifikasi-pangan-gandum',
                'id_youtube' => 'CllpAVtrjw0',
                'cover' => 'IZ6RLemk85hQ9pGeQMGqnLqAHZZ7vjKE8wwTKfW0.jpg',
                'created_at' => '2023-11-20 19:30:58',
                'updated_at' => '2023-11-20 19:30:58',
            ),
            141 => 
            array (
                'id' => 1161,
                'judul' => 'Perkuat Pondasi Pertanian dengan Teknologi Perbenihan',
                'slug' => 'perkuat-pondasi-pertanian-dengan-teknologi-perbenihan',
                'id_youtube' => 'QVkqKD14Nq8',
                'cover' => 'MuKDjfpLPSwes4RakFfEMJJljuTSwPVsWJsFGzbe.jpg',
                'created_at' => '2023-11-20 19:31:56',
                'updated_at' => '2023-11-20 19:31:56',
            ),
            142 => 
            array (
                'id' => 1162,
                'judul' => 'Sejuta Manfaat Sorgum',
                'slug' => 'sejuta-manfaat-sorgum',
                'id_youtube' => 'vZHjNwR5Af0',
                'cover' => 'B4kIQh50VDMW6u6ysAYNvxszYFfkzOoqtksXnbFW.jpg',
                'created_at' => '2023-11-20 19:33:02',
                'updated_at' => '2023-11-20 19:33:02',
            ),
            143 => 
            array (
                'id' => 1163,
                'judul' => 'Ayo Populerkan Legong Kedelai Sorgum Singkong',
                'slug' => 'ayo-populerkan-legong-kedelai-sorgum-singkong',
                'id_youtube' => 'xMpmUForEOI',
                'cover' => 'MboSUyGNmcPSgEn5g2q9kr11hRJh8kxZ49xkc48G.jpg',
                'created_at' => '2023-11-20 19:34:03',
                'updated_at' => '2023-11-20 19:34:03',
            ),
            144 => 
            array (
                'id' => 1164,
                'judul' => 'Inovasi Kunci Mewujudkan Indonesia Lumbung Pangan Dunia 2045',
                'slug' => 'inovasi-kunci-mewujudkan-indonesia-lumbung-pangan-dunia-2045',
                'id_youtube' => 'wPJNKDQx55s',
                'cover' => 'ORDufAuC4zZIe3TQF8Ma98ihFNcdjuOmDWPWvj0J.jpg',
                'created_at' => '2023-11-20 19:35:22',
                'updated_at' => '2023-11-20 19:35:22',
            ),
            145 => 
            array (
                'id' => 1165,
                'judul' => 'Kiprah Diandro, Millenial Muda Menjadikan Tempe Mendunia',
                'slug' => 'kiprah-diandro-millenial-muda-menjadikan-tempe-mendunia',
                'id_youtube' => 'AxPoGMqlKz4',
                'cover' => '3kzHsBoVePiKylL3O8B9U9vdoFvM8JvJqjJ1mpAM.jpg',
                'created_at' => '2023-11-20 19:36:22',
                'updated_at' => '2023-11-20 19:36:22',
            ),
            146 => 
            array (
                'id' => 1166,
                'judul' => 'Wujudkan Pertanian Berkelanjutan dengan Biofarming',
                'slug' => 'wujudkan-pertanian-berkelanjutan-dengan-biofarming',
                'id_youtube' => 'VLMGzU9H3Hc',
                'cover' => 'updTtF5FSIRZT4Yz9R0ohWix4dOIwANL9IK4C8fq.jpg',
                'created_at' => '2023-11-20 19:37:44',
                'updated_at' => '2023-11-20 19:37:44',
            ),
            147 => 
            array (
                'id' => 1167,
                'judul' => 'Peluang Energi Terbarukan: Bioetanol Sorgum',
                'slug' => 'peluang-energi-terbarukan-bioetanol-sorgum',
                'id_youtube' => '5Zyc58VCPGk',
                'cover' => 'J1wZK9DrwOi9dmjC95kJeJMa1k5zY3tFyp8KBY8F.jpg',
                'created_at' => '2023-11-20 19:39:02',
                'updated_at' => '2023-11-20 19:39:02',
            ),
            148 => 
            array (
                'id' => 1168,
                'judul' => 'Propaktani Versi Biosaka',
                'slug' => 'propaktani-versi-biosaka',
                'id_youtube' => 'iTu_8TbhcfY',
                'cover' => 'MRm0rzveuz18QGKhGaenztXugRJ3DWOjlR4ifEWz.png',
                'created_at' => '2023-12-14 10:25:11',
                'updated_at' => '2023-12-14 10:25:11',
            ),
            149 => 
            array (
                'id' => 1169,
                'judul' => 'Apa biosaka? Bagaimana menurut ilmuwan? Ini penjelasannya',
                'slug' => 'apa-biosaka-bagaimana-menurut-ilmuwan-ini-penjelasannya',
                'id_youtube' => 'P6uiwnFQma4',
                'cover' => 'jL5hUCIpvPtyIM18PsVzJ18XjYv2uCVmz69MkQOQ.png',
                'created_at' => '2023-12-14 10:30:36',
                'updated_at' => '2023-12-14 10:30:36',
            ),
            150 => 
            array (
                'id' => 1170,
                'judul' => 'Apa Itu Biosaka dari Segi Keilmuan?',
                'slug' => 'apa-itu-biosaka-dari-segi-keilmuan',
                'id_youtube' => 'GEYlmyic7_Q',
                'cover' => 'CUslrr28Y75xXKy8KYZZPHzq2FUfCP9GqFgn8UwJ.png',
                'created_at' => '2023-12-14 10:32:54',
                'updated_at' => '2023-12-14 10:32:54',
            ),
            151 => 
            array (
                'id' => 1171,
                'judul' => 'Jadwal BTS Propaktani Minggu ke-3 November 2022',
                'slug' => 'jadwal-bts-propaktani-minggu-ke-3-november-2022',
                'id_youtube' => 'VVAGXKbZrjI',
                'cover' => 'zBz1WJaXDp0qZ1YyajuVFacbd1iMoH9kbWay6Vgi.png',
                'created_at' => '2023-12-14 10:34:21',
                'updated_at' => '2023-12-14 10:34:21',
            ),
            152 => 
            array (
                'id' => 1172,
                'judul' => 'Apa Itu Biosaka? Mengapa Harus Biosaka?',
                'slug' => 'apa-itu-biosaka-mengapa-harus-biosaka',
                'id_youtube' => 'eMJB1n1fEcg',
                'cover' => 'JXk1OKiFbuGjsJ009SLiI5c9Q6QHIUBgWONaBq3K.png',
                'created_at' => '2023-12-14 10:35:35',
                'updated_at' => '2023-12-14 10:35:35',
            ),
            153 => 
            array (
                'id' => 1173,
                'judul' => 'Rame-Rame Meramu Meremas Biosaka',
                'slug' => 'rame-rame-meramu-meremas-biosaka',
                'id_youtube' => '31rJjHyNjg0',
                'cover' => '2ReuUjzSM7xRtaDSCYG0N857SLCalOB8VDpPkYc5.png',
                'created_at' => '2023-12-14 10:36:58',
                'updated_at' => '2023-12-14 10:36:58',
            ),
            154 => 
            array (
                'id' => 1174,
                'judul' => 'Inovasi Teknologi Wujudkan Efisiensi Produksi',
                'slug' => 'inovasi-teknologi-wujudkan-efisiensi-produksi',
                'id_youtube' => 'UKvtz1wvGkw',
                'cover' => '38HaAj2qEPqsYYmPWcfaQdVTIwJ32AJlk2BqyNpR.png',
                'created_at' => '2023-12-14 10:38:06',
                'updated_at' => '2023-12-14 10:38:06',
            ),
            155 => 
            array (
                'id' => 1175,
                'judul' => 'Kolaborasi Hilirisasi Sejahterakan Petani',
                'slug' => 'kolaborasi-hilirisasi-sejahterakan-petani',
                'id_youtube' => 'MyY4khFyvsg',
                'cover' => 'iJePsvUQUJKpxIOJ9pfywyGpeu3UGpaOM8zX6kN0.png',
                'created_at' => '2023-12-14 10:39:53',
                'updated_at' => '2023-12-14 10:39:53',
            ),
            156 => 
            array (
                'id' => 1176,
                'judul' => 'GACC & Traceability Kunci Lebarkan Pasar Ekspor',
                'slug' => 'gacc-traceability-kunci-lebarkan-pasar-ekspor',
                'id_youtube' => 'e49Mdrwb4kM',
                'cover' => 'dTm9DPDUrOZCAmtqftqmNzj86nbvopTjL2sUTwcY.png',
                'created_at' => '2023-12-14 10:41:00',
                'updated_at' => '2023-12-14 10:41:00',
            ),
            157 => 
            array (
                'id' => 1177,
            'judul' => 'Ini Dia 3 in 1 ala Pak Heri Sunarto  (IP400, Integrated Farming, Zero waste)',
                'slug' => 'ini-dia-3-in-1-ala-pak-heri-sunarto-ip400-integrated-farming-zero-waste',
                'id_youtube' => '98M-uTuXDgs',
                'cover' => 'YwysE6ZQGvD1ZaUbpZgPu6ajoJSnqZH0RW7E8C7J.png',
                'created_at' => '2023-12-14 10:42:04',
                'updated_at' => '2023-12-14 10:42:04',
            ),
            158 => 
            array (
                'id' => 1178,
                'judul' => 'Kupas Tuntas Membuat Biosaka Bersama Kang Doktor Rachmat',
                'slug' => 'kupas-tuntas-membuat-biosaka-bersama-kang-doktor-rachmat',
                'id_youtube' => 'V_Bw3tnzplg',
                'cover' => '74q3tcKRPetexn7wQmPmKhG1PhlnB70pyZ4SoMgS.png',
                'created_at' => '2023-12-14 10:43:14',
                'updated_at' => '2023-12-14 10:43:14',
            ),
            159 => 
            array (
                'id' => 1179,
                'judul' => 'Hotong, Si Gandum Versi Indonesia',
                'slug' => 'hotong-si-gandum-versi-indonesia',
                'id_youtube' => 'X-D_g3cB564',
                'cover' => 'ez6ovlVMGUA0t2cxy8AcxoqFtFVqaMaYFHeQR0X6.png',
                'created_at' => '2023-12-14 10:44:27',
                'updated_at' => '2023-12-14 10:44:27',
            ),
            160 => 
            array (
                'id' => 1180,
                'judul' => 'Saatnya Pemuda Rintis Transformasi Pertanian',
                'slug' => 'saatnya-pemuda-rintis-transformasi-pertanian',
                'id_youtube' => '0nyic9OO2Io',
                'cover' => 'DJidYKA9hVPVc4OOdNuiFWsK7g9Kxia6BxTv8y2Y.png',
                'created_at' => '2023-12-14 10:45:46',
                'updated_at' => '2023-12-14 10:45:46',
            ),
            161 => 
            array (
                'id' => 1181,
                'judul' => 'Hanjeli, Potensi Diversifikasi Pangan Baru',
                'slug' => 'hanjeli-potensi-diversifikasi-pangan-baru',
                'id_youtube' => 'UtsKFBDrtSk',
                'cover' => 'C97P6QrK5FU9eZi5VbVql5PTZ8jIRwmKdsey32QE.png',
                'created_at' => '2023-12-14 10:46:51',
                'updated_at' => '2023-12-14 10:46:51',
            ),
            162 => 
            array (
                'id' => 1182,
                'judul' => 'Solusi Atasi Stunting dengan Padi Biofortifikasi',
                'slug' => 'solusi-atasi-stunting-dengan-padi-biofortifikasi',
                'id_youtube' => 'bqTTgdt8_EA',
                'cover' => '3olI0v3BrgUsEUHFqQy0CS9LfWncL9InFnrnPnvp.png',
                'created_at' => '2023-12-14 10:47:59',
                'updated_at' => '2023-12-14 10:47:59',
            ),
            163 => 
            array (
                'id' => 1183,
                'judul' => 'Agenda BTS Propaktani episode 768 - 778',
                'slug' => 'agenda-bts-propaktani-episode-768-778',
                'id_youtube' => 'WOj5ek1pz0o',
                'cover' => '6nMi0PR0d9KixogZCMwz8B0Mpy8bAuX9BGMT2a7E.png',
                'created_at' => '2023-12-14 10:53:46',
                'updated_at' => '2023-12-14 10:53:46',
            ),
            164 => 
            array (
                'id' => 1184,
                'judul' => 'Saatnya Kembangkan Pertanian Skala Ekonomi',
                'slug' => 'saatnya-kembangkan-pertanian-skala-ekonomi',
                'id_youtube' => 'laNaZT8rDY4',
                'cover' => 'UA8GCfg8GoweDwevbIbPn1K9GhPZXV44GcAevWnS.png',
                'created_at' => '2023-12-14 10:55:14',
                'updated_at' => '2023-12-14 10:55:14',
            ),
            165 => 
            array (
                'id' => 1185,
                'judul' => 'Sanitasi Kunci Atasi Busuk Pada Umbi',
                'slug' => 'sanitasi-kunci-atasi-busuk-pada-umbi',
                'id_youtube' => 'wNt6tyf0lkk',
                'cover' => 'YDOyNAKk33LEOrGvvkJtFJRKEaAgPP6PsY8nvblB.png',
                'created_at' => '2023-12-14 10:56:26',
                'updated_at' => '2023-12-14 10:56:26',
            ),
            166 => 
            array (
                'id' => 1186,
                'judul' => 'Petani Millenial: Juru Temu Petani dengan Pasar',
                'slug' => 'petani-millenial-juru-temu-petani-dengan-pasar',
                'id_youtube' => 'EmHyTkpESO8',
                'cover' => 'bhwdHDERlQmlYfcNr6fFVWbm1jpJPVp7JagovRvm.png',
                'created_at' => '2023-12-14 10:57:42',
                'updated_at' => '2023-12-14 10:57:42',
            ),
            167 => 
            array (
                'id' => 1187,
                'judul' => 'Terus Bersinergi Perkuat Pertanian Pedesaan',
                'slug' => 'terus-bersinergi-perkuat-pertanian-pedesaan',
                'id_youtube' => '2_RMv9sP-JE',
                'cover' => 'bewnDN9ZILS6hz8FncWCUpNV17OYgUbFAhoV4cHW.png',
                'created_at' => '2023-12-14 10:58:49',
                'updated_at' => '2023-12-14 10:58:49',
            ),
            168 => 
            array (
                'id' => 1188,
                'judul' => 'Hadapi Krisis Global dengan Pangan Lokal',
                'slug' => 'hadapi-krisis-global-dengan-pangan-lokal',
                'id_youtube' => 'p9Sgtme9Oa0',
                'cover' => 'WU47SKs66FSjd5YptxfLBrUFxM7ccFu3woQWKk6H.png',
                'created_at' => '2023-12-14 11:00:05',
                'updated_at' => '2023-12-14 11:00:05',
            ),
            169 => 
            array (
                'id' => 1189,
                'judul' => 'Terus Jaga & Tingkatkan Mutu Produk Pertanian',
                'slug' => 'terus-jaga-tingkatkan-mutu-produk-pertanian',
                'id_youtube' => 'PteVG1rFa5o',
                'cover' => 'gSTC7V5nf0W4SYN3KdWkXxvuQPv6vbblxf0sXjqg.png',
                'created_at' => '2023-12-14 11:01:13',
                'updated_at' => '2023-12-14 11:01:13',
            ),
            170 => 
            array (
                'id' => 1190,
                'judul' => 'Jangan Terbalik! Pupuk Organik yang Utama',
                'slug' => 'jangan-terbalik-pupuk-organik-yang-utama',
                'id_youtube' => 'K41eM8C2dxg',
                'cover' => 'spKocO5qJvjizMqQVShW2skjZBlYFweNnn5WRpvi.png',
                'created_at' => '2023-12-14 11:03:12',
                'updated_at' => '2023-12-14 11:03:12',
            ),
            171 => 
            array (
                'id' => 1191,
                'judul' => 'Menguak Misteri Rumput Ramuan Biosaka',
                'slug' => 'menguak-misteri-rumput-ramuan-biosaka',
                'id_youtube' => 'VKePlCW4hTo',
                'cover' => '72JgiCQKteEDDK70gEFcsuRymCeAGc4vFEeEAOba.png',
                'created_at' => '2023-12-14 11:04:17',
                'updated_at' => '2023-12-14 11:04:17',
            ),
            172 => 
            array (
                'id' => 1192,
                'judul' => 'Kunci Wujudkan Pertanian Maju Mandiri Modern',
                'slug' => 'kunci-wujudkan-pertanian-maju-mandiri-modern',
                'id_youtube' => 'sAJLeEsjW-I',
                'cover' => 'oLQ1LMfYkvycxYaa3Cm2oP0MXb59W9m4dtti7OTG.png',
                'created_at' => '2023-12-14 11:05:25',
                'updated_at' => '2023-12-14 11:05:25',
            ),
            173 => 
            array (
                'id' => 1193,
                'judul' => 'Tingkatkan Kolaborasi Bangun Efisiensi Rantai Pasok Beras',
                'slug' => 'tingkatkan-kolaborasi-bangun-efisiensi-rantai-pasok-beras',
                'id_youtube' => 'MFBXVamIeTA',
                'cover' => 'yym1auJLrpma4hs32ltcBu39WsnmhXEY9Jr6rcEe.png',
                'created_at' => '2023-12-14 11:06:53',
                'updated_at' => '2023-12-14 11:06:53',
            ),
            174 => 
            array (
                'id' => 1194,
                'judul' => 'Inovasi Kunci Tingkatkan Produksi dan Produktivitas',
                'slug' => 'inovasi-kunci-tingkatkan-produksi-dan-produktivitas',
                'id_youtube' => 'xGXif1mmcaA',
                'cover' => 'oKfnxjK7VUnxRAh33YLPQlPzZLRRRA8A3ZzE0FBp.png',
                'created_at' => '2023-12-14 11:08:11',
                'updated_at' => '2023-12-14 11:08:11',
            ),
            175 => 
            array (
                'id' => 1195,
                'judul' => 'Ayo Terapkan Pertanian Terintegrasi',
                'slug' => 'ayo-terapkan-pertanian-terintegrasi',
                'id_youtube' => '49WJpugnazk',
                'cover' => 'KMjlqACpAKBxmmzhqPWrlUPRV9ZeihEZdL6hCaZb.png',
                'created_at' => '2023-12-14 11:09:24',
                'updated_at' => '2023-12-14 11:09:24',
            ),
            176 => 
            array (
                'id' => 1196,
                'judul' => 'Agenda BTS Propaktani episode 779 - 789, Minggu ke-2 Desember 2022',
                'slug' => 'agenda-bts-propaktani-episode-779-789-minggu-ke-2-desember-2022',
                'id_youtube' => 'fhWhEzQ5tXY',
                'cover' => 'Wp8pZogor7RqcYU9tK29ytEHDAdR0CTUgFoU01vy.png',
                'created_at' => '2023-12-14 11:10:34',
                'updated_at' => '2023-12-14 11:10:34',
            ),
            177 => 
            array (
                'id' => 1197,
                'judul' => 'Variasi Olahan Kunci Singkong Naik Kelas',
                'slug' => 'variasi-olahan-kunci-singkong-naik-kelas',
                'id_youtube' => 'Brp0GifAdto',
                'cover' => 'Yzq0tgbHNYd6mFGx6Uqtxbb9a9GNiet3JALAn8p8.png',
                'created_at' => '2023-12-14 11:11:49',
                'updated_at' => '2023-12-14 11:11:49',
            ),
            178 => 
            array (
                'id' => 1198,
                'judul' => 'Lewati Krisis Global dengan Olahan Pangan Lokal',
                'slug' => 'lewati-krisis-global-dengan-olahan-pangan-lokal',
                'id_youtube' => 'z_mzv4LywQI',
                'cover' => 'gSXSZ98gtIzLbNDpR72zoqWI0aRbyKgzzzYTfQU7.png',
                'created_at' => '2023-12-14 11:14:05',
                'updated_at' => '2023-12-14 11:14:05',
            ),
            179 => 
            array (
                'id' => 1199,
                'judul' => 'Gunakan Bahan Alami Jaga Kesuburan Tanah',
                'slug' => 'gunakan-bahan-alami-jaga-kesuburan-tanah',
                'id_youtube' => 'RtmIVFlzcdo',
                'cover' => 'SGTwcgnHE6vcSFzQwqDZShOykqkdYduskhNM1hIv.png',
                'created_at' => '2023-12-14 11:15:12',
                'updated_at' => '2023-12-14 11:15:12',
            ),
            180 => 
            array (
                'id' => 1200,
                'judul' => 'Korporasi Petani Dukung Pengembangan Kawasan Jagung',
                'slug' => 'korporasi-petani-dukung-pengembangan-kawasan-jagung',
                'id_youtube' => 'Ze9_sN7Ydu0',
                'cover' => 'vst1UVW95TwraqCq4Z0W6m1T0wtWQ2XODZfSBN4r.png',
                'created_at' => '2023-12-14 11:22:49',
                'updated_at' => '2023-12-14 11:22:49',
            ),
            181 => 
            array (
                'id' => 1201,
                'judul' => 'Produktivitas Naik & Tetap Ramah Lingkungan dengan Bahan Organik',
                'slug' => 'produktivitas-naik-tetap-ramah-lingkungan-dengan-bahan-organik',
                'id_youtube' => '8ktGtVrYM-M',
                'cover' => 'W2H5W8JJ6jUaFch6qdoxyZFLT4BzCX0AGDeL0GgZ.png',
                'created_at' => '2023-12-14 11:23:58',
                'updated_at' => '2023-12-14 11:23:58',
            ),
            182 => 
            array (
                'id' => 1202,
                'judul' => 'Perkuat Kolaborasi Hadapi Perubahan Iklim',
                'slug' => 'perkuat-kolaborasi-hadapi-perubahan-iklim',
                'id_youtube' => 'Vf7iAfJlGUc',
                'cover' => '5EmijEaPJBkNL3H05AgQPbI37Pu5SdTm88tFl6ps.png',
                'created_at' => '2023-12-14 11:25:03',
                'updated_at' => '2023-12-14 11:25:03',
            ),
            183 => 
            array (
                'id' => 1203,
                'judul' => 'Jaga & Jamin Keamanan Pangan dengan Uji Mutu Pangan',
                'slug' => 'jaga-jamin-keamanan-pangan-dengan-uji-mutu-pangan',
                'id_youtube' => '4uCtHoh2UH4',
                'cover' => 'pNy8ouPOZJ5KMHJM47BNupEbQNcmHC0qA6jkybWp.png',
                'created_at' => '2023-12-14 11:26:56',
                'updated_at' => '2023-12-14 11:26:56',
            ),
            184 => 
            array (
                'id' => 1204,
                'judul' => 'Sinergitas & Kolaborasi Jaga Ketahanan Pangan',
                'slug' => 'sinergitas-kolaborasi-jaga-ketahanan-pangan',
                'id_youtube' => 'Z4e4R14nVXo',
                'cover' => 'qNE7tCgGzBDWv4Qy4ZwFXmqYfoByFqXyYkZzVAVQ.png',
                'created_at' => '2023-12-14 11:27:56',
                'updated_at' => '2023-12-14 11:27:56',
            ),
            185 => 
            array (
                'id' => 1205,
                'judul' => 'Branding : Kunci Bentuk Wajah Baru Singkong',
                'slug' => 'branding-kunci-bentuk-wajah-baru-singkong',
                'id_youtube' => 'v5WOJ7c5HH4',
                'cover' => 'gZlD0G3KpbHoeGxyPT6iJcvjGpk9SmgoNV79Z0zY.png',
                'created_at' => '2023-12-14 11:29:01',
                'updated_at' => '2023-12-14 11:29:01',
            ),
            186 => 
            array (
                'id' => 1206,
                'judul' => 'Ayo Terus Genjot Produktivitas Padi Organik',
                'slug' => 'ayo-terus-genjot-produktivitas-padi-organik',
                'id_youtube' => 'ub1zWtIoeN8',
                'cover' => 'GbanDQTWpgbzXxN3IrtF1xi7EC5KMGew2udVcPMg.png',
                'created_at' => '2023-12-14 11:30:01',
                'updated_at' => '2023-12-14 11:30:01',
            ),
            187 => 
            array (
                'id' => 1207,
                'judul' => 'Bangun Sinergi Berdayakan Petani Mandiri',
                'slug' => 'bangun-sinergi-berdayakan-petani-mandiri',
                'id_youtube' => 'LSmMxjESdy8',
                'cover' => 'd2js2ArI3KAmIG35RqHDp0ioAAplKYCH5mm8sCAP.png',
                'created_at' => '2023-12-14 11:31:48',
                'updated_at' => '2023-12-14 11:31:48',
            ),
            188 => 
            array (
                'id' => 1208,
                'judul' => 'Terus Kembangkan Ramuan Biosaka Harmoni',
                'slug' => 'terus-kembangkan-ramuan-biosaka-harmoni',
                'id_youtube' => 'ewYoiJ3jwis',
                'cover' => 'XU2YCDaGNwsynX0ZQPsd0a00EDvqMQjBMR3MmK72.png',
                'created_at' => '2023-12-14 11:33:29',
                'updated_at' => '2023-12-14 11:33:29',
            ),
            189 => 
            array (
                'id' => 1209,
                'judul' => 'Ayo Terus Kembangkan Inovasi Olahan Sorgum',
                'slug' => 'ayo-terus-kembangkan-inovasi-olahan-sorgum',
                'id_youtube' => 'z7nQXCJ2Wo8',
                'cover' => 'PAt0muvvx9hQtaz5Jy2GH90wqZNh4oOXOgv3EU0D.png',
                'created_at' => '2023-12-14 11:36:18',
                'updated_at' => '2023-12-14 11:36:18',
            ),
            190 => 
            array (
                'id' => 1210,
                'judul' => 'Praktik & Buktikan Sendiri Efektivitas Ramuan Biosaka',
                'slug' => 'praktik-buktikan-sendiri-efektivitas-ramuan-biosaka',
                'id_youtube' => 'DP4Ujd7fbjw',
                'cover' => '2iHO90HeCiN9abI183emfg1epdNV1nQ45XH9RTyn.png',
                'created_at' => '2023-12-14 11:53:17',
                'updated_at' => '2023-12-14 11:53:17',
            ),
            191 => 
            array (
                'id' => 1211,
                'judul' => 'Agenda BTS Propaktani episode 791 - 804',
                'slug' => 'agenda-bts-propaktani-episode-791-804',
                'id_youtube' => 'Auu12uS2TjA',
                'cover' => 'rvxxe7NwfXabF68JEGSVfQfCwSgEKhZsR40lz3yb.png',
                'created_at' => '2023-12-14 15:14:53',
                'updated_at' => '2023-12-14 15:14:53',
            ),
            192 => 
            array (
                'id' => 1212,
                'judul' => 'Atasi Krisis Pangan dengan Potensi Beragam Umbi',
                'slug' => 'atasi-krisis-pangan-dengan-potensi-beragam-umbi',
                'id_youtube' => 'hgGVa2XhPmk',
                'cover' => 'DTMKEsuCtl7dJUzvBXIuf9c0qQLcQduJ96wikijG.png',
                'created_at' => '2023-12-14 15:16:06',
                'updated_at' => '2023-12-14 15:16:06',
            ),
            193 => 
            array (
                'id' => 1213,
                'judul' => 'Sinergitas & Kolaborasi Jaga Ketahanan Pangan',
                'slug' => 'sinergitas-kolaborasi-jaga-ketahanan-pangan',
                'id_youtube' => 'UAFNvjhWgGU',
                'cover' => 'X0PMJCyyg0tGFZuErZV2NTp78CbrV9COLEgqOBLJ.png',
                'created_at' => '2023-12-14 15:17:17',
                'updated_at' => '2023-12-14 15:17:17',
            ),
            194 => 
            array (
                'id' => 1214,
                'judul' => 'Jaga Produksi Kendalikan Hama OPT',
                'slug' => 'jaga-produksi-kendalikan-hama-opt',
                'id_youtube' => 'N45-yZ9dFhQ',
                'cover' => 'ecijizLBM9uVSPQrdbwDE2UAZt21PSIg10fO6Avv.png',
                'created_at' => '2023-12-14 15:18:25',
                'updated_at' => '2023-12-14 15:18:25',
            ),
            195 => 
            array (
                'id' => 1215,
                'judul' => 'Potensi Pengembangan Talas Beneng Banten',
                'slug' => 'potensi-pengembangan-talas-beneng-banten',
                'id_youtube' => 'VNYHk-sOoTA',
                'cover' => 'VBYE5jwqtSCJ08RyuRHhYvnTAbr2pHaC4pe531GV.png',
                'created_at' => '2023-12-14 15:19:36',
                'updated_at' => '2023-12-14 15:19:36',
            ),
            196 => 
            array (
                'id' => 1216,
                'judul' => 'Jaga Persediaan Jaga Kestabilan Harga',
                'slug' => 'jaga-persediaan-jaga-kestabilan-harga',
                'id_youtube' => 'RcEevhHGOBs',
                'cover' => 'fop8hUykor5e9gheVlA104HeGYze6iWvwIgKmFxK.png',
                'created_at' => '2023-12-14 15:21:27',
                'updated_at' => '2023-12-14 15:21:27',
            ),
            197 => 
            array (
                'id' => 1217,
                'judul' => 'Ayo Terus Tingkatkan Indeks Pertanaman',
                'slug' => 'ayo-terus-tingkatkan-indeks-pertanaman',
                'id_youtube' => 'Bgf6OMRhT58',
                'cover' => 'Cl9VQGnHbgZeRnBGDyjgQtdn4rmOTGmYzi2Ocbsh.png',
                'created_at' => '2023-12-14 15:22:32',
                'updated_at' => '2023-12-14 15:22:32',
            ),
            198 => 
            array (
                'id' => 1218,
                'judul' => 'Biosaka untuk Masa Depan Umat',
                'slug' => 'biosaka-untuk-masa-depan-umat',
                'id_youtube' => '9kkSym3HQHc',
                'cover' => 'b8aG6MnQQ8xhgqa4vJOg94Z5VQ0bCxZjfNkAwXfW.png',
                'created_at' => '2023-12-14 15:23:37',
                'updated_at' => '2023-12-14 15:23:37',
            ),
            199 => 
            array (
                'id' => 1219,
                'judul' => 'Ayo Manfaatkan Lahan Suboptimal untuk Pengembangan Sorgum',
                'slug' => 'ayo-manfaatkan-lahan-suboptimal-untuk-pengembangan-sorgum',
                'id_youtube' => 'E-QzMPUwQfQ',
                'cover' => 'SJ9GqrZRaCZaIkwanXzLoqik9dMYFfGkPVLpmnHY.png',
                'created_at' => '2023-12-14 15:24:36',
                'updated_at' => '2023-12-14 15:24:36',
            ),
            200 => 
            array (
                'id' => 1220,
                'judul' => 'Antisipasi Perubahan Iklim Jaga Kestabilan Produksi',
                'slug' => 'antisipasi-perubahan-iklim-jaga-kestabilan-produksi',
                'id_youtube' => 'zx43BSlzDdE',
                'cover' => 'Xq0GjHXVs9hHmMYE4sGmOP4e5gYkTUvSbZQmd7Tq.png',
                'created_at' => '2023-12-14 15:25:44',
                'updated_at' => '2023-12-14 15:25:44',
            ),
            201 => 
            array (
                'id' => 1221,
                'judul' => 'Ayo Bersinergi Wujudkan Pulau Dewata Pulau Organik',
                'slug' => 'ayo-bersinergi-wujudkan-pulau-dewata-pulau-organik',
                'id_youtube' => 'Y6jF2nZUoRs',
                'cover' => 'e2LWATMgOclUZBjtoqdY7l5q3LdappFy6DkLb4m2.png',
                'created_at' => '2023-12-14 15:26:50',
                'updated_at' => '2023-12-14 15:26:50',
            ),
            202 => 
            array (
                'id' => 1222,
                'judul' => 'Terus Sebar Luaskan Demplot Biosaka',
                'slug' => 'terus-sebar-luaskan-demplot-biosaka',
                'id_youtube' => 'AJbcCP4HxXU',
                'cover' => '0o64YypVg3GnIy9m5MHqCIc6cQB625L23z6DmDy7.png',
                'created_at' => '2023-12-14 15:27:51',
                'updated_at' => '2023-12-14 15:27:51',
            ),
            203 => 
            array (
                'id' => 1223,
                'judul' => 'Agenda BTS Propaktani Episode 805 - 816, minggu keempat Desember 2022',
                'slug' => 'agenda-bts-propaktani-episode-805-816-minggu-keempat-desember-2022',
                'id_youtube' => 'qFQpa8sbhtk',
                'cover' => 'GOvbXsRdjXTdCQ9uAh2A2WaW9pbRKowCuk2Q0KYb.png',
                'created_at' => '2023-12-14 15:29:02',
                'updated_at' => '2023-12-14 15:29:02',
            ),
            204 => 
            array (
                'id' => 1224,
                'judul' => 'Manfaatkan Limbah Wujudkan Pertanian Zero Waste',
                'slug' => 'manfaatkan-limbah-wujudkan-pertanian-zero-waste',
                'id_youtube' => 'NWbPMZOwvCs',
                'cover' => '8SjvnZUWRQ2O0UrKOLTe0xqyEhmvXAoFvZrU7nN2.png',
                'created_at' => '2023-12-14 15:30:12',
                'updated_at' => '2023-12-14 15:30:12',
            ),
            205 => 
            array (
                'id' => 1225,
                'judul' => 'Kendalikan Hama Penyakit Jaga Produksi Aneka Jenis Kacang',
                'slug' => 'kendalikan-hama-penyakit-jaga-produksi-aneka-jenis-kacang',
                'id_youtube' => '8JEjKbxf6G8',
                'cover' => 'qxVsxiLJdmBYgLkftdK21Tqxg0LZdeV6pYLRz4gy.png',
                'created_at' => '2023-12-14 15:31:14',
                'updated_at' => '2023-12-14 15:31:14',
            ),
            206 => 
            array (
                'id' => 1226,
                'judul' => 'Terus Berinovasi Kembangkan Integrasi Pertanian & Peternakan',
                'slug' => 'terus-berinovasi-kembangkan-integrasi-pertanian-peternakan',
                'id_youtube' => 'P7RiRmikoeE',
                'cover' => 'gFU6AqG3Kv8WiDIkkO4x5cNL26OIXCaZr9nGkY8N.png',
                'created_at' => '2023-12-14 15:32:20',
                'updated_at' => '2023-12-14 15:32:20',
            ),
            207 => 
            array (
                'id' => 1227,
                'judul' => 'Bangun Sinergi Perguruan Tinggi Wujudkan Pertanian Modern',
                'slug' => 'bangun-sinergi-perguruan-tinggi-wujudkan-pertanian-modern',
                'id_youtube' => 'etiM8gHQKlY',
                'cover' => 'hYKOpMfBfIgVmQ65zWVu8HN1ENMwGfmYdxcTdVsd.png',
                'created_at' => '2023-12-14 15:33:28',
                'updated_at' => '2023-12-14 15:33:28',
            ),
            208 => 
            array (
                'id' => 1228,
                'judul' => 'Pecahkan Tantangan Pengembangan Potensi Lahan Rawa',
                'slug' => 'pecahkan-tantangan-pengembangan-potensi-lahan-rawa',
                'id_youtube' => 'ItmNEtb5amA',
                'cover' => 'Hphd40DjPAI6H52RZiJyKVhNZViCzbQDMoABHp9Q.png',
                'created_at' => '2023-12-14 15:34:30',
                'updated_at' => '2023-12-14 15:34:30',
            ),
            209 => 
            array (
                'id' => 1229,
                'judul' => 'Maju Terus Pengembangan Singkong Indonesia',
                'slug' => 'maju-terus-pengembangan-singkong-indonesia',
                'id_youtube' => 'aV53H0Etsh0',
                'cover' => 'OnXR0jlJJXbw3SfrHGCEZ1IWzuYx3ViLI1QaU9UX.png',
                'created_at' => '2023-12-14 15:36:10',
                'updated_at' => '2023-12-14 15:36:10',
            ),
            210 => 
            array (
                'id' => 1230,
                'judul' => 'Hadapi Perubahan Iklim Gunakan Benih Unggul Varietas Baru',
                'slug' => 'hadapi-perubahan-iklim-gunakan-benih-unggul-varietas-baru',
                'id_youtube' => '-8zpqlLMGYA',
                'cover' => 'O4eJkPevKnoOZ7rdWUk0xnYb6qefV8wRf6p7PcGZ.png',
                'created_at' => '2023-12-14 15:37:18',
                'updated_at' => '2023-12-14 15:37:18',
            ),
            211 => 
            array (
                'id' => 1231,
                'judul' => 'Agenda BTS Propaktani Episode 817 - 820, Minggu ke-1 Januari 2023',
                'slug' => 'agenda-bts-propaktani-episode-817-820-minggu-ke-1-januari-2023',
                'id_youtube' => 'hUYkSOJGIT0',
                'cover' => 'wDdk2xzOUkyIvuLUwcG6lS0wjepYNs2ye1wSJXLr.png',
                'created_at' => '2023-12-14 15:38:22',
                'updated_at' => '2023-12-14 15:38:22',
            ),
            212 => 
            array (
                'id' => 1232,
                'judul' => 'Tingkatkan Sinergi Wujudkan Swasembada Jagung 2023',
                'slug' => 'tingkatkan-sinergi-wujudkan-swasembada-jagung-2023',
                'id_youtube' => 'zu8mQMHlQKA',
                'cover' => 'FGm31lNPnQuE7HVn6AlTOh0JVE6CUSi6iSTaals7.png',
                'created_at' => '2023-12-14 15:39:23',
                'updated_at' => '2023-12-14 15:39:23',
            ),
            213 => 
            array (
                'id' => 1233,
                'judul' => 'Ayo Tingkatkan Terus Produksi Jagung',
                'slug' => 'ayo-tingkatkan-terus-produksi-jagung',
                'id_youtube' => 'SSRyPVWzITs',
                'cover' => 'pKAz8hy5jou1lQFBFTLK1Pcrk7jJhrLuB0t33KiQ.png',
                'created_at' => '2023-12-14 15:40:22',
                'updated_at' => '2023-12-14 15:40:22',
            ),
            214 => 
            array (
                'id' => 1234,
                'judul' => 'Manfaatkan Sumber Pendanaan Tingkatkan Produksi Produktivitas',
                'slug' => 'manfaatkan-sumber-pendanaan-tingkatkan-produksi-produktivitas',
                'id_youtube' => 'NILF7C8w3nc',
                'cover' => 'qQzggIYIgDhvumzhDAEg5clTFV2rYm4znot5rYME.png',
                'created_at' => '2023-12-14 15:41:23',
                'updated_at' => '2023-12-14 15:41:23',
            ),
            215 => 
            array (
                'id' => 1235,
                'judul' => 'Sertifikasi Kunci Tembus Pasar Ekspor',
                'slug' => 'sertifikasi-kunci-tembus-pasar-ekspor',
                'id_youtube' => 'Kjyu2O7EcoI',
                'cover' => '74hd956R27UbzDoRGzOJUtwWKGVos5V1PymRrFvh.png',
                'created_at' => '2023-12-14 15:42:25',
                'updated_at' => '2023-12-14 15:42:25',
            ),
            216 => 
            array (
                'id' => 1236,
                'judul' => 'Yuk Kuasai Bussiness Model Canvas untuk Produk Tanaman Pangan',
                'slug' => 'yuk-kuasai-bussiness-model-canvas-untuk-produk-tanaman-pangan',
                'id_youtube' => 'CfNp2gUuvds',
                'cover' => 'ZABmGSUq7uPhKEkKxp78qcfQGr12yPB3MqPtFLCV.png',
                'created_at' => '2023-12-14 15:43:53',
                'updated_at' => '2023-12-14 15:43:53',
            ),
            217 => 
            array (
                'id' => 1237,
                'judul' => 'Ayo Kenali Bersama Tujuan Pertanian Tanaman Pangan Kedepan',
                'slug' => 'ayo-kenali-bersama-tujuan-pertanian-tanaman-pangan-kedepan',
                'id_youtube' => 'ssVuhfE1Gx0',
                'cover' => 'kl3SQVnvBRB9G90nhjanEhtwFVYSimho9chK9xvP.png',
                'created_at' => '2023-12-14 15:44:58',
                'updated_at' => '2023-12-14 15:44:58',
            ),
            218 => 
            array (
                'id' => 1238,
                'judul' => 'Agenda BTS Propaktani episode 846 - 851, minggu ke-3 Februari 2023',
                'slug' => 'agenda-bts-propaktani-episode-846-851-minggu-ke-3-februari-2023',
                'id_youtube' => 'k6Fnhqir2l0',
                'cover' => 'PKMIUlzqLLggwsY2o0iBCrWEXMP7f6nI8N19rKBr.png',
                'created_at' => '2023-12-14 15:46:05',
                'updated_at' => '2023-12-14 15:46:05',
            ),
            219 => 
            array (
                'id' => 1239,
                'judul' => 'Aplikasi Biosaka pada Padi Rojolele',
                'slug' => 'aplikasi-biosaka-pada-padi-rojolele',
                'id_youtube' => '8yeHoGO3TNs',
                'cover' => '0lN8uN6AZ9FJ6rqZq69chQDR8gJpEYWbfG2bpzSC.png',
                'created_at' => '2023-12-14 15:47:14',
                'updated_at' => '2023-12-14 15:47:14',
            ),
            220 => 
            array (
                'id' => 1240,
                'judul' => 'Agenda BTS Propaktani episode 860 - 865, minggu ke-1 Maret 2023',
                'slug' => 'agenda-bts-propaktani-episode-860-865-minggu-ke-1-maret-2023',
                'id_youtube' => '_q9TEL3_kxM',
                'cover' => 'atmgbmld3xo44fRKbQAgSxkd6MN041NiPChuhYwy.png',
                'created_at' => '2023-12-14 15:48:14',
                'updated_at' => '2023-12-14 15:48:14',
            ),
            221 => 
            array (
                'id' => 1241,
                'judul' => 'Agenda BTS Propaktani episode 866 - 872, minggu ke-2 Maret 2023',
                'slug' => 'agenda-bts-propaktani-episode-866-872-minggu-ke-2-maret-2023',
                'id_youtube' => 'dbifHVojo6A',
                'cover' => 'CMqWHFLcvYsV8I4YpiSqt57q2YSrT2JyTqX5Y3Cr.png',
                'created_at' => '2023-12-14 15:49:27',
                'updated_at' => '2023-12-14 15:49:27',
            ),
            222 => 
            array (
                'id' => 1242,
                'judul' => 'Panen Padi Aplikasi Biosaka & Rekor Muri live dari Bantul, DIY',
                'slug' => 'panen-padi-aplikasi-biosaka-rekor-muri-live-dari-bantul-diy',
                'id_youtube' => 'LgHJz1OzDuw',
                'cover' => 'ECJDuD9pjvwQVUxGydrTDNIKoCGdwJJjV4LRz5ad.png',
                'created_at' => '2023-12-14 15:50:31',
                'updated_at' => '2023-12-14 15:50:31',
            ),
            223 => 
            array (
                'id' => 1243,
                'judul' => 'Usaha Pertanian yang Menguntungkan',
                'slug' => 'usaha-pertanian-yang-menguntungkan',
                'id_youtube' => '2j6lkxNlL8U',
                'cover' => 'DRVjgTTyyC7yoD0vtPHqyjJYGE1XOVKJeoSYJEWw.png',
                'created_at' => '2023-12-14 15:51:39',
                'updated_at' => '2023-12-14 15:51:39',
            ),
            224 => 
            array (
                'id' => 1244,
                'judul' => 'Panen Padi Aplikasi Biosaka & Pemecahan Rekor Muri Pembuatan Biosaka Terbanyak secara Serentak',
                'slug' => 'panen-padi-aplikasi-biosaka-pemecahan-rekor-muri-pembuatan-biosaka-terbanyak-secara-serentak',
                'id_youtube' => 'KzQW-k2hYuY',
                'cover' => 'PIxG0v495JM13e2KXzvsHGYmYLOaJYIUrKMjVVVP.png',
                'created_at' => '2023-12-14 15:52:54',
                'updated_at' => '2023-12-14 15:52:54',
            ),
            225 => 
            array (
                'id' => 1245,
                'judul' => 'Rekor Muri Biosaka Bantul',
                'slug' => 'rekor-muri-biosaka-bantul',
                'id_youtube' => 'BZl6EZGwDlw',
                'cover' => 'kq1upcfJMarOXWupqoLYmhYYZeUx6vrj6kWLq8Hp.png',
                'created_at' => '2023-12-14 15:54:15',
                'updated_at' => '2023-12-14 15:54:15',
            ),
            226 => 
            array (
                'id' => 1246,
                'judul' => 'Agenda BTS Propaktani episode 873 - 877, minggu ke-3 Maret 2023',
                'slug' => 'agenda-bts-propaktani-episode-873-877-minggu-ke-3-maret-2023',
                'id_youtube' => 'FwydLk24b-A',
                'cover' => 'HupHumDumpz9bytol6pGsmQHr4bsVRi15h2ROxqI.png',
                'created_at' => '2023-12-14 15:56:13',
                'updated_at' => '2023-12-14 15:56:13',
            ),
            227 => 
            array (
                'id' => 1247,
                'judul' => 'Agenda BTS Propaktani, episode 884 - 890. Minggu ke-5 Maret 2023.',
                'slug' => 'agenda-bts-propaktani-episode-884-890-minggu-ke-5-maret-2023',
                'id_youtube' => 'JjMYtNHVzYc',
                'cover' => 'NYB2Wv8KwDuT5D53Qj4anRmOQdEdzCkKwHFlvUKA.png',
                'created_at' => '2023-12-14 15:57:17',
                'updated_at' => '2023-12-14 15:57:17',
            ),
            228 => 
            array (
                'id' => 1248,
                'judul' => 'CSR Dukung Pembangunan Pertanian',
                'slug' => 'csr-dukung-pembangunan-pertanian',
                'id_youtube' => 'Sg2tOQmZNDc',
                'cover' => '4z8mdBt2o0UElnDAHFpXtq8I3S9zYp1Hqtct9lmM.png',
                'created_at' => '2023-12-14 15:58:20',
                'updated_at' => '2023-12-14 15:58:20',
            ),
            229 => 
            array (
                'id' => 1249,
                'judul' => 'Manfaatkan Dana Desa Kembangkan Pertanian Maju berbasis Agribisnis',
                'slug' => 'manfaatkan-dana-desa-kembangkan-pertanian-maju-berbasis-agribisnis',
                'id_youtube' => '_9G215-ruZ8',
                'cover' => 'rdn00Iti9dcmP4T3J3dCGkUP8UT61XAYWNlnGVFa.png',
                'created_at' => '2023-12-14 15:59:35',
                'updated_at' => '2023-12-14 15:59:35',
            ),
            230 => 
            array (
                'id' => 1250,
                'judul' => 'Mengulas Kembali Teknologi Pertanian Biosaka',
                'slug' => 'mengulas-kembali-teknologi-pertanian-biosaka',
                'id_youtube' => 'D7QDSE6wcQA',
                'cover' => 'hvjCPzCikQnc02LG04YbSiJ0THwq58IcPWifpx2T.png',
                'created_at' => '2023-12-14 16:00:35',
                'updated_at' => '2023-12-14 16:00:35',
            ),
            231 => 
            array (
                'id' => 1251,
                'judul' => 'Hanjeli Potensi Pangan Lokal Eksotik',
                'slug' => 'hanjeli-potensi-pangan-lokal-eksotik',
                'id_youtube' => '_4ltzwmNKnI',
                'cover' => '3j4PaQoxrPtNHUmm97uRT3QMK7S8FJAjw6ncbD3k.png',
                'created_at' => '2023-12-14 16:01:35',
                'updated_at' => '2023-12-14 16:01:35',
            ),
            232 => 
            array (
                'id' => 1252,
            'judul' => 'Biosaka goes to Universitas Sebelas Maret (UNS)',
                'slug' => 'biosaka-goes-to-universitas-sebelas-maret-uns',
                'id_youtube' => 'g7GsNHqAel0',
                'cover' => 'U6aD9lIvEm4ofSHPbiTKHZ9a7eSKtONGm6FhLxMr.png',
                'created_at' => '2023-12-14 16:03:03',
                'updated_at' => '2023-12-14 16:03:03',
            ),
            233 => 
            array (
                'id' => 1253,
                'judul' => 'Biosaka dari Petani untuk Negeri',
                'slug' => 'biosaka-dari-petani-untuk-negeri',
                'id_youtube' => 'zh4vxLoVSeg',
                'cover' => 'CzkV4kTWRH1lx9NUGkOCiGR9zeZxazuwk50R3Hq3.png',
                'created_at' => '2023-12-14 16:04:15',
                'updated_at' => '2023-12-14 16:04:15',
            ),
            234 => 
            array (
                'id' => 1254,
                'judul' => 'Tingkatkan Pertanian Organik LEISA',
                'slug' => 'tingkatkan-pertanian-organik-leisa',
                'id_youtube' => 'iRRU3RZXfLw',
                'cover' => 'ApMBFpkRvwWJNzRjCyayEGBouTVt17fsOy6o2icY.png',
                'created_at' => '2023-12-14 16:05:16',
                'updated_at' => '2023-12-14 16:05:16',
            ),
            235 => 
            array (
                'id' => 1255,
                'judul' => 'Selamat Hari Raya Idul Fitri 1444 H',
                'slug' => 'selamat-hari-raya-idul-fitri-1444-h',
                'id_youtube' => 'Q5dSswEBjWg',
                'cover' => '2mcYNhqqTt9I5cLTSSxB7PkeJds8VU3nPFy7f9OF.png',
                'created_at' => '2023-12-14 16:06:20',
                'updated_at' => '2023-12-14 16:06:20',
            ),
            236 => 
            array (
                'id' => 1256,
                'judul' => 'Efektivitas Biosaka Telah Terbukti Melalui Penelitian Ilmiah',
                'slug' => 'efektivitas-biosaka-telah-terbukti-melalui-penelitian-ilmiah',
                'id_youtube' => '1CunRf_vYqE',
                'cover' => 'G9whWPGGkg7VQf2nnu0hU2mg7QNy10aH1rMtV2hf.png',
                'created_at' => '2023-12-14 16:07:29',
                'updated_at' => '2023-12-14 16:07:29',
            ),
            237 => 
            array (
                'id' => 1257,
                'judul' => 'Agenda BTS Propaktani eps. 931 - 935, minggu kedua Juni 2023',
                'slug' => 'agenda-bts-propaktani-eps-931-935-minggu-kedua-juni-2023',
                'id_youtube' => 'Eg8Xa2wkZlE',
                'cover' => 'K4qcC02fDUewGgAGaulW4e3tIZmzdwslfKQAYokA.png',
                'created_at' => '2023-12-14 16:08:35',
                'updated_at' => '2023-12-14 16:08:35',
            ),
            238 => 
            array (
                'id' => 1258,
                'judul' => 'Grand Launching Buku Elisitor Nuswantara Biosaka - PENAS TANI XVI Padang, Sumatera Barat',
                'slug' => 'grand-launching-buku-elisitor-nuswantara-biosaka-penas-tani-xvi-padang-sumatera-barat',
                'id_youtube' => 'b0jI81qdOJ0',
                'cover' => 'mE6TYSSm0aSdvZKEuIDT8C8L5Pzme7GRYXNUYRpO.png',
                'created_at' => '2023-12-14 16:09:47',
                'updated_at' => '2023-12-14 16:09:47',
            ),
            239 => 
            array (
                'id' => 1259,
                'judul' => 'HUT PROPAKTANI KE-2',
                'slug' => 'hut-propaktani-ke-2',
                'id_youtube' => 'RkVAq5V8Yh8',
                'cover' => 'ETK1KNZfX6sHlOGGVdeNZeQBbBuyiWqzmPjTrld8.png',
                'created_at' => '2023-12-14 16:10:44',
                'updated_at' => '2023-12-14 16:10:44',
            ),
            240 => 
            array (
                'id' => 1260,
                'judul' => 'Agenda BTS Propaktani episode 954 - 958, minggu pertama Juli 2023',
                'slug' => 'agenda-bts-propaktani-episode-954-958-minggu-pertama-juli-2023',
                'id_youtube' => 'Y-QNe_loUBc',
                'cover' => 'Gz3UdMjk0LVBIbEIlxxZKddIz0fVTEoLL2FAsXtp.png',
                'created_at' => '2023-12-14 16:11:44',
                'updated_at' => '2023-12-14 16:11:44',
            ),
            241 => 
            array (
                'id' => 1261,
                'judul' => 'Agenda BTS Propaktani episode 959 - 963, minggu kedua Juli 2023',
                'slug' => 'agenda-bts-propaktani-episode-959-963-minggu-kedua-juli-2023',
                'id_youtube' => 'PmvSm5bzVdA',
                'cover' => '0Q2rfGX7aSEvbxfOAs7wJoJ6jtVSeHwPD0TkfkzR.png',
                'created_at' => '2023-12-14 16:13:12',
                'updated_at' => '2023-12-14 16:13:12',
            ),
            242 => 
            array (
                'id' => 1262,
                'judul' => 'Agenda BTS Propaktani episode 969 - 974, minggu keempat Juli 2023',
                'slug' => 'agenda-bts-propaktani-episode-969-974-minggu-keempat-juli-2023',
                'id_youtube' => 'bmrSD0a_dgE',
                'cover' => 'cC5dVugtVcvKHUrRiW4NTO37AOklvJJG1Qt3Qz7h.png',
                'created_at' => '2023-12-14 16:14:09',
                'updated_at' => '2023-12-14 16:14:09',
            ),
            243 => 
            array (
                'id' => 1263,
                'judul' => 'Agenda BTS Propaktani episode 975 -979, minggu pertama Agustus 2023',
                'slug' => 'agenda-bts-propaktani-episode-975-979-minggu-pertama-agustus-2023',
                'id_youtube' => '-eyLU0IHOBE',
                'cover' => '50c9rSoWUhgdlHLRPKkW4QykiKjd9TelGQsftzUB.png',
                'created_at' => '2023-12-14 16:15:22',
                'updated_at' => '2023-12-14 16:15:22',
            ),
            244 => 
            array (
                'id' => 1264,
                'judul' => 'Agenda BTS Propaktani episode 980 - 984, minggu kedua Agustus 2023',
                'slug' => 'agenda-bts-propaktani-episode-980-984-minggu-kedua-agustus-2023',
                'id_youtube' => 'YA8xP3AO9WU',
                'cover' => 'r67cRc3dg1M00L70GrCUoPNjI657hW74IQFl3eTC.png',
                'created_at' => '2023-12-14 16:16:27',
                'updated_at' => '2023-12-14 16:16:27',
            ),
            245 => 
            array (
                'id' => 1265,
                'judul' => 'Agenda BTS Propaktani eps. 986 - 990, minggu ketiga Agustus 2023',
                'slug' => 'agenda-bts-propaktani-eps-986-990-minggu-ketiga-agustus-2023',
                'id_youtube' => 'lyJBKV5kLHw',
                'cover' => '6Q4phX35ewFl6dEdDcuZUxZoPBvNZi3ksMEJ0zux.png',
                'created_at' => '2023-12-14 16:17:43',
                'updated_at' => '2023-12-14 16:17:43',
            ),
            246 => 
            array (
                'id' => 1266,
                'judul' => 'DIRGAHAYU RI KE 78',
                'slug' => 'dirgahayu-ri-ke-78',
                'id_youtube' => '9aHOG1bG9CQ',
                'cover' => 'dj0mrXjVEwqUbumNLPyD9ATYv4KeaFTJHsQ0RiSv.png',
                'created_at' => '2023-12-14 16:19:04',
                'updated_at' => '2023-12-14 16:19:04',
            ),
            247 => 
            array (
                'id' => 1267,
                'judul' => 'Agenda BTS Propaktani episode 991 - 996, minggu ke-4 Agustus 2023',
                'slug' => 'agenda-bts-propaktani-episode-991-996-minggu-ke-4-agustus-2023',
                'id_youtube' => 'cCbK__-EaJo',
                'cover' => 'yvzzinXMdTOYFduppo6ioT4kcVSWTdSJRIMfMu96.png',
                'created_at' => '2023-12-14 16:20:22',
                'updated_at' => '2023-12-14 16:20:22',
            ),
            248 => 
            array (
                'id' => 1268,
                'judul' => 'Agenda BTS Propaktani episode 997 - 1000, minggu ke-5 Agustus 2023',
                'slug' => 'agenda-bts-propaktani-episode-997-1000-minggu-ke-5-agustus-2023',
                'id_youtube' => 'Zaiv50_LPZM',
                'cover' => '3preJFwHNmWGTg7FE2YQZBuofvDFqTFp6O2TWzlL.png',
                'created_at' => '2023-12-14 16:21:23',
                'updated_at' => '2023-12-14 16:21:23',
            ),
            249 => 
            array (
                'id' => 1269,
                'judul' => 'Kunci-kunci Sukses Hilirasi Pertanian',
                'slug' => 'kunci-kunci-sukses-hilirasi-pertanian',
                'id_youtube' => 'aB1d-yKuH8A',
                'cover' => 'jqIr5y5nnBuRjE7SopCjxvhDhGPwH5i5QZoUvV1Y.png',
                'created_at' => '2023-12-14 16:22:31',
                'updated_at' => '2023-12-14 16:22:31',
            ),
            250 => 
            array (
                'id' => 1270,
                'judul' => 'Nilai Tambah Produk Naik Tingkatkan Kesejahteraan Petani',
                'slug' => 'nilai-tambah-produk-naik-tingkatkan-kesejahteraan-petani',
                'id_youtube' => 'nF1iToMjDHg',
                'cover' => 'GElXHxq2q2EaQNP998uWAKaV90lM6CklN9PML42j.png',
                'created_at' => '2023-12-14 16:23:32',
                'updated_at' => '2023-12-14 16:23:32',
            ),
            251 => 
            array (
                'id' => 1271,
                'judul' => 'Strategi Hadapi El Nino 2023',
                'slug' => 'strategi-hadapi-el-nino-2023',
                'id_youtube' => 'pgZiwsNGdPk',
                'cover' => 'dRGxkhLmnrIlwfbRfwPNFneYb7xtFUtiMlvRVCKJ.png',
                'created_at' => '2023-12-14 16:24:41',
                'updated_at' => '2023-12-14 16:24:41',
            ),
            252 => 
            array (
                'id' => 1272,
                'judul' => 'Jaga dan Tingkatkan Jaminan Mutu Pangan',
                'slug' => 'jaga-dan-tingkatkan-jaminan-mutu-pangan',
                'id_youtube' => 'KnptiDyK6yk',
                'cover' => 'T49gLp73RMWLgWDsBO5SxsSevp3MxH16e1fimkId.png',
                'created_at' => '2023-12-14 16:25:43',
                'updated_at' => '2023-12-14 16:25:43',
            ),
            253 => 
            array (
                'id' => 1273,
                'judul' => 'Terus Tingkatkan Pendapatan Petani',
                'slug' => 'terus-tingkatkan-pendapatan-petani',
                'id_youtube' => 'FW4iD5EjdLg',
                'cover' => 'PUl33U15oa3NVLN0g5uhslOpOGZtv2YLxCeCii1F.png',
                'created_at' => '2023-12-14 16:26:49',
                'updated_at' => '2023-12-14 16:26:49',
            ),
            254 => 
            array (
                'id' => 1274,
                'judul' => 'Tahapan Membuat Akun di Website propaktani.com',
                'slug' => 'tahapan-membuat-akun-di-website-propaktanicom',
                'id_youtube' => 'fxmrh8YXA_Y',
                'cover' => 'uuJ7V3lWgz7Q9h9xJ6e0YLCJw2J4YxCz7ahD3u5a.png',
                'created_at' => '2023-12-14 16:27:49',
                'updated_at' => '2023-12-14 16:27:49',
            ),
            255 => 
            array (
                'id' => 1275,
                'judul' => 'Cara Mengisi Daftar Hadir di Website propaktani.com',
                'slug' => 'cara-mengisi-daftar-hadir-di-website-propaktanicom',
                'id_youtube' => 'I15w-WSr70k',
                'cover' => '3zynIkB1DMWoi72wFlsXeIt4p18WoFjA7uUEWneS.png',
                'created_at' => '2023-12-14 16:28:47',
                'updated_at' => '2023-12-14 16:28:47',
            ),
            256 => 
            array (
                'id' => 1276,
                'judul' => 'Cara Download Sertifikat di Website propaktani.com',
                'slug' => 'cara-download-sertifikat-di-website-propaktanicom',
                'id_youtube' => 'ieUuyMtnyOI',
                'cover' => 'Gzoy5hD0LWBLTAI5elawJ27ztaH74nk2MgLMLANC.png',
                'created_at' => '2023-12-14 16:29:46',
                'updated_at' => '2023-12-14 16:29:46',
            ),
            257 => 
            array (
                'id' => 1277,
                'judul' => 'Propaktani Present 2023',
                'slug' => 'propaktani-present-2023',
                'id_youtube' => 'Gwtoz2ZYiHg',
                'cover' => 'xJzyo6tzVl3NBDosj7okFEeuViocfpBRfCK4tO7a.png',
                'created_at' => '2023-12-14 16:30:59',
                'updated_at' => '2023-12-14 16:30:59',
            ),
            258 => 
            array (
                'id' => 1278,
                'judul' => 'BTS Propaktani edisi 1009 - 1012, minggu keempat September 2023',
                'slug' => 'bts-propaktani-edisi-1009-1012-minggu-keempat-september-2023',
                'id_youtube' => 'YKHhPCfvSDc',
                'cover' => 'YpFN9H1ExnDaYqvOZCCgJ49oTKg9uQxZUJ0nSUQZ.png',
                'created_at' => '2023-12-14 16:31:57',
                'updated_at' => '2023-12-14 16:31:57',
            ),
            259 => 
            array (
                'id' => 1279,
                'judul' => 'Singkong, Pangan Lokal Alternatif Naik Kelas',
                'slug' => 'singkong-pangan-lokal-alternatif-naik-kelas',
                'id_youtube' => 'KOPv3fKor0A',
                'cover' => 'bHHlU4eTjTVSiuKi4iS4tWIrKJT4LsGfPa1XGePA.png',
                'created_at' => '2023-12-14 16:32:59',
                'updated_at' => '2023-12-14 16:32:59',
            ),
            260 => 
            array (
                'id' => 1280,
                'judul' => 'Pertanian Berkelanjutan untuk Kedaulatan Pangan',
                'slug' => 'pertanian-berkelanjutan-untuk-kedaulatan-pangan',
                'id_youtube' => 'lg7kkkea7k0',
                'cover' => 'FK8jkLPlotHXMvNam3Z9lZv81gMumKzgzGuH0fIQ.png',
                'created_at' => '2023-12-14 16:34:16',
                'updated_at' => '2023-12-14 16:34:16',
            ),
            261 => 
            array (
                'id' => 1281,
                'judul' => 'BTS Propaktani edisi 1013 - 1016, minggu kelima September 2023',
                'slug' => 'bts-propaktani-edisi-1013-1016-minggu-kelima-september-2023',
                'id_youtube' => 'dlpwaHvT7XU',
                'cover' => 'eqFfcmnRLr7FZAHhth7Y9rrI6G2tKglkEzlNTZyJ.png',
                'created_at' => '2023-12-14 16:35:11',
                'updated_at' => '2023-12-14 16:35:11',
            ),
            262 => 
            array (
                'id' => 1282,
                'judul' => 'BTS Propaktani Edisi 1021 - 1024, minggu ke-2 Oktober 2023',
                'slug' => 'bts-propaktani-edisi-1021-1024-minggu-ke-2-oktober-2023',
                'id_youtube' => 'OQaRJ9nzkbQ',
                'cover' => '4kIBMfjbROkjGK6jDsFpc71ekf6i13I4v2KICasT.png',
                'created_at' => '2023-12-14 16:36:11',
                'updated_at' => '2023-12-14 16:36:11',
            ),
            263 => 
            array (
                'id' => 1283,
                'judul' => 'Jagung : Efisiensi Budidaya yang Ramah Lingkungan',
                'slug' => 'jagung-efisiensi-budidaya-yang-ramah-lingkungan',
                'id_youtube' => 'GJvjM71TSTw',
                'cover' => '85viJ0bHniELEUxxkddlNQFtr9h5DCKbOu0FtfqK.png',
                'created_at' => '2023-12-14 16:37:16',
                'updated_at' => '2023-12-14 16:37:16',
            ),
            264 => 
            array (
                'id' => 1284,
                'judul' => 'Tingkatkan Kapabilitas Penyuluh, Tingkatkan SDM Petani',
                'slug' => 'tingkatkan-kapabilitas-penyuluh-tingkatkan-sdm-petani',
                'id_youtube' => 'e1o7aeCg2zo',
                'cover' => 'wRGyhlTBVvGre0rZaNtvvs7MPnAJQq3xMtm4eO3e.png',
                'created_at' => '2023-12-14 16:38:30',
                'updated_at' => '2023-12-14 16:38:30',
            ),
            265 => 
            array (
                'id' => 1285,
                'judul' => 'Agenda BTS Propaktani edisi 1025 - 1029, minggu ke-3 Oktober 2023',
                'slug' => 'agenda-bts-propaktani-edisi-1025-1029-minggu-ke-3-oktober-2023',
                'id_youtube' => '7FfgZZjb8jA',
                'cover' => 'MuODWyv2QSKV9Mf9F3gtXklU7mpqGzHm390VsChH.png',
                'created_at' => '2023-12-14 16:40:48',
                'updated_at' => '2023-12-14 16:40:48',
            ),
            266 => 
            array (
                'id' => 1286,
                'judul' => 'BTS Propaktani Edisi 1034 - 1037, minggu ke-1 November 2023',
                'slug' => 'bts-propaktani-edisi-1034-1037-minggu-ke-1-november-2023',
                'id_youtube' => 'IE-FQxJ4ht8',
                'cover' => 'PvNrBLkcNfOtDxNTSjFqHGcjT9z07RwdgoztfNIg.png',
                'created_at' => '2023-12-14 16:41:54',
                'updated_at' => '2023-12-14 16:41:54',
            ),
            267 => 
            array (
                'id' => 1287,
                'judul' => 'Ketertelusuran dalam Beras Berkelanjutan untuk Kedaulatan Pangan',
                'slug' => 'ketertelusuran-dalam-beras-berkelanjutan-untuk-kedaulatan-pangan',
                'id_youtube' => 'd9Z1OdTHUF8',
                'cover' => 'hl8NfxBeX9sChrN1YeZU7BOvrw2tIMnA8VWokLVq.png',
                'created_at' => '2023-12-14 16:42:59',
                'updated_at' => '2023-12-14 16:42:59',
            ),
            268 => 
            array (
                'id' => 1288,
                'judul' => 'Penyelenggaraan Uji Profisiensi dalam Rangka Jaminan Mutu Laboratorium',
                'slug' => 'penyelenggaraan-uji-profisiensi-dalam-rangka-jaminan-mutu-laboratorium',
                'id_youtube' => '7gfqIRvTuu8',
                'cover' => '04HPHhvKHnQlhLvZlw0CTRarwZaWOpUaxapqWROz.png',
                'created_at' => '2023-12-14 16:43:52',
                'updated_at' => '2023-12-14 16:43:52',
            ),
            269 => 
            array (
                'id' => 1289,
                'judul' => 'Setahun Lebih Tanpa Pupuk Subsidi, Singkong Perlu Dukungan Optimal',
                'slug' => 'setahun-lebih-tanpa-pupuk-subsidi-singkong-perlu-dukungan-optimal',
                'id_youtube' => 'VpBM6jzGB6s',
                'cover' => 'TtIXr9mmwbSD7kQZ1lzX8bIw6GB6BHfIADA1xHrx.png',
                'created_at' => '2023-12-14 16:44:49',
                'updated_at' => '2023-12-14 16:44:49',
            ),
            270 => 
            array (
                'id' => 1290,
                'judul' => 'Praktik Baik Penggunaan Dana Desa untuk Pengembangan Kacang Hijau oleh KWT di Pulau Flores',
                'slug' => 'praktik-baik-penggunaan-dana-desa-untuk-pengembangan-kacang-hijau-oleh-kwt-di-pulau-flores',
                'id_youtube' => 'LKvIFII6qr0',
                'cover' => 'AyzXuLzAmKF5SxPlsbWmBRCaa0i1g417crZWPoT3.png',
                'created_at' => '2023-12-14 16:45:48',
                'updated_at' => '2023-12-14 16:45:48',
            ),
            271 => 
            array (
                'id' => 1291,
                'judul' => 'Peramalan OPT Tanaman Pangan 2023/2024',
                'slug' => 'peramalan-opt-tanaman-pangan-20232024',
                'id_youtube' => 'TVgkiEkedQE',
                'cover' => 'GncVtRDXgw6U3EfHdGRqiedmWA8VkLgTCgFki2BW.png',
                'created_at' => '2023-12-14 16:46:44',
                'updated_at' => '2023-12-14 16:46:44',
            ),
            272 => 
            array (
                'id' => 1292,
                'judul' => 'GAP dan GHP Kacang Tanah',
                'slug' => 'gap-dan-ghp-kacang-tanah',
                'id_youtube' => 'aPCisToBgB0',
                'cover' => 'I1EwfrzAZJGcbAsTgz6jixx9CMlHLG6G1ukgjUKg.png',
                'created_at' => '2023-12-14 16:48:34',
                'updated_at' => '2023-12-14 16:48:34',
            ),
            273 => 
            array (
                'id' => 1293,
                'judul' => 'Peluang Bisnis UMKM Tanaman Pangan & Olahannya di Jabodetabek',
                'slug' => 'peluang-bisnis-umkm-tanaman-pangan-olahannya-di-jabodetabek',
                'id_youtube' => 'Q-Khsa7v-hA',
                'cover' => 'AYs10doIm8HtDEOaDbPja0R1ITJF8ppnlQ0Kv6ZD.png',
                'created_at' => '2023-12-14 16:49:29',
                'updated_at' => '2023-12-14 16:49:29',
            ),
            274 => 
            array (
                'id' => 1294,
                'judul' => 'BTS Propaktani edisi 1038 - 1041, minggu ke-2 November 2023',
                'slug' => 'bts-propaktani-edisi-1038-1041-minggu-ke-2-november-2023',
                'id_youtube' => '6fD7SJvgRd8',
                'cover' => 'IiMOzGqQcjAqbHVCI9anbFrQ0LqMV1fxqTdifMva.png',
                'created_at' => '2023-12-14 16:50:30',
                'updated_at' => '2023-12-14 16:50:30',
            ),
            275 => 
            array (
                'id' => 1295,
                'judul' => 'Kualitas Jagung Terjaga, Kesejahteraan Terjamin',
                'slug' => 'kualitas-jagung-terjaga-kesejahteraan-terjamin',
                'id_youtube' => '7ucDRt8vQFY',
                'cover' => 'YkC6GvigQQ04ZmHG8hwlmM1FBfc1rBLm03s8Pc03.png',
                'created_at' => '2023-12-14 16:51:26',
                'updated_at' => '2023-12-14 16:51:26',
            ),
            276 => 
            array (
                'id' => 1296,
                'judul' => 'PROPAKTANI',
                'slug' => 'propaktani',
                'id_youtube' => 'advQATj0Iao',
                'cover' => 'D0bVFPfjkNx0EyLj9VdWetyqM8wvbKDlpFbjrBpq.png',
                'created_at' => '2023-12-14 16:52:27',
                'updated_at' => '2023-12-14 16:52:27',
            ),
            277 => 
            array (
                'id' => 1297,
                'judul' => 'Kacang Bambara : Potensi Pangan Lokal',
                'slug' => 'kacang-bambara-potensi-pangan-lokal',
                'id_youtube' => '9p43vI82DRk',
                'cover' => 'YR2Z8tjNqfpQ7Ij1osvtA52Djrz6iLyOaNOkvJ5V.png',
                'created_at' => '2023-12-14 16:53:27',
                'updated_at' => '2023-12-14 16:53:27',
            ),
            278 => 
            array (
                'id' => 1298,
                'judul' => 'Maksimalkan Lahan Sub-Optimal Tingkatkan Produktifitas',
                'slug' => 'maksimalkan-lahan-sub-optimal-tingkatkan-produktifitas',
                'id_youtube' => 'rwtt4k8A8kc',
                'cover' => 'WiSXmP89SB7LepzNiRDw4igqPBfm5ljcVWpGyoIL.png',
                'created_at' => '2023-12-14 16:54:25',
                'updated_at' => '2023-12-14 16:54:25',
            ),
            279 => 
            array (
                'id' => 1299,
                'judul' => 'Desa Wisata Organik Peluang Baru Majukan Pertanian',
                'slug' => 'desa-wisata-organik-peluang-baru-majukan-pertanian',
                'id_youtube' => 'U_Sf-PjEObo',
                'cover' => 'ojSd0quN07LTgWqHvPptaWNaqPhCBeczHCJpqhA0.png',
                'created_at' => '2023-12-14 16:55:21',
                'updated_at' => '2023-12-14 16:55:21',
            ),
            280 => 
            array (
                'id' => 1300,
                'judul' => 'UMKM Pangan Ramah Lingkungan',
                'slug' => 'umkm-pangan-ramah-lingkungan',
                'id_youtube' => 'KPO7ndc6wjI',
                'cover' => '45jJWSQnJuIrEUfJqBkD5QgfElhWgu3qYv7TNcVy.png',
                'created_at' => '2023-12-14 16:56:22',
                'updated_at' => '2023-12-14 16:56:22',
            ),
            281 => 
            array (
                'id' => 1301,
                'judul' => 'Upaya Pengendalian OPT Supaya Tidak Rugi',
                'slug' => 'upaya-pengendalian-opt-supaya-tidak-rugi',
                'id_youtube' => '2XMM6XsPO2Y',
                'cover' => '2VykFnNgBmCYn9U3d0BYTX9t6rhXiS2N0Fo675bb.png',
                'created_at' => '2023-12-14 16:57:16',
                'updated_at' => '2023-12-14 16:57:16',
            ),
            282 => 
            array (
                'id' => 1302,
                'judul' => 'Mekanisme Perlindungan Varietas Lokal Maupun Hasil Pemuliaan',
                'slug' => 'mekanisme-perlindungan-varietas-lokal-maupun-hasil-pemuliaan',
                'id_youtube' => 'MLwJXIDCV7c',
                'cover' => 'm8AFKL6D0409BvqKPM2JHkGT97BBdT7C0IeIAXlR.png',
                'created_at' => '2023-12-14 16:58:13',
                'updated_at' => '2023-12-14 16:58:13',
            ),
            283 => 
            array (
                'id' => 1303,
                'judul' => 'BTS Propaktani Edisi 1047 - 1050, minggu ke-4 November 2023',
                'slug' => 'bts-propaktani-edisi-1047-1050-minggu-ke-4-november-2023',
                'id_youtube' => 'XoqsJY3J08Q',
                'cover' => 'yHQDdCypzAgbecd9wz0suNTapf7j2bgOg3qoei1t.png',
                'created_at' => '2023-12-14 16:59:08',
                'updated_at' => '2023-12-14 16:59:08',
            ),
            284 => 
            array (
                'id' => 1304,
                'judul' => 'BTS Propaktani Edisi 1051 - 1054, minggu ke-5 November 2023',
                'slug' => 'bts-propaktani-edisi-1051-1054-minggu-ke-5-november-2023',
                'id_youtube' => 'hhFGq3jA2rY',
                'cover' => 'yZh1Gb36QpDJqixMAp9bXKtvX4GgWGZ6TRwqHUNC.png',
                'created_at' => '2023-12-14 17:00:10',
                'updated_at' => '2023-12-14 17:00:10',
            ),
            285 => 
            array (
                'id' => 1305,
                'judul' => 'Hadapi Perubahan Iklim dengan Early Warning System',
                'slug' => 'hadapi-perubahan-iklim-dengan-early-warning-system',
                'id_youtube' => 'm1Ak5GFfJ-0',
                'cover' => 'xmof4IifONrS7mb6ABBsStXbfjvEf02ueOJp96O3.png',
                'created_at' => '2023-12-14 17:01:08',
                'updated_at' => '2023-12-14 17:01:08',
            ),
            286 => 
            array (
                'id' => 1306,
                'judul' => 'Potensi Pangan Lokal untuk Kedaulatan dan Kemandirian Pangan',
                'slug' => 'potensi-pangan-lokal-untuk-kedaulatan-dan-kemandirian-pangan',
                'id_youtube' => 'FTh-JRcfrdI',
                'cover' => 'HQdrRAGyEsIoPQvQGCF95TY6kbTFqeFuOQ2vGHQe.png',
                'created_at' => '2023-12-14 17:02:02',
                'updated_at' => '2023-12-14 17:02:02',
            ),
            287 => 
            array (
                'id' => 1307,
                'judul' => 'Peran Penyuluh Petugas Lapangan Tut Wuri Handayani bagi Para Petani',
                'slug' => 'peran-penyuluh-petugas-lapangan-tut-wuri-handayani-bagi-para-petani',
                'id_youtube' => 'wJIDR5Y2CXw',
                'cover' => 'aaD7ga2eBACwTNbt1Oqp7BB2D0UHl4Wabpi6H1YG.png',
                'created_at' => '2023-12-14 17:03:30',
                'updated_at' => '2023-12-14 17:03:30',
            ),
            288 => 
            array (
                'id' => 1308,
                'judul' => 'Aplikasi Biosaka Lahan Subur Hemat Biaya',
                'slug' => 'aplikasi-biosaka-lahan-subur-hemat-biaya',
                'id_youtube' => '28MV0VaryuQ',
                'cover' => 'CdOW2GE6uKq9frsx8iDZzGKDWdgyMRjXDvPGmY6f.png',
                'created_at' => '2023-12-14 17:04:43',
                'updated_at' => '2023-12-14 17:04:43',
            ),
            289 => 
            array (
                'id' => 1309,
                'judul' => 'Maksimalkan Potensi Rawa untuk Kebutuhan Pangan Nusantara',
                'slug' => 'maksimalkan-potensi-rawa-untuk-kebutuhan-pangan-nusantara',
                'id_youtube' => 'xKkqWPGrD7k',
                'cover' => 'pv1PbDZCPsO9vSxhmhtf5FYhFqlYUxEEB1gRZKiG.png',
                'created_at' => '2023-12-14 17:05:38',
                'updated_at' => '2023-12-14 17:05:38',
            ),
            290 => 
            array (
                'id' => 1310,
                'judul' => 'BTS Propaktani edisi 1055 - 1059, minggu ke-1 Desember 2023',
                'slug' => 'bts-propaktani-edisi-1055-1059-minggu-ke-1-desember-2023',
                'id_youtube' => 'NrWoR72oBT4',
                'cover' => '70A0Fmdb3QGRnFaDJYs76a1EgTEiMPl7WXyjG3pr.png',
                'created_at' => '2023-12-14 17:07:25',
                'updated_at' => '2023-12-14 17:07:25',
            ),
            291 => 
            array (
                'id' => 1311,
                'judul' => 'Cara Mengisi Daftar Hadir Webinar BTS Propaktani',
                'slug' => 'cara-mengisi-daftar-hadir-webinar-bts-propaktani',
                'id_youtube' => 'WgZFPmwwAVU',
                'cover' => 'GxtbroJ8CFHSUJhLyWenamyWfAGYco3MRVASMyjA.png',
                'created_at' => '2023-12-14 17:08:38',
                'updated_at' => '2023-12-14 17:08:38',
            ),
            292 => 
            array (
                'id' => 1312,
                'judul' => 'Maksimalkan Produksi dan Konsumsi Singkong',
                'slug' => 'maksimalkan-produksi-dan-konsumsi-singkong',
                'id_youtube' => 'oQMknWvXWJM',
                'cover' => 'h8JMk3f6Hs1EUOTA9bZEgBpKoEl32ZHKbvIGWy7x.png',
                'created_at' => '2023-12-14 17:10:05',
                'updated_at' => '2023-12-14 17:10:05',
            ),
            293 => 
            array (
                'id' => 1313,
                'judul' => 'Produk Turunan Pangan Lokal Indonesia',
                'slug' => 'produk-turunan-pangan-lokal-indonesia',
                'id_youtube' => 'yPncb6nT8Ys',
                'cover' => 'SnpTHr6NwQKOayVSQxYivQiC1YU8ejUOxytiHMBq.png',
                'created_at' => '2023-12-14 17:13:31',
                'updated_at' => '2023-12-14 17:13:31',
            ),
            294 => 
            array (
                'id' => 1314,
                'judul' => 'Tingkatkan Indeks Pertanaman Maksimalkan Potensi Lahan Rawa',
                'slug' => 'tingkatkan-indeks-pertanaman-maksimalkan-potensi-lahan-rawa',
                'id_youtube' => 'ALWEM2N387Q',
                'cover' => 'Dh1FftFuu6EfjdWyup5J4OD7dzAZ8h0jYcgvX7d2.png',
                'created_at' => '2023-12-14 17:14:41',
                'updated_at' => '2023-12-14 17:14:41',
            ),
            295 => 
            array (
                'id' => 1315,
                'judul' => 'Rekomendasi Padi untuk Lahan Kering dan Rawa',
                'slug' => 'rekomendasi-padi-untuk-lahan-kering-dan-rawa',
                'id_youtube' => '1kMi2YNuFTs',
                'cover' => 'U9k3Swpk9XOFIvzuE9XQy9FFgjgcZcj9zPxHShkh.png',
                'created_at' => '2023-12-14 17:16:04',
                'updated_at' => '2023-12-14 17:16:04',
            ),
            296 => 
            array (
                'id' => 1316,
                'judul' => 'Benih sebagai Fondasi Pertanian',
                'slug' => 'benih-sebagai-fondasi-pertanian',
                'id_youtube' => 'OgZAV2U2t3k',
                'cover' => 'rHOG2oxcfPDNzSRyd98SCUbyO3uL10rNBYTsEle2.png',
                'created_at' => '2023-12-14 17:17:32',
                'updated_at' => '2023-12-14 17:17:32',
            ),
            297 => 
            array (
                'id' => 1317,
                'judul' => 'BTS Propaktani edisi 1060 - 1063, minggu ke-2 Desember 2023',
                'slug' => 'bts-propaktani-edisi-1060-1063-minggu-ke-2-desember-2023',
                'id_youtube' => 'YYPEBOjQv5A',
                'cover' => 'OWNo91ef89cFyGX8LUl4ipCTuTHyPIcgEetJX8oC.png',
                'created_at' => '2023-12-14 17:18:31',
                'updated_at' => '2023-12-14 17:18:31',
            ),
            298 => 
            array (
                'id' => 1318,
                'judul' => 'Cita-cita Mulia Pangan untuk Indonesia Emas 2045',
                'slug' => 'cita-cita-mulia-pangan-untuk-indonesia-emas-2045',
                'id_youtube' => 'NNW1uWuaPe4',
                'cover' => 'frKcIXB3GuH77JvyV0IjcrJA0UC1jKYALu8zzm9i.png',
                'created_at' => '2023-12-14 17:19:46',
                'updated_at' => '2023-12-14 17:19:46',
            ),
            299 => 
            array (
                'id' => 1319,
                'judul' => 'Ragam Penyajian Pangan Lokal',
                'slug' => 'ragam-penyajian-pangan-lokal',
                'id_youtube' => 'WKrOC22eun8',
                'cover' => 'SSkvdcLVhbNfRqxJ5KKI6jESlkMHe2S01gfXVtB2.png',
                'created_at' => '2023-12-14 17:21:00',
                'updated_at' => '2023-12-14 17:21:00',
            ),
            300 => 
            array (
                'id' => 1320,
                'judul' => 'Pertanian Organik dari Alam Kembali ke Alam',
                'slug' => 'pertanian-organik-dari-alam-kembali-ke-alam',
                'id_youtube' => 'n9YPrUUo9dI',
                'cover' => 'sp1VpcxNOZ3t5vgPyWFbDR6o6RPRJzGeWPMRuLMA.png',
                'created_at' => '2023-12-14 17:22:10',
                'updated_at' => '2023-12-14 17:22:10',
            ),
            301 => 
            array (
                'id' => 1321,
                'judul' => 'Bekal untuk Membangun Bisnis Pertanian',
                'slug' => 'bekal-untuk-membangun-bisnis-pertanian',
                'id_youtube' => 'LsCwoQJKXEw',
                'cover' => 'G1IPYBXU9VuG2qvO4j2awH8oSXtsaC0BdzsYxiWz.png',
                'created_at' => '2023-12-14 19:27:39',
                'updated_at' => '2023-12-14 19:27:39',
            ),
            302 => 
            array (
                'id' => 1322,
            'judul' => 'Upaya Preventif Atasi WBC (Wereng Batang Coklat)',
                'slug' => 'upaya-preventif-atasi-wbc-wereng-batang-coklat',
                'id_youtube' => 'BcWSRg3K9DU',
                'cover' => 'A7pro8KKYt4I6Xj1rpsOXy4LzkNC7DLZrvACMiSX.png',
                'created_at' => '2024-01-12 09:53:24',
                'updated_at' => '2024-01-12 09:53:24',
            ),
            303 => 
            array (
                'id' => 1323,
                'judul' => 'Tingkatkan SDM Pertanian dengan Gapoktan',
                'slug' => 'tingkatkan-sdm-pertanian-dengan-gapoktan',
                'id_youtube' => '8ZhBxBVcJ8A',
                'cover' => '4XHm3Y4n7yuwskKiCLUeWIrLlgfnpoICy31wwmfo.png',
                'created_at' => '2024-01-12 09:54:31',
                'updated_at' => '2024-01-12 09:54:31',
            ),
            304 => 
            array (
                'id' => 1324,
                'judul' => 'Strategi Menangani Dampak Banjir pada Lahan Pertanian',
                'slug' => 'strategi-menangani-dampak-banjir-pada-lahan-pertanian',
                'id_youtube' => 'Lqi4yAE2lro',
                'cover' => '8aauFoco9sKaGKp1E2zWURTLrtSM1XmNoylwrJ8J.png',
                'created_at' => '2024-01-12 09:55:38',
                'updated_at' => '2024-01-12 09:55:38',
            ),
            305 => 
            array (
                'id' => 1325,
                'judul' => 'Produksi Pangan Berkualitas untuk Mengatasi Stunting',
                'slug' => 'produksi-pangan-berkualitas-untuk-mengatasi-stunting',
                'id_youtube' => 'h2H7Nmy6qas',
                'cover' => 'OUKR8p3V00xHJ49e1ENk1HO1wYZZQjdZiN1JuGcb.png',
                'created_at' => '2024-01-12 09:56:47',
                'updated_at' => '2024-01-12 09:56:47',
            ),
            306 => 
            array (
                'id' => 1326,
                'judul' => 'Wujudkan Kedaulatan dan Kemandirian Pangan',
                'slug' => 'wujudkan-kedaulatan-dan-kemandirian-pangan',
                'id_youtube' => '1rrsuYkswlI',
                'cover' => 'xtqXfY8Y8XEybfghfwqdQS6HXIEsyFDLwtHLw1aG.png',
                'created_at' => '2024-01-12 11:07:08',
                'updated_at' => '2024-01-12 11:07:08',
            ),
            307 => 
            array (
                'id' => 1327,
                'judul' => 'Seri Anak ProPaktani: "Darimana Asalnya Nasi?"',
                'slug' => 'seri-anak-propaktani-darimana-asalnya-nasi',
                'id_youtube' => 'KJUQagu8vCQ',
                'cover' => 'aaAkm2l4uORHx2zK4XBNbi1eztaIFqWVdMFLfr0y.png',
                'created_at' => '2024-01-12 11:08:28',
                'updated_at' => '2024-01-12 11:08:28',
            ),
            308 => 
            array (
                'id' => 1328,
                'judul' => 'MAJU atau MUNDUR',
                'slug' => 'maju-atau-mundur',
                'id_youtube' => 'K7AY1nhfnUU',
                'cover' => 'zGYe4tls8qj8BsuwgRxEHx7KHEMnpfrSb9zJ2MMW.png',
                'created_at' => '2024-01-12 11:09:37',
                'updated_at' => '2024-01-12 11:09:37',
            ),
            309 => 
            array (
                'id' => 1329,
                'judul' => 'Seri Anak Propaktani 2: Menanam Jagung di Kebun Kita',
                'slug' => 'seri-anak-propaktani-2-menanam-jagung-di-kebun-kita',
                'id_youtube' => '4fpyr-qoptg',
                'cover' => 'gw1b8jKHAsoWEoSqjjlNHAMyViEu4UCloBtyA5Ew.png',
                'created_at' => '2024-01-12 11:10:49',
                'updated_at' => '2024-01-12 11:10:49',
            ),
            310 => 
            array (
                'id' => 1330,
                'judul' => 'Seri Anak Propaktani 3: Aku Anak Singkong',
                'slug' => 'seri-anak-propaktani-3-aku-anak-singkong',
                'id_youtube' => 'x0amFO3g7Vg',
                'cover' => 'aj3oOQOr0AjhZB5t1iU4qFPdWmMRowL40mIpudqX.png',
                'created_at' => '2024-01-15 19:28:21',
                'updated_at' => '2024-01-15 19:28:21',
            ),
            311 => 
            array (
                'id' => 1331,
                'judul' => 'BTS Propaktani edisi 1085 - 1088, minggu keempat 2024',
                'slug' => 'bts-propaktani-edisi-1085-1088-minggu-keempat-2024',
                'id_youtube' => 'r-5Hgz1cG0I',
                'cover' => '7xrwshyfMiHB4L0H4OBq3J1XuctZwwEiK1qzxpGj.png',
                'created_at' => '2024-01-22 17:57:05',
                'updated_at' => '2024-01-22 17:57:05',
            ),
            312 => 
            array (
                'id' => 1332,
                'judul' => 'Seri Anak Propaktani 4 : Aku Suka Tahu dan Tempe',
                'slug' => 'seri-anak-propaktani-4-aku-suka-tahu-dan-tempe',
                'id_youtube' => 'rea7v35JbTY',
                'cover' => 'gpt2ZwYR6YvxB3tfCOpWY67qayohPpG2VYFqkzw1.png',
                'created_at' => '2024-01-25 12:02:22',
                'updated_at' => '2024-01-25 12:02:22',
            ),
            313 => 
            array (
                'id' => 1333,
                'judul' => 'BTS Propaktani Edisi 1089 - 1092, minggu kelima Januari 2024',
                'slug' => 'bts-propaktani-edisi-1089-1092-minggu-kelima-januari-2024',
                'id_youtube' => 'pfCI1W-WlQI',
                'cover' => 'yUpJrnNNipP3EHKD2HXyMFmuJMyL7JjiIHsHMBE2.png',
                'created_at' => '2024-01-29 14:47:41',
                'updated_at' => '2024-01-29 14:47:41',
            ),
            314 => 
            array (
                'id' => 1334,
                'judul' => 'Yuk Kenali Kelas Benih',
                'slug' => 'yuk-kenali-kelas-benih',
                'id_youtube' => '1DGPM6uEusA',
                'cover' => 'c88WQHH0Dghfb0oxLZDif5rnq213IOHNJEH0tdUE.png',
                'created_at' => '2024-01-30 13:24:55',
                'updated_at' => '2024-01-30 13:24:55',
            ),
        ));
        
        
    }
}