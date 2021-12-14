<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BranchesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('branches')->insert([
            'branch_name' => 'STGO-1',
            'branch_address' => 'AVENIDA FALSA 123',
            'branch_phone' => '922222222',
            'branch_status' => true
        ]);
        DB::table('branches')->insert([
            'branch_name' => 'STGO-2',
            'branch_address' => 'AVENIDA FALSA 1234',
            'branch_phone' => '92224522',
            'branch_status' => true
        ]);
        DB::table('branches')->insert([
            'branch_name' => 'STGO-3',
            'branch_address' => 'AVENIDA FALSA 12345',
            'branch_phone' => '922227822',
            'branch_status' => true
        ]);
    }
}
