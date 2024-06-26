<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BukusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('bukus')->delete();
        
        \DB::table('bukus')->insert(array (
            0 => 
            array (
                'id' => 2,
                'slug' => 'bisnis-ubikayu',
                'judul' => 'Bisnis Ubikayu',
            'cover' => 'https://www.propaktani.com/storage/photos/1/WhatsApp Image 2023-12-21 at 00.06.02 (1).jpeg',
                'file' => 'tZLjV6oajAaH6cWhAFQ1rdKhm9PGwIW95hOecf2Y.pdf',
                'tipe_buku' => 'gratis',
                'created_at' => '2023-09-14 09:21:11',
                'updated_at' => '2023-12-21 00:07:33',
            ),
            1 => 
            array (
                'id' => 3,
                'slug' => 'best-practice-pupuk-organik',
                'judul' => 'Best Practice Pupuk Organik',
                'cover' => 'https://www.propaktani.com/storage/photos/1/Cover-Buku/cover-buku-pupuk-organik.jpeg',
                'file' => 'W8jK6NmU8Ml5iMbxpHyUBNBWUHzMMzs0PLfB230V.pdf',
                'tipe_buku' => 'gratis',
                'created_at' => '2023-09-14 09:23:54',
                'updated_at' => '2023-09-14 09:23:54',
            ),
            2 => 
            array (
                'id' => 4,
                'slug' => 'mengulang-sukses-swasembada-beras',
                'judul' => 'Mengulang Sukses Swasembada Beras',
                'cover' => 'https://www.propaktani.com/storage/photos/1/Cover-Buku/Mengulang Sukses Swasembada Beras.png',
                'file' => 'K7G8NpanucdYQgfpwCPMO0ukia6BfK3KGRWgkou8.pdf',
                'tipe_buku' => 'gratis',
                'created_at' => '2023-09-14 09:34:17',
                'updated_at' => '2023-09-14 09:34:17',
            ),
            3 => 
            array (
                'id' => 5,
                'slug' => 'pertanian-ramah-lingkungan',
                'judul' => 'Pertanian Ramah Lingkungan',
                'cover' => 'https://www.propaktani.com/storage/photos/1/Cover-Buku/Cover Buku Propaktani.png',
                'file' => 'OcIRcfOONoultY63GnmmE2kplwix10NpymdtafPw.pdf',
                'tipe_buku' => 'gratis',
                'created_at' => '2023-09-14 09:42:05',
                'updated_at' => '2023-09-14 09:42:05',
            ),
            4 => 
            array (
                'id' => 6,
                'slug' => 'memaksimalkan-integrasi-live-stock-system',
                'judul' => 'Memaksimalkan Integrasi Live Stock System',
                'cover' => 'https://www.propaktani.com/storage/photos/1/Cover-Buku/cover-buku-memaksimalkan-integrasi-corp-livestock-system.png',
                'file' => 'dghkttmfQRAhfojjNsjPsgG2H6O9LehRropQ6dDK.pdf',
                'tipe_buku' => 'gratis',
                'created_at' => '2023-09-14 09:54:57',
                'updated_at' => '2023-09-14 09:54:57',
            ),
            5 => 
            array (
                'id' => 7,
                'slug' => 'tren-baru-biopestisida-untuk-pertanian-berkelanjutan',
                'judul' => 'Tren Baru Biopestisida Untuk Pertanian Berkelanjutan',
                'cover' => 'https://www.propaktani.com/storage/photos/1/Cover-Buku/Cover Tren Baru Biopestisida Untuk Pertanian Berkelanjutan.png',
                'file' => 'Va7oT42f0LTSpdMD8rb8zudUqQdmgNk1x4CmOxVk.pdf',
                'tipe_buku' => 'gratis',
                'created_at' => '2023-09-14 10:02:19',
                'updated_at' => '2023-09-14 10:02:19',
            ),
            6 => 
            array (
                'id' => 8,
                'slug' => 'mekanisme-pertanian',
                'judul' => 'Mekanisme Pertanian',
                'cover' => 'https://www.propaktani.com/storage/photos/1/Cover-Buku/Cover-Mekanisme-Tata-Kelola-Pertanian.png',
                'file' => 'tJlV0LzxofBAyQTTFZo91lTGjWFHpUG6Te1k0cDu.pdf',
                'tipe_buku' => 'gratis',
                'created_at' => '2023-09-14 10:12:00',
                'updated_at' => '2023-09-14 10:12:00',
            ),
            7 => 
            array (
                'id' => 9,
                'slug' => 'revitalisasi-komando-strategi-penggilingan-padi',
                'judul' => 'Revitalisasi Komando Strategi Penggilingan Padi',
                'cover' => 'https://www.propaktani.com/storage/photos/1/Cover-Buku/Revitalisasi Komando Strategi Penggilingan Padi.png',
                'file' => 'ayos7QosAHBDXVjarhH8SvfuIN61fE1ivTs01Zkj.pdf',
                'tipe_buku' => 'gratis',
                'created_at' => '2023-09-14 10:19:40',
                'updated_at' => '2023-09-14 10:19:40',
            ),
            8 => 
            array (
                'id' => 10,
                'slug' => 'sukses-menanam-padi-pola-ip400',
                'judul' => 'Sukses Menanam Padi Pola IP400',
                'cover' => 'https://www.propaktani.com/storage/photos/1/Cover-Buku/Cover Buku Sukses Menanam Padi IP400.png',
                'file' => 'ye3Ix8u1KHOhoTX9FU1n4TspaNKyJcw1HjnfFV1c.pdf',
                'tipe_buku' => 'gratis',
                'created_at' => '2023-09-14 10:24:52',
                'updated_at' => '2023-09-14 10:24:52',
            ),
            9 => 
            array (
                'id' => 11,
                'slug' => 'teknik-menanam-padi-sahaja',
                'judul' => 'Teknik Menanam Padi Sahaja',
                'cover' => 'https://www.propaktani.com/storage/photos/1/Cover-Buku/Cover Buku Teknik Menanam Padi Sahaja.png',
                'file' => 'w1EkOQ3VousQWAxCeQT3q3YMvNZUL5GEQp8wK2qo.pdf',
                'tipe_buku' => 'gratis',
                'created_at' => '2023-09-14 10:28:51',
                'updated_at' => '2023-09-14 10:28:51',
            ),
            10 => 
            array (
                'id' => 12,
                'slug' => 'lestarikan-padi-optimalkan-pangan-utama-indonesia',
                'judul' => 'Lestarikan Padi Optimalkan Pangan Utama Indonesia',
                'cover' => 'https://www.propaktani.com/storage/photos/1/Cover-Buku/Cover Buku Lestarikan Padi Optimalkan Pangan Utama Indonesia.png',
                'file' => '4rMUPzY7FFyLJFf8wWTcuc9vQFj3nNvaHGiCx94k.pdf',
                'tipe_buku' => 'gratis',
                'created_at' => '2023-09-14 10:34:23',
                'updated_at' => '2023-09-14 10:34:23',
            ),
            11 => 
            array (
                'id' => 13,
                'slug' => 'milenial-mengangkat-pertanian-lokal',
                'judul' => 'Milenial Mengangkat Pertanian Lokal',
                'cover' => 'https://www.propaktani.com/storage/photos/1/Cover-Buku/Cover Buku Milenial Mengangkat Pertanian Lokal.png',
                'file' => 'gfkA8QWLGBMCirSQCc9fgnwmO9KCjwD9ezYResq4.pdf',
                'tipe_buku' => 'gratis',
                'created_at' => '2023-09-14 10:39:54',
                'updated_at' => '2023-09-14 10:39:54',
            ),
            12 => 
            array (
                'id' => 14,
                'slug' => 'tanaman-pangan-dan-kompleksitasnya',
                'judul' => 'Tanaman Pangan Dan Kompleksitasnya',
                'cover' => 'https://www.propaktani.com/storage/photos/1/Cover-Buku/Cover Buku Tanaman Pangan Dan Kompleksitasnya.png',
                'file' => 'GmbKZQPuPlcqivptue00grwzKDvHrBmM0urNskda.pdf',
                'tipe_buku' => 'gratis',
                'created_at' => '2023-09-14 10:45:46',
                'updated_at' => '2023-09-14 10:45:46',
            ),
            13 => 
            array (
                'id' => 15,
                'slug' => 'memasyarakatkan-umbi-umbian',
                'judul' => 'Memasyarakatkan Umbi - Umbian',
                'cover' => 'https://www.propaktani.com/storage/photos/1/Cover-Buku/Cover Buku Memasyarakatkan Umbi Umbian.png',
                'file' => 'm3DqhCvIWRt5ZXeD9d6qhcFOLXzG8ZM9Ff8gZZVf.pdf',
                'tipe_buku' => 'gratis',
                'created_at' => '2023-09-14 10:50:39',
                'updated_at' => '2023-09-14 10:50:39',
            ),
            14 => 
            array (
                'id' => 16,
                'slug' => 'tanaman-pangan-alternatif',
                'judul' => 'Tanaman Pangan Alternatif',
                'cover' => 'https://www.propaktani.com/storage/photos/1/Cover-Buku/Cover Buku Tanaman Pangan Alternatif.png',
                'file' => 'eN67t8MVC6rB1GpMcErLFHsxW3w0NStm6ZaLaUiE.pdf',
                'tipe_buku' => 'gratis',
                'created_at' => '2023-09-14 10:54:31',
                'updated_at' => '2023-09-14 10:54:31',
            ),
            15 => 
            array (
                'id' => 17,
                'slug' => 'inovasi-dan-teknologi-bagi-tanaman-pangan',
                'judul' => 'Inovasi Dan Teknologi Bagi Tanaman Pangan',
                'cover' => 'https://www.propaktani.com/storage/photos/1/Cover-Buku/Cover Buku Inovasi dan Teknologi bagi Tanaman Pangan.png',
                'file' => 'd3GVtmlNUNV7pK5RDKWu6sOM1ISYEPen3T49pBFe.pdf',
                'tipe_buku' => 'gratis',
                'created_at' => '2023-09-14 10:58:02',
                'updated_at' => '2023-09-14 10:58:02',
            ),
            16 => 
            array (
                'id' => 18,
                'slug' => 'melawan-hama-meningkatkan-produk-pertanian',
                'judul' => 'Melawan Hama Meningkatkan Produk Pertanian',
                'cover' => 'https://www.propaktani.com/storage/photos/1/Cover-Buku/Cover Buku Melawan Hama Meningkatkan Produk Pertanian.png',
                'file' => 'nhjyizOKNuIHr7lu8h9Yb2w8eA1gpq4Ul2vtq7cq.pdf',
                'tipe_buku' => 'gratis',
                'created_at' => '2023-12-20 23:56:31',
                'updated_at' => '2023-09-14 11:01:25',
            ),
            17 => 
            array (
                'id' => 19,
                'slug' => 'sertifikasi-bagi-persaingan-pasar',
                'judul' => 'Sertifikasi bagi Persaingan Pasar',
                'cover' => 'https://www.propaktani.com/storage/photos/1/Cover-Buku/Cover Buku Sertifikasi bagi Persaingan Pasar.png',
                'file' => 'MUwrXkDzhDDKMPdgZyxCKxHTxcV084b3ZuzELpB1.pdf',
                'tipe_buku' => 'gratis',
                'created_at' => '2023-09-14 11:05:37',
                'updated_at' => '2023-09-14 11:05:37',
            ),
            18 => 
            array (
                'id' => 20,
                'slug' => 'mengelola-pangan-kini-dan-nanti',
                'judul' => 'Mengelola Pangan Kini dan Nanti',
                'cover' => 'https://www.propaktani.com/storage/photos/1/Cover-Buku/Cover Buku Mengelola Pangan Kini dan Nanti.png',
                'file' => 'uxSVkCc3jTlcsx83mjVbwCB6PeqI09CAhbdebuhy.pdf',
                'tipe_buku' => 'gratis',
                'created_at' => '2023-09-14 11:10:44',
                'updated_at' => '2023-09-14 11:10:44',
            ),
            19 => 
            array (
                'id' => 21,
                'slug' => 'ketahanan-pangan-menembus-situasi-sulit',
                'judul' => 'Ketahanan Pangan Menembus Situasi Sulit',
                'cover' => 'https://www.propaktani.com/storage/photos/1/Cover-Buku/Cover Buku Ketahanan Pangan Menembus Situasi Sulit.png',
                'file' => 'LKQHKkf5h83iKA6yJ8eFxFPvC1PAeGwUrtwiQoxJ.pdf',
                'tipe_buku' => 'gratis',
                'created_at' => '2023-09-14 11:18:49',
                'updated_at' => '2023-09-14 11:18:49',
            ),
            20 => 
            array (
                'id' => 22,
                'slug' => 'mitigasi-pangan-menghadapi-bencana-hidrologis',
                'judul' => 'Mitigasi Pangan Menghadapi Bencana Hidrologis',
                'cover' => 'https://www.propaktani.com/storage/photos/1/Cover-Buku/Cover Buku Mitigasi Pangan Menghadapi Bencana Hidrologis.png',
                'file' => '00raRpcmXInb79cDuZ8hnOHw3qJuzIG0vNNNeynK.pdf',
                'tipe_buku' => 'gratis',
                'created_at' => '2023-09-14 11:23:20',
                'updated_at' => '2023-09-14 11:23:20',
            ),
            21 => 
            array (
                'id' => 24,
                'slug' => 'terobosan-pertanian-berkelanjutan-menuju-tanah-nusantara',
                'judul' => 'Terobosan Pertanian Berkelanjutan Menuju Tanah Nusantara',
                'cover' => 'https://www.propaktani.com/storage/photos/1/Cover-Buku/Cover Buku Terobosan Pertanian Berkelanjutan Menuju Tanah Nusantara-fixed.png',
                'file' => 'rQ6yjWon0GYc3e41y6UOfNOwfoeumX1B0yFMvtIt.pdf',
                'tipe_buku' => 'gratis',
                'created_at' => '2023-09-14 11:32:04',
                'updated_at' => '2023-09-14 11:32:04',
            ),
            22 => 
            array (
                'id' => 27,
                'slug' => 'kemitraan-usaha',
                'judul' => 'Kemitraan usaha',
                'cover' => 'https://www.propaktani.com/storage/photos/1/1.jpg',
                'file' => 'kRhwVBqDf5ZAyqxzEHmYPQzMzf2tUlsHBTTFeLAj.pdf',
                'tipe_buku' => 'gratis',
                'created_at' => '2023-12-17 09:14:45',
                'updated_at' => '2023-12-17 09:14:45',
            ),
            23 => 
            array (
                'id' => 28,
                'slug' => 'kedaulatan-pangan',
                'judul' => 'Kedaulatan Pangan',
                'cover' => 'https://www.propaktani.com/storage/photos/1/WhatsApp Image 2023-12-17 at 05.18.43.jpeg',
                'file' => 'AKg4GkdGXMbgBeqOgRmEIojFdVpf1QypcKRXKS50.pdf',
                'tipe_buku' => 'gratis',
                'created_at' => '2023-12-20 23:52:25',
                'updated_at' => '2023-12-20 23:52:25',
            ),
            24 => 
            array (
                'id' => 29,
                'slug' => 'master-buku-ekonomi-jagung',
                'judul' => 'Master Buku Ekonomi Jagung',
                'cover' => 'https://www.propaktani.com/storage/photos/1/WhatsApp Image 2023-12-20 at 23.39.38.jpeg',
                'file' => 'mxiMgdXSdSQalgYapSlTKgJxDby5z98K43Z3tJSK.pdf',
                'tipe_buku' => 'gratis',
                'created_at' => '2023-09-14 11:10:44',
                'updated_at' => '2023-12-20 23:56:31',
            ),
            25 => 
            array (
                'id' => 31,
                'slug' => 'padi-organik-untuk-generasi-yang-lebih-sehat',
                'judul' => 'Padi Organik Untuk Generasi Yang Lebih Sehat',
                'cover' => 'https://www.propaktani.com/storage/photos/1/Cover-Buku/cover-buku-padi-organik.jpeg',
                'file' => 'XUQyHB5WlVEGsnH69vF2zu1m19tpeiCxASZA9j7Y.pdf',
                'tipe_buku' => 'gratis',
                'created_at' => '2023-12-21 00:07:33',
                'updated_at' => '2023-09-14 09:21:11',
            ),
            26 => 
            array (
                'id' => 32,
                'slug' => 'prospek-bisnis-ubijalar',
                'judul' => 'Prospek Bisnis Ubijalar',
                'cover' => 'https://www.propaktani.com/storage/photos/1/WhatsApp Image 2023-12-21 at 02.59.33.jpeg',
                'file' => 'ge4HcBP4lHz5GAvJi3RCbQdCaCkMVGfZfgJ7ff0o.pdf',
                'tipe_buku' => 'gratis',
                'created_at' => '2023-12-21 03:00:28',
                'updated_at' => '2023-12-21 03:00:28',
            ),
            27 => 
            array (
                'id' => 33,
                'slug' => 'buku',
                'judul' => 'Buku',
                'cover' => 'http://propaktani.test/storage/photos/1/Cover Buku Melawan Hama Meningkatkan Produk Pertanian.png',
                'file' => 'wMSxQI0BpX5fxy5Dn0JtBKEO38BIz5LtKjmzsm6D.png',
                'tipe_buku' => 'gratis',
                'created_at' => '2024-02-10 02:35:16',
                'updated_at' => '2024-02-10 02:35:16',
            ),
        ));
        
        
    }
}