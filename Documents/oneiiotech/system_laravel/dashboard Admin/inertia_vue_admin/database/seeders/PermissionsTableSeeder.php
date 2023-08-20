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
                'name' => 'Permission',
                'key' => 'permission',
                'active' => 1,
                'created_at' => '2023-03-14 09:14:20',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Role',
                'key' => 'role',
                'active' => 1,
                'created_at' => '2023-03-14 09:14:35',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Permission Feature',
                'key' => 'permission_feature',
                'active' => 1,
                'created_at' => '2023-03-14 09:15:34',
                'updated_at' => '2023-03-14 22:20:23',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Translate Khmer',
                'key' => 'translate_khmer',
                'active' => 1,
                'created_at' => '2023-03-14 09:16:04',
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Translate English',
                'key' => 'translate_english',
                'active' => 1,
                'created_at' => '2023-03-14 09:16:14',
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Company Info',
                'key' => 'company_info',
                'active' => 1,
                'created_at' => '2023-03-14 09:16:36',
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'About Me',
                'key' => 'about_me',
                'active' => 1,
                'created_at' => '2023-03-14 09:22:28',
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'User',
                'key' => 'user',
                'active' => 1,
                'created_at' => '2023-03-14 22:22:35',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}