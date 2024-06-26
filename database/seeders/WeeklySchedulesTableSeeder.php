<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WeeklySchedulesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('weekly_schedules')->delete();
        
        \DB::table('weekly_schedules')->insert(array (
            0 => 
            array (
                'id' => 1,
                'cover' => 'https://www.propaktani.com/storage/files/1/Mingguan/Cover Mingguan.jpeg',
                'start_date' => '2023-08-27',
                'end_date' => '2023-09-02',
                'created_at' => NULL,
                'updated_at' => '2023-09-10 18:41:48',
            ),
            1 => 
            array (
                'id' => 2,
                'cover' => 'https://www.propaktani.com/storage/files/1/Mingguan/Week 3-1.jpeg',
                'start_date' => '2023-09-10',
                'end_date' => '2023-09-16',
                'created_at' => '2023-09-10 18:37:28',
                'updated_at' => '2023-09-10 18:38:22',
            ),
            2 => 
            array (
                'id' => 3,
                'cover' => 'https://www.propaktani.com/storage/files/1/Mingguan/M4 Sept.png',
                'start_date' => '2023-09-17',
                'end_date' => '2023-09-23',
                'created_at' => '2023-09-17 19:19:18',
                'updated_at' => '2023-09-17 19:19:18',
            ),
            3 => 
            array (
                'id' => 4,
                'cover' => 'https://www.propaktani.com/storage/files/1/Mingguan/WhatsApp Image 2023-09-24 at 19.09.26.jpeg',
                'start_date' => '2023-09-24',
                'end_date' => '2023-09-30',
                'created_at' => '2023-09-24 19:35:26',
                'updated_at' => '2023-09-24 19:35:26',
            ),
            4 => 
            array (
                'id' => 5,
                'cover' => 'https://www.propaktani.com/storage/files/1/Mingguan/WhatsApp Image 2023-10-01 at 17.24.05.jpeg',
                'start_date' => '2023-10-01',
                'end_date' => '2023-10-07',
                'created_at' => '2023-10-01 19:04:56',
                'updated_at' => '2023-10-01 19:04:56',
            ),
            5 => 
            array (
                'id' => 6,
                'cover' => 'https://www.propaktani.com/storage/files/1/Mingguan/WhatsApp Image 2023-10-08 at 18.12.46.jpeg',
                'start_date' => '2023-10-08',
                'end_date' => '2023-10-14',
                'created_at' => '2023-10-08 20:46:19',
                'updated_at' => '2023-10-08 20:46:19',
            ),
            6 => 
            array (
                'id' => 7,
                'cover' => 'https://www.propaktani.com/storage/files/1/jadwal mingguan Oktober minggu ke 3.jpg',
                'start_date' => '2023-10-15',
                'end_date' => '2023-10-21',
                'created_at' => '2023-10-15 20:47:52',
                'updated_at' => '2023-10-15 20:47:52',
            ),
            7 => 
            array (
                'id' => 8,
                'cover' => 'https://www.propaktani.com/storage/files/1/flyer minggu ke 4 oktober 2023.jpg',
                'start_date' => '2023-10-22',
                'end_date' => '2023-10-29',
                'created_at' => '2023-10-22 19:35:14',
                'updated_at' => '2023-10-22 19:35:14',
            ),
            8 => 
            array (
                'id' => 9,
                'cover' => 'https://www.propaktani.com/storage/files/1/WhatsApp Image 2023-10-29 at 19.57.22.jpeg',
                'start_date' => '2023-10-29',
                'end_date' => '2023-11-04',
                'created_at' => '2023-10-29 22:05:42',
                'updated_at' => '2023-10-29 22:05:42',
            ),
            9 => 
            array (
                'id' => 10,
                'cover' => 'https://www.propaktani.com/storage/files/1/Mingguan/6d5f46831d557c3717ccc4c32a28c7cb_0.jpeg',
                'start_date' => '2023-11-05',
                'end_date' => '2023-11-11',
                'created_at' => '2023-11-05 17:33:04',
                'updated_at' => '2023-11-05 17:33:04',
            ),
            10 => 
            array (
                'id' => 11,
                'cover' => 'https://www.propaktani.com/storage/files/1/Mingguan/WhatsApp Image 2023-11-12 at 20.26.48.jpeg',
                'start_date' => '2023-11-12',
                'end_date' => '2023-11-18',
                'created_at' => '2023-11-12 20:47:59',
                'updated_at' => '2023-11-12 20:47:59',
            ),
            11 => 
            array (
                'id' => 12,
                'cover' => 'https://www.propaktani.com/storage/files/1/Mingguan/IMG-20231119-WA0006.jpg',
                'start_date' => '2023-11-19',
                'end_date' => '2023-11-25',
                'created_at' => '2023-11-19 21:29:44',
                'updated_at' => '2023-11-19 21:29:44',
            ),
            12 => 
            array (
                'id' => 13,
                'cover' => 'https://www.propaktani.com/storage/files/1/Mingguan/IMG-20231126-WA0001.jpg',
                'start_date' => '2023-11-26',
                'end_date' => '2023-12-02',
                'created_at' => '2023-11-26 21:21:36',
                'updated_at' => '2023-11-26 21:21:36',
            ),
            13 => 
            array (
                'id' => 14,
                'cover' => 'https://www.propaktani.com/storage/files/1/Mingguan/IMG-20231203-WA0000.jpg',
                'start_date' => '2023-12-03',
                'end_date' => '2023-12-09',
                'created_at' => '2023-12-03 20:56:17',
                'updated_at' => '2023-12-03 20:56:17',
            ),
            14 => 
            array (
                'id' => 15,
                'cover' => 'https://www.propaktani.com/storage/files/1/Mingguan/2 DES.png',
                'start_date' => '2023-12-10',
                'end_date' => '2023-12-16',
                'created_at' => '2023-12-10 21:53:35',
                'updated_at' => '2023-12-10 21:53:35',
            ),
            15 => 
            array (
                'id' => 16,
                'cover' => 'https://www.propaktani.com/storage/files/1/Mingguan/IMG-20231217-WA0015.jpg',
                'start_date' => '2023-12-24',
                'end_date' => '2023-12-30',
                'created_at' => '2023-12-17 19:47:26',
                'updated_at' => '2023-12-17 19:47:26',
            ),
            16 => 
            array (
                'id' => 17,
                'cover' => 'https://www.propaktani.com/storage/files/1/Mingguan/IMG-20231226-WA0004.jpg',
                'start_date' => '2023-12-26',
                'end_date' => '2023-12-30',
                'created_at' => '2023-12-26 21:22:44',
                'updated_at' => '2023-12-26 21:22:44',
            ),
            17 => 
            array (
                'id' => 18,
                'cover' => 'https://www.propaktani.com/storage/files/1/Mingguan/IMG-20240101-WA0008.jpg',
                'start_date' => '2024-01-01',
                'end_date' => '2024-01-06',
                'created_at' => '2024-01-01 20:55:08',
                'updated_at' => '2024-01-01 20:55:08',
            ),
            18 => 
            array (
                'id' => 19,
                'cover' => 'https://www.propaktani.com/storage/files/1/IMG-20240107-WA0023.jpg',
                'start_date' => '2024-01-07',
                'end_date' => '2024-01-13',
                'created_at' => '2024-01-07 19:20:42',
                'updated_at' => '2024-01-07 19:20:42',
            ),
            19 => 
            array (
                'id' => 20,
                'cover' => 'https://www.propaktani.com/storage/files/1/IMG-20240114-WA0024.jpg',
                'start_date' => '2024-01-14',
                'end_date' => '2024-01-20',
                'created_at' => '2024-01-14 18:49:09',
                'updated_at' => '2024-01-14 18:49:09',
            ),
            20 => 
            array (
                'id' => 21,
                'cover' => 'https://www.propaktani.com/storage/files/1/Mingguan/IMG-20240121-WA0023.jpg',
                'start_date' => '2024-01-21',
                'end_date' => '2024-01-27',
                'created_at' => '2024-01-21 19:17:54',
                'updated_at' => '2024-01-21 19:17:54',
            ),
            21 => 
            array (
                'id' => 22,
                'cover' => 'https://www.propaktani.com/storage/files/1/IMG-20240128-WA0007.jpg',
                'start_date' => '2024-01-28',
                'end_date' => '2024-02-03',
                'created_at' => '2024-01-28 19:19:59',
                'updated_at' => '2024-01-28 19:19:59',
            ),
            22 => 
            array (
                'id' => 23,
                'cover' => 'https://www.propaktani.com/storage/files/1/IMG-20240204-WA0021.jpg',
                'start_date' => '2024-02-04',
                'end_date' => '2024-02-10',
                'created_at' => '2024-02-04 20:20:04',
                'updated_at' => '2024-02-04 20:20:04',
            ),
        ));
        
        
    }
}