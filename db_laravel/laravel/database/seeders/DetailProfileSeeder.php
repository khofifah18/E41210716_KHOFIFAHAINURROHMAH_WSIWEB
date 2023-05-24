<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //insert data ke table pegawai
        DB::table('detail_profile')->insert([
            'address' => 'Jember',
            'nomor_tlp' => '081282165557',
            'ttl' => '2002-09-18',
            'foto' => 'picture.png'
        ]);
    }
}
