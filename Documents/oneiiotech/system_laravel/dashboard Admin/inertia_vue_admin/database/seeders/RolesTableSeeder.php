<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Developer',
                'created_by' => 1,
                'updated_by' => 1,
                'active' => 1,
                'created_at' => '2023-03-14 09:13:14',
                'updated_at' => '2023-03-14 15:12:55',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Admin',
                'created_by' => 2,
                'updated_by' => NULL,
                'active' => 1,
                'created_at' => '2023-03-14 16:24:41',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}