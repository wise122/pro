<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'manage-module',
                'display_name' => 'Manage Module',
                'description' => 'Bisa Memanage Module',
                'module_id' => 1,
                'created_at' => '2023-09-18 15:02:38',
                'updated_at' => '2023-09-18 15:02:38',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'create-module',
                'display_name' => 'Create Module',
                'description' => 'Bisa Membuat Module',
                'module_id' => 1,
                'created_at' => '2023-09-18 15:02:38',
                'updated_at' => '2023-09-18 15:02:38',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'edit-module',
                'display_name' => 'Edit Module',
                'description' => 'Bisa Mengedit Module',
                'module_id' => 1,
                'created_at' => '2023-09-18 15:02:38',
                'updated_at' => '2023-09-18 15:02:38',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'delete-module',
                'display_name' => 'Delete Module',
                'description' => 'Bisa Menghapus Module',
                'module_id' => 1,
                'created_at' => '2023-09-18 15:02:38',
                'updated_at' => '2023-09-18 15:02:38',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'manage-permissions',
                'display_name' => 'Manage Permissions',
                'description' => 'Bisa Memanage Permissions',
                'module_id' => 2,
                'created_at' => '2023-09-18 15:02:38',
                'updated_at' => '2023-09-18 15:02:38',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'edit-permissions',
                'display_name' => 'Edit Permissions',
                'description' => 'Bisa Mengedit Permissions',
                'module_id' => 2,
                'created_at' => '2023-09-18 15:02:38',
                'updated_at' => '2023-09-18 15:02:38',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'manage-role',
                'display_name' => 'Manage Role',
                'description' => 'Bisa Memanage Role',
                'module_id' => 3,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'create-role',
                'display_name' => 'Create Role',
                'description' => 'Bisa Membuat Role',
                'module_id' => 3,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'edit-role',
                'display_name' => 'Edit Role',
                'description' => 'Bisa Mengedit Role',
                'module_id' => 3,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'manage-user',
                'display_name' => 'Manage User',
                'description' => 'Bisa Memanage User',
                'module_id' => 4,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'create-user',
                'display_name' => 'Create User',
                'description' => 'Bisa Membuat User',
                'module_id' => 4,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'edit-user',
                'display_name' => 'Edit User',
                'description' => 'Bisa Mengedit User',
                'module_id' => 4,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'reset-password',
                'display_name' => 'Reset Password User',
                'description' => 'Bisa Mengganti Password User',
                'module_id' => 4,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'manage-account',
                'display_name' => 'Manage Account Profile',
                'description' => 'Bisa Memanage Profile',
                'module_id' => 4,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'edit-account',
                'display_name' => 'Edit Account Profile',
                'description' => 'Bisa Mengedit Profile',
                'module_id' => 4,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'change-password-account',
                'display_name' => 'Reset Password Profile',
                'description' => 'Bisa Mengganti Password Profile',
                'module_id' => 4,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'manage-setting',
                'display_name' => 'Manage Setting',
                'description' => 'Bisa Memanage Setting',
                'module_id' => 5,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'create-setting',
                'display_name' => 'Create Setting',
                'description' => 'Bisa Membuat Setting',
                'module_id' => 5,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'edit-setting',
                'display_name' => 'Edit Setting',
                'description' => 'Bisa Mengedit Setting',
                'module_id' => 5,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'manage-bts-propaktani',
                'display_name' => 'Manage Bts Propaktani',
                'description' => 'Bisa Memanage Bts Propaktani',
                'module_id' => 6,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'create-bts-propaktani',
                'display_name' => 'Create Bts Propaktani',
                'description' => 'Bisa Membuat Bts Propaktani',
                'module_id' => 6,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'edit-bts-propaktani',
                'display_name' => 'Edit Bts Propaktani',
                'description' => 'Bisa Mengedit Bts Propaktani',
                'module_id' => 6,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'delete-bts-propaktani',
                'display_name' => 'Delete Bts Propaktani',
                'description' => 'Bisa Menghapus Bts Propaktani',
                'module_id' => 6,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'manage-banner',
                'display_name' => 'Manage Banner',
                'description' => 'Bisa Memanage Banner',
                'module_id' => 7,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'create-banner',
                'display_name' => 'Create Banner',
                'description' => 'Bisa Membuat Banner',
                'module_id' => 7,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'edit-banner',
                'display_name' => 'Edit Banner',
                'description' => 'Bisa Mengedit Banner',
                'module_id' => 7,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'delete-banner',
                'display_name' => 'Delete Banner',
                'description' => 'Bisa Menghapus Banner',
                'module_id' => 7,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'manage-news',
                'display_name' => 'Manage News',
                'description' => 'Bisa Memanage News',
                'module_id' => 8,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'create-news',
                'display_name' => 'Create News',
                'description' => 'Bisa Membuat News',
                'module_id' => 8,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'edit-news',
                'display_name' => 'Edit News',
                'description' => 'Bisa Mengedit News',
                'module_id' => 8,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'delete-news',
                'display_name' => 'Delete News',
                'description' => 'Bisa Menghapus News',
                'module_id' => 8,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'manage-article',
                'display_name' => 'Manage Artikel',
                'description' => 'Bisa Memanage Artikel',
                'module_id' => 9,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'create-article',
                'display_name' => 'Create Artikel',
                'description' => 'Bisa Membuat Artikel',
                'module_id' => 9,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'edit-article',
                'display_name' => 'Edit Artikel',
                'description' => 'Bisa Mengedit Artikel',
                'module_id' => 9,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'delete-article',
                'display_name' => 'Delete Artikel',
                'description' => 'Bisa Menghapus Artikel',
                'module_id' => 9,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'manage-jadwal-bts',
                'display_name' => 'Manage Jadwal BTS',
                'description' => 'Bisa Memanage Jadwal BTS',
                'module_id' => 10,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'create-jadwal-bts',
                'display_name' => 'Create Jadwal BTS',
                'description' => 'Bisa Membuat Jadwal BTS',
                'module_id' => 10,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'edit-jadwal-bts',
                'display_name' => 'Edit Jadwal BTS',
                'description' => 'Bisa Mengedit Jadwal BTS',
                'module_id' => 10,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'delete-jadwal-bts',
                'display_name' => 'Delete Jadwal BTS',
                'description' => 'Bisa Menghapus Jadwal BTS',
                'module_id' => 10,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            39 => 
            array (
                'id' => 40,
                'name' => 'manage-Category',
                'display_name' => 'Manage Category',
                'description' => 'Bisa Memanage Category',
                'module_id' => 11,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            40 => 
            array (
                'id' => 41,
                'name' => 'create-Category',
                'display_name' => 'Create category',
                'description' => 'Bisa Membuat Category',
                'module_id' => 11,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            41 => 
            array (
                'id' => 42,
                'name' => 'edit-Category',
                'display_name' => 'Edit Category',
                'description' => 'Bisa Mengedit Category',
                'module_id' => 11,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            42 => 
            array (
                'id' => 43,
                'name' => 'delete-Category',
                'display_name' => 'Delete Category',
                'description' => 'Bisa Menghapus Category',
                'module_id' => 11,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            43 => 
            array (
                'id' => 44,
                'name' => 'manage-Tag',
                'display_name' => 'Manage Tag',
                'description' => 'Bisa Memanage Tag',
                'module_id' => 12,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            44 => 
            array (
                'id' => 45,
                'name' => 'create-Tag',
                'display_name' => 'Create Tag',
                'description' => 'Bisa Membuat Tag',
                'module_id' => 12,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            45 => 
            array (
                'id' => 46,
                'name' => 'edit-Tag',
                'display_name' => 'Edit Tag',
                'description' => 'Bisa Mengedit Tag',
                'module_id' => 12,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            46 => 
            array (
                'id' => 47,
                'name' => 'delete-Tag',
                'display_name' => 'Delete Tag',
                'description' => 'Bisa Menghapus Tag',
                'module_id' => 12,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            47 => 
            array (
                'id' => 48,
                'name' => 'manage-video',
                'display_name' => 'Manage Video',
                'description' => 'Bisa Memanage Video',
                'module_id' => 13,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            48 => 
            array (
                'id' => 49,
                'name' => 'create-video',
                'display_name' => 'Create Video',
                'description' => 'Bisa Membuat Video',
                'module_id' => 13,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            49 => 
            array (
                'id' => 50,
                'name' => 'edit-video',
                'display_name' => 'Edit Video',
                'description' => 'Bisa Mengedit Video',
                'module_id' => 13,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            50 => 
            array (
                'id' => 51,
                'name' => 'delete-video',
                'display_name' => 'Delete Video',
                'description' => 'Bisa Menghapus Video',
                'module_id' => 13,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            51 => 
            array (
                'id' => 52,
                'name' => 'manage-buku',
                'display_name' => 'Manage Buku',
                'description' => 'Bisa Memanage Buku',
                'module_id' => 14,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            52 => 
            array (
                'id' => 53,
                'name' => 'create-buku',
                'display_name' => 'Create Buku',
                'description' => 'Bisa Membuat Buku',
                'module_id' => 14,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            53 => 
            array (
                'id' => 54,
                'name' => 'edit-buku',
                'display_name' => 'Edit Buku',
                'description' => 'Bisa Mengedit Buku',
                'module_id' => 14,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            54 => 
            array (
                'id' => 55,
                'name' => 'delete-buku',
                'display_name' => 'Delete Buku',
                'description' => 'Bisa Menghapus Buku',
                'module_id' => 14,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            55 => 
            array (
                'id' => 56,
                'name' => 'manage-arsip-sertifikat',
                'display_name' => 'Manage Arsip Sertifikat',
                'description' => 'Bisa Memanage Arsip Sertifikat',
                'module_id' => 15,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            56 => 
            array (
                'id' => 57,
                'name' => 'create-arsip-sertifikat',
                'display_name' => 'Create Arsip Sertifikat',
                'description' => 'Bisa Membuat Arsip Sertifikat',
                'module_id' => 15,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            57 => 
            array (
                'id' => 58,
                'name' => 'edit-arsip-sertifikat',
                'display_name' => 'Edit Arsip Sertifikat',
                'description' => 'Bisa Mengedit Arsip Sertifikat',
                'module_id' => 15,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            58 => 
            array (
                'id' => 59,
                'name' => 'delete-arsip-sertifikat',
                'display_name' => 'Delete Arsip Sertifikat',
                'description' => 'Bisa Menghapus Arsip Sertifikat',
                'module_id' => 15,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            59 => 
            array (
                'id' => 60,
                'name' => 'manage-Instansi',
                'display_name' => 'Manage Instansi',
                'description' => 'Bisa Memanage Instansi',
                'module_id' => 16,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            60 => 
            array (
                'id' => 61,
                'name' => 'create-Instansi',
                'display_name' => 'Create Instansi',
                'description' => 'Bisa Membuat Instansi',
                'module_id' => 16,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            61 => 
            array (
                'id' => 62,
                'name' => 'edit-Instansi',
                'display_name' => 'Edit Instansi',
                'description' => 'Bisa Mengedit instansi',
                'module_id' => 16,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            62 => 
            array (
                'id' => 63,
                'name' => 'delete-Instansi',
                'display_name' => 'Delete Instansi',
                'description' => 'Bisa Menghapus Instansi',
                'module_id' => 16,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            63 => 
            array (
                'id' => 64,
                'name' => 'manage-Keahlian',
                'display_name' => 'Manage Keahlian',
                'description' => 'Bisa Memanage Keahlian',
                'module_id' => 17,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            64 => 
            array (
                'id' => 65,
                'name' => 'create-Keahlian',
                'display_name' => 'Create Keahlian',
                'description' => 'Bisa Membuat Keahlian',
                'module_id' => 17,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            65 => 
            array (
                'id' => 66,
                'name' => 'edit-Keahlian',
                'display_name' => 'Edit Keahlian',
                'description' => 'Bisa Mengedit Keahlian',
                'module_id' => 17,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            66 => 
            array (
                'id' => 67,
                'name' => 'delete-Keahlian',
                'display_name' => 'Delete Keahlian',
                'description' => 'Bisa Menghapus Keahlian',
                'module_id' => 17,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            67 => 
            array (
                'id' => 68,
                'name' => 'manage-jadwal-mingguan',
                'display_name' => 'Manage Jadwal Mingguan',
                'description' => 'Bisa Memanage Jadwal Mingguan',
                'module_id' => 18,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            68 => 
            array (
                'id' => 69,
                'name' => 'create-jadwal-mingguan',
                'display_name' => 'Create Jadwal Mingguan',
                'description' => 'Bisa Membuat Jadwal Mingguan',
                'module_id' => 18,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            69 => 
            array (
                'id' => 70,
                'name' => 'edit-jadwal-mingguan',
                'display_name' => 'Edit Jadwal Mingguan',
                'description' => 'Bisa Mengedit Jadwal Mingguan',
                'module_id' => 18,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            70 => 
            array (
                'id' => 71,
                'name' => 'delete-jadwal-mingguan',
                'display_name' => 'Delete Jadwal Mingguan',
                'description' => 'Bisa Menghapus Jadwal Mingguan',
                'module_id' => 18,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            71 => 
            array (
                'id' => 72,
                'name' => 'manage-Faq',
                'display_name' => 'Manage Faq',
                'description' => 'Bisa Memanage Faq',
                'module_id' => 19,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            72 => 
            array (
                'id' => 73,
                'name' => 'create-Faq',
                'display_name' => 'Create Faq',
                'description' => 'Bisa Membuat Faq',
                'module_id' => 19,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            73 => 
            array (
                'id' => 74,
                'name' => 'edit-Faq',
                'display_name' => 'Edit Faq',
                'description' => 'Bisa Mengedit Faq',
                'module_id' => 19,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            74 => 
            array (
                'id' => 75,
                'name' => 'delete-Faq',
                'display_name' => 'Delete Faq',
                'description' => 'Bisa Menghapus Faq',
                'module_id' => 19,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            75 => 
            array (
                'id' => 76,
                'name' => 'manage-iot',
                'display_name' => 'Manage Iot',
                'description' => 'Bisa Memanage Iot',
                'module_id' => 20,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            76 => 
            array (
                'id' => 77,
                'name' => 'create-iot',
                'display_name' => 'Create Iot',
                'description' => 'Bisa Membuat Iot',
                'module_id' => 20,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            77 => 
            array (
                'id' => 78,
                'name' => 'edit-iot',
                'display_name' => 'Edit Iot',
                'description' => 'Bisa Mengedit Iot',
                'module_id' => 20,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            78 => 
            array (
                'id' => 79,
                'name' => 'delete-iot',
                'display_name' => 'Delete Iot',
                'description' => 'Bisa Menghapus Iot',
                'module_id' => 20,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            79 => 
            array (
                'id' => 80,
                'name' => 'manage-biosaka',
                'display_name' => 'Manage Biosaka',
                'description' => 'Bisa Memanage Biosaka',
                'module_id' => 21,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            80 => 
            array (
                'id' => 81,
                'name' => 'create-biosaka',
                'display_name' => 'Create Biosaka',
                'description' => 'Bisa Membuat Biosaka',
                'module_id' => 21,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            81 => 
            array (
                'id' => 82,
                'name' => 'edit-biosaka',
                'display_name' => 'Edit Biosaka',
                'description' => 'Bisa Mengedit Biosaka',
                'module_id' => 21,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            82 => 
            array (
                'id' => 83,
                'name' => 'delete-biosaka',
                'display_name' => 'Delete Biosaka',
                'description' => 'Bisa Menghapus Biosaka',
                'module_id' => 21,
                'created_at' => '2023-09-18 15:02:39',
                'updated_at' => '2023-09-18 15:02:39',
            ),
            83 => 
            array (
                'id' => 84,
                'name' => 'manage-bts-live',
                'display_name' => 'Manage Bts Live',
                'description' => 'Bisa Memanage Bts Live',
                'module_id' => 22,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            84 => 
            array (
                'id' => 85,
                'name' => 'create-bts-live',
                'display_name' => 'Create Bts Live',
                'description' => 'Bisa Membuat  Bts Live',
                'module_id' => 22,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            85 => 
            array (
                'id' => 86,
                'name' => 'edit-bts-live',
                'display_name' => 'Edit Bts Live',
                'description' => 'Bisa Mengedit  Bts Live',
                'module_id' => 22,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}