<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = "Admin Propaktani";
        $user->email = "admin@propaktani.com";
        $user->password = bcrypt('rahasia');
        $user->no_hp = '088877776666';
        $user->save();

        // User Admin
        $role = Role::create([
            'name' => 'admin',
            'display_name' => 'Admin',
            'description' => 'Ini adalah Role Admin'
        ]);

        $permission = [
            'manage-module',
            'create-module',
            'edit-module',
            'delete-module',
            'manage-permissions',
            'edit-permissions',
            'manage-role',
            'create-role',
            'edit-role',
            'manage-user',
            'create-user',
            'edit-user',
            'reset-password',
            'manage-account',
            'edit-account',
            'change-password-account',
            'manage-setting',
            'create-setting',
            'edit-setting',
            'manage-bts-propaktani',
            'create-bts-propaktani',
            'edit-bts-propaktani',
            'delete-bts-propaktani',
            'manage-banner',
            'create-banner',
            'edit-banner',
            'delete-banner',
            'manage-news',
            'create-news',
            'edit-news',
            'delete-news',
            'manage-article',
            'create-article',
            'edit-article',
            'delete-article',
            'manage-jadwal-bts',
            'create-jadwal-bts',
            'edit-jadwal-bts',
            'delete-jadwal-bts',
            'manage-Category',
            'create-Category',
            'edit-Category',
            'delete-Category',
            'manage-Tag',
            'create-Tag',
            'edit-Tag',
            'delete-Tag',
            'manage-video',
            'create-video',
            'edit-video',
            'delete-video',
            'manage-buku',
            'create-buku',
            'edit-buku',
            'delete-buku',
            'manage-arsip-sertifikat',
            'create-arsip-sertifikat',
            'edit-arsip-sertifikat',
            'delete-arsip-sertifikat',
            'manage-Instansi',
            'create-Instansi',
            'edit-Instansi',
            'delete-Instansi',
            'manage-Keahlian',
            'create-Keahlian',
            'edit-Keahlian',
            'delete-Keahlian',
            'manage-jadwal-mingguan',
            'create-jadwal-mingguan',
            'edit-jadwal-mingguan',
            'delete-jadwal-mingguan',
            'manage-Faq',
            'create-Faq',
            'edit-Faq',
            'delete-Faq',
            'manage-iot',
            'create-iot',
            'edit-iot',
            'delete-iot',
            'manage-biosaka',
            'create-biosaka',
            'edit-biosaka',
            'delete-biosaka',
        ];

        foreach ($permission as $key => $ap) {
            $userPermission = Permission::where('name', $ap)->first();
            $role->attachPermission($userPermission->id);
            $user->attachPermission($userPermission->id);
        }
        $user->attachRole($role);

        // User Produsen
        $user = new User();
        $user->name = "Produsen Propaktani";
        $user->email = "produsen@propaktani.com";
        $user->password = bcrypt('produsen23');
        $user->no_hp = '088877776660';
        $user->save();

        $role = Role::create([
            'name' => 'produsen',
            'display_name' => 'Produsen',
            'description' => 'Ini adalah Role Produsen'
        ]);

        $permission = [

        ];

        foreach ($permission as $key => $ap) {
            $userPermission = Permission::where('name', $ap)->first();
            $role->attachPermission($userPermission->id);
            $user->attachPermission($userPermission->id);
        }
        $user->attachRole($role);

        // User Konsumen
        $user = new User();
        $user->name = "Konsumen Propaktani";
        $user->email = "konsumen@propaktani.com";
        $user->password = bcrypt('konsumen23');
        $user->no_hp = '088877776668';
        $user->save();

        $role = Role::create([
            'name' => 'konsumen',
            'display_name' => 'Konsumen',
            'description' => 'Ini adalah Role Konsumen'
        ]);

        $permission = [

        ];

        foreach ($permission as $key => $ap) {
            $userPermission = Permission::where('name', $ap)->first();
            $role->attachPermission($userPermission->id);
            $user->attachPermission($userPermission->id);
        }
        $user->attachRole($role);

        // User Narsum
        $user = new User();
        $user->name = "Narasumber Propaktani";
        $user->email = "narasumber@propaktani.com";
        $user->password = bcrypt('narasumber23');
        $user->no_hp = '088877776669';
        $user->save();

        $role = Role::create([
            'name' => 'narsum',
            'display_name' => 'Narasumber',
            'description' => 'Ini adalah Role Narasumber'
        ]);

        $permission = [

        ];

        foreach ($permission as $key => $ap) {
            $userPermission = Permission::where('name', $ap)->first();
            $role->attachPermission($userPermission->id);
            $user->attachPermission($userPermission->id);
        }
        $user->attachRole($role);

        // User Umum
        $user = new User();
        $user->name = "Umum Propaktani";
        $user->email = "umum@propaktani.com";
        $user->password = bcrypt('umum23');
        $user->no_hp = '088877776662';
        $user->save();

        $role = Role::create([
            'name' => 'umum',
            'display_name' => 'Umum',
            'description' => 'Ini adalah Role Umum'
        ]);

        $permission = [

        ];

        foreach ($permission as $key => $ap) {
            $userPermission = Permission::where('name', $ap)->first();
            $role->attachPermission($userPermission->id);
            $user->attachPermission($userPermission->id);
        }
        $user->attachRole($role);

        // User Investor
        $user = new User();
        $user->name = "Investor Propaktani";
        $user->email = "investor@propaktani.com";
        $user->password = bcrypt('investor23');
        $user->no_hp = '088877776698';
        $user->save();

        $role = Role::create([
            'name' => 'investor',
            'display_name' => 'Investor',
            'description' => 'Ini adalah Role Investor'
        ]);

        $permission = [

        ];

        foreach ($permission as $key => $ap) {
            $userPermission = Permission::where('name', $ap)->first();
            $role->attachPermission($userPermission->id);
            $user->attachPermission($userPermission->id);
        }
        $user->attachRole($role);
    }
}
