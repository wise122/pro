<?php

namespace Database\Seeders;

use App\Models\Keahlian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KeahlianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $keahlian = new Keahlian();
        $keahlian->name = 'Lainnya';
        $keahlian->urutan = 1;
        $keahlian->save();

        $keahlian = new Keahlian();
        $keahlian->name = 'Perbenihan';
        $keahlian->urutan = 2;
        $keahlian->save();

        $keahlian = new Keahlian();
        $keahlian->name = 'Budi Daya';
        $keahlian->urutan = 3;
        $keahlian->save();

        $keahlian = new Keahlian();
        $keahlian->name = 'Sosial Ekonomi';
        $keahlian->urutan = 4;
        $keahlian->save();

        $keahlian = new Keahlian();
        $keahlian->name = 'Mekanisasi Pertanian';
        $keahlian->urutan = 5;
        $keahlian->save();

        $keahlian = new Keahlian();
        $keahlian->name = 'Ekonomi Pertanian';
        $keahlian->urutan = 6;
        $keahlian->save();

        $keahlian = new Keahlian();
        $keahlian->name = 'Pupuk';
        $keahlian->urutan = 7;
        $keahlian->save();

        $keahlian = new Keahlian();
        $keahlian->name = 'Opt/Hama';
        $keahlian->urutan = 8;
        $keahlian->save();

        $keahlian = new Keahlian();
        $keahlian->name = 'Dpi/Iklim';
        $keahlian->urutan = 9;
        $keahlian->save();

        $keahlian = new Keahlian();
        $keahlian->name = 'Ilmu Tanah';
        $keahlian->urutan = 10;
        $keahlian->save();

        $keahlian = new Keahlian();
        $keahlian->name = 'Pengolahan';
        $keahlian->urutan = 11;
        $keahlian->save();

        $keahlian = new Keahlian();
        $keahlian->name = 'Sumber Daya Lahan';
        $keahlian->urutan = 12;
        $keahlian->save();

        $keahlian = new Keahlian();
        $keahlian->name = 'SDM Petani';
        $keahlian->urutan = 13;
        $keahlian->save();

        $keahlian = new Keahlian();
        $keahlian->name = 'Agronomi';
        $keahlian->urutan = 14;
        $keahlian->save();

        $keahlian = new Keahlian();
        $keahlian->name = 'Agro Bisnis';
        $keahlian->urutan = 15;
        $keahlian->save();
    }
}
