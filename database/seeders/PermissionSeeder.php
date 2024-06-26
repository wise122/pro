<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
 ,    */
    public function run(): void
    {
        // Management Module
        $module = Module::create([
            'id' => 1,
            'name' => 'Management Module'
        ]);

        $permissionModule = [
            [
                'id' => 1,
                'name' => 'manage-module',
                'display_name' => 'Manage Module',
                'description' => 'Bisa Memanage Module'
            ],
            [
                'id' => 2,
                'name' => 'create-module',
                'display_name' => 'Create Module',
                'description' => 'Bisa Membuat Module'
            ],
            [
                'id' => 3,
                'name' => 'edit-module',
                'display_name' => 'Edit Module',
                'description' => 'Bisa Mengedit Module'
            ],
            [
                'id' => 4,
                'name' => 'delete-module',
                'display_name' => 'Delete Module',
                'description' => 'Bisa Menghapus Module'
            ]
        ];

        foreach ($permissionModule as $key) {
            Permission::create([
                'name' => $key['name'],
                'display_name' => $key['display_name'],
                'description' => $key['description'],
                'module_id' => $module->id
            ]);
        }

        // Management Permission
        $modulePermissions = Module::create([
            'id'=> 2,
            'name' => 'Management Permission'
        ]);

        $permissionModulePermissions = [
            [
                'id' => 5,
                'name' => 'manage-permissions',
                'display_name' => 'Manage Permissions',
                'description' => 'Bisa Memanage Permissions'
            ],
            [
                'id' => 6,
                'name' => 'edit-permissions',
                'display_name' => 'Edit Permissions',
                'description' => 'Bisa Mengedit Permissions'
            ]
        ];

        foreach ($permissionModulePermissions as $key) {
            Permission::create([
                'name' => $key['name'],
                'display_name' => $key['display_name'],
                'description' => $key['description'],
                'module_id' => $modulePermissions->id
            ]);
        }

        // Management Role
        $moduleRole = Module::create([
            'id' => 3,
            'name' => 'Management Role'
        ]);

        $permissionModuleRole = [
            [
                'id' => 7,
                'name' => 'manage-role',
                'display_name' => 'Manage Role',
                'description' => 'Bisa Memanage Role'
            ],
            [
                'id' => 8,
                'name' => 'create-role',
                'display_name' => 'Create Role',
                'description' => 'Bisa Membuat Role'
            ],
            [
                'id' => 9,
                'name' => 'edit-role',
                'display_name' => 'Edit Role',
                'description' => 'Bisa Mengedit Role'
            ]
        ];

        foreach ($permissionModuleRole as $key) {
            Permission::create([
                'name' => $key['name'],
                'display_name' => $key['display_name'],
                'description' => $key['description'],
                'module_id' => $moduleRole->id
            ]);
        }

        // Management User
        $moduleUser = Module::create([
            'id' =>  4,
            'name' => 'Management User'
        ]);

        $permissionModuleUser = [
            [
                'id' => 10,
                'name' => 'manage-user',
                'display_name' => 'Manage User',
                'description' => 'Bisa Memanage User'
            ],
            [
                'id' => 11,
                'name' => 'create-user',
                'display_name' => 'Create User',
                'description' => 'Bisa Membuat User'
            ],
            [
                'id' => 12,
                'name' => 'edit-user',
                'display_name' => 'Edit User',
                'description' => 'Bisa Mengedit User'
            ],
            [
                'id' => 13,
                'name' => 'reset-password',
                'display_name' => 'Reset Password User',
                'description' => 'Bisa Mengganti Password User'
            ],
            [
                'id' => 14,
                'name' => 'manage-account',
                'display_name' => 'Manage Account Profile',
                'description' => 'Bisa Memanage Profile'
            ],
            [
                'id' => 15,
                'name' => 'edit-account',
                'display_name' => 'Edit Account Profile',
                'description' => 'Bisa Mengedit Profile'
            ],
            [
                'id' => 16,
                'name' => 'change-password-account',
                'display_name' => 'Reset Password Profile',
                'description' => 'Bisa Mengganti Password Profile'
            ],
        ];

        foreach ($permissionModuleUser as $key) {
            Permission::create([
                'name' => $key['name'],
                'display_name' => $key['display_name'],
                'description' => $key['description'],
                'module_id' => $moduleUser->id
            ]);
        }

        // Management Setting
        $moduleSetting = Module::create([
            'id' => 5,
            'name' => 'Management Setting'
        ]);

        $permissionModuleSetting = [
            [
                'id' => 17,
                'name' => 'manage-setting',
                'display_name' => 'Manage Setting',
                'description' => 'Bisa Memanage Setting'
            ],
            [
                'id' => 18,
                'name' => 'create-setting',
                'display_name' => 'Create Setting',
                'description' => 'Bisa Membuat Setting'
            ],
            [
                'id' => 19,
                'name' => 'edit-setting',
                'display_name' => 'Edit Setting',
                'description' => 'Bisa Mengedit Setting'
            ]
        ];

        foreach ($permissionModuleSetting as $key) {
            Permission::create([
                'name' => $key['name'],
                'display_name' => $key['display_name'],
                'description' => $key['description'],
                'module_id' => $moduleSetting->id
            ]);
        }

        // Management Bts Propaktani
        $moduleBts = Module::create([
            'id' => 6,
            'name' => 'Management Bts Propaktani'
        ]);

        $permissionbts = [
            [
                'id' => 20,
                'name' => 'manage-bts-propaktani',
                'display_name' => 'Manage Bts Propaktani',
                'description' => 'Bisa Memanage Bts Propaktani'
            ],
            [
                'id' => 21,
                'name' => 'create-bts-propaktani',
                'display_name' => 'Create Bts Propaktani',
                'description' => 'Bisa Membuat Bts Propaktani'
            ],
            [
                'id' => 22,
                'name' => 'edit-bts-propaktani',
                'display_name' => 'Edit Bts Propaktani',
                'description' => 'Bisa Mengedit Bts Propaktani'
            ],
            [
                'id' => 23,
                'name' => 'delete-bts-propaktani',
                'display_name' => 'Delete Bts Propaktani',
                'description' => 'Bisa Menghapus Bts Propaktani'
            ]
        ];

        foreach ($permissionbts as $key) {
            Permission::create([
                'name' => $key['name'],
                'display_name' => $key['display_name'],
                'description' => $key['description'],
                'module_id' => $moduleBts->id
            ]);
        }

        // Management Banner
        $moduleBanner = Module::create([
            'id'=> 7,
            'name' => 'Management Banner'
        ]);

        $permissionBanner = [
            [
                'id'=> 24,
                'name' => 'manage-banner',
                'display_name' => 'Manage Banner',
                'description' => 'Bisa Memanage Banner'
            ],
            [
                'id' => 25,
                'name' => 'create-banner',
                'display_name' => 'Create Banner',
                'description' => 'Bisa Membuat Banner'
            ],
            [
                'id' => 26,
                'name' => 'edit-banner',
                'display_name' => 'Edit Banner',
                'description' => 'Bisa Mengedit Banner'
            ],
            [
                'id' => 27,
                'name' => 'delete-banner',
                'display_name' => 'Delete Banner',
                'description' => 'Bisa Menghapus Banner'
            ]
        ];

        foreach ($permissionBanner as $key) {
            Permission::create([
                'name' => $key['name'],
                'display_name' => $key['display_name'],
                'description' => $key['description'],
                'module_id' => $moduleBanner->id
            ]);
        }

        // Management News
        $moduleNews = Module::create([
            'id' => 8,
            'name' => 'Management News'
        ]);

        $permissionNews = [
            [
                'id' => 28,
                'name' => 'manage-news',
                'display_name' => 'Manage News',
                'description' => 'Bisa Memanage News'
            ],
            [
                'id' => 29,
                'name' => 'create-news',
                'display_name' => 'Create News',
                'description' => 'Bisa Membuat News'
            ],
            [
                'id' => 30,
                'name' => 'edit-news',
                'display_name' => 'Edit News',
                'description' => 'Bisa Mengedit News'
            ],
            [
                'id' => 31,
                'name' => 'delete-news',
                'display_name' => 'Delete News',
                'description' => 'Bisa Menghapus News'
            ]
        ];

        foreach ($permissionNews as $key) {
            Permission::create([
                'name' => $key['name'],
                'display_name' => $key['display_name'],
                'description' => $key['description'],
                'module_id' => $moduleNews->id
            ]);
        }

        // Management Article
        $moduleArticle = Module::create([
            'id' => 9,
            'name' => 'Management Artikel'
        ]);

        $permissionArticle = [
            [
                'id' => 32,
                'name' => 'manage-article',
                'display_name' => 'Manage Artikel',
                'description' => 'Bisa Memanage Artikel'
            ],
            [
                'id' => 33,
                'name' => 'create-article',
                'display_name' => 'Create Artikel',
                'description' => 'Bisa Membuat Artikel'
            ],
            [
                'id' => 34,
                'name' => 'edit-article',
                'display_name' => 'Edit Artikel',
                'description' => 'Bisa Mengedit Artikel'
            ],
            [
                'id' => 35,
                'name' => 'delete-article',
                'display_name' => 'Delete Artikel',
                'description' => 'Bisa Menghapus Artikel'
            ]
        ];

        foreach ($permissionArticle as $key) {
            Permission::create([
                'name' => $key['name'],
                'display_name' => $key['display_name'],
                'description' => $key['description'],
                'module_id' => $moduleArticle->id
            ]);
        }

        // Management Jadwal BTS
        $moduleJadwalBts = Module::create([
            'id' => 10,
            'name' => 'Management Jadwal BTS'
        ]);

        $permissionJadwalBts = [
            [
                'id' => 36,
                'name' => 'manage-jadwal-bts',
                'display_name' => 'Manage Jadwal BTS',
                'description' => 'Bisa Memanage Jadwal BTS'
            ],
            [
                'id' => 37,
                'name' => 'create-jadwal-bts',
                'display_name' => 'Create Jadwal BTS',
                'description' => 'Bisa Membuat Jadwal BTS'
            ],
            [
                'id' => 38,
                'name' => 'edit-jadwal-bts',
                'display_name' => 'Edit Jadwal BTS',
                'description' => 'Bisa Mengedit Jadwal BTS'
            ],
            [
                'id'=> 39,
                'name' => 'delete-jadwal-bts',
                'display_name' => 'Delete Jadwal BTS',
                'description' => 'Bisa Menghapus Jadwal BTS'
            ]
        ];

        foreach ($permissionJadwalBts as $key) {
            Permission::create([
                'name' => $key['name'],
                'display_name' => $key['display_name'],
                'description' => $key['description'],
                'module_id' => $moduleJadwalBts->id
            ]);
        }
        //Management Category
        $moduleCategory = Module::create([
            'id' => 11,
            'name' => 'Management Category'
        ]);

        $permissionCategory = [
            [
                'id' => 40,
                'name' => 'manage-Category',
                'display_name' => 'Manage Category',
                'description' => 'Bisa Memanage Category'
            ],
            [
                'id' => 41,
                'name' => 'create-Category',
                'display_name' => 'Create category',
                'description' => 'Bisa Membuat Category'
            ],
            [
                'id' => 42,
                'name' => 'edit-Category',
                'display_name' => 'Edit Category',
                'description' => 'Bisa Mengedit Category'
            ],
            [
                'id' => 43,
                'name' => 'delete-Category',
                'display_name' => 'Delete Category',
                'description' => 'Bisa Menghapus Category'
            ]
        ];
        foreach ($permissionCategory as $key) {
            Permission::create([
                'name' => $key['name'],
                'display_name' => $key['display_name'],
                'description' => $key['description'],
                'module_id' => $moduleCategory->id
            ]);
        }
        //Management Tag
        $moduleTag = Module::create([
            'id' => 12,
            'name' => 'Management Tag'
        ]);

        $permissionTag = [
            [
                'id' => 44,
                'name' => 'manage-Tag',
                'display_name' => 'Manage Tag',
                'description' => 'Bisa Memanage Tag'
            ],
            [
                'id' => 45,
                'name' => 'create-Tag',
                'display_name' => 'Create Tag',
                'description' => 'Bisa Membuat Tag'
            ],
            [
                'id' => 46,
                'name' => 'edit-Tag',
                'display_name' => 'Edit Tag',
                'description' => 'Bisa Mengedit Tag'
            ],
            [
                'id' => 47,
                'name' => 'delete-Tag',
                'display_name' => 'Delete Tag',
                'description' => 'Bisa Menghapus Tag'
            ]
        ];
        foreach ($permissionTag as $key) {
            Permission::create([
                'name' => $key['name'],
                'display_name' => $key['display_name'],
                'description' => $key['description'],
                'module_id' => $moduleTag->id
            ]);
        }

        // Management Video
        $moduleVideo = Module::create([
            'id' => 13,
            'name' => 'Management Video'
        ]);

        $permissionVideo = [
            [
                'id' => 48,
                'name' => 'manage-video',
                'display_name' => 'Manage Video',
                'description' => 'Bisa Memanage Video'
            ],
            [
                'id' => 49,
                'name' => 'create-video',
                'display_name' => 'Create Video',
                'description' => 'Bisa Membuat Video'
            ],
            [
                'id' => 50,
                'name' => 'edit-video',
                'display_name' => 'Edit Video',
                'description' => 'Bisa Mengedit Video'
            ],
            [
                'id' => 51,
                'name' => 'delete-video',
                'display_name' => 'Delete Video',
                'description' => 'Bisa Menghapus Video'
            ]
        ];
        foreach ($permissionVideo as $key) {
            Permission::create([
                'name' => $key['name'],
                'display_name' => $key['display_name'],
                'description' => $key['description'],
                'module_id' => $moduleVideo->id
            ]);
        }

        // Management Buku
        $moduleBuku = Module::create([
            'id' => 14,
            'name' => 'Management Buku'
        ]);

        $permissionBuku = [
            [
                'id' => 52,
                'name' => 'manage-buku',
                'display_name' => 'Manage Buku',
                'description' => 'Bisa Memanage Buku'
            ],
            [
                'id' => 53,
                'name' => 'create-buku',
                'display_name' => 'Create Buku',
                'description' => 'Bisa Membuat Buku'
            ],
            [
                'id' => 54,
                'name' => 'edit-buku',
                'display_name' => 'Edit Buku',
                'description' => 'Bisa Mengedit Buku'
            ],
            [
                'id' => 55,
                'name' => 'delete-buku',
                'display_name' => 'Delete Buku',
                'description' => 'Bisa Menghapus Buku'
            ]
        ];

        foreach ($permissionBuku as $key) {
            Permission::create([
                'name' => $key['name'],
                'display_name' => $key['display_name'],
                'description' => $key['description'],
                'module_id' => $moduleBuku->id
            ]);
        }

        // Management Arsip Sertificate
        $moduleArsipSertifikat = Module::create([
            'id' => 15,
            'name' => 'Management Arsip Sertifikat'
        ]);

        $permissionArsipSertifikat = [
            [
                'id' => 56,
                'name' => 'manage-arsip-sertifikat',
                'display_name' => 'Manage Arsip Sertifikat',
                'description' => 'Bisa Memanage Arsip Sertifikat'
            ],
            [
                'id' => 57,
                'name' => 'create-arsip-sertifikat',
                'display_name' => 'Create Arsip Sertifikat',
                'description' => 'Bisa Membuat Arsip Sertifikat'
            ],
            [
                'id' => 58,
                'name' => 'edit-arsip-sertifikat',
                'display_name' => 'Edit Arsip Sertifikat',
                'description' => 'Bisa Mengedit Arsip Sertifikat'
            ],
            [
                'id' => 59,
                'name' => 'delete-arsip-sertifikat',
                'display_name' => 'Delete Arsip Sertifikat',
                'description' => 'Bisa Menghapus Arsip Sertifikat'
            ]
        ];

        foreach ($permissionArsipSertifikat as $key) {
            Permission::create([
                'name' => $key['name'],
                'display_name' => $key['display_name'],
                'description' => $key['description'],
                'module_id' => $moduleArsipSertifikat->id
            ]);
        }

        //Management Instansi
        $moduleInstansi = Module::create([
            'id' => 16,
            'name' => 'Management Instansi'
        ]);

        $permissionInstansi = [
            [
                'id' => 60,
                'name' => 'manage-Instansi',
                'display_name' => 'Manage Instansi',
                'description' => 'Bisa Memanage Instansi'
            ],
            [
                'id' => 61,
                'name' => 'create-Instansi',
                'display_name' => 'Create Instansi',
                'description' => 'Bisa Membuat Instansi'
            ],
            [
                'id' => 62,
                'name' => 'edit-Instansi',
                'display_name' => 'Edit Instansi',
                'description' => 'Bisa Mengedit instansi'
            ],
            [
                'id' => 63,
                'name' => 'delete-Instansi',
                'display_name' => 'Delete Instansi',
                'description' => 'Bisa Menghapus Instansi'
            ]
        ];
        foreach ($permissionInstansi as $key) {
            Permission::create([
                'name' => $key['name'],
                'display_name' => $key['display_name'],
                'description' => $key['description'],
                'module_id' => $moduleInstansi->id
            ]);
        }

        //Management Keahlian
        $moduleKeahlian = Module::create([
            'id' => 17,
            'name' => 'Management Keahlian'
        ]);

        $permissionKeahlian = [
            [
                'id' => 68,
                'name' => 'manage-Keahlian',
                'display_name' => 'Manage Keahlian',
                'description' => 'Bisa Memanage Keahlian'
            ],
            [
                'id' => 69,
                'name' => 'create-Keahlian',
                'display_name' => 'Create Keahlian',
                'description' => 'Bisa Membuat Keahlian'
            ],
            [
                'id' => 70,
                'name' => 'edit-Keahlian',
                'display_name' => 'Edit Keahlian',
                'description' => 'Bisa Mengedit Keahlian'
            ],
            [
                'id' => 71,
                'name' => 'delete-Keahlian',
                'display_name' => 'Delete Keahlian',
                'description' => 'Bisa Menghapus Keahlian'
            ]
        ];
        foreach ($permissionKeahlian as $key) {
            Permission::create([
                'name' => $key['name'],
                'display_name' => $key['display_name'],
                'description' => $key['description'],
                'module_id' => $moduleKeahlian->id
            ]);
        }

        // Management Weekly Schedule
        $moduleJadwalMingguan = Module::create([
            'id' => 18,
            'name' => 'Management Jadwal Mingguan'
        ]);

        $permissionJadwalMingguan = [
            [
                'id' => 64,
                'name' => 'manage-jadwal-mingguan',
                'display_name' => 'Manage Jadwal Mingguan',
                'description' => 'Bisa Memanage Jadwal Mingguan'
            ],
            [
                'id' => 65,
                'name' => 'create-jadwal-mingguan',
                'display_name' => 'Create Jadwal Mingguan',
                'description' => 'Bisa Membuat Jadwal Mingguan'
            ],
            [
                'id' => 66,
                'name' => 'edit-jadwal-mingguan',
                'display_name' => 'Edit Jadwal Mingguan',
                'description' => 'Bisa Mengedit Jadwal Mingguan'
            ],
            [
                'id' => 67,
                'name' => 'delete-jadwal-mingguan',
                'display_name' => 'Delete Jadwal Mingguan',
                'description' => 'Bisa Menghapus Jadwal Mingguan'
            ]
        ];
        foreach ($permissionJadwalMingguan as $key) {
            Permission::create([
                'name' => $key['name'],
                'display_name' => $key['display_name'],
                'description' => $key['description'],
                'module_id' => $moduleJadwalMingguan->id
            ]);
        }
        //Management Faq
        $moduleFaq = Module::create([
            'id' => 19,
            'name' => 'Management Faq'
        ]);

        $permissionFaq = [
            [
                'id' => 72,
                'name' => 'manage-Faq',
                'display_name' => 'Manage Faq',
                'description' => 'Bisa Memanage Faq'
            ],
            [
                'id' =>  73,
                'name' => 'create-Faq',
                'display_name' => 'Create Faq',
                'description' => 'Bisa Membuat Faq'
            ],
            [
                'id' => 74,
                'name' => 'edit-Faq',
                'display_name' => 'Edit Faq',
                'description' => 'Bisa Mengedit Faq'
            ],
            [
                'id' => 75,
                'name' => 'delete-Faq',
                'display_name' => 'Delete Faq',
                'description' => 'Bisa Menghapus Faq'
            ]
        ];
        foreach ($permissionFaq as $key) {
            Permission::create([
                'name' => $key['name'],
                'display_name' => $key['display_name'],
                'description' => $key['description'],
                'module_id' => $moduleFaq->id
            ]);
        }
        //Management Iot
        $moduleIot = Module::create([
            'id' => 20,
            'name' => 'Management Iot'
        ]);

        $permissionIot = [
            [
                'id' => 76,
                'name' => 'manage-iot',
                'display_name' => 'Manage Iot',
                'description' => 'Bisa Memanage Iot'
            ],
            [
                'id' =>  77,
                'name' => 'create-iot',
                'display_name' => 'Create Iot',
                'description' => 'Bisa Membuat Iot'
            ],
            [
                'id' => 78,
                'name' => 'edit-iot',
                'display_name' => 'Edit Iot',
                'description' => 'Bisa Mengedit Iot'
            ],
            [
                'id' => 79,
                'name' => 'delete-iot',
                'display_name' => 'Delete Iot',
                'description' => 'Bisa Menghapus Iot'
            ]
        ];
        foreach ($permissionIot as $key) {
            Permission::create([
                'name' => $key['name'],
                'display_name' => $key['display_name'],
                'description' => $key['description'],
                'module_id' => $moduleIot->id
            ]);
        }


        //Management Biosaka
        $moduleBiosaka = Module::create([
            'id' => 21,
            'name' => 'Management Biosaka'
        ]);

        $permissionBiosaka = [
            [
                'id' => 80,
                'name' => 'manage-biosaka',
                'display_name' => 'Manage Biosaka',
                'description' => 'Bisa Memanage Biosaka'
            ],
            [
                'id' =>  81,
                'name' => 'create-biosaka',
                'display_name' => 'Create Biosaka',
                'description' => 'Bisa Membuat Biosaka'
            ],
            [
                'id' => 82,
                'name' => 'edit-biosaka',
                'display_name' => 'Edit Biosaka',
                'description' => 'Bisa Mengedit Biosaka'
            ],
            [
                'id' => 83,
                'name' => 'delete-biosaka',
                'display_name' => 'Delete Biosaka',
                'description' => 'Bisa Menghapus Biosaka'
            ]
        ];
        foreach ($permissionBiosaka as $key) {
            Permission::create([
                'name' => $key['name'],
                'display_name' => $key['display_name'],
                'description' => $key['description'],
                'module_id' => $moduleBiosaka->id
            ]);
        }
    }
}

